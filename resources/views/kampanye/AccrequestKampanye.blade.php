@extends('layout.master')

@section('title', 'Request Kampanye')

@section('content')
<div class="container mt-5 rounded-card">
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
                    <!-- Dummy Data -->
                    <tr>
                        <td>00001</td>
                        <td>Howan Anderson</td>
                        <td>Penanaman 200 Pohon Trembesi</td>
                        <td>Riau</td>
                        <td>Trembesi</td>
                        <td><span class="badge bg-success">OKE</span></td>
                        <td><button class="btn btn-sm"><h4>i</h4></button></td>
                    </tr>
                    <tr>
                        <td>00002</td>
                        <td>Supandi S.</td>
                        <td>Hijaunkan Bekasi dengan Beringin</td>
                        <td>Bekasi</td>
                        <td>Beringin</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td><button class="btn btn-sm"><h4>i</h4></button></td>
                    </tr><tr>
                        <td>00002</td>
                        <td>Supandi S.</td>
                        <td>Hijaunkan Bekasi dengan Beringin</td>                                                                                                          
                        <td>Bekasi</td>
                        <td>Beringin</td>
                        <td><span class="badge bg-danger">reject</span></td>
                        <td><button class="btn btn-sm"><h4>i</h4></button></td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-4">
                <button class="btn btn-success me-5 ">Terima Semua</button>
                <button class="btn btn-danger me-4">Tolak</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
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
    .rounded-card{
        border-radius: 5rem;
    }
</style>
@endsection
