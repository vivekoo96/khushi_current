@extends('layouts.frontend')

@section('content')
    <div class="wrapper bgded overlay" style="background-image:url({{ asset('frontend/cctv.png') }});">
        <div id="pageintro" class="hoc clear">

            <article>
                <p>Khushi Trading Inc is a leading </p>
                <h3 class="heading">CCTV camera, Sanitary Ware, Network accessories and plumbing </h3>
                <p>Traders in Chennai. Our projects are managed by a team of professionals. </p>
                <footer><a class="btn" href="#">Contact Us</a></footer>
            </article>

        </div>
    </div>
    <div class="wrapper row3">
        <main class="hoc container clear">
            <div class="content">
                <h1>Khushi Trading Inc is a leading CCTV camera, Sanitary Ware, Network accessories and plumbing traders
                    in Chennai.</h1>
                <img class="imgr borderedbox inspace-5" src="" alt="">
                <p>Our primary aim is to bridge the gap between reputed manufacturers and consumers and also update the
                    product trends and prices on a real time basis. </p>
                <p>A large part of our approach was to enable work flow Integration both on a large scale in business to
                    user and configure good administration. We offer a wide range of products and will provide complete
                    information about the product and its features. As per your choice we suggest you the product at
                    cost effective.</p>
            </div>
        </main>
    </div>

    <div class="wrapper row3">
        <main class="hoc container clear">

            <div class="sectiontitle">
                <h6 class="heading">Our Products</h6>
                <p>CCTV camera, Sanitary Ware, Network accessories and plumbing.</p>
            </div>
            <ul class="nospace group overview">
                @forelse ($products as  $product)
                    @php
                        $images = json_decode($product->images);
                        $firstImage = !empty($images) ? $images[2] : null;
                    @endphp
                    <li class="one_third">
                        <figure><a href="{{ route('product_slug', ['slug' => $product->slug]) }}"><img
                                    src="{{ asset('Product/' . $firstImage) }}" alt="{{ $product->name }}"></a>
                            <figcaption>
                                <h6 class="heading">{{ $product->name }}</h6>
                                <p>{{ limit_words($product->short_description) }}</p>
                            </figcaption>
                        </figure>
                    </li>
                @empty
                @endforelse


            </ul>

            <div class="clear"></div>
        </main>
    </div>



    <div class="wrapper gradient">
        <section id="testimonials" class="hoc container clear">

            <div class="sectiontitle">
                <h6 class="heading">What Clients Say About Us.</h6>
                <p>We are proud to have received such positive feedback from our valued clients. Don't just take our
                    word for it. Read what our clients have to say about their experience working with us:</p>
            </div>
            <article class="one_half first"><img src="images/demo/100x100.png" alt="">
                <blockquote>Working with Khushi Trading Company has been a game-changer for our business. Their
                    dedication to quality products and reliable service is unmatched. We've seen a significant
                    improvement in our supply chain efficiency since partnering with them.</blockquote>
                <h6 class="heading">Vivek Patel</h6>

            </article>
            <article class="one_half"><img src="images/demo/100x100.png" alt="">
                <blockquote>As a long-time client of Khushi Trading Company, I can confidently say that they excel in
                    both product quality and customer service. Their diverse product range and competitive pricing make
                    them our go-to supplier for various industry needs. Keep up the excellent work!</blockquote>
                <h6 class="heading">Bhushan Jain</h6>

            </article>
        </section>
    </div>
@endsection
