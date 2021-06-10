@extends('layouts.template')
@section('title', 'Cart')
@section('content')
    <div class="card">
        <div class="shadow card-body">
            <div class="page-content page-cart">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <section class="store-cart ml-4">
                        <h3 class="mt-4"> Daftar Transaksi </h3>
                </div>
                </section>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID </th>
                        <th>Total Harga</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $item->order_id }}</th>
                            <td>Rp {{ number_format($item->total_price) }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->transaction_status }}</td>
                            <td>
                                <a href="{{ route('daftartransaksi.show', $item->order_id) }}" class="btn btn-info"> Show
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>


    </div>


    </div>
    </div>
@endsection
