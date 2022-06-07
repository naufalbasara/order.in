@extends('templates.admin-main')
@section('title', 'Data Menu')

@section('content')
    @include('templates.admin-topbar')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Database Menu Order.in</h6>
            </div>
            <div class="card-body">
                <a href="/admin/menu/add" class="mx-2 btn btn-md btn-success mb-3">Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Menu</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($menu as $m)
                            <tr>
                                <td>{{$m->namaMenu}}</td>
                                <td>{{$m->harga}}</td>
                                <td>{{$m->kategori}}</td>
                                <td>
                                    <a href="/admin/menu/edit/{{$m -> id}}" class="btn btn-sm btn-primary">Edit</a>
                                    |
                                    <a href="{{route('delete-menu', $m->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure You Want to Delete {{$m->namaMenu}} From Menu?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$menu -> links() }}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection
