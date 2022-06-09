@extends('templates.main')

@section('css')
    <link href="/css/pesananMenu.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid ">
        <div class="row bg-inventory">
            <a href="{{ url()->previous() }}" class="position-absolute mt-3 ms-3">
                <img src="/img/back.png" alt="">
            </a>
        </div>

        <div class="row mb-1">
            <h1>Menu yang dipesan</h1>
            @foreach ($cartItems as $item)
                @if ($item['quantity'])
                    <div class="col-2  text-center">
                        <p class="nums border">{{ $item['quantity'] }}</p>
                    </div>
                    <div class="col-6 ps-2">
                        <p class="menu">{{ $item['name'] }}</p>
                    </div>
                    <div class="col-4 text-end">
                        <p class="total mb-0">Rp {{ $item['price'] * $item['quantity'] }}</p>
                    </div>
                @endif
            @endforeach



        </div>

        <hr>


        <div class="row detail ">
            <h3 class="text-center">Detail Pembayaran</h3>
            <div class="col-6 first">
                <p class="">Subtotal</p>
                <hr>
                <p class="zenbu">Total</p>
            </div>

            <div class="col-6 second text-end">
                <p class="">Rp {{ \Cart::getTotal() }}</p>
                <hr>
                <p class="zenbu">Rp {{ \Cart::getTotal() }}</p>
            </div>
        </div>

        <div class="row qr text-center justify-content-center">
            <h4 class="text-center">Tunjukan QR Code dibawah ini ke kasir </h4>
            <img class="text-center" src="{{$qrcode}}" alt="">

        </div>


            <hr>




        <div class="row bayar">
            <button><img src="/img/whitePlus.png" alt="">
                <p class="mt-5 d-inline">Buat pesanan baru</p>
            </button>
        </div>

    </div>
@endsection

@section('js')
    <script src="/js/index.js"></script>
@endsection
