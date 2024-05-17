@extends('layouts.frontend')
@section('content')
    <div class="wrapper bgded overlay" style="background-image:url({{ asset('frontend/aboutus.png') }});">
        <div id="breadcrumb" class="hoc clear">
            <ul>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="#">Contact Us</a></li>

            </ul>

        </div>
    </div>
    <div class="wrapper row3">
        <section id="cta" class="hoc container clear">

            <div class="sectiontitle">
                <h6 class="heading">Contact Us</h6>

            </div>
            <ul class="nospace clear">
                <li class="one_third first">
                    <div class="block clear"><i class="fas fa-phone"></i> <span><strong>Give us a call:</strong><a
                                href="tel:04442630007"> +0
                                (44) 4263 0007 </a></span> </div>
                </li>
                <li class="one_third">
                    <div class="block clear"><i class="fas fa-envelope"></i> <span><strong>Send us a mail:</strong>
                            <a href="mailto:info@khushitrading.com">info@khushitradin.com </a></span> </div>
                </li>
                <li class="one_third">
                    <div class="block clear"><i class="fas fa-map-marker-alt"></i><span><strong>Come visit
                                us:</strong> <a target="_blank" href="https://maps.app.goo.gl/nEkJrpmCUn8GB9Pv7"> New
                                190 Old 110 Bells road Triplicane, Chennai-600005, Tamil Nadu,
                                India or
                                <br>
                                42, Thiru. Vika. Rd, Border Thottam, Padupakkam, Triplicane, Chennai, Tamil Nadu
                                600002</a> </span></div>
                </li>
            </ul>

        </section>
    </div>
@endsection
