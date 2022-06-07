@extends('templates.admin-main')
@section('title', 'Sales Information')

@section('content')
    @include('templates.admin-topbar')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Order.in Sales</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal Transaksi</th>
                                <th>Pesanan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tanggal Transaksi</th>
                                <th>Pesanan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pesanan as $s)
                                <tr>
                                    <td>{{ $s->namaMenu }}</td>
                                    <td>{{ $s->harga }}</td>
                                    <td>{{ $s->kategori }}</td>
                                    <td>
                                        <a href="/admin/menu/edit/{{ $s->id }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        |
                                        <a href="{{ route('delete-menu', $s->id) }}" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are You Sure You Want to Delete {{ $s->namaMenu }} From Menu?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $pesanan->links() }}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
