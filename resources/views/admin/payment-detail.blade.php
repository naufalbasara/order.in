@extends('templates.admin-main')
@section('title', 'Order Detail')

@section('content')
@include('templates.admin-topbar')
<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="{{url()->previous()}}"  class="btn btn-lg btn-primary mb-3">Kembali</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Order on Meja {{$meja->id}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Kuantitas</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Menu</th>
                            <th>Kuantitas</th>
                            <th>Total Harga</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($cartItems as $item)
                        <tr>
                            <td>{{$item['name']}}</td>
                            <td>{{$item['quantity']}}</td>
                            <td>{{$item['price']*$item['quantity']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="/admin/payment/confirm/{{$meja->id}}" onclick="return confirm('Are You Sure You Want to Confirm Payment on Nomor Meja {{$meja->id}}?')" class="btn btn-sm btn-success">Konfirmasi</a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection