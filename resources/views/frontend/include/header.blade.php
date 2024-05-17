<div class="wrapper row0">
    <div id="topbar" class="hoc clear">
        <div class="fl_left">
            <ul class="nospace">
                <li><a href="{{ route('index') }}"><i class="fas fa-home fa-lg"></i></a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>

            </ul>
        </div>
        <div class="fl_right">
            <ul class="nospace">
                {{-- 04442630007 --}}
                <li><i class="fas fa-phone rgtspace-5"></i><a href="tel:04442630007"> +0 (444) 263 0007 </a></li>
                <li><i class="fas fa-envelope rgtspace-5"></i> <a href="mailto:info@khushitrading.com">
                        info@khushitrading.com
                    </a></li>
            </ul>
        </div>

    </div>
</div>
<div class="wrapper row1">
    <header id="header" class="hoc clear">
        <div id="logo" class="one_half first">
            <a href="{{ route('index') }}">
                <img class="logo" src="{{ asset('frontend/khushilogo.png') }}" alt="khushi trading logo">
            </a>
        </div>
        <div class="one_half">
            <ul class="nospace clear">
                <li class="one_half first">
                    <div class="block clear"><i class="fas fa-phone"></i> <span><strong class="block">Call
                                Us:</strong> <a href="tel:04442630007">+0 (444) 263 0007 </a></span> </div>
                </li>
                <li class="one_half">
                    <div class="block clear"><i class="far fa-clock"></i> <span><strong class="block"> Mon. -
                                Sat.:</strong> 10.00am - 8.00pm</span> </div>
                </li>
            </ul>
        </div>
    </header>
    <nav id="mainav" class="hoc clear">
        <ul class="clear">
            <li class="active"><a href="{{ route('index') }}">Home</a></li>
           @php
    $categories = App\Models\Category::where('parent_id', null)->get();
@endphp

@forelse ($categories as $category)
    @if ($category->children && count($category->children) > 0)
        <li>
            <a class="drop" href="">{{ $category->name }}</a>
            <ul>
                @forelse ($category->children as $subcategory)
             
                    <li>
                        <a class="{{ isset($subcategory->children) && !empty($subcategory->children) && count($subcategory->children) > 0 ? 'drop' : '' }}" href="{{ route('product_details', ['slug' => $subcategory->slug]) }}">
                            {{ $subcategory->name }}
                        </a>
                        
                        @if(($subcategory->children && $subcategory->children->isNotEmpty() && count($subcategory->children) > 0) ? 'drop' : '' )
                            <ul>
                                @foreach($subcategory->children as $subSubcategory)
                                    <li><a href="{{ route('product_details', ['slug' => $subcategory->slug]) }}">{{ $subSubcategory->name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @empty
                @endforelse
            </ul>
        </li>
    @else
        <li><a href="#">{{ $category->name }}</a></li>
    @endif
@empty
@endforelse



        </ul>

    </nav>
</div>
