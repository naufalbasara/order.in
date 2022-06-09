@extends('templates.main')

@section('css')
    <link href="/css/pesananMenu.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid ">
        <div class="row bg-detail">
            <a href="{{ url()->previous() }}">
                <img src="/img/back.png" alt="">
            </a>
        </div>


        <div class="row align-items-start">
            <h1>Menu yang dipesan</h1>
             @foreach ($cartItems as $item)

                    @if($item['quantity'] > 0)

                    <div class="col-2 align-self-center text-center">
                        <p class="nums border">{{ $item['quantity'] }}x</p>
                    </div>
                    <div class="col-6 ps-2 align-self-center">
                        <p class="menu">{{ $item['name'] }}</p>

                    </div>
                    <div class="col-4 text-end">
                        <a href="{{route('detailEdit', [$meja->id ,$item['attributes']['menu'], $item['id']])}}"><img src="/img/Edit (2).png" alt=""></a>
                        <p id="linePrice" class="total mb-0">Rp {{ $item['price'] * $item['quantity'] }}</p>
                    </div>

                    @endif
            @endforeach

        </div>



        <div class="row tambah">
            <div class="col-8 align-self-center">
                <h4>Pesanan masih kurang?</h4>
                <p>Tambah menu yang lain sesuai keinginanmu</p>
            </div>
            <div class="col-4 text-end align-self-center">
                <a href="{{ url()->previous() }}"><button> <img src="/img/plus.png" alt=""> Tambah menu</button></a>
            </div>
        </div>


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


        <div class="row bayar">
            <button onclick="window.location.href='{{route('invoice', $meja->id)}}'"><img src="/img/Wallet_fill.png" alt="">
                <p class="mt-5 d-inline">Lanjut ke pembayaran <span class="ms-4">Rp
                        {{ \Cart::getTotal() }}</span></p>
            </button>
        </div>

        <script>
            $('.plus, .minus').on('click', function(e) {
                const isNegative = $(e.target).closest('.minus').is('.minus');
                const input = $(e.target).closest('.input-group').find('input');
                if (input.is('input')) {
                    input[0][isNegative ? 'stepDown' : 'stepUp']()
                }

            })
        </script>

    </div>
@endsection

@section('js')
    <script src="/js/index.js"></script>
@endsection
