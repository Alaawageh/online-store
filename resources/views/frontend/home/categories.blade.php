@extends('layouts.frontend')
@section('content')
<div class="page-content isotope">
    <div class="container">
        <div class="isotope__nav">
            <ul>
                <li><a title="All" href="{{route('categories')}}" class="active" data-filter=".all">All ({{$categories->count()}})</a></li>

                @foreach ($categories as $category)
                    <li><a title="{{$category->name}}" href="#" data-filter=".{{$category->id}}">{{$category->name}}  </a></li>
                @endforeach
            </ul>
        </div>
       <!-- .isotope__nav -->
        <div class="isotope__grid post-grid columns-4">
            @foreach ($categories as $category)
            <article class="hover__box isotope__grid__item post {{$category->id}}">
                <div class="post__thumb hover__box__thumb">
                    <a title="{{$category->name}}" href="{{route('show.item',$category->id)}}"><img src="{{$category->image}}"></a>
                </div>
                <div class="post__info">
                    <ul class="post__category">
                        <li><a title="{{$category->name}}" href="{{route('show.item',$category->id)}}">{{$category->name}}</a></li>
                    </ul>
                </div>
            </article>
            @endforeach
        </div><!-- .isotope__grid -->
    </div>
</div>
@endsection