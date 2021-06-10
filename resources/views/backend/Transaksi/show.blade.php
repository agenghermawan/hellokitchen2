@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <a class="btn btn-primary" href="{{ route('backendmenu.create') }}"> Data Transaksi</a>
    </div>

    <table class="table mt-4 responsive ml-2 mr-2">
        <thead>
            <tr>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Order ID</th>
                <th scope="col">Nama Pesanan</th>
                <th scope="col">Gambar Pesanan</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->user->name }}</th>
                    <td>{{ $item->order_id }} </td>
                    <td>{{ $item->menu->nama }}</td>
                    <td>
                        <img src="{{ Storage::url($item->menu->gambar) }}" alt="" width="120px" height="100px">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
