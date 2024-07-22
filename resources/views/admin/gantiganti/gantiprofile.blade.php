@extends('layout.master')

@section('title', 'Masukkan Profile')

@section('content')
<div class="container mt-5 d-flex justify-content-center align-items-center full-height prot">
    <div class="card shadow bold-border rounded-card" style="width: 100%; max-width: 80rem;">
        <div class="card-header ">
            <h5>Masukkan profile</h5>
        </div>
        <div class="card-body ">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('updateProfilePicture', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="profilePicture" class="form-label">Pilih foto dari perangkat anda</label>
                    <input type="file" class="form-control" id="profilePicture" name="profilePicture" accept="image/*" required>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success me-2">Simpan</button>
                    <button type="button" class="btn btn-danger" onclick="window.history.back();">Tolak</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('more_files')
<style>
    .prot div {
        box-shadow: 50rem rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-color: #f8f9fa;
        font-weight: bold;
    }
    .card-body {
        background-color: #fff;
        border-radius: 20rem;
    }
    .form-label {
        font-weight: bold;
    }
    .btn {
        padding: 10px 20px;
        border-radius: 20rem;
    }
    .btn-success {
        background-color: #114232;
        border-color: #114232;
        margin-right: 1rem;
    }
    .btn-danger {
        background-color: #853B3B;
        border-color: #853B3B;
    }
    .full-height {
        min-height: 100vh;
    }
    .shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .bold-border {
        border: 1px solid #000;
    }
</style>
@endsection

@section('js')
<script>
    document.querySelector('#profilePicture').addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const file = e.target.files[0];
            if (!file.type.startsWith('image/')) {
                alert('Please select a valid image file.');
                e.target.value = '';
            }
        }
    });
</script>
@endsection
