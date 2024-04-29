@extends('layouts.frontend')
@section('title', 'Show Product')
@section('content')
<main id="main" class="site-main">

    <div class="shop-details">
        <div class="container">
            <ul class="shop-details__breadcrumbs breadcrumbs">
            </ul>
            <div class="shop-details__wrap">
                <div class="row">
                    <div class="col-md-5">
                        <div class="shop-details__thumb">
                            <a href="#"><img style="width: 300px; height:300px" src="{{$product->image}}" alt="France"></a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="shop-details__summary">
                            <h2>{{$product->name}}</h2>
                            
                            <div class="shop-details__review">
                                <span class="rated">
                                    @for($i = 5; $i >= 1; $i--)
                                        @if ($i > $avgRate)
                                        <label class="star-rating-empty" style="color: lightgray;" title="{{$i}} stars">{{$i}} stars</label>
                                        @else
                                        <label class="star-rating-complete" style="color: gold;" title="{{$i}} stars">{{$i}} stars</label>
                                        @endif
                                    @endfor		
                                </span>
                                
                            </div>
                            <div>({{$product->ratings()->count()}} reviews)</div>
                            <div class="shop-details__price" style="color: #5f4fff;">$ {{$product->price}}</div>
                            <div class="shop-details__addcart">
                                
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
                    <li><a title="Description" href="#panel_description">Description</a></li>
                    <li><a title="Review" href="#panel_review">Review</a></li>
                </ul>
                <div class="shop-details__panel" id="panel_description">
                   <p>
                    {{$product->description}}
                    </p>  
                </div>
                <div class="shop-details__panel" id="panel_review">
                    <div class="place__box place__box--reviews entry-comment">
                        <h3 class="place__title--reviews">{{$comments->count()}} Comments</h3>
                        <ul class="place__comments">
                            @foreach ($comments as $comment)
                            <li>
                                <div class="place__author">
                                    <div class="place__author__avatar">
                                        <a title="{{$comment->user->name}}" href="#"><img style="width: 30px;height:30px" src="avatar-content" alt=""></a>
                                    </div>
                                    <div class="place__author__info">
                                        <h4>
                                            <a title="{{$comment->user->name}}" href="#">{{$comment->user->name}}</a>
                                        </h4>
                                        <span class="time">{{$comment->created_at->format('Y-M-d')}}</span>
                                    </div>
                                </div>
                                <div class="place__comments__content">
                                    <p>
                                        {{$comment->comment}}
                                    </p>
                                </div>
                            </li>  
                            @endforeach
                            
                        </ul>
                    </div><!-- .place__box -->

                    @if(!empty($ratings))
                    <div class="container">
                        <div class="row">
                            <div class="col mt-4">
                                    <div class="form-group row">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="col">
                                        <div class="rated">
                                        @for($i = 5; $i >= 1; $i--)
                                        @if ($i > $ratings?->rate)
                                        <label class="star-rating-empty" style="color: lightgray;" title="{{$i}} stars">{{$i}} stars</label>
                                        @else
                                        <label class="star-rating-complete" style="color: gold;" title="{{$i}} stars">{{$i}} stars</label>
                                        @endif
                                        @endfor
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group row mt-4">
                                    <div class="col">
                                        <p>{{ $ratings?->comment }}</p>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="container">
                        <div class="row">
                            <div class="col mt-4">
                                <form class="py-2 px-4" action="{{route('submit-rating')}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                                    @csrf
                                    <p class="font-weight-bold ">Add Review</p>
                                    <div class="form-group row">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="user_id" value="{{auth()->user()?->id}}">
                                    <div class="col">
                                        <div class="rate">
                                            <input type="radio" id="star5" class="rate" name="rate" value="5"/>
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" class="rate" name="rate" value="4"/>
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" class="rate" name="rate" value="3"/>
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" class="rate" name="rate" value="2">
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" class="rate" name="rate" value="1"/>
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group row mt-4">
                                    <div class="col">
                                        <textarea class="form-control" name="comment" rows="5 " placeholder="Comment" maxlength="200"></textarea>
                                    </div>
                                    </div>
                                    <div class="mt-3 text-right">
                                    <button class="btn btn-sm px-3 btn-primary">Submit
                                    </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div><!-- .shop-details -->
    <div class="other-products">
        <div class="container">
            <h2 class="other-products__title title">Other products</h2>
            <div class="other-products__content">
                <div class="row">
                    @foreach ($products as $item)
                    <div class="col-lg-3 col-sm-6">
                        <div class="shop__products__item hover__box">
                            <div class="shop__products__thumb hover__box__thumb">
                                <a title="Taiwan travel guide" href="{{route('product.details',$item->id)}}"><img style="width: 300px; height:300px" src="{{$item->image}}" alt="Taiwan"></a>
                            </div>
                            <div class="shop__products__info">
                                <h3><a title="Taiwan travel guide" href="{{route('product.details',$item->id)}}">{{$item->name}}</a></h3>
                                <span class="shop__products__price">{{$item->price}} $</span>
                            </div>
                        </div>
                    </div>  
                    @endforeach
                    
                </div>
            </div><!-- .other-products__content -->
        </div>
    </div><!-- .other-products -->
</main><!-- .site-main -->
<script src="{{asset('custom/cart.js')}}"></script>
<script>
    $(document).ready(function() {
       
        $('.shop-details__panel').hide();
    
       
        $('#panel_description').show();
        
        $('.shop-details__tablist a').click(function(e) {
            e.preventDefault(); 

            $('.shop-details__panel').hide();
    
            
            var targetPanel = $(this).attr('href');
            $(targetPanel).show();
            

        });
    });
</script>
    
@endsection