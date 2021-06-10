@extends('layouts.template')
@section('title', 'Cart')
@section('content')

    <main>
        <form action="{{ route('transaction.order', $datacustomer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @forelse ($data as $item)
                                                    <input type="hidden" name="menu_id[]" value="{{ $item->menu_id }}">
                                                    <tr>
                                                        <td style="width: 25%;">
                                                            <img src="{{ Storage::url($item->menu->gambar) }}" alt=""
                                                                width="100px" height="80px" class=" cart-image" />
                                                        </td>
                                                        <td style="width: 20%;">
                                                            <div class="product-title">{{ $item->menu->nama }}</div>
                                                            <div class="product-subtitle">{{ $item->menu->keterangan }}
                                                            </div>
                                                        </td>
                                                        <td style="width: 20%">
                                                            <div class="product-title">{{ $item->menu->harga }}</div>
                                                        </td>
                                                        <td style="width: 10%">
                                                            <input type="hidden" name="item[{{ $i }}][menu_id]"
                                                                value="{{ $item->menu->id }}">
                                                            <input type="number" class="mt-3 form-control"
                                                                name="item[{{ $i }}][quantity]" placeholder="0">
                                                            <input type="hidden" name="order_id">
                                                            <input type="hidden" class="mt-3 form-control"
                                                                name="item[{{ $i }}][cart_id]" placeholder="0"
                                                                value="{{ $item->id }}">
                                                        </td>
                                                        <td style="width: 10%">
                                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                                            <button class="btn btn-remove-cart" id="deleterecord"
                                                                type="button" data-id="{{ $item->id }}">
                                                                Remove
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $i = $i + 1;
                                                    @endphp
                                                    {{ $i }}
                                                @empty
                                                    <tr>
                                                        <td colspan="4"> Anda Belum memilih menu makanan , Silahkan Pilih
                                                            Menu
                                                            makanan anda </td>
                                                    </tr>
                                                @endforelse



                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>

                        </section>
                    </div>
                </div>
            </div>

            <section class="store-cart">
                <div class="card mt-4 border-top-0" data-aos="fade-up">
                    <div class="shadow card-body">
                        <h2 class="col-md-6">Shipping Details</h2>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addressOne">Name</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="nama" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addressOne">Address</label>
                                <input type="text" class="form-control" name=" address" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="province">Phone Number</label>
                                <input type="text" class="form-control" name=" phone" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-order" type="submit"> Order Now </button>
                        </div>
            </section>
        </form>

    </main>
@endsection

@section('script')
<script>
    $("#deleterecord").click(function() {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: "cart/" + id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function() {
                console.log("it Works");
            }
        });

        location.reload(true);

    });

</script>
@endsection
