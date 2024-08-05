<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Donasi;
use App\Models\Kampanye;
use App\Models\Pohon;
use App\Models\Testimoni;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonasiController extends Controller
{

    public function mainDonasi()
    {
        // Jumlah kampanye
        $total_kampanye = Kampanye::select(Kampanye::raw('count(id) as total_kampanye'))
            ->get();

        if ($total_kampanye->isEmpty()) {
            $kampanye = 0;
        } else {
            $kampanye = $total_kampanye[0]->total_kampanye;
        }

        // Total pohon
        $total_pohon = Kampanye::select(Kampanye::raw('sum(jumlah_pohon) as total_pohon'))
            ->get();

        if ($total_pohon->isEmpty()) {
            $pohon = 0;
        } else {
            $pohon = $total_pohon[0]->total_pohon;
        }

        $pohon = formatNumber($pohon);

        // Donasi terkumpul
        $total_donasi = Donasi::select(Donasi::raw('sum(nilai_donasi) as total_donasi'))
            ->get();

        if ($total_donasi->isEmpty()) {
            $donasi = 0;
        } else {
            $donasi = $total_donasi[0]->total_donasi;
        }

        $donasi = formatNumber($donasi);

        // Ambil data artikel
        $artikels = Artikel::inRandomOrder()->take(5)->get();

        // Format tanggal untuk setiap artikel
        foreach ($artikels as $artikel) {
            $artikel->formatted_created_at = Carbon::parse($artikel->created_at)->translatedFormat('j F Y');
        }

        $admins1 = User::where('jenis_user_id', 2)->get();


        $testimonis = Testimoni::all();


        // Kirim data artikel ke view
        return view('donasi.mainDampakDonasi', compact('artikels', 'admins1', 'kampanye', 'pohon', 'donasi', 'testimonis'));
    }

    public function pilihNominal(Request $request){
        $kampanye = Kampanye::find($request->kampanye_id);
        $pohon = Pohon::find($kampanye->pohon_id);
        return view('donasi.pilih_nominal', compact('kampanye', 'pohon'));
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'ticket_id' => 'required',
        //     'buyer_name' => 'required',
        //     'email' => 'required|email',
        //     'ticket_date' => 'required|date|after_or_equal:' . Carbon::today()->toDateString(),
        //     'phone' => 'required',
        //     'quantity' => 'required|integer',
        // ]);

        // $ticket = Ticket::findOrFail($validatedData['ticket_id']);
        // $price = $ticket->price;

        // $validatedData['user_id'] = auth()->user()->id;

        // $transaction = Transaction::create(
        //     $validatedData
        // );

        // $gross_amount = $price * $transaction['quantity'];

        // dd($request);

        $donasi = Donasi::create([
            'user_id' => $request->user_id,
            'kampanye_id' => $request->kampanye_id,
            'nilai_donasi' => $request->nominal_donasi,
        ]);

        $user = User::find($request->user_id);

        \Midtrans\Config::$serverKey = 'SB-Mid-server-v1ZFnN5XaCq6P3mDt5soEde6';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $donasi->id,
                'gross_amount' => $request->nominal_donasi,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->nomor_telepon
            ],
        ];


        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $donasi->snap_token = $snapToken;
            $donasi->save();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to process payment: ' . $e->getMessage()], 500);
        }

        return redirect()->route('donasi.show_detail', ['donasi' => $donasi->id]);
    }

    public function show(Donasi $donasi)
    {
        $detail = Donasi::join('kampanyes', 'donasis.kampanye_id', '=', 'kampanyes.id')
            ->where('donasis.id', $donasi->id)
            ->first();

        return view(
            'donasi.detail_donasi',
            [
                "detail" => $detail
            ]
        );
    }

    public function callback(Request $request)
    {
        if ($request->status_code == '200') {
            $donasi = Donasi::find($request->order_id);

            $mp = 0;
            if($request->payment_type == 'qris'){
                $mp = 1;
            }

            $donasi->metode_pembayaran_id = $mp;
            $donasi->status = '1';
            $donasi->save();
            
            $kampanye = Kampanye::select('*')->where('kampanyes.id', '=', $donasi->kampanye_id)->first();

            $totalDonasi = Kampanye::join('donasis', 'donasis.kampanye_id', '=', 'kampanye.id')
                        ->select(DB::raw('sum(nilai_donasi) as total_donasi'))
                        ->where('kampanyes.id', '=', $donasi->kampanye_id)
                        ->groupBy('kampanyes.id')
                        ->first();
            
            $hargaPohon = Pohon::select('*')->where('pohon.id', '=', $kampanye->pohon_id)->first();

            if($totalDonasi->total_donasi / $hargaPohon->harga_pohon >= $kampanye->jumlah_pohon){
                $kampanye->status = 0;
                $kampanye->save();
            }
        }
    }
}
