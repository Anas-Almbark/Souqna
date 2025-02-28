@extends('dashboard')
@section('content')
    <section class="section-margin">
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card text-center card-product">
                            <div class="card-product__img">
                                <img class="card-img" src="{{ Storage::url($product->photos->first()->url) }}"
                                    alt="{{ $product->name }}">
                            </div>
                            <div class="card-body">
                                <h4 class="card-product__title"><a
                                        href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h4>
                                <p class="card-product__price">${{ $product->price }}</p>
                                <p class="card-product__description">{{ $product->description }}</p>
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
                                    <a href="{{ route('products.show', $product->id) }}"
                                        class="btn btn-info text-white rounded-pill px-4 rounded mt-3">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
