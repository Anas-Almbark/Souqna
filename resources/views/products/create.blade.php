@extends('layout')
@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12">
                    @include('shared.message')
                    <div class="card mx-auto my-5">
                        <h5 class="card-header"> Add new product </h5>
                        <div class="card-body">
                            <div class="alert alert-info" role="alert">
                                Note: Your product will be reviewed by an administrator before being published.
                            </div>
                            <form action="{{ route('products.store') }}" id="basicform" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input id="inputName" type="text" name="name" data-parsley-trigger="change"
                                        required placeholder="Enter name" autocomplete="off" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">description</label>
                                    <input id="inputDescription" type="text" name="description"
                                        data-parsley-trigger="change" required placeholder="Enter description"
                                        autocomplete="off" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputPrice">Price</label>
                                    <input id="inputPrice" type="text" name="price" placeholder="Price" required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Status</label>
                                    <select id="inputStatus" name="status" class="form-control w-100" required>
                                        <option value="">Select Status</option>
                                        <option value="available">Available</option>
                                        <option value="Not available">Not Available</option>
                                    </select>
                                </div>
                                {{-- هنا يوجد خطأ فني يحتاج الى صيانة --}}
                                <div class="form-group">
                                    <label for="categories">Categories</label>
                                    <select id="categories" name="categories[]" multiple class="form-control w-100">
                                        <option value="electronics">Electronics</option>
                                        <option value="clothing">Clothing</option>
                                        <option value="books">Books</option>
                                        <option value="sports">Sports</option>
                                        <option value="home">Home & Garden</option>
                                        <option value="toys">Toys</option>
                                        <option value="automotive">Automotive</option>
                                        <option value="health">Health & Beauty</option>
                                    </select>
                                </div>
                                {{-- هنا يوجد خطأ فني يحتاج الى صيانة --}}
                                <div class="form-group">
                                    <label for="productImages">Product Images</label>
                                    <input type="file" id="productImages" name="photos[]" class="form-control"
                                        accept="image/*" multiple required enctype="multipart/form-data">
                                    <small class="form-text text-muted">
                                        You can select multiple images for your product (Maximum size: 2MB per image)
                                    </small>
                                </div>

                                <div class="row">
                                    <div class="col pl-0">
                                        <p class="text-right">
                                            <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                            <button class="btn btn-space btn-secondary">Cancel</button>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
