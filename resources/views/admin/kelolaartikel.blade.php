@extends('layout.master')

@section('title', 'Kelola artikel')

@section('content')
<div class="container mt-4">
    <!-- Title Section -->
    <div class="row mb-4">
        <div class="col-12">
            <h1>Kelola Artikel</h1>
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
          <th>ID</th>
          <th>TITLE</th>
          <th>AUTHOR</th>
          <th>TANGGAL PUBLISH</th>
          <th colspan="2" >Aksi</th>
        </tr>
      </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Mark</td>
        <td>Otto</td>
        <td>Otto</td>
        <td><a href="#" class="btn  p-0 me-2">Edit</a>
          <i class="bi bi-pencil me-3" style="font-size: 1.5rem;"></i></td>
        <td><a href="#" class="btn  p-0 ">Hapus</a>
          <i class="bi bi-trash " style="font-size: 1.5rem;"></i></td>
      </tr>
      <tr>
        <td>1</td>
        <td>Mark</td>
        <td>Otto</td>
        <td>Otto</td> 
        <td><a href="#" class="btn  p-0 me-2">Edit</a>
          <i class="bi bi-pencil me-3" style="font-size: 1.5rem;"></i></td>
        <td><a href="#" class="btn  p-0 ">Hapus</a>
          <i class="bi bi-trash " style="font-size: 1.5rem;"></i></td>
      </tr>
      <tr>
        <td>1</td>
        <td>Mark</td>
        <td>Otto</td>
        <td>Otto</td>
        <td><a href="#" class="btn  p-0 me-2">Edit</a>
          <i class="bi bi-pencil me-3" style="font-size: 1.5rem;"></i></td>
        <td><a href="#" class="btn  p-0 ">Hapus</a>
          <i class="bi bi-trash " style="font-size: 1.5rem;"></i></td>
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