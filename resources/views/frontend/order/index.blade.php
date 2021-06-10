@extends('layouts.template')
@section('title', 'Cart')
@section('content')

    <main>
        <div class="card">
            <div class="shadow card-body">
                <div class="page-content page-cart">
                    <section class="store-cart">
                        <div class="container">
                            <div class="row" data-aos="fade-up" data-aos-delay="100">
                                <div class="col-12 table-responsive">
                                    <table class="table table-borderless table-cart" aria-describedby="Cart">
                                        <thead>
                                            <tr>
                                                <th scope="col">Image</th>
                                                <th scope="col">Name &amp; Description</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $totalprice = 0 @endphp
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td style="width: 25%;">
                                                        <img src="{{ Storage::url($item->menu->gambar) }}" alt=""
                                                            width="100px" height="100px" class=" cart-image" />
                                                    </td>
                                                    <td style="width: 35%;">
                                                        <div class="product-title">{{ $item->menu->nama }}</div>
                                                        <div class="product-subtitle">{{ $item->menu->keterangan }}</div>
                                                    </td>
                                                    <td style="width: 35%;">
                                                        <div class="product-title">
                                                            {{ number_format($item->menu->harga) }}
                                                        </div>

                                                    </td>
                                                    <td style="width: 35%;">
                                                        <div class="product-title">
                                                            {{ number_format($item->quantity) }}
                                                        </div>

                                                    </td>
                                                    <td style="width: 20%;">
                                                        <form action="{{ route('transaction.destroy', $item->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-remove-cart" type="submit">
                                                                Remove
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                @php $totalprice += $item->menu->harga * $item -> quantity @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>


        <div class="row" style="background-color: white">
            <div class="col-md-6">
                <div class="card">
                    <div class="shadow card-body">
                        <h2 class="col-md-6">Shipping Details</h2>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addressOne">Name</label>
                                <h4> {{ $nama }}</h4>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addressOne">Address</label>
                                <h3> {{ $address }}</h3>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="province">Phone Number</label>
                                <h3> {{ $phone }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="btn btn-order"> Order Now </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="shadow card-body">
                        <h2 class="col-md-6">Payment Information </h2>
                        <div class="col-md-6">
                            <table class="trip-informations h-100">
                                <tr>
                                    <th width="50%">Menu</th>
                                    <td width="50%" class="text-right">
                                        @php
                                            $totalmenu = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                                        @endphp
                                        {{ $totalmenu }} Menu
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Trip Price</th>
                                    <td width="50%" class="text-right">
                                        {{ number_format($totalprice) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+Unique)</th>
                                    <td width="50%" class="text-right text-total">
                                        @php
                                            $random = mt_rand(0, 99);
                                            $allprice = $totalprice + $random;
                                        @endphp
                                        <span class="text-blue"> {{ number_format($allprice) }}</span><span </td>
                                </tr>
                            </table>
                            <div class="bank">
                                <div class="bank-item mt-2">
                                    <img src=" frontend/images/ic_bank.png" alt="" class="bank-image">
                                    <div class="description">
                                        <h3>PT NOMADS ID</h3>
                                        <p>
                                            0829 0999 8390
                                            <br>
                                            Bank Central Asia
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="join-container">
                                <form action="{{ route('transaction.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="total_price" value="{{ $allprice }}">
                                    <input type="hidden" name="address" value="{{ $address }}">
                                    <input type="hidden" name="phone" value="{{ $phone }}">
                                    <input type="hidden" name="count" value="{{ $totalmenu }}">
                                    <input type="hidden" name="order_id" value="{{ $order_id }}">
                                    <button type="submit" class="btn btn-primary">
                                        Saya sudah membayar
                                    </button>
                                </form>
                            </div>
                            <div class="mt-3">
                                <a href="details.html" class="text-muted btn btn-warning">
                                    Cancel Booking
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
    </main>
@endsection
