@extends('templates.main')

@section('css')
    <link href="css/pesananMenu.css" rel="stylesheet" >
@endsection

@section('content')
    <div class="container-fluid ">
        <div class="row bg-detail">
            <a href="{{ url()->previous() }}" class="position-absolute mt-3 ms-3">
                <img src="/img/back.png" alt=""  >
            </a>
        </div>

            <div class="row mb-1">
                <h1>Menu yang dipesan</h1>
                <div class="col-2  text-center">
                    <p class="nums border">0x</p>
                </div>
                <div class="col-6 ps-2">
                    <p class="menu">Kopi Susu Gula Aren</p>
                </div>
                <div class="col-4 text-end">
                    <p class="total mb-0">Rp 30.000</p>
                </div>

            </div>

            <hr>

            <div class="row">
                <div class="col-2  text-center">
                    <p class="nums border">0x</p>
                </div>
                <div class="col-6 ps-2">
                    <p class="menu">Kopi Susu Gula Aren</p>
                </div>
                <div class="col-4 text-end">
                    <p class="total mb-0">Rp 30.000</p>
                </div>

            </div>

            <div class="row detail ">
                <h3 class="text-center">Detail Pembayaran</h3>
                <div class="col-6 first">
                    <p class="">Subtotal</p>
                    <p class="">PB1</p>
                    <hr>
                    <p class="zenbu">Total</p>
                </div>
                <div class="col-6 second text-end">
                    <p class="">Rp 70.000</p>
                    <p class="">Rp 7.000</p>
                    <hr>
                    <p class="zenbu">Rp 77.000</p>
                </div>
            </div>

            <div class="row qr text-center justify-content-center">
                <h4 class="text-center" >Tunjukan QR Code dibawah ini ke kasir </h4>
                <img class="text-center" src="/img/bi_qr-code.png" alt="">
            </div>


            <div class="row bayar">
                <button><img src="/img/whitePlus.png" alt=""> <p class="mt-5 d-inline">Buat pesanan baru</p> </button>
            </div>

    </div>

@endsection

@section('js')
<script src="/js/index.js"></script>
@endsection
