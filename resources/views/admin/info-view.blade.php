@extends('templates.admin-main')
@section('title', 'Info Restoran')

@section('content')
    @include('templates.admin-topbar')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data Restoran</h1>
        <a href="{{ url()->previous() }}" class="btn btn-md btn-primary mb-3">Kembali</a>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Restoran Order.in</h6>
            </div>
            <div class="card-body">

                <form action="{{ route('update-info', $restoran->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label" for="namaRestoran">Restoran</label>
                        <input type="text" class="form-control form-control-user @error('namaRestoran') is-invalid @enderror"
                            name="namaRestoran" id="namaRestoran" value="{{ $restoran->namaRestoran }}" required>
                        @error('namaRestoran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="alamat">Alamat</label>
                        <input type="text" class="form-control form-control-user @error('alamat') is-invalid @enderror"
                            name="alamat" id="alamat" value="{{ $restoran->alamat }}" required>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Update</button>

                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
