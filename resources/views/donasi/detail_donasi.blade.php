@extends('layout.master')

@section('title', 'Checkout')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                Anda akan melakukan pembelian produk <strong>{{ $detail->nama_kampanye }}</strong> dengan harga
                <strong>Rp{{ $detail->nilai_donasi }}</strong>
                <button type="button" class="btn btn-primary mt-3" id="pay-button">
                    Bayar Sekarang
                </button>
            </div>
        </div>
        <div class="col-3 snap-container" id="snap-container">
            <!-- Snap container for payment method pop up -->
        </div>
    </div>
@endsection

@section('js')
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {

        // Display the snap-container
        var snapContainer = document.getElementById('snap-container');
        snapContainer.style.display = 'block';

        window.snap.embed('{{$detail->snap_token}}', {
        embedId: 'snap-container',
        onSuccess: function(result) {
                    sendTransactionStatus(result, 'success', function() {
                        // Redirect to another page after data is successfully sent
                        window.location.href = '/';  // Gantilah URL ini dengan halaman tujuan Anda
                    });
                },
                // Optional
        onPending: function(result) {
                    sendTransactionStatus('pending', result);
                },
                // Optional
        onError: function(result) {
                    sendTransactionStatus('error', result);
                }
      });
    });
@endsection