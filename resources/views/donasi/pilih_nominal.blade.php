@extends('layout.master')

@section('title', 'Pilih Nominal Dominasi')

@section('css', asset('css/donasi/nominal.css'))

@section('content')
<div class="donation-container mx-auto my-5 w-50">
    <div class="donation-title">
        <h2>{{$kampanye->nama_kampanye}}</h2>
        <h4>{{$kampanye->lokasi_kampanye}}</h4>
    </div>
    <div class="donation-info">
        <p>Jenis Pohon : <strong>{{$pohon->nama}}</strong><br>
        Harga Pohon : <strong>Rp{{$pohon->harga_pohon}},00</strong></p>
    </div>
    <div class="donation-amounts">
        <div class="row">
            <div class="col-4">
                <button type="button" class="btn btn-outline-primary w-100" data-amount="25000">Rp25.000</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-outline-primary w-100" data-amount="50000">Rp50.000</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-outline-primary w-100" data-amount="100000">Rp100.000</button>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <button type="button" class="btn btn-outline-primary w-100" data-amount="150000">Rp150.000</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-outline-primary w-100" data-amount="200000">Rp200.000</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-outline-primary w-100" data-amount="300000">Rp300.000</button>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-outline-primary w-100" data-amount="other">Nominal Lainnya</button>
            </div>
            <div class="col-4">
            </div>
        </div>
    </div>
    <div class="custom-donation">
        <input type="number" id="customAmount" class="form-control" min="5000" placeholder="Contoh: 10000">
    </div>

    <form method="POST" action="{{ route('donasi.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ auth()->user()->id }}" id='user_id' name="user_id">
        <input type="hidden" value="{{ $kampanye->id }}" id='kampanye_id' name="kampanye_id">
        <input type="hidden" id="nominal_donasi" name="nominal_donasi">
        <button type="submit" class="btn btn-success btnDonasi"><strong>Next</strong></button>
    </form>
</div>
{{-- <div class="div">
    <form method="POST" action="{{ route('donasi.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ auth()->user()->id }}" id='user_id' name="user_id">
        <input type="hidden" value="{{ $kampanye_id }}" id='kampanye_id' name="kampanye_id">
        <input type="hidden" value="10000" id='nilai_donasi' name="nilai_donasi">
    <button type="submit" class="btn btn-success btnDonasi"><strong>Next</strong></button>
    </form>
</div> --}}
@endsection

@section('js')
const amountButtons = document.querySelectorAll('.donation-amounts .btn');
const nominalInput = document.getElementById('nominal_donasi');
const customAmountInput = document.getElementById('customAmount');
const customDonationDiv = document.querySelector('.custom-donation');

amountButtons.forEach(button => {
    button.addEventListener('click', function() {
        // Reset selected state
        amountButtons.forEach(btn => btn.classList.remove('selected'));

        if (this.getAttribute('data-amount') === 'other') {
            customDonationDiv.style.display = 'block';
            customAmountInput.value = '';
            customAmountInput.focus();
            nominalInput.value = '';
        } else {
            customDonationDiv.style.display = 'none';
            let amount = this.getAttribute('data-amount');
            nominalInput.value = amount;
        }
        this.classList.add('selected');
    });
});

customAmountInput.addEventListener('input', function() {
    nominalInput.value = customAmountInput.value;
});
@endsection
