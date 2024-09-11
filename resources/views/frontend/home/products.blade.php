@extends('layouts.frontend')
@section('content')
<div class="archive-city">
    <div class="col-left">
        <div class="archive-filter">
            <form action="#" class="filterForm" id="filterForm">
                <div class="filter-head">
                    <h2>Filter</h2>
                    <a href="#" class="clear-filter"><i class="fal fa-sync"></i>Clear all</a>
                    <a href="#" class="close-filter"><i class="las la-times"></i></a>
                </div>
                <div class="filter-box">
                    <h3>Categories</h3>
                    <div class="filter-list">
                        <div class="filter-group">
                            @foreach ($categories as $category)
                            <div class="field-check">
                                <li><a href="{{ route('products.category', $category->id) }}">{{ $category->name }}</a></li>
                            </div>
                            @endforeach
                        </div>
                        <a href="#" class="more open-more" data-close="Close" data-more="More">More</a>
                    </div>
                </div>
                <div class="filter-box">
                    <h3>Sort By</h3>
                    <div class="filter-list">

                        <div class="field-check">
                            <a class="px-4" href="{{ url()->current() }}?sort_by=created_at&order=desc" {{ $sortBy == 'created_at' && $order == 'desc' ? 'selected' : '' }}>Date Desc</a>
                        </div>
                        <div class="field-check">
                            <a class="px-4" href="{{ url()->current() }}?sort_by=created_at&order=asc" {{ $sortBy == 'created_at' && $order == 'asc' ? 'selected' : '' }}>Date Asc</a>
                        </div>
                        <div class="field-check">
                            <a class="px-4" href="{{ url()->current() }}?sort_by=price&order=desc" {{ $sortBy == 'price' && $order == 'desc' ? 'selected' : '' }}>High To Low</a>
                        </div>
                        <div class="field-check">
                            <a class="px-4" href="{{ url()->current() }}?sort_by=price&order=asc" {{ $sortBy == 'price' && $order == 'asc' ? 'selected' : '' }}>Low To High </a></li>
                        </div>
                        <div class="field-check">
                            <a class="px-4" href="{{ url()->current() }}?sort_by=name&order=desc" {{ $sortBy == 'name' && $order == 'desc' ? 'selected' : '' }}>Name (Z-A)</a></li>
                        </div>
                        <div class="field-check">
                            <a class="px-4" href="{{ url()->current() }}?sort_by=name&order=asc" {{ $sortBy == 'name' && $order == 'asc' ? 'selected' : '' }}>Name (A-Z)</a></li>
                        </div>

                    </div>
                </div>
            </form>

        </div><!-- .archive-fillter -->
        <div class="main-primary">

            <div class="top-area top-area-filter">
                <div class="filter-left">
                    <span class="result-count"><span class="count">{{$products->count()}}</span> products</span>
                    <a href="#" class="clear">Clear filter</a>
                </div>
                <div class="filter-center">
                    <div class="place-layout">
                        <a class="active" href="#" data-layout="layout-grid"><i class="las la-border-all icon-large"></i></a>
                        <a class="" href="#" data-layout="layout-list"><i class="las la-list icon-large"></i></a>
                    </div>
                </div>
                <div class="filter-right">
                    <div class="site__search layout-02">
                        <a title="Close" href="#" class="search__close">
                            <i class="la la-times"></i>
                        </a><!-- .search__close -->
                        <form action="{{url()->current()}}" method="GET" class="site-banner__search layout-02">
                            @csrf
                            <div class="field-input">
                                <label for="s"></label>
                                <input class="site-banner__search__input" id="s" type="text" name="search" placeholder="search...." autocomplete="off">
                            </div><!-- .site-banner__search__input -->
                            <div class="field-submit">
                                <button type="submit"><i class="las la-search la-24-black"></i></button>
                            </div>
                        </form><!-- .site-banner__search -->
                    </div>
                </div>
            </div>
            <div class="area-places">
                @foreach ($products as $product)
                <div class="place-item layout-02 place-hover">
                    <div class="place-inner">
                        <div class="place-thumb">
                            <a class="entry-thumb" href="{{route('product.details',$product->id)}}"><img src="{{$product->image}}" alt=""></a>
                            <a href="{{route('product.details',$product->id)}}" class="golo-add-to-wishlist btn-add-to-wishlist " data-place-id="185">
                                <span class="icon-heart">
                                    <i class="la la-bookmark large"></i>
                                </span>
                            </a>
                            <a class="entry-category purple add_to_cart" data-id="<?= $product->id ?>" href="#">
								<i class="las la-shopping-cart"></i><span>Order Now</span>
							</a>
                        </div>
                        <div class="entry-detail">
                            <div class="entry-head">
                                <div class="place-type list-item">
                                    <span>Category</span>
                                   </div>
                                <div class="place-city">
                                    <a href="#">{{$product->category?->name}}</a>
                                </div>
                            </div>
                            <h3 class="place-title"><a href="{{route('product.details',$product->id)}}">{{$product->name}}</a></h3>
                            <div class="entry-bottom">
                                <div class="place-preview">
                                    <div class="place-rating">
                                        <span class="rated">
                                            @for($i = 5; $i >= 1; $i--)
                                                @if ($i > $product->ratings?->avg('rate'))
                                                <label class="star-rating-empty" style="color: lightgray;" title="{{$i}} stars">{{$i}} stars</label>
                                                @else
                                                <label class="star-rating-complete" style="color: gold;" title="{{$i}} stars">{{$i}} stars</label>
                                                @endif
                                            @endfor
                                        </span>
                                    </div>
                                </div>
                                <div class="place-price">
                                    <span>${{$product->price}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<script src="{{asset('custom/cart.js')}}"></script>
@endsection
