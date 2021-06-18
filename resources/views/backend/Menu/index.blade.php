@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <a class="btn btn-primary" href="{{ route('backendmenu.create') }}"> Tambahkan Data</a>
    </div>
    <table class="table mt-4 responsive ml-2 mr-2">
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Gambar</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->nama }}</th>
                    <td>{{ $item->harga }}</td>
                    <td><img src="{{ Storage::url($item->gambar) }}" width="150px" height="120px" alt=""></td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{ route('backendmenu.edit', $item->id) }}" class="fas fa-edit btn btn-info"></a>
                        <form action="{{ route('backendmenu.destroy', $item->id) }}" class="d-inline" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fas fa-trash-alt btn btn-warning"></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
