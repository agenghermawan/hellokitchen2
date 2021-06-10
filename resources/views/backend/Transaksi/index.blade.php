@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <a class="btn btn-primary" href="{{ route('backendmenu.create') }}"> Data Transaksi</a>
    </div>
    <table class="table mt-4 responsive ml-2 mr-2">
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Order ID</th>
                <th scope="col">No Hp</th>
                <th scope="col">Alamat </th>
                <th scope="col">Harga</th>
                <th scope="col">Status</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->user->name }}</th>
                    <td>{{ $item->order_id }} </td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address }}</td>
                    <td>Rp {{ number_format($item->total_price) }}</td>
                    <td>{{ $item->transaction_status }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>
                        <a href="{{ route('transaction.edit', $item->id) }}" class="fas fa-edit btn btn-info"></a>
                        <a href="" class="fas fa-trash-alt btn btn-warning"></a>
                        <a href="{{ route('transaction.show', $item->order_id) }}" class="fas fa-eye btn btn-primary"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
