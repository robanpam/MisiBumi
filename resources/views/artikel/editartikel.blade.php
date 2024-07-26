@extends('layout.admin')

@section('title', 'edit artikel ')

@section('kelolaa_aktif', 'active')

@section('content')
<div class="container">
    <!-- Title Section -->
    <div class="row mb-4">
        <div class="col-12">
            <h1>Edit Artikel</h1>
        </div>
    </div>

    <div class="card">
      <form action="{{ route('updateartikel', ['id' => $artikel->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-5 mb-5 ms-4 me-4">
          <label for="judul"> Judul <span class="required">*</span></label> 
          <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul" required="required" value="{{ $artikel->judul_artikel }}" style="background-color: #D9D9D9">
        </div>
        <div class="form-group mb-5 ms-4 me-4">
          <label for="isiartikel"> Isi artikel </label>
          <textarea name="isiartikel" id="isiartikel" class="form-control" rows="10" placeholder="Masukkan isi artikel" required="required" style="background-color: #D9D9D9; text-align: start; align-items: center">{{ $artikel->isi_artikel }}</textarea>
        </div>
        <div class="form-group mb-5 ms-4 me-4">
          <label for="image" class="form-label">Gambar</label>
          <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <div class="d-flex justify-content-end mt-4 mb-5">
            <button type="submit" class="btn btn-success me-3" style="background-color: #114232">Simpan</button>
            <button type="button" class="btn btn-danger me-4" style="background-color: #853B3B" onclick="window.history.back();">Tolak</button>
        </div>
      </form>
    </div>
</div>
@endsection

@section('css')
<style>

</style>
@endsection

@section('js')
<script>

</script>
@endsection
