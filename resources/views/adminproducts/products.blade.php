@extends('dashboard')
@section('content')
    <section class="section-margin">
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card text-center card-product">
                            <div class="card-product__img">
                                <img class="card-img" src="{{ "storage/{$product->image}" }}" alt="{{ $product->name }}">
                                <ul class="card-product__imgOverlay">
                                    <li><a href="{{ route('products.show', $product->id) }}"><button>View
                                                Details</button></a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h4 class="card-product__title"><a
                                        href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h4>
                                <p class="card-product__price">${{ $product->price }}</p>
                                <p class="card-product__description">{{ $product->description }}</p>

                                <!-- أزرار الموافقة والرفض -->
                                <div class="admin-actions">
                                    <form action="{{ route('admin.products.approve', $product->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Approval</button>
                                    </form>
                                    <form action="{{ route('admin.products.reject', $product->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">rejection</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
