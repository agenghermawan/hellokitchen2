<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Success </title>
    <link rel="stylesheet" href="{{ asset('frontend/libraries/Bootstrap/css/bootstrap.css') }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/styles/cart.css') }}" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/styles/success.css') }}" />
</head>

<body>
    <!-- Navbar -->
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <div class="navbar-nav ml-auto mr-auto mr-sm-auto mr-lg-0 mr-md-auto">
                <a href="{{ route('landing-page') }}" class="navbar-brand">
                    <img src="frontend/images/Hello Kitchen.png" alt="" />
                </a>
            </div>
            <ul class="navbar-nav mr-auto d-none d-lg-block">
                <li>
                    <span class="text-muted">
                        | &nbsp; Beyond the explorer of the world
                    </span>
                </li>
            </ul>
        </nav>
    </div>

    <header class="header-bg text-left">
        <h1 data-aos="fade-right" data-aos-delay="500">Yay! Success</h1>
        <p class="mt-3" data-aos="fade-right" data-aos-delay="1000">

            We've confirmation your order please wait :)
        </p>
        <p data-aos="fade-right" data-aos-delay="1500">
            <a class="btn btn-primary" href="{{ route('daftartransaksi.index') }}">
                Status Orderan Kamu
            </a>
        </p>
    </header>


    @include('frontend.script')

</body>

</html>
