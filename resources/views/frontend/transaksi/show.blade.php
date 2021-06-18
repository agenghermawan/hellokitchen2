@extends('layouts.template')
@section('title', 'Cart')
@section('content')
    <div class="card" style="height: 800px">
        <div class="shadow card-body ">
            <div class="container">
                <div class="page-content page-cart">
                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <section class="store-cart">
                            <h3 class="mt-3 font-weight-bold"> INVOICE ORDER ID {{ $data->order_id }} </h3>
                    </div>
                    </section>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-9 text-left">
                        <h4 class="font-weight-bold"> Alamat Pengiriman </h4>
                        <p> {{ $data->user->name }} <br>
                            {{ $data->user->email }} <br>
                            {{ $data->address }} <br>
                            {{ $data->phone }}
                        </p>

                    </div>

                    <div class="col-lg-3 text-left">
                        <h4 class="font-weight-bold"> Details Invoice </h4>
                        <p> Order ID : {{ $data->order_id }} <br>
                            Tanggal Pembelian : {{ date('MMMM Do YYYY, h:mm:ss a', strtotime($data->tanggal)) }} <br>
                            Transaction Status : {{ $data->transaction_status }} <br>
                            Total Harga : Rp {{ number_format($data->total_price) }}
                        </p>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID </th>
                            <th>Menu</th>
                            <th>Gambar</th>
                            <th>Keterangan</th>
                            <th>Quantity</th>
                            <th>Unit Cost</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datamenu as $item)
                            <tr>
                                <td> {{ $item->order_id }} </td>
                                <td> {{ $item->menu->nama }} </td>
                                <td> <img src="{{ Storage::url($item->menu->gambar) }}" alt="" width="80px" height="80px"
                                        class="responsive rounded"> </td>
                                <td> {{ $item->menu->keterangan }} </td>
                                <td> {{ $item->quantity }} </td>
                                <td> {{ $item->menu->harga }} </td>
                                <td> {{ $item->menu->harga * $item->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </tbody>
                </table>

                <div class="row mt-4">
                    <div class="col-lg-9 text-left">


                    </div>

                    <div class="col-lg-3 text-left mt-4">
                        <h6> Total Harga : Rp {{ number_format($data->total_price) }} <br>

                        </h6>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
