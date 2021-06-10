@extends('layouts.template')

@section('title')
    Hello Kitchen
@section('content')

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" data-aos="fade-down" data-aos-duration="1200">
            <div class="carousel-item active">
                <img class="d-block w-100" src="frontend/images/Brownies Keju 2.jpeg " alt="First slide" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="frontend/images/Brownies cookies.jpeg" alt="Second slide" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="frontend/images/Brownies Keju.jpeg" alt="Third slide" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="frontend/images/Landing-page images.jpg" alt="Third slide" />
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <header class="text-center" data-aos="zoom-out">
        <h1>
            OUR FOOD <br />
            STRAIGHT TO YOUR HEART
        </h1>
        <p class="mt-3">Best in Town</p>
    </header>


    </body>

    <main>
        <div class="text-best text-center" data-aos="fade-right" data-aos-delay="100">
            <h1>BEST SELLERS</h1>
            <img src="frontend/images/ic_star.png" alt="" />
            <img src="frontend/images/ic_star.png" alt="" />
            <img src="frontend/images/ic_star.png" alt="" />
            <img src="frontend/images/ic_star.png" alt="" />
        </div>
        <div class="card-deck">
            @foreach ($data as $item)
                <div class="card" data-aos="zoom-out" data-aos-delay="100">
                    <img class="card-img-top" src="{{ Storage::url($item->gambar) }}" width="600px" height="500px"
                        alt="Card image cap" />
                    <div class="card-body">
                        <h5 class=" card-title">{{ $item->nama }}</h5>
                        <p class="card-text">
                        </p>
                        <p class="card-text"><small class="text-muted"></small></p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="people text-center" data-aos="zoom-out">
            <h1>
                WHAT PEOPLE SAYS ABOUT US
                <img src="frontend/images/ic_testi.png" alt="" />
            </h1>
            <p>We always serve you the best we can</p>
        </div>

        <section class="section section-testimonial-content" id="testimonialContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4" data-aos="fade-right" data-aos-delay="100">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/person-icon-1684.jpg" alt="User" class="mb-4 rounded-circle" />
                                <h3 class="mb-4">ADITYA ZAKY</h3>
                                <p class="testimonial">
                                    "Rasanya enak sekali, semakin menggugah selera makan"
                                </p>
                            </div>

                            <hr />
                            <p class="trip-to mt-2">Sambal Bawang</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="550">
                        <div class="card card-testimonial text-center">
                            <!--Kalau misalkan gambar orangnya tidak KOTAK pake class rounded-rectangle aja trus cssnya 
                                                                                                  kasih radius tapi kalo gambar KOTAK pake aja class rounded-circle -->

                            <div class="testimonial-content">
                                <img src="frontend/images/person-icon-1684.jpg" alt="User" class="mb-4 rounded-circle" />
                                <h3 class="mb-4">NOOR ARIF</h3>
                                <p class="testimonial">"Best in price and quality"</p>
                            </div>

                            <hr />
                            <p class="trip-to mt-2">Brownies Keju</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4" data-aos="fade-left" data-aos-delay="350">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/person-icon-1684.jpg" alt="User" class="mb-4 rounded-circle" />
                                <h3 class="mb-4">PUTRA IMAN</h3>
                                <p class="testimonial">
                                    "Pelayanannya sangat ramah, fast respon dan rasa sangat enak"
                                </p>
                            </div>

                            <hr />
                            <p class="trip-to mt-2">Brownies Plain</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="carouselExampleSlidesOnly" class="carouselpromo" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100"
                        src="frontend/images/modern-buy-one-get-one-free-sale-yellow-banner-design_1017-15625.jpg"
                        alt="First slide" />
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="frontend/images/Special-Offer.png" alt="Second slide" />
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="frontend/images/41cClQ29E2L._AC_.jpg" alt="Third slide" />
                </div>
            </div>
        </div>
    </main>

@endsection
