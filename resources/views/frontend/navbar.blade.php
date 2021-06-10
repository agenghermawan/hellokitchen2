<div class="container fixed-top" data-aos="fade-down" data-aos-duration="2200">
    <nav class="row navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="frontend/images/Hello Kitchen.png" alt="" />
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-">
                    <a class="nav-link active" href="/">Home</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a class="nav-link" href="{{ route('menu.index') }}">Menu</a>
                </li>
                @auth
                    <li class="nav-item mx-md-2">
                        <a class="nav-link" href="{{ route('daftartransaksi.index') }}">Order Histori</a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item mx-md-2">
                        <a class="nav-link" href="{{ route('login') }}">
                            <img src="/frontend/images/cart-icon-28356.png" alt="" class="mr-1">
                        </a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item mx-md-2">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            @php
                                $carts = App\Models\Cart::with('menu', 'user')
                                    ->where('users_id', Auth::user()->id)
                                    ->where('order_id', null)
                                    ->count();
                            @endphp
                            @if ($carts > 0)
                                <img src="/frontend/images/cart-icon-28356.png" alt="" class="mr-1"> {{ $carts }}
                            @else
                                <img src="/frontend/images/cart-icon-28356.png" alt="" class="mr-1">
                            @endif
                        </a>
                    </li>
                @endauth


                @guest
                    <!--MOBILE BUTTON-->
                    <form class="form-inline d-sm-block d-md-none  ">
                        <a class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4 pt-3" href="{{ route('login') }}">
                            LOGIN</a>
                    </form>

                    <!--DESKTOP BUTTON-->
                    <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                        <a class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4 pt-3" href="{{ route('login') }}">
                            LOGIN</a>
                    </form>
                @endguest

                @auth
                    <!--MOBILE BUTTON-->
                    <form class="form-inline d-sm-block d-md-none">
                        <button class="btn btn-login my-2 my-sm-0 px-4 pt-4">Hello {{ Auth::user()->name }}</button>
                    </form>

                    <!--DESKTOP BUTTON-->
                    <form class="form-inline my-2 my-lg-0 d-none d-md-block" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4 pt-3" type="submit">
                            Hello , {{ Auth::user()->name }} </button>
                    </form>
                @endauth

            </ul>
        </div>
    </nav>
</div>
