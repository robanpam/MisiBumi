@extends('layout.admin')

@section('title', 'Kelola artikel')

@section('kelolaa_aktif', 'active')

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
              <a href="{{ route('uploadartikel') }}">
                <button class="btn btn-light d-flex align-items-center" style="box-shadow: 3px 3px black">
                    <i class="bi bi-pencil" style="font-size: 1.5rem; margin-right: 10px;"></i>
                    Buat artikel
                </button>
              </a>
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
      @foreach ($item as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->judul_artikel }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->created_at }}</td>
        <td>
          <a href="{{ route('editartikel', ['id' => $item->id]) }}" class="btn p-0 me-2">Edit</a>
          <i class="bi bi-pencil me-3" style="font-size: 1.5rem;"></i>
        </td>
        <td>
          <form action="{{ route('deleteartikel', ['id' => $item->id]) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn p-0" onclick="return confirm('Are you sure you want to delete this article?');">Hapus</button>
            <i class="bi bi-trash" style="font-size: 1.5rem;"></i>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</div>
@endsection

@section('more_files')
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
