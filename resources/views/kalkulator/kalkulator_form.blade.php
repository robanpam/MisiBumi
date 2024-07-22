@extends('layout.master')

@section('title', $jenis == 'kendaraan' ? 'Kendaraan' : 'Peralatan Listrik')

@section('css', asset('../css/kalkulator/kalkulator_form.css'))

@section('kalku_aktif', 'nav-active')

@section('content')
    <div class="container mt-5 pt-5">
        <div class="row my-3">
            <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                <!-- <h4 class="">Kalkulator Emisi</h4> -->
                <h3>{{ $jenis }}</h3>
                <form method="POST" action={{ route('kalkulator.result') }}>
                    @csrf
                    <label for="option" class="mb-2">Jenis {{$jenis}}</label>
                    <select id="option" class="form-select calc-form form-control" name="option">
                        <option value="" selected>Pilih {{$jenis}}</option>
                        @foreach ($items as $item)
                            <option value={{ $item->id }}>{{ $item->nama_produk }}</option>
                        @endforeach
                    </select>
                    @error('option')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="jarak" class="my-2">{{$jenis == 'Kendaraan Bermotor' ? 'Jarak Tempuh' : 'Jumlah Satuan'}}</label>
                        <div class="d-block position-relative">
                            <input type="text" id="jarak" name="jarak" class="d-block calc-form p-3 form-control">
                            <!-- <span class="span_attribute">.km</span> -->
                            @error('jarak')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="frekuensi" class="my-2">{{$jenis == 'Kendaraan Bermotor' ? 'Jumlah Orang' : 'Lama Penggunaan'}}</label>
                        <div class="d-block position-relative">
                            <input type="text" id="frekuensi" name="frekuensi" class="d-block calc-form p-3 form-control">
                            <!-- <span class="span_attribute">.km</span> -->
                            @error('frekuensi')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- @if ($jenis == 'kendaraan')
                        <div>
                            <label for="jarak" class="my-2">Frekuensi</label>
                            <div class="d-block position-relative">
                                <input type="text" id="jarak" class="d-block calc-form p-3">
                                <span class="span_attribute">.km</span>
                            </div>
                        </div>
                    @endif -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-lanjut mt-3">Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection('content')

@section('js')
    console.log('a')
@endsection('js')