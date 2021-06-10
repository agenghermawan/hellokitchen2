@extends('layouts.template')
@section('title', 'Menu')
@section('content')
    <header class="text-center">
        <div class="text-menu">
            <h1>THE MENU</h1>
        </div>
    </header>

    <main>
        <div class="card-deck1">
            <div class="shadow p-3 mb-5 bg-body rounded">
                <div class="card-deck">
                    @foreach ($data as $item)
                        <div class="card border-0" data-aos="zoom-in" data-aos-delay="500">
                            <img class="card-img-top" src="{{ Storage::url($item->gambar) }}" width="600px" height="500px"
                                alt="Card image cap" />
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama }} | {{ $item->harga }}</h5>
                                <p class="card-text">
                                    {{ $item->keterangan }}
                                </p>
                                <p class="card-text"><small class="text-muted"></small></p>
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
                    @endforeach
    </main>
@endsection
