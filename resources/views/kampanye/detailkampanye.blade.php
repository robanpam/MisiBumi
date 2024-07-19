@extends('layout.master')

@section('title', 'Detail Kampanye')



@section('content')
    <div class="container mt-5 d-flex justify-content-center align-items-center full-height rounded-card">
        <div class="card shadow bold-border rounded-card" style="width: 100%; max-width: 600px;">
            <div class="mt-4  mb-4 text-center rounded-card2">
                <h5>Detail Kampanye</h5>
            </div>
            <div class="card-body rounded-card">
                <!-- Campaign Details -->
                <table class="table table-borderless campaingdetails">
                    <tbody>
                        <tr>
                            <th scope="row">ID Kampanye</th>
                            <td>{{ $kampanye->id }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama</th>
                            <td>{{ $kampanye->user_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Judul Kampanye</th>
                            <td>{{ $kampanye->nama_kampanye }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Lokasi</th>
                            <td>{{ $kampanye->lokasi_kampanye }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal Request</th>
                            <td>{{ \Carbon\Carbon::parse($kampanye->created_at)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jenis Pohon (Jumlah)</th>
                            <td>{{ $kampanye->pohon_nama }} ({{ $kampanye->total_pohon }})</td>
                        </tr>
                        <tr>
                            <th scope="row">Dibutuhkan</th>
                            <td>{{ 'Rp' . number_format($kampanye->harga_pohon, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Batas Donasi</th>
                            <td>{{ \Carbon\Carbon::parse($kampanye->batas_donasi)->translatedFormat('d F Y') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Deskripsi</th>
                            <td>{{ $kampanye->deskripsi }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Gambar</th>
                            <td>
                                <img src="{{ asset('path/to/image/' . $kampanye->gambar_kampanye) }}"
                                    class="img-fluid rounded" alt="Campaign Image">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-btn">
                    <form action="{{ route('terima', ['id' => $kampanye->id]) }}" method="POST" class="me-2">
                        @csrf
                        <button type="submit" class="btn btn-success btn-lg me-4">Terima</button>
                    </form>
                    <form action="{{ route('tolak', ['id' => $kampanye->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg">Tolak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('more_files')
    <style>
        .mt-btn {
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
            border: 2px solid #000;
            /* Adjust the color and width as needed */
        }

        .rounded-card {
            border-radius: 1rem;
            /* Adjust the radius as needed */
        }

        .btn {
            padding: 5px 10px;
            /* Smaller padding for smaller buttons */
            font-size: 1.15rem;
            /* Smaller font size for smaller buttons */
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

        .rounded-card2 div {
            border-radius: 10rem;
        }

        .campaingdetails tr {
            border-bottom: 1px solid black;
        }
    </style>
@endsection
