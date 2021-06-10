<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BISMILLAH PI</title>
    @include('frontend.style')
</head>

<body>
    @extends('frontend.navbar')

    <header class="header-bg text-left">
        <h1 data-aos="fade-right" data-aos-delay="500">ABOUT ME</h1>
        <p class="mt-3" data-aos="fade-right" data-aos-delay="1000">
            Hello my name is Vinnotinto Rizky Anugrah S <br />
            I am a college student in University Gunadarma and studying
            <br />Information System
            <br />
            I am born in 7 July 2000, Jakarta
        </p>
        <p data-aos="fade-right" data-aos-delay="1500">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                Why Hello Kitchen ?
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card-pop card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life
                accusamus terry richardson ad squid. Nihil anim keffiyeh
                helvetica,
                <br />craft beer labore wes anderson cred nesciunt sapiente ea
                proident.
            </div>
        </div>
    </header>


    @include('frontend.script')

</body>

</html>
