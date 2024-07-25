@extends('layout.master')

@section('css', asset('css/leaderboard.css'))
{{-- @section('kampanye_aktif', 'nav-active') --}}

@section('content')
    <div class="container">
        <h1 class="subJudul"><strong>Leaderboard</strong></h1>
        
        {{-- TOP 3 --}}
        <div class="container text-center">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-2 wreath top1">
                    <div class="circle">
                        <div class="medal">
                            <img src="https://i.pinimg.com/564x/94/1c/3c/941c3c1f4bfb0e0db554e1a24e181e8a.jpg" alt="Gold Medal" class="img-top">
                        </div>
                    </div>
                    <h3 class="nameTop">Sukuma</h3>
                    <p class="treeTop">37K pohon</p>
                </div>
                <div class="col-3 wreath">
                    <div class="circle1">
                        <div class="medal">
                            <img src="https://i.pinimg.com/564x/94/1c/3c/941c3c1f4bfb0e0db554e1a24e181e8a.jpg" alt="Silver Medal" class="img-top1">
                        </div>
                    </div>
                    <h3 class="nameTop">Sukuma2</h3>
                    <p class="treeTop">23K pohon</p>
                </div>
                <div class="col-2 wreath top1">
                    <div class="circle">
                        <div class="medal">
                            <img src="https://i.pinimg.com/564x/94/1c/3c/941c3c1f4bfb0e0db554e1a24e181e8a.jpg" alt="Gold Medal" class="img-top">
                        </div>
                    </div>
                    <h3 class="nameTop">Sukuma</h3>
                    <p class="treeTop">37K pohon</p>
                </div>
                <div class="col-2"></div>
            </div>
        </div>

        {{-- LIST --}}
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                @for ($i = 1; $i <= 4; $i++)
                    <div class="row my-3">
                        <div class="border border-3 leader-card">
                            <div class="row">
                                <div class="col-1 d-flex align-items-center justify-content-end data1">4th</div>
                                <div class="col-2 donatur-avatar d-flex align-items-center justify-content-center">
                                    <img src="https://asset-2.tstatic.net/medan/foto/bank/images/Contoh-gambar.jpg"
                                        alt="Gambar Testimoni" class="img-circle">
                                </div>
                                <div class="col-8 d-flex align-items-center justify-content-start data2">Sukma</div>
                                <div class="col-1 d-flex align-items-center justify-content-end data3">pohon</div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="col-2"></div>
        </div>


    </div>
@endsection
