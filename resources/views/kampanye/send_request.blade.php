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
                    <input type="text" class="form-control custom-input" id="judul" name="judul" value="{{ old('judul') }}"
                        aria-describedby="emailHelp" placeholder="Judul Kampanye">
                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    @error('judul')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-5 row">
                <label for="lokasi" class="col-sm-2 col-form-label custom-label">Lokasi</label>
                <div class="col-sm-10">
                    <input name="jalan" type="text" class="form-control custom-input mb-2" id="jalan" value="{{ old('jalan') }}"
                        aria-describedby="emailHelp" placeholder="Nama Jalan">
                        @error('jalan')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    <input name="kel" type="text" class="form-control custom-input mb-2" id="kel" value="{{ old('kel') }}"
                        aria-describedby="emailHelp" placeholder="Kelurahan">
                        @error('kel')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    <input name="kec" type="text" class="form-control custom-input mb-2" id="kec" value="{{ old('kec') }}"
                        aria-describedby="emailHelp" placeholder="Kecamatan">
                        @error('kec')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    <input name="kab_kota" type="text" class="form-control custom-input mb-2" id="kab_kota" value="{{ old('kab_kota') }}"
                        aria-describedby="emailHelp" placeholder="Kabupaten/Kota">
                        @error('kab_kota')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    <input name="provinsi" type="text" class="form-control custom-input" id="provinsi" value="{{ old('provinsi') }}"
                        aria-describedby="emailHelp" placeholder="Provinsi">
                        @error('provinsi')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                </div>
            </div>
            <div class="mb-5 row">
                <label for="jenisPohon" class="col-sm-2 col-form-label custom-label">Jenis Pohon</label>
                <div class="col-sm-4">
                    <select name="jenisPohon" id="jenisPohon"
                        class="form-control custom-control @error('pohon') is-invalid @enderror" required>
                        <option value="" selected>Pilih Pohon</option>
                        @foreach ($dataPohon as $p)
                            <option value="{{ $p->id }}" {{ old('jenisPohon') == $p->id ? 'selected' : '' }}>
                                {{ $p->nama }}</option>
                        @endforeach
                    </select>
                    @error('jenisPohon')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-5 row">
                <label for="jumlah" class="col-sm-2 col-form-label font-weight-bold custom-label">Jumlah Pohon</label>
                <div class="col-sm-4">
                    <input name="jumlah" type="number" class="form-control custom-input" id="jumlah" value="{{ old('jumlah') }}"
                        aria-describedby="emailHelp" placeholder="Target Jumlah Pohon Ditanam">
                        @error('jumlah')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                </div>
            </div>
            <div class="mb-5 row">
                <label for="batasDonasi" class="col-sm-2 col-form-label font-weight-bold custom-label">Batas Donasi</label>
                <div class="col-sm-10">
                    <input name="batasDonasi" type="date" class="form-control custom-input" id="batasDonasi" value="{{ old('batasDonasi') }}"
                        aria-describedby="emailHelp" placeholder="Tanggal-Bulan-Tahun (contoh: 27 Mei 2024)">
                        @error('batasDonasi')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                </div>
            </div>
            <div class="mb-5 row">
                <label for="deskripsi" class="col-sm-2 col-form-label font-weight-bold custom-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea name="deskripsi" type="text" class="form-control custom-input" id="deskripsi" aria-describedby="emailHelp" value="{{ old('deskripsi') }}"
                        placeholder="Ceritakan Tentang Kampanye Ini" style="height: 200px;"></textarea>
                        @error('dekripsi')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                </div>
            </div>
            <div class="mb-5 row">
                <label for="gambar" class="col-sm-2 col-form-label font-weight-bold custom-label">Gambar</label>
                <div class="col-sm-10">
                    <input name="gambar" type="file" id="gambar" value="{{ old('gambar') }}"
                        class="form-control custom-control @error('gambar') is-invalid @enderror" required>
                        @error('gambar')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
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
