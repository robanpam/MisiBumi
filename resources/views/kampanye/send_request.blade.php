@extends('layout.master')

@section('title', 'Request Kampanye')

@section('more_files')
@endsection

@section('css', asset('css/kampanye/send_request.css'))

@section('content')
    <div class="title d-flex align-items-center justify-content-center p-0">
        <h2>Pengajuan Kampanye #MisiBumi</h2>
    </div>
    <div class="container my-5">
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
        <form action="{{ route('kampanye.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-5 row">
                <label for="judul" class="col-sm-2 col-form-label font-weight-bold custom-label">Judul Kampanye</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control custom-input" id="judul" name="judul" aria-describedby="emailHelp"
                        placeholder="Judul Kampanye">
                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
            </div>
            <div class="mb-5 row">
                <label for="lokasi" class="col-sm-2 col-form-label custom-label">Lokasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control custom-input mb-2" id="jalan" name="jalan" aria-describedby="emailHelp"
                        placeholder="Nama Jalan">
                    <input type="text" class="form-control custom-input mb-2" id="kel" name="kel" aria-describedby="emailHelp"
                        placeholder="Kelurahan">
                    <input type="text" class="form-control custom-input mb-2" id="kec" name="kec" aria-describedby="emailHelp"
                        placeholder="Kecamatan">
                    <input type="text" class="form-control custom-input mb-2" id="kab_kota" name="kab_kota" aria-describedby="emailHelp"
                        placeholder="Kabupaten/Kota">
                    <input type="text" class="form-control custom-input" id="provinsi" name="provinsi" aria-describedby="emailHelp"
                        placeholder="Provinsi">
                </div>
            </div>
            <div class="mb-5 row">
                <label for="jenisPohon" class="col-sm-2 col-form-label custom-label">Jenis Pohon</label>
                <div class="col-sm-4">
                    <select id="jenisPohon" name="jenisPohon"
                        class="form-control custom-control @error('pohon') is-invalid @enderror" required>
                        <option value="" selected>Pilih Pohon</option>
                        @foreach ($dataPohon as $p)
                            <option value="{{ $p->id }}" {{ old('jenisPohon') == $p->id ? 'selected' : '' }}>
                                {{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-5 row">
                <label for="jumlahPohon" class="col-sm-2 col-form-label font-weight-bold custom-label">Jumlah Pohon</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control custom-input" id="jumlah" name="jumlah" aria-describedby="emailHelp"
                        placeholder="Target Jumlah Pohon Ditanam">
                </div>
            </div>
            {{-- <div class="mb-5 row align-items-center">
                <label for="nominal" class="col-sm-2 col-form-label font-weight-bold custom-label">Nominal</label>
                <div class="col-sm-10 d-flex align-items-center">
                    <span class="me-2">Rp</span>
                    <input type="number" class="form-control custom-input" id="nominal"
                        placeholder="Jumlah Uang yang Dibutuhkan (dalam Rupiah, tanpa titik/koma)">
                </div>
            </div> --}}
            <div class="mb-5 row">
                <label for="batasDonasi" class="col-sm-2 col-form-label font-weight-bold custom-label">Batas Donasi</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control custom-input" id="batasDonasi" name="batasDonasi" aria-describedby="emailHelp"
                        placeholder="Tanggal-Bulan-Tahun (contoh: 27 Mei 2024)">
                </div>
            </div>
            <div class="mb-5 row">
                <label for="deskripsi" class="col-sm-2 col-form-label font-weight-bold custom-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control custom-input" id="deskripsi" name="deskripsi" aria-describedby="emailHelp"
                        placeholder="Ceritakan Tentang Kampanye Ini" style="height: 200px;"></textarea>
                </div>
            </div>
            <div class="mb-5 row">
                <label for="gambar" class="col-sm-2 col-form-label font-weight-bold custom-label">Gambar</label>
                <div class="col-sm-10">
                    <input type="file" id="gambar" name="gambar" value="{{ old('gambar') }}"
                        class="form-control custom-control @error('gambar') is-invalid @enderror" required>
                </div>
            </div>
            <div class="mb-5 row">
                <div class="col-sm-10 offset-sm-1 d-flex justify-content-center">
                    <button type="submit" class="btn custom-button">Ajukan Kampanye</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')

@endsection
