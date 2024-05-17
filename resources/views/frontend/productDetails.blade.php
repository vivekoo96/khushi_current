@extends('layouts.frontend')
@section('content')
    <div class="wrapper bgded overlay" style="background-image:url({{ asset('frontend/aboutus.png') }});">
        <div id="breadcrumb" class="hoc clear">
            <ul>
                <li><a href="{{ route('index') }}">Home</a></li>
                @if ($category)
                    <li><a href="#">{{ $category->name }}</a></li>
                @endif

            </ul>

        </div>
    </div>

    <div class="wrapper row3">
        <main class="hoc container clear">

            <div class="content">

                <p>{{ $product->short_description }}</p>


                {!! $product->description !!}

            </div>

            <div id="gallery">
                <figure>
                    @php
                        $images = json_decode($product->images);
                    @endphp
                    <ul class="nospace clear">

                        @php

                            function generateSpecialIndices($totalItems, $step)
                            {
                                $indices = [];
                                for ($i = 0; $i < $totalItems; $i += $step) {
                                    $indices[] = $i;
                                }
                                return $indices;
                            }
                            $totalItems = 100;
                            $step = 4;

                            $specialIndices = generateSpecialIndices($totalItems, $step);
                        @endphp
                        @forelse ($images as $image)
                            @if (in_array($loop->index, $specialIndices))
                                <li class="one_quarter first"><a href="{{ asset('Product/' . $image) }}"><img
                                            src="{{ asset('Product/' . $image) }}" alt="{{ $product->name }}"></a></li>
                            @else
                                <li class="one_quarter "><a href="{{ asset('Product/' . $image) }}"><img
                                            src="{{ asset('Product/' . $image) }}" alt="{{ $product->name }}"></a></li>
                            @endif
                        @empty
                        @endforelse

                    </ul>

                </figure>
            </div>

            <div class="clear"></div>
        </main>
    </div>
@endsection
