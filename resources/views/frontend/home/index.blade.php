@extends('layouts.frontend')
@section('title', 'Home')
@section('content')

<section class="featured-home featured-wrap">
	<div class="container">
		<div class="title_home offset-item">
			<h2>Categories</h2>
		</div>
		<div class="featured-inner offset-item">
			<div class="item">
				<div class="flex">
					@foreach ($categories as $category)
					<div class="flex-col">
						<div class="cities">
							<div class="cities-inner">
								<a href="{{route('show.item',$category->id)}}" class="hover-img">
									<span class="entry-thumb"><img src="{{$category->image}}"></span>
									{{-- <span class="entry-details">
										<h3>{{$category->name}}</h3>
										<span>{{$category->products_count}} products</span>
									</span> --}}
								</a>
							</div>
							
						</div>
						<div class="item text-center">
							<a href="{{route('show.item',$category->id)}}">
								<span class="title">{{$category->name}}<span class="number text-primary" > {{ $category->products_count}}</span></span>
							</a>
						</div>
					</div>
					@endforeach
					
				</div>
			</div>
		</div><!-- .featured-inner -->
	</div><!-- .container -->
</section>

<!-- .products-wrap -->
<section class="restaurant-wrap">
	<div class="container">
		<div class="title_home offset-item">
			<h2>New Products</h2>
		</div>
		<div class="restaurant-sliders slick-sliders offset-item">
			<div class="restaurant-slider slick-slider" data-item="4" data-itemScroll="4" data-arrows="true" data-dots="true" data-tabletItem="2" data-tabletScroll="2" data-mobileItem="1" data-mobileScroll="1">
				<?php foreach($products as $one){ ?>
				<div class="place-item layout-02 place-hover" data-maps_name="body_spa">
					<div class="place-inner">
						<div class="place-thumb hover-img">
							<a class="entry-thumb" href="single-3.html"><img src="{{asset($one->image)}}" alt=""></a>
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
							<h3 class="place-title"><a href="single-1.html"><?= $one->en_name ?></a></h3>
							{{-- <div class="close-now"><i class="las la-door-closed"></i>Close now</div> --}}
							<div class="entry-bottom">
								
								<div class="place-price">
									<?= $one->price ?> <span>$$</span>
								</div>
								<button class="btn btn-sm btn-primary add_to_cart" type="button" data-id="<?= $one->id ?>">
									<i class="fa fa-plus"></i>
								</button>
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
		
</main><!-- .site-main -->
<script src="{{asset('custom/cart.js')}}"></script>
   
@endsection

