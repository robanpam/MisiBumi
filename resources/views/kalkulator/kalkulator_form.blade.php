@extends('layout.master')

@section('title', $jenis == 'kendaraan' ? 'Kendaraan' : 'Peralatan Listrik')

@section('css', asset('../css/kalkulator/kalkulator_form.css'))

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-3">
                <h4 class="mb-4">Kalkulator Emisi</h4>
                <h3>{{ $jenis == 'kendaraan' ? 'Kendaraan Motor' : 'Peralatan Listrik'}}</h3>
                <form action="POST">
                    <label for="title" class="mb-2">Jenis {{$jenis == 'kendaraan' ? 'Kendaraan Bermotor' : 'Peralatan Listrik'}}</label>
                    <select class="form-select calc-form" aria-label="Default select example">
                        <option selected>Pilih {{$jenis == 'kendaraan' ? 'Kendaraan Bermotor' : 'Peralatan Listrik'}}</option>
                        <option value="1">{{$jenis == 'kendaraan' ? 'Motor' : 'AC'}}</option>
                        <option value="2">{{$jenis == 'kendaraan' ? 'Mobil' : 'Freezer'}}</option>
                        <option value="3">{{$jenis == 'kendaraan' ? 'Truk' : 'Kulkas'}}</option>
                        </select>
                    <div>
                        <label for="jarak" class="my-2">{{$jenis == 'kendaraan' ? 'Jarak Tempuh' : 'Jumlah Satuan'}}</label>
                        <div class="d-block position-relative">
                            <input type="text" id="jarak" class="d-block calc-form p-3">
                            <!-- <span class="span_attribute">.km</span> -->
                        </div>
                    </div>
                    <div>
                        <label for="jarak" class="my-2">{{$jenis == 'kendaraan' ? 'Jumlah Orang' : 'Lama Penggunaan'}}</label>
                        <div class="d-block position-relative">
                            <input type="text" id="jarak" class="d-block calc-form p-3">
                            <!-- <span class="span_attribute">.km</span> -->
                        </div>
                    </div>
                    @if ($jenis == 'kendaraan')
                        <div>
                            <label for="jarak" class="my-2">Frekuensi</label>
                            <div class="d-block position-relative">
                                <input type="text" id="jarak" class="d-block calc-form p-3">
                                <!-- <span class="span_attribute">.km</span> -->
                            </div>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-kembali mt-3 me-1">Kembali</button>
                    <button type="submit" class="btn btn-lanjut mt-3">Lanjut</button>
                </form>
            </div>
        </div>
    </div>
@endsection('content')

@section('js')
    console.log('a')
@endsection('js')