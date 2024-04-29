@extends('layouts.frontend')
@section('title', 'Category')
@section('content')
<div class="shop">
    <div class="container">
        <div class="shop__meta">
            <div class="shop__results">Showing all Products for this category results</div><!-- .shop__results -->
            <div class="shop__order site__order">
                
                <div class="shop__sort site__sort">
                    <div class="sorting">
                        <label>Sort By</label>
                        <select class="form-control" name="sort_by" onchange="window.location.href=this.value">
                            <option value="{{ route('show.item', ['category' => $category->id, 'sort_by' => 'name', 'order' => 'asc']) }}" {{ $sortBy == 'name' && $order == 'asc' ? 'selected' : '' }}>Name (A-Z)</option>
                            <option value="{{ route('show.item', ['category' => $category->id, 'sort_by' => 'name', 'order' => 'desc']) }}" {{ $sortBy == 'name' && $order == 'desc' ? 'selected' : '' }}>Name (Z-A)</option>
                            <option value="{{ route('show.item', ['category' => $category->id, 'sort_by' => 'created_at', 'order' => 'asc']) }}" {{ $sortBy == 'created_at' && $order == 'asc' ? 'selected' : '' }}>Date Asc</option>
                            <option value="{{ route('show.item', ['category' => $category->id, 'sort_by' => 'created_at', 'order' => 'desc']) }}" {{ $sortBy == 'created_at' && $order == 'desc' ? 'selected' : '' }}>Date Desc</option>
                            <option value="{{ route('show.item', ['category' => $category->id, 'sort_by' => 'price', 'order' => 'asc']) }}" {{ $sortBy == 'price' && $order == 'asc' ? 'selected' : '' }}>Price (Low to High)</option>
                            <option value="{{ route('show.item', ['category' => $category->id, 'sort_by' => 'price', 'order' => 'desc']) }}" {{ $sortBy == 'price' && $order == 'desc' ? 'selected' : '' }}>Price (High to Low)</option>
                        </select>
                    </div>
                </div>
                <!-- .shop__sort -->
            </div><!-- .shop__order -->
        </div><!-- .shop__meta -->
        <div class="related-post">
            <h2>Related Products</h2>
            <div class="related-grid columns-3">
                @foreach ($items as $item)
                <article class="hover__box post">
                    <div class="post__thumb hover__box__thumb">
                        <a title="{{$item->name}}" href="{{route('product.details',$item->id)}}"><img src="{{$item->image}}" style="width: 300px; height:300px"  ></a>
                    </div>
                    <div class="post__info">
                        <ul class="post__category">
                            <li><a title="Tips & Tricks" href="{{route('product.details',$item->id)}}">{{$item->name}}</a></li>
                        </ul>
                        <h3 class="post__title"><a title="{{$item->name}}" href="{{route('product.details',$item->id)}}">{{$item->price}} $</a></h3>
                    </div>
                </article>
                @endforeach 
            </div>
        </div>
        {{ $items->links('pagination::simple-default') }}	

@endsection