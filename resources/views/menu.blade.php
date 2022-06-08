@extends('templates.main')

@section('css')
<link href="/css/listMenu2.css" rel="stylesheet" >
@endsection

@section('content')
<div class="container-fluid ">
   <div class="row d-flex justify-content-center ">
       <div class="col-md-12 text-center mx-auto my-auto bg-dapur ">
           <h1>DAPUR <br> NUSANTARA</h1>
           <p>Jl. Kenangan Bersama Mantan Terindah</p>
       </div>

       <div>
           
               <div class="form-group">
                <form action="{{route('menu', $meja->id)}}">
                   <input type="text" value="{{request('search')}}" name="search" class="form-control" id="searchmenu" placeholder="Temukan makanan atau minuman favoritmu ">
                  </form>
                 </div>
           
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




     @if(\Cart::getTotalQuantity() > 0)
     <a href="{{route('detailPesanan', $meja->id)}}">
     <div class="fixed-bottom footer">
       <div class="orderbox">
           <h5 class="text-center text-dark">PESANAN</h5>

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

   {{-- <script>
        $('#searchmenu').on('keyup', function(){
        search();
        });
        search();
        function search(){
        var keyword = $('#searchmenu').val();
        $.post('{{ route("searchMenu", $meja->id) }}',
        {
        _token: $('meta[name="csrf-token"]').attr('content'),
        keyword:keyword
        },
        function(data){
        table_post_row(data);
        });
        }
        // table row with ajax
        function table_post_row(res){
        let htmlView = '';
        if(res.menu.length <= 0){
        htmlView+= `
        <tr>
        <td colspan="4">No data.</td>
        </tr>`;
        }
        for(let i = 0; i < res.menu.length; i++){
        htmlView += ``;
        }
        $('tbody').html(htmlView);
        }
   </script> --}}

   <script>
     let confirm = document.querySelector('.confirmBox button');

      confirm.addEventListener('click', function(){
          document.querySelector('.confirmBox').style.display = 'none';
      });
   </script>

    
</div>
@endsection

