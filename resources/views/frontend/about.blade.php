@extends('layouts.frontend')
@section('content')
    <div class="wrapper bgded overlay" style="background-image:url({{ asset('frontend/aboutus.png') }});">
        <div id="breadcrumb" class="hoc clear">
            <ul>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="#">About</a></li>

            </ul>

        </div>
    </div>

    <div class="wrapper row3">
        <main class="hoc container clear">

            <div class="content">

                <h1>We are one of the finest CCTV Camera traders in Coimbatore. We always believe in Hardwork,
                    Professionalism, and Friendly attitude.</h1>
                <img class="imgr borderedbox inspace-5" src="../images/demo/imgr.gif" alt="">
                <p>Being united as a team enables us to grow and meet the needs of the clients.We work in very unique way
                    which converts our clients into long term customers.</p>
                <h3>“We care about what we do”</h3>
                {{-- <img class="imgl borderedbox inspace-5" src="../images/demo/imgl.gif" alt=""> --}}
                <p>Our team consists of technical experts, quality analysts, sales and marketing team and others. These
                    people are experts of their domain and also help us in making strong relation with our clients</p>
                <p>We are engaged in offering a vast range of …. And many more. Our products are highly demanded in the
                    market for their optimum good quality and wide use.
                </p>

            </div>

            <div class="wrapper row2">
                <section class="hoc container clear">

                    <div class="sectiontitle">
                        <h6 class="heading">Why Us?</h6>
                        <p>Backed by a rich industry experience, we are engaged in providing a wide supreme quality range of
                            products.</p>
                    </div>
                    <div class="group center">
                        <article class="one_third first"><a class="ringcon btmspace-50" href="#"><i
                                    class="fas fa-couch"></i></a>
                            <h6 class="heading">Well-furnished infrastructural facility </h6>

                        </article>
                        <article class="one_third"><a class="ringcon btmspace-50" href="#"><i
                                    class="fas fa-check-circle"></i></a>
                            <h6 class="heading">Total Quality Management </h6>

                        </article>
                        <article class="one_third"><a class="ringcon btmspace-50" href="#"><i
                                    class="fas fa-users"></i></a>
                            <h6 class="heading">Complete client satisfaction </h6>

                        </article>

                    </div>
                    <div class="group center" style="margin-top:20px">
                        <article class="one_third first"><a class="ringcon btmspace-50" href="#"><i
                                    class="fas fa-balance-scale"></i></a>
                            <h6 class="heading">Ethical business policies </h6>

                        </article>
                        <article class="one_third"><a class="ringcon btmspace-50" href="#"><i
                                    class="fas fa-trophy"></i></a>
                            <h6 class="heading">Competitive pricing </h6>
                        </article>
                        <article class="one_third"><a class="ringcon btmspace-50" href="#"><i
                                    class="fas fa-shipping-fast"></i></a>
                            <h6 class="heading">Immediate delivery</h6>

                        </article>

                    </div>

                </section>
            </div>

            <div class="clear"></div>
        </main>
    </div>
@endsection
