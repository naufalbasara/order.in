@extends('templates.admin-main')
@section('title', 'Data Menu')

@section('content')
    @include('templates.admin-topbar')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Data Menu</h1>
    <a href="{{ url()->previous() }}" class="btn btn-md btn-primary mb-3">Kembali</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Menu Order.in</h6>
        </div>
        <div class="card-body">
            <form action="/admin/menu/store" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="namaMenu">Menu</label>
                    <input type="text" class="form-control form-control-user @error('namaMenu') is-invalid @enderror" name="namaMenu" id="namaMenu" value="{{old('namaMenu')}}" required>
                    @error('namaMenu')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label" for="harga">Harga</label>
                    <input type="text" class="form-control form-control-user @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{old('harga')}}" required>
                    @error('harga')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label" for="kategori">Kategori</label>
                    <select class="form-select form-select-md @error('kategori') is-invalid @enderror" name="kategori" id="kategori">
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="gambar">Gambar</label>
                    <input type="text" class="form-control form-control-user @error('gambar') is-invalid @enderror" name="gambar" id="gambar" value="{{old('gambar')}}" placeholder="Sumber Gambar Internet" required>
                    @error('gambar')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-sm btn-success">Tambah</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
