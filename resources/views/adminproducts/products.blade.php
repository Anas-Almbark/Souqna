@extends('dashboard')
@section('content')
<section class="section-margin">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>User</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                            </td>
                            <td>{{ $product->description }}</td>
                            <td>${{ $product->price }}</td>
                            <td>{{ $product->status }}</td>
                            <td>{{ optional($product->user)->name ?? $product->user_id }}</td>
                            <td>{{ $product->created_at->format('Y-m-d H:i') }}</td>
                            <td>{{ $product->updated_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.products.approve', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Approval</button>
                                </form>
                                <form action="{{ route('admin.products.reject', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Rejection</button>
                                </form>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info text-white rounded-pill px-4 rounded mt-3 btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
