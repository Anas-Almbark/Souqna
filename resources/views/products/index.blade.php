@extends('layout')
@section('content')
<section class="blog-banner-area" id="blog">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Our Products</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="section-margin">
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        @if($product->photos->count() > 0)
                        <img class="card-img" src="{{ asset('storage/' . $product->photos[0]->url) }}" alt="{{ $product->name }}">
                        @endif
                        <ul class="card-product__imgOverlay">
                            <li><a href="{{ route('products.show', $product->id) }}"><button>View Details</button></a></li>
                            <li><button>Add to Cart</button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h4 class="card-product__title"><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h4>
                        <p class="card-product__price">${{ $product->price }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection 