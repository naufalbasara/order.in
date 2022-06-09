@extends('templates.admin-main')
@section('title', 'Order Queue')

@section('content')
@include('templates.admin-topbar')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Order</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor Meja</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nomor Meja</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($meja as $m)
                        <tr>
                            <td>{{$m->nomor_meja}}</td>
                            <td>
                                <a href="/admin/payment/detail/{{$m->id}}" class="btn btn-sm btn-info">Detail</a>
                                |
                                <a href="/admin/payment/confirm" onclick="return confirm('Are You Sure You Want to Confirm Payment on Nomor Meja {{$m->id}}')" class="btn btn-sm btn-success">Konfirmasi</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection