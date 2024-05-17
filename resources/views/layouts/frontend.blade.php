<!DOCTYPE html>
<html lang="">

<head>
    <title>Khushi Trading</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{ asset('frontend/styles/layout.css') }}" rel="stylesheet" type="text/css" media="all">
</head>

<body id="top">

    @include('frontend.include.header')

    @yield('content')
    {{-- <div class="wrapper row2">
        <section id="latest" class="hoc container clear">

            <div class="sectiontitle">
                <h6 class="heading">Ligula mi fringilla vel hendrerit</h6>
                <p>Et malesuada vitae risus in a enim in metus ultrices tristique</p>
            </div>
            <ul class="nospace group">
                <li class="one_third first">
                    <article>
                        <figure><a href="#"><img src="images/demo/348x261.png" alt=""></a>
                            <figcaption>
                                <time datetime="2045-04-06T08:15+00:00"><strong>06</strong> <em>Apr</em></time>
                            </figcaption>
                        </figure>
                        <div class="excerpt">
                            <h6 class="heading">Integer aliquet dignissim tellus</h6>
                            <ul class="nospace meta">
                                <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
                                <li><i class="fas fa-tags"></i> <a href="#">Tag 1</a>, <a href="#">Tag
                                        2</a></li>
                            </ul>
                            <p>Vestibulum consequat praesent bibendum vehicula mi sed fermentum erat sit amet imperdiet
                                dictum enim lectus [<a href="#">&hellip;</a>]</p>
                            <footer><a class="btn" href="#">Read More</a></footer>
                        </div>
                    </article>
                </li>
                <li class="one_third">
                    <article>
                        <figure><a href="#"><img src="images/demo/348x261.png" alt=""></a>
                            <figcaption>
                                <time datetime="2045-04-05T08:15+00:00"><strong>05</strong> <em>Apr</em></time>
                            </figcaption>
                        </figure>
                        <div class="excerpt">
                            <h6 class="heading">Tortor tempus metus neque</h6>
                            <ul class="nospace meta">
                                <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
                                <li><i class="fas fa-tags"></i> <a href="#">Tag 1</a>, <a href="#">Tag
                                        2</a></li>
                            </ul>
                            <p>Vel elit integer in orci vitae lacus ultricies mattis suspendisse congue sapien vel massa
                                posuere lacinia [<a href="#">&hellip;</a>]</p>
                            <footer><a class="btn" href="#">Read More</a></footer>
                        </div>
                    </article>
                </li>
                <li class="one_third">
                    <article>
                        <figure><a href="#"><img src="images/demo/348x261.png" alt=""></a>
                            <figcaption>
                                <time datetime="2045-04-04T08:15+00:00"><strong>04</strong> <em>Apr</em></time>
                            </figcaption>
                        </figure>
                        <div class="excerpt">
                            <h6 class="heading">Phasellus a ipsum eget odio</h6>
                            <ul class="nospace meta">
                                <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
                                <li><i class="fas fa-tags"></i> <a href="#">Tag 1</a>, <a href="#">Tag
                                        2</a></li>
                            </ul>
                            <p>Fringilla tincidunt proin velit aliquam erat volutpat etiam elementum eros ut ante fusce
                                a lacus ac neque [<a href="#">&hellip;</a>]</p>
                            <footer><a class="btn" href="#">Read More</a></footer>
                        </div>
                    </article>
                </li>
            </ul>

        </section>
    </div> --}}


    <div class="wrapper ">
        <footer id="footer" class="hoc clear">

            <div class="one_third first">
                <a href="{{ route('index') }}">
                    <img class="logo" src="{{ asset('frontend/khushilogo.png') }}" alt="khushi trading logo">
                </a>
                <p class="btmspace-30">New 190 Old 110 Bells road Triplicane, Chennai-600005, Tamil Nadu, India
                </p>
                <ul class="faico clear">
                    <li><a class="faicon-dribble" href="#"><i class="fab fa-dribbble"></i></a></li>
                    <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
                    <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a class="faicon-vk" href="#"><i class="fab fa-vk"></i></a></li>
                </ul>
            </div>
            <div class="one_third">
                <h6 class="heading">Services</h6>
                <ul class="nospace linklist">

                    @php
                        $categories = App\Models\Category::where('parent_id', null)->get();
                    @endphp
                    @forelse ($categories as  $category)
                        <li><a href="#">{{ $category->name }}</a></li>
                    @empty
                    @endforelse
                    {{-- <li><a href="#">Tincidunt vel vulputate egestas</a></li>
                    <li><a href="#">Leo sed porttitor accumsan arcu</a></li>
                    <li><a href="#">Aenean ac urna et leo posuere</a></li>
                    <li><a href="#">Pretium suspendisse ac elit ut</a></li> --}}
                </ul>
            </div>
            <div class="one_third">
                <h6 class="heading">Newsletter</h6>
                <p class="nospace btmspace-15">Sign up now to receive valuable content, exclusive..</p>
                <form method="post" action="#">
                    <fieldset>
                        <legend>Newsletter:</legend>
                        <input class="btmspace-15" type="text" value="" placeholder="Name">
                        <input class="btmspace-15" type="text" value="" placeholder="Email">
                        <button type="submit" value="submit">Submit</button>
                    </fieldset>
                </form>
            </div>

        </footer>
    </div>

    <div class="wrapper row5">
        <div id="copyright" class="hoc clear">

            <p class="fl_left">Copyright &copy; {{ date('Y') }} - All Rights Reserved - <a href="#">Khushi
                    Trading</a></p>
            <p class="fl_right">Desgin by <a target="_blank" href="https://lasireneexim.com"
                    title="lasireneexim">lasireneexim</a></p>

        </div>
    </div>
    <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
    <!-- JAVASCRIPTS -->
    <script src="{{ asset('frontend/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/scripts/jquery.backtotop.js') }}"></script>
    <script src="{{ asset('frontend/scripts/jquery.mobilemenu.js') }}"></script>
</body>

</html>
