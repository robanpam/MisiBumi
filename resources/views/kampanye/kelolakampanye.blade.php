@extends('layout.master')

@section('title', 'Kelola Kampanye')

@section('content')
<div class="container mt-4">
    <!-- Title Section -->
    <div class="row mb-4">
        <div class="col-12">
            <h1>Kelola Kampanye</h1>
        </div>
    </div>

    <!-- Filter and View Request Section -->
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <!-- View Request Button -->
            <div class="col-10"></div>
            <div>
                <button class="btn btn-light d-flex align-items-center" style="box-shadow: 3px 3px black">
                    <i class="bi bi-pencil" style="font-size: 1.5rem; margin-right: 10px;"></i>
                    View Request
                </button>
            </div>
        </div>
    </div>

    <div class="table-responsive" style="border-radius: 10px; filter: drop-shadow(3px 3px 3px black)">
      <table class="table text-center" style="border-radius: 10px">
      <thead class="table-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama</th>
      <th scope="col">Judul Kampanye</th>
      <th scope="col">Lokasi</th>
      <th scope="col">Pohon</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>Otto</td>
      <td>Otto</td>
      <td>Otto</td>
      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>Otto</td> 
      <td>Otto</td>
      <td>Otto</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>Otto</td>
      <td>Otto</td>
      <td>Otto</td>
    </tr>
  </tbody>
  </table>
</div>

</div>
@endsection

@section('css')
<style>
    .card-body {
        padding: 10px;
    }
    .form-label {
        margin-bottom: 0.5rem;
    }
    .form-select {
        min-width: 120px;
    }
    .text-danger {
        color: #dc3545 !important;
    }
</style>
@endsection