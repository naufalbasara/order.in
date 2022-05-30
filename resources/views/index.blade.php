@extends('templates.main')

@section('css')
    <link href="css/main.css" rel="stylesheet">
@endsection

@section('content')
    <img src="/img/Home.png" class="img-fluid mx-auto d-block" alt="">
    <div class="container-fluid mb-3">
        <div class="row justify-content-center align-items-center text-center ">
            <h1>WELCOME TO</h1>
            <div class="container d-flex flex-column align-items-center">
                <img src="img/Order.in.png" alt="">

                <a type="button" href="{{ route('menu', $meja->id) }}" class="btn btn-primary rounded mt-4">LET’S SEE OUR
                    MENU</a>
            </div>
        </div>
    </div>
@endsection
