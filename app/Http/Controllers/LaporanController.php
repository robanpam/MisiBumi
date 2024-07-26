<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Kampanye;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporan()
    {
        // Define the range of years
        $startYear = 2021;
        $endYear = 2024;


        // Total pohon pertahun
        $totalPohonPertahun = Kampanye::select(DB::raw('YEAR(updated_at) as tahun'), DB::raw('SUM(jumlah_pohon) as total_pohon'))
            ->where('kampanyes.status', '=', 0)
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->get();

        // Total kampanye pertahun
        $totalKampanyePertahun = Kampanye::select(DB::raw('YEAR(created_at) as tahun'), DB::raw('COUNT(id) as total_kampanye'))
            ->whereYear('created_at', '>=', $startYear)
            ->whereYear('created_at', '<=', $endYear)
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->get();

        // Total donasi terkumpul
        $totalDonasiPertahun = Donasi::select(DB::raw('YEAR(created_at) as tahun'), DB::raw('SUM(nilai_donasi) as total_donasi'))
            ->whereYear('created_at', '>=', $startYear)
            ->whereYear('created_at', '<=', $endYear)
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->get();

        // Total sahabat bumi
        $totalUserPertahun = User::select(DB::raw('YEAR(created_at) as tahun'), DB::raw('COUNT(id) as total_user'))
            ->whereYear('created_at', '>=', $startYear)
            ->whereYear('created_at', '<=', $endYear)
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->get();

        // Total lokasi pertahun
        $totalLokasiPertahun = Kampanye::select(DB::raw('YEAR(created_at) as tahun'), DB::raw('COUNT(id) as total_lokasi'))
            ->whereYear('created_at', '>=', $startYear)
            ->whereYear('created_at', '<=', $endYear)
            ->groupBy('tahun')  
            ->orderBy('tahun', 'desc')
            ->get();

        $emisiPerTahun = Kampanye::join('pohons', 'pohons.id', '=', 'kampanyes.pohon_id')
            ->select(DB::raw('YEAR(kampanyes.updated_at) as tahun'), 
            DB::raw('SUM(jumlah_pohon * serapan_karbon * ABS(DATEDIFF(CONCAT(YEAR(kampanyes.updated_at), "-12-01"), kampanyes.updated_at))) as serapan_karbon'),
            DB::raw('SUM(jumlah_pohon * serapan_karbon * 365) as prev_year'),
            )
            ->where('kampanyes.status', '=', 0)
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->get();
        
        // dd($emisiPerTahun);

        $totalEmissions = collect($emisiPerTahun)->map(function($item) use ($emisiPerTahun) {
            $prevYear = $emisiPerTahun->firstWhere('tahun', $item->tahun - 1);
            $item->total_emisi = $item->serapan_karbon;
            if ($prevYear) {
                $item->total_emisi += $prevYear->prev_year;
            }
            
            // dd($prevYear);
            return $item;
        });

        // dd($totalEmissions);

        $i = $totalEmissions->count() - 1;
        foreach (range($startYear, $endYear) as $year) {
            $total_donasi = $totalDonasiPertahun->firstWhere('tahun', $year)->total_donasi ?? 0;
            $dataPerTahun[$year] = [
                'tahun'=> $year,
                'total_kampanye' => $totalKampanyePertahun->firstWhere('tahun', $year)->total_kampanye ?? 0,
                'total_pohon' => $totalPohonPertahun->firstWhere('tahun', $year)->total_pohon ?? 0,
                'total_donasi' => $total_donasi ? formatNumber($total_donasi) : 0,
                'total_user' => $totalUserPertahun->firstWhere('tahun', $year)->total_user ?? 0,
                'total_lokasi' => $totalLokasiPertahun->firstWhere('tahun', $year)->total_lokasi ?? 0,
                'total_emisi' => formatEmission($totalEmissions[$i]->total_emisi),        
            ];
            $i--;
        }

        return view('laporan.laporanTahunan', compact('dataPerTahun'));
    }
}
