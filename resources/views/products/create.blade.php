@extends('layout')
@section('content')
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
      
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Form Validations
                        </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}"
                                            class="breadcrumb-link">home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Form
                                        Validations</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row justify-content-center">
                <!-- ============================================================== -->
                <!-- basic form -->
                <!-- ============================================================== -->
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card mx-auto">
                        <h5 class="card-header">Basic Form</h5>
                        <div class="card-body">
<<<<<<< HEAD
                            <div class="alert alert-info" role="alert">
                                Note: Your product will be reviewed by an administrator before being published.
                            </div>
                            <form action="{{ route('products.store') }}" id="basicform" method="POST" enctype="multipart/form-data">
=======
                            <form action="{{ route('products.store') }}" id="basicform" method="POST"
                                enctype="multipart/form-data">
>>>>>>> 7a6ff9abc715a4755f819937d0f22c306653f7a9
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
                                <div class="form-row w-100">
                                    <div class="form-group col-12">
                                        <label for="inputStatus">Status</label>
                                        <select id="inputStatus" name="status" class="form-control" required>
                                            <option value="">Select Status</option>
                                            <option value="available">Available</option>
                                            <option value="Not available">Not Available</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- هنا يوجد خطأ فني يحتاج الى صيانة --}}
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Categories</label>
                                    <select name="categories[]" multiple class="form-control" id="exampleFormControlSelect2">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- هنا يوجد خطأ فني يحتاج الى صيانة --}}
                                <div class="form-group">
                                    <label for="productImages">Product Images</label>
                                    <input type="file" id="productImages" name="photos[]" class="form-control"
                                        accept="image/*" multiple required enctype="multipart/form-data">
                                    <small class="form-text text-muted">
                                        You can select multiple images for your product (Maximum size: 5MB per image)
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
                <!-- ============================================================== -->
                <!-- end basic form -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
@endsection
