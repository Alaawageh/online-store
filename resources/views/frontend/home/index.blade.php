@extends('layouts.frontend')
@section('title', 'Home')
@section('content')
<section class="banner-wrap">
	<div class="flex">
		<div class="banner-left"></div>
		<div class="banner slick-sliders">
			<div class="banner-sliders slick-slider" data-item="1" data-arrows="false" data-dots="true">
				<div class="item"><img src="{{asset('frontend/images/images/s2.jpg')}}" alt="Banner"></div>
				<div class="item"><img src="{{asset('frontend/images/images/s1.jpg')}}" alt="Banner"></div>
				<div class="item"><img src="{{asset('frontend/images/images/s4.jpg')}}" alt="Banner"></div>
			</div>
		</div><!-- .banner -->
	</div>
	<div class="container">
		<div class="banner-content">
			<span class="offset-item">Fashion, Beauty & Lady</span>
			<h1 class="offset-item">With “Ashion”</h1>
			<h4 class="offset-item">you’re always different.</h4>
			<!-- .site-banner__search -->
		</div>
	</div>
</section>

<!-- .products-wrap -->
<section class="restaurant-wrap">
	<div class="container">
		<div class="title_home offset-item">
			<h2>New Products</h2>
			<p>Unique with everything new.</p>
		</div>
		<div class="restaurant-sliders slick-sliders offset-item">
			<div class="restaurant-slider slick-slider" data-item="4" data-itemScroll="4" data-arrows="true" data-dots="true" data-tabletItem="2" data-tabletScroll="2" data-mobileItem="1" data-mobileScroll="1">
				<?php foreach($products as $one){ ?>
				<div class="place-item layout-02 place-hover" data-maps_name="body_spa">
					<div class="place-inner">
						<div class="place-thumb hover-img">
							<a class="entry-thumb" href="{{route('product.details',$one->id)}}"><img src="{{asset($one->image)}}" alt=""></a>
							<a href="#" class="golo-add-to-wishlist btn-add-to-wishlist " data-place-id="185">
								<span class="icon-heart">
									<i class="la la-bookmark large"></i>
								</span>                                    
							</a>       
							<a class="entry-category purple" href="#">
								<i class="las la-shopping-cart"></i><span>Order Now</span>
							</a>
							
						</div>       
						<div class="entry-detail">
							<div class="entry-head">
								
							</div>
							<h3 class="place-title"><a href="{{route('product.details',$one->id)}}"><?= $one->name ?></a></h3>
							{{-- <div class="close-now"><i class="las la-door-closed"></i>Close now</div> --}}
							<div class="entry-bottom">
								
								<div class="place-price">
									<?= $one->price ?> <span>$$</span>
								</div>
								@guest
								@if (Route::has('login'))
								<div  class="popup__user popup__box open-form">
									<a title="Login" class="btn btn-sm btn-primary open-login" href="{{route('login')}}"><i class="fa fa-plus"></i></a>

								</div>
								
								@endif
								@else
								<button class="btn btn-sm btn-primary add_to_cart" type="button" data-id="<?= $one->id ?>">
									<i class="fa fa-plus"></i>
								</button>
								@endguest
									
								
								
							</div>
							
						</div>
					</div>
				</div>
				<?php } ?>
			</div><!-- .restaurant-slider -->
			<div class="place-slider__nav slick-nav">
				<div class="place-slider__prev slick-nav__prev">
					<i class="las la-angle-left"></i>
				</div><!-- .place-slider__prev -->
				<div class="place-slider__next slick-nav__next">		
					<i class="las la-angle-right"></i>
				</div><!-- .place-slider__next -->
			</div><!-- .place-slider__nav -->
		</div><!-- .restaurant-sliders -->
	</div>
</section><!-- .products-wrap -->

<section class="cuisine-wrap section-bg">
	<div class="container">
		<div class="title_home offset-item">
			<h2>Categories</h2>
			<p>Everything you want in one store.!</p>
		</div>
		<div class="cuisine-sliders slick-sliders offset-item">
			<div class="cuisine-slider slick-slider" data-item="5" data-itemScroll="5" data-arrows="true" data-dots="true" data-smallpcItem="4" data-smallpcScroll="4" data-tabletItem="3" data-tabletScroll="3" data-mobileItem="2" data-mobileScroll="2">
				@foreach ($categories as $category)
				<div class="item">
					<a href="{{route('show.item',$category->id)}}" title="{{$category->name}}">
						<span class="hover-img"><img src="{{$category->image}}" alt="{{$category->name}}"></span>
						<span class="title">{{$category->name}}<span class="number">({{$category->products_count}}) products</span></span>
					</a>
				</div>
				@endforeach
			</div><!-- .cuisine-slider -->
			<div class="place-slider__nav slick-nav">
				<div class="place-slider__prev slick-nav__prev">
					<i class="las la-angle-left"></i>
				</div><!-- .place-slider__prev -->
				<div class="place-slider__next slick-nav__next">		
					<i class="las la-angle-right"></i>
				</div><!-- .place-slider__next -->
			</div><!-- .place-slider__nav -->
		</div><!-- .cuisine-sliders -->
	</div><!-- .container -->
</section><!-- .cuisine-wrap -->

<section class="join-wrap" style="background-image: url({{asset('frontend/images/images/s4.jpg')}});">
	<div class="container">
		<div class="join-inner">
			<h2 class="offset-item">Ashion</h2>
			<p class="offset-item">
				Start your journey towards the world of elegance!<br>
				our store portal is your path towards this goal.
				{{-- We stay at the top until you are at the peak of your brilliance..			</p> --}}
		</div>
	</div>
</section>
		
</main><!-- .site-main -->
<script src="{{asset('custom/cart.js')}}"></script>
 


	
@endsection

