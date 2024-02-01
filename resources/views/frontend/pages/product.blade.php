@extends('layouts.frontend')
@section('title', 'Show Product')
@section('content')
<main id="main" class="site-main">
    <div class="page-title page-title--small align-left" style="background-image: url({{asset("frontend/images/bg/banner-1.jpg")}});">
        <div class="container">
            <div class="page-title__content">
                <h1 class="page-title__name">Shop</h1>
                <p class="page-title__slogan"></p>
            </div>
        </div>	
    </div><!-- .page-title -->
    <div class="shop-details">
        <div class="container">
            <ul class="shop-details__breadcrumbs breadcrumbs">
                {{-- <li><a title="Shop" href="#">Shop</a></li>
                <li><a title="France Travel Guide" href="#"></a></li> --}}
            </ul><!-- .place__breadcrumbs -->
            <div class="shop-details__wrap">
                <div class="row">
                    <div class="col-md-5">
                        <div class="shop-details__thumb">
                            <a title="France city guide" href="#"><img src="{{$product->image}}" alt="France"></a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="shop-details__summary">
                            <h2>{{$product->ar_name}}</h2>
                            
                            <div class="shop-details__review">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $product->rating)
                                        <span class="shop-details__review_star"><i class="fas fa-star"></i></span>
                                    @else
                                        <span class="shop-details__review_star"><i class="far fa-star"></i></span>
                                    @endif
                                @endfor
                            </div>
                            <div class="shop-details__price" style="color: #5f4fff">{{$product->price}}</div>
                            <div class="shop-details__addcart">
                                {{-- <div class="shop-details__quantity">
                                    <span class="plus">											
                                        <i class="la la-plus"></i>
                                    </span>
                                    <input type="number" name="quantity" value="1" class="qty">
                                    <span class="minus">		
                                        <i class="la la-minus"></i>
                                    </span>
                                </div> --}}
                                <button class="btn btn-sm btn-primary add_to_cart" type="button" data-id="<?= $product->id ?>">
									Add to cart
								</button>
                            </div>
                            <div class="shop-details__details">
                                @foreach ($specifications as $specification)
                                @if ($specification == 'color')
                                <div class="shop-details__sku"><b>{{$specification->key}}: </b>
                                    <label for="{{$specification->value}}"></label>
                                    <input type="radio" id="{{$specification->value}}">
                                    {{-- <span>{{$specification->value}}</span> --}}
                                </div> 
                                @endif
                                <div class="shop-details__sku"><b>{{$specification->key}}: </b>
                                    <span>{{$specification->value}}</span>
                                </div>
                                @endforeach
                                <div class="shop-details__cat"><b>Category: </b><a title="Books" href="#">{{$product->category->name}}</a></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div><!-- .shop-details__wrap -->
            <div class="shop-details__tabs">
                <ul class="shop-details__tablist tabs">
                    <li class="active"><a title="Description" href="#panel_description">Description</a></li>
                    <li><a title="Reviews (2)" href="#panel_review">Rating</a></li>
                </ul>
                <div class="shop-details__panel" id="panel_description">
                   <p>
                    {{$product->ar_description}}
                    </p>
                </b>
                   
                </div>
                
                <div class="shop-details__panel" id="panel_review">
                    
                </div>
            </div><!-- .shop-details__tabs -->
        </div>
    </div><!-- .shop-details -->
    <div class="other-products">
        <div class="container">
            <h2 class="other-products__title title">Other products</h2>
            <div class="other-products__content">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="shop__products__item hover__box">
                            <div class="shop__products__thumb hover__box__thumb">
                                <a title="Taiwan travel guide" href="#"><img src="images/shop/product-06.jpg" alt="Taiwan"></a>
                            </div>
                            <div class="shop__products__info">
                                <h3><a title="Taiwan travel guide" href="#">Taiwan travel guide</a></h3>
                                <span class="shop__products__price">$39</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .other-products__content -->
        </div>
    </div><!-- .other-products -->
</main><!-- .site-main -->
<script src="{{asset('custom/cart.js')}}"></script>
@endsection