@extends('templates.main')

@section('css')
    <link href="/css/listMenu2.css" rel="stylesheet" >
    <link href="css/main.css" rel="stylesheet">
@endsection

@section('content')
    <img src="/img/Home.png" class="img-fluid mx-auto d-block" alt="">
    <div class="container-fluid mb-3">
        <div class="row justify-content-center align-items-center text-center ">
            <h1>WELCOME TO</h1>
            <div class="container d-flex flex-column align-items-center">
                <img src="img/Order.in.png" alt="">

                <a type="button" id="menu"  class="btn btn-primary rounded mt-4">LET’S SEE OUR
                    MENU</a>
            </div>
        </div>

             
     <div id="confirm" style="display: none">
        <div class="fixed-bottom footer">
          <div class="confirmBox " style="border: none !important;">
              <h5 class="text-start ms-3"> <a class="close bg-transparent"><img style="width: 16px; height: 14px;" src="/img/backBlack.png" alt=""> </a> Dine In</h5>
              
              <p class="text-center p-0 m-0">Apakah nomer meja anda sudah benar?</p>
              <div class="d-flex flex-column justify-content-center align-items-center text-center">
                <input type="text" value="{{$meja->id}}">
  
                <a style="text-decoration:none" href="{{ route('menu', $meja->id) }}" class="d-block pt-2 confirm">BENAR EUY</a>
              </div>
              
          </div>
      </div>
      </div>
    </div>

    
   <script>
    // let confirm = document.querySelector('.confirmBox button');

    //  confirm.addEventListener('click', function(){
    //      document.querySelector('.confirmBox').style.display = 'none';
    //  });


        // Get the modal
    var modal = document.getElementById("confirm");

    // Get the button that opens the modal
    var btn = document.getElementById("menu");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (<-), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
  </script>



@endsection
