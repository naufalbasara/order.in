@extends('templates.main')

@section('css')
    <link href="css/detail.css" rel="stylesheet" >
    <link href="css/global.css" rel="stylesheet" >
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12 p-0 bg-detail ">
                <a href="{{ url()->previous() }}" class="position-absolute mt-3 ms-3">
                    <img src="/img/component/back.png" alt=""  >
                </a>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center" style="z-index: -1" >
        <img src="img/menu/Rendang.png" class="rounded mx-auto d-block position-absolute"style="top: 150px" alt="...">
    </div>
    <div class="container d-flex flex-column align-items-center mt-5">
        <h1 class="nama-menu">Rendang Sapi</h1>
        <h3 style="color: #F46C49" class="harga-menu">Rp 25.000</h3>
        <div class="container d-flex justify-content-center align-items-center my-3">
            <a type="button" class="mx-3 editButton minus"><img src="img/component/minus-2.png" alt="" style="width: 37px; height:37px"></a>
            <h1 style="width:58px; height:58px; background-color:#fff;" class="mx-3 text-center shadow bg-body rounded quantity">0<h1/>
            <a type="button" class="mx-3 editButton plus"><img src="img/component/plus-2.png" alt="" style="width: 37px; height:37px"></a>
        </div>
    </div>

    <div class="container shadow p-3 bg-body rounded">
        <h5>Add notes <span class="text-muted">(optional)</span></h5>
        <div class="form-floating">
            <input class="form-control rounded notes" placeholder="Leave a comment here" id="notes" style="height: 175px">
            <label for="notes">Notes</label>
          </div>
    </div>

    <div class="container my-5">
        <button type="submit" class="btn btn-lg text-white text-center form-control submit-order" style="background-color: #F46C49">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>
            <span style="font-size: 1rem">Tambahkan - Rp 30.000</span>
        </button>
    </div>
<script src="js/ordering.js"></script>
@endsection
