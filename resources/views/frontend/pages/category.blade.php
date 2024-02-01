@extends('layouts.frontend')
@section('title', 'All Categories')
@section('content')

<main id="main" class="site-main">
    <div class="page-title page-title--small page-title--blog align-left" style="background-image: url({{asset("frontend/images/bg/banner-1.jpg")}});">
        <div class="container">
            <div class="page-title__content">
                <h1 class="page-title__name"></h1>
                <p class="page-title__slogan"></p>
            </div>
        </div>	
    </div><!-- .page-title -->
    <div class="page-content isotope">
        <div class="container">
            <div class="isotope__nav">
                <ul>
                    <li><a title="All" href="#" class="active" data-filter="*">All Categories {{$items->count()}}</a></li>
                </ul>
            </div><!-- .isotope__nav -->
            <div class="isotope__grid post-grid columns-3">
                @foreach ($items as $item)
                <article class="hover__box isotope__grid__item post beaches">
                    <div class="post__thumb hover__box__thumb">
                        <a href="{{route('product.details',$item->id)}}">
                            <img src="{{$item->image}}">
                        </a>
                    </div>
                    <div class="post__info">
                        <ul class="post__category">
                            <li><a title="{{$item->ar_name}}" href="{{route('product.details',$item->id)}}">{{$item->ar_name}}</a></li>
                        </ul>
                        <h3 class="post__title" title="{{$item->ar_description}}"><a href="{{route('product.details',$item->id)}}">{{$item->ar_description}}</a></h3>
                    </div>
                </article> 
                @endforeach
                
                
            </div><!-- .isotope__grid -->
            <div class="pagination">
                <div class="pagination__numbers">
                    <span>1</span>
                    <a title="2" href="#">2</a>
                    <a title="Next" href="#">
                        <i class="la la-angle-right"></i>
                    </a>
                </div>
            </div><!-- .pagination -->
        </div>
    </div>
</main><!-- .site-main -->

@endsection