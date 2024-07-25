@extends('layout.master')

@section('title', $jenis == 'kendaraan' ? 'Kendaraan' : 'Peralatan Listrik')

@section('css', asset('../css/kalkulator/kalkulator_form.css'))

@section('kalku_aktif', 'nav-active')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                <!-- <h4 class="">Kalkulator Emisi</h4> -->
                <h3>{{ $jenis }}</h3>
                <img class="kalku-img" src="" alt="">
                <form method="POST" action={{ route('kalkulator.result') }}>
                    @csrf
                    <label for="option" class="mb-2">Jenis {{$jenis}}</label>
                    <select id="option" class="form-select calc-form form-control" name="option">
                        <option value="" selected>Pilih {{$jenis}}</option>
                        @foreach ($items as $item)
                            <option value={{ $item->id }} data-image="{{ $item->foto_produk }}">{{ $item->nama_produk }}</option>
                        @endforeach
                    </select>
                    @error('option')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="jarak" class="my-2">{{$jenis == 'Kendaraan Bermotor' ? 'Konsumsi Bahan Bakar (liter/km)' : "kWh per jam/siklus"}}</label>
                        <div class="d-block position-relative">
                            <input type="number" id="jarak" name="jarak" class="d-block calc-form p-3 form-control">
                            <!-- <span class="span_attribute">.km</span> -->
                            @error('jarak')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="frekuensi" class="my-2">{{$jenis == 'Kendaraan Bermotor' ? 'Jarak Tempuh (km)' : 'Banyak Penggunaan (Jam/Siklus)'}}</label>
                        <div class="d-block position-relative">
                            <input type="number" id="frekuensi" name="frekuensi" class="d-block calc-form p-3 form-control">
                            <!-- <span class="span_attribute">.km</span> -->
                            @error('frekuensi')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-lanjut mt-3">Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection('content')

@section('js')
document.addEventListener('DOMContentLoaded', function() {
    const dropdown = document.getElementById('option');
    const image = document.querySelector('.kalku-img');
    console.log(image)

    // Function to update the image source based on dropdown selection
    function updateImage() {
        const selectedOption = dropdown.options[dropdown.selectedIndex];
        const imageUrl = selectedOption.getAttribute('data-image');
        image.src = "{{ asset('asset/kalkulator/produk/') }}/" + imageUrl;
    }

    dropdown.addEventListener('change', updateImage);

    updateImage();
});
@endsection('js')