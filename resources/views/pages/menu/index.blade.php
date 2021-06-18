@extends('layouts.template')
@section('title', 'Menu')
@section('content')
    <header class="text-center">
        <div class="text-menu">
            <h1>THE MENU</h1>
        </div>
    </header>
    <main>
        <div class="container-fluid mb-5">
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0" data-aos="zoom-in" data-aos-delay="500">
                            <img class="card-img-top" src="{{ Storage::url($item->gambar) }}" width="600px" height="500px"
                                alt="Card image cap" />
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama }} | {{ $item->harga }}</h5>
                                <p class="card-text">
                                    {{ $item->keterangan }}
                                </p>
                            </div>
                            @auth
                                <form action="{{ route('cart-add', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn btn-order w-100">
                                        Add To Card
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-order"> Login to Add Product</a>
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
