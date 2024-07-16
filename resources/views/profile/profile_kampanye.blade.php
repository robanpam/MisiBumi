@extends('profile.profile_layout')

@section('active_kampanye', 'active-tab')

@section('ins')
    <h3>Pending</h3>
    <div class="row">
        @forelse ($kampanye_pending as $kampanye)
            <div class="col-12 py-2 px-3 mx-2 items d-flex justify-content-between align-items-center">
                <img src="{{ asset('asset/kampanye/tes.png') }}" class="kamp-img" alt="">
                <p>{{ $kampanye->name_kampanye }}</p>
                <p>{{ $kampanye->lokasi_kampanye }}</p>
                <p>{{ $kampanye->jumlah_pohon }} / {{ $kampanye->total_pohon }} pohon</p>
                <p>{{ \Carbon\Carbon::parse($kampanye->batas_donasi)->format('d-m-Y') }}</p>
                <span class="badge bg-warning">Pending</span>
            </div>
        @empty
            <p>Tidak ada kampanye yang sedang pending</p>
        @endforelse
    </div>
    <h3 class="mt-3">In Progress</h3>
    <div class="row">
        @forelse ($kampanye_progres as $kampanye)
            <div class="col-12 py-2 px-3 mx-2 items d-flex justify-content-between align-items-center">
                <img src="{{ asset('asset/kampanye/tes.png') }}" class="kamp-img" alt="">
                <p>{{ $kampanye->name_kampanye }}</p>
                <p>{{ $kampanye->lokasi_kampanye }}</p>
                <p>{{ $kampanye->jumlah_pohon }} / {{ $kampanye->total_pohon }} pohon</p>
                <p>{{ \Carbon\Carbon::parse($kampanye->batas_donasi)->format('d-m-Y') }}</p>
                <span class="badge bg-primary">Processing</span>
            </div>
        @empty
            <p>Tidak ada kampanye yang sedang berjalan</p>
        @endforelse
    </div>
    <h3 class="mt-3">Completed</h3>
    <div class="row">
        @forelse ($kampanye_complete as $kampanye)
            <div class="col-12 py-2 px-3 mx-2 items d-flex justify-content-between align-items-center">
                <img src="{{ asset('asset/kampanye/tes.png') }}" class="kamp-img" alt="">
                <p>{{ $kampanye->name_kampanye }}</p>
                <p>{{ $kampanye->lokasi_kampanye }}</p>
                <p>{{ $kampanye->jumlah_pohon }} / {{ $kampanye->total_pohon }} pohon</p>
                <p>{{ \Carbon\Carbon::parse($kampanye->batas_donasi)->format('d-m-Y') }}</p>
                <span class="badge bg-success">Completed</span>  
            </div>
        @empty
            <p>Tidak ada kampanye yang sudah selesai</p>
        @endforelse
    </div>
    <h3 class="mt-3">Rejected</h3>
    <div class="row">
        @forelse ($kampanye_rejected as $kampanye)
            <div class="col-12 py-2 px-3 mx-2 items d-flex justify-content-between align-items-center">
                <img src="{{ asset('asset/kampanye/tes.png') }}" class="kamp-img" alt="">
                <p>{{ $kampanye->name_kampanye }}</p>
                <p>{{ $kampanye->lokasi_kampanye }}</p>
                <p>{{ $kampanye->jumlah_pohon }} / {{ $kampanye->total_pohon }} pohon</p>
                <p>{{ \Carbon\Carbon::parse($kampanye->batas_donasi)->format('d-m-Y') }}</p>
                <span class="badge bg-danger">Rejected</span>
            </div>
        @empty
            <p>Tidak ada kampanye yang ditolak</p>
        @endforelse
    </div>
    
@endsection('ins')   