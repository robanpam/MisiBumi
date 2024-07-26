@extends('layout.admin')

@section('title', 'Request Kampanye')

@section('kelolak_aktif', 'active')

@section('content')
<div class="container rounded-card">
    <div class="card shadow bold-border ">
        <div class="card-header text-center">
            <h5>Request Kampanye</h5>
        </div>
        <div class="card-body rounded-card">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Judul Kampanye</th>
                        <th>Lokasi</th>
                        <th>Pohon</th>
                        <th>Status</th>
                        <th>Info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendingKampanyes as $kampanye)
                    <tr>
                        <td>{{ $kampanye->id }}</td>
                        <td>{{ $kampanye->user_name }}</td>
                        <td>{{ $kampanye->nama_kampanye }}</td>
                        <td>{{ $kampanye->lokasi_kampanye }}</td>
                        <td>{{ $kampanye->pohon_nama }}</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td><a href="{{ route('detailkampanye', ['id' => $kampanye->id]) }}" class="btn btn-sm"><h4>i</h4></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-4">
                <form action="{{ route('terimaSemua') }}" method="POST" class="me-2">
                    @csrf
                    <button type="submit" class="btn btn-success me-5">Terima Semua</button>
                </form>
                <form action="{{ route('tolakSemua') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger me-4">Tolak semua</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('more_files')
<style>
    .card-header {
        background-color: #f8f9fa;
        font-weight: bold;
    }
    .card-body {
        background-color: #fff;
    }
    .bold-border {
        border: 0.5px solid #000; /* Adjust the color and width as needed */
    }
    .badge {
        padding: 10px;
        font-size: 14px;
    }
    .btn {
        padding: 10px 20px;
        border-radius: 3rem;
    }
    .btn-success {
        background-color: #114232;
        border-color: #114232;
    }
    .btn-danger {
        background-color: #853B3B;
        border-color: #853B3B;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .rounded-card {
        border-radius: 5rem;
    }
</style>
@endsection
