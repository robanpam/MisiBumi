@extends('profile.profile_layout')

@section('active_history', 'active-tab')

@section('ins')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <tr>
                    <th>Nama Kampanye</th>
                    <th>Nilai Donasi</th>
                    <th>Tanggal Donasi</th>
                    <th>Metode Pembayaran</th>
                </tr>
                @forelse ($donasis as $donasi)
                    <tr>
                        <td>{{ $donasi->nama_kampanye }}</td>
                        <td>{{ $donasi->nilai_donasi }}</td>
                        <td>{{ \Carbon\Carbon::parse($donasi->created_at)->format('d-m-Y') }}</td>
                        <td>{{ $donasi->nama_metode }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Anda belum melakukan misi apapun</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection('ins')