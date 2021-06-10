@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <a class="btn btn-primary" href="{{ route('backendmenu.index') }}"> Lihat Data</a>
    </div>
    <div class="card mt-4">
        <div class="container-fluid mt-4">
            <form action="{{ route('backendmenu.update', $data->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Makanan : </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $data->nama }}"
                        name="nama">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Harga :</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $data->harga }}"
                        name="harga">
                </div>
                <div class="form-group">
                    <label for=""> Masukan Gambar Makanan :</label>
                    <input name="gambar" type="file" class="form-control">
                </div>
                <div class="form-group">
                    <label for=""> Masukan Keterangan</label>
                    <textarea name="keterangan" id="" cols="30" rows="10"
                        class="form-control"> {{ $data->keterangan }}</textarea>

                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary "> Masukan Barang</button>
                </div>
            </form>
        </div>
    </div>
@endsection
