@extends('layout.master')

@section('title', 'Detail Kampanye')

@section('content')
<div class="container mt-5 d-flex justify-content-center align-items-center full-height rounded-card">
    <div class="card shadow bold-border rounded-card" style="width: 100%; max-width: 600px;">
        <div class="mt-4  mb-4 text-center rounded-card2">
            <h5>Detail Kampanye</h5>
        </div>
        <div class="card-body rounded-card" >
            <!-- Campaign Details -->
            <table class="table table-borderless campaingdetails">
                <tbody>
                    <tr>
                        <th scope="row">ID Kampanye</th>
                        <td>00001</td>
                    </tr>
                    <tr>
                        <th scope="row">Nama</th>
                        <td>Howan Anderson</td>
                    </tr>
                    <tr>
                        <th scope="row">Judul Kampanye</th>
                        <td>Penanaman 200 Pohon Trembesi</td>
                    </tr>
                    <tr>
                        <th scope="row">Lokasi</th>
                        <td>Riau</td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal Request</th>
                        <td>4 September 2019</td>
                    </tr>
                    <tr>
                        <th scope="row">Jenis Pohon (Jumlah)</th>
                        <td>Trembesi (200)</td>
                    </tr>
                    <tr>
                        <th scope="row">Dibutuhkan</th>
                        <td>Rp8.000.000</td>
                    </tr>
                    <tr>
                        <th scope="row">Batas Donasi</th>
                        <td>1 Januari 2020</td>
                    </tr>
                    <tr>
                        <th scope="row">Deskripsi</th>
                        <td>Kampanye ini...</td>
                    </tr>
                    <tr>
                        <th scope="row">Gambar</th>
                        <td>
                            <img src="path/to/image.jpg" class="img-fluid rounded" alt="Campaign Image">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-btn">
                <button class="btn btn-success btn-lg me-4">Terima</button>
                <button class="btn btn-danger btn-lg ">Tolak</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    .mt-btn{
        margin-top: 5rem;
    }
    .card-header {
        background-color: #f8f9fa;
        font-weight: bold;

    }
    .card-body {
        background-color: #fff;
    }
    .bold-border {
        border: 2px solid #000; /* Adjust the color and width as needed */
    }
    .rounded-card {
        border-radius: 1rem; /* Adjust the radius as needed */
    }
    .btn {
        padding: 5px 10px; /* Smaller padding for smaller buttons */
        font-size: 1.15rem; /* Smaller font size for smaller buttons */
        border-radius: 5rem;
    }
    .btn-success {
        background-color: #114232;
        border-color: #114232;
    }
    .btn-danger {
        background-color: #853B3B;
        border-color: #853B3B;
    }
    .full-height {
        min-height: 100vh;
    }
    .table th {
        width: 40%;
        text-align: left;
    }
    .table td {
        text-align: left;
    }
    .img-fluid {
        max-width: 100%;
        height: auto;
    }
    .rounded-card2 div{
      border-radius: 10rem;
    }
    .campaingdetails tr{
      border-bottom: 1px solid black;
    }
</style>
@endsection
