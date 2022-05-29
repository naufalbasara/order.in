<div>
    @section('css')
    <link href="/css/listMenu2.css" rel="stylesheet" >
    @endsection

    @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-green-400 rounded">
                <p class="text-green-800">{{ $message }}</p>
        </div>
    @endif

    <div class="container-fluid ">
        <div class="row d-flex justify-content-center ">
            <div class="col-md-12 text-center mx-auto my-auto bg-dapur ">
                <h1>DAPUR <br> NUSANTARA</h1>
                <p>Jl. Kenangan Bersama Mantan Terindah</p>
            </div>

            <div>
                <form action="">
                    <div class="form-group">
                        <input type="text" wire:model="search" class="form-control" id="searchmenu" placeholder="Temukan makanan atau minuman favoritmu ">
                      </div>
                </form>
            </div>
        </div>

        <!-- food section -->
       
          
          <div class="row foodGroup">
            <h1>Foods</h1>
              @foreach ($menu as $makanan)
                @if ($makanan->kategori == "Makanan")    
                <div class="col-6 mt-3">
                  <a class="card" href="{{route('detail',  [$meja->id ,$makanan->id])}}" style="text-decoration:none;">
                    <img class="card-img-top" src="/img/Sego Goreng.png" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$makanan->namaMenu}}</h5>
                      <p class="card-text">Rp. {{$makanan->harga}}</p>
                    </div>
                  </a>
                </div>
                @endif
              @endforeach  
          </div>
          
            
          <div class="row foodGroup mb-5">
              <h1>Beverages</h1>
              @foreach ($menu as $minuman)
                @if ($minuman->kategori == "Minuman")
                  <div class="col-6 mt-3">
                    <a class="card" href="{{route('detail', [$meja->id,$minuman->id])}}" style="text-decoration:none;">
                      <img class="card-img-top" src="/img/Sego Goreng.png" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">{{$minuman->namaMenu}}</h5>
                        <p class="card-text">Rp {{$minuman->harga}}</p>
                      </div>
                    </a>
                  </div>
                @endif
              @endforeach
          </div>

          @if(count(\Cart::getContent()) > 0)
          <a href="{{route('detailPesanan', $meja->id)}}">
          <div class="fixed-bottom footer">
            <div class="orderbox">
                <h5 class="text-center">PESANAN</h5>

                <div class="row d-flex align-items-center justify-content-between buton">
                    <div class="col-6 ">
                        <p> <img class="me-2" src="/img/Bag_alt.png" alt=""> {{ \Cart::getTotalQuantity() }}</p>
                    </div>
                    <div class="col-6 ">
                        <p style="text-align: right;"> Rp. {{ \Cart::getTotal() }} <span class="ms-2"> > </span> </p>
                    </div>
                </div>

            </div>
        </div>
        </a>
        @endif
     
         
    </div>
</div>