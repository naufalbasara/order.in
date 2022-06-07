@extends('templates.admin-main')
@section('title', 'Data Menu')

@section('content')
    @include('templates.admin-topbar')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Menu</h1>
    <a href="{{ url()->previous() }}" class="btn btn-md btn-primary mb-3">Kembali</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Menu Order.in</h6>
        </div>
        <div class="card-body">

            <form action="{{route('update-menu', $menu->id)}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="namaMenu">Menu</label>
                    <input type="text" class="form-control form-control-user @error('namaMenu') is-invalid @enderror" name="namaMenu" id="namaMenu" value="{{$menu->namaMenu}}" required>
                    @error('namaMenu')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label" for="harga">Harga</label>
                    <input type="text" class="form-control form-control-user @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{$menu->harga}}" required>
                    @error('harga')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label" for="kategori">Kategori</label>
                    <select class="form-select form-select-md @error('kategori') is-invalid @enderror" name="kategori" id="kategori">
                        <option value="Makanan" {{$menu->kategori == 'Makanan'  ? 'selected' : ''}}>Makanan</option>
                        <option value="Minuman" {{$menu->kategori == 'Minuman'  ? 'selected' : ''}}>Minuman</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-success">Update</button>

            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
