@extends('layout')
@section('content')
<section class="blog-banner-area" id="blog">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Shop Single</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route("home.index")}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Shop Single</li>
        </ol>
      </nav>
            </div>
        </div>
</div>
</section>
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="owl-carousel owl-theme s_Product_carousel">
                    <div class="single-prd-item">
                        @if($product->photos && count($product->photos) > 0)
                            <img class="img-fluid" src="storage/{{ $product->photos[0]->url }}" alt="{{ $product->name }}">
                        @else
                            <img class="img-fluid" src="/img/default-product.jpg" alt="No image available">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $product->name }}</h3>
                    <h2>{{ $product->price }}</h2>
                    <ul class="list">
                        <li><a class="active" href="#"><span>Categories</span> : 
                            @foreach($product->categories as $category)
                                {{ $category->name }}{{ !$loop->last ? ', ' : '' }}
                            @endforeach
                        </a></li>
                        <li><a href="#"><span>Availibility</span> : {{ $product->status }}</a></li>
                    </ul>
                    <p>{{ $product->description }}</p>
                    <div class="product_count">
                        <a class="button primary-btn" href="#">Add to Cart</a>
                        <form method="post" action="{{ route('products.destroy',$product->id) }}">
                            @method('DELETE')
                            @csrf
                            <button class="button danger-btn" type="submit">delete</button>
                        </form>
                        

                    </div>
                    <div class="card_area d-flex align-items-center">
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
