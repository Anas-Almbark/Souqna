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
@if(session('success'))
<div class="alert alert-success text-center my-3 p-3 rounded-lg bg-green-100 text-green-700">
    {{ session('success') }}
</div>
@endif
@if(session('success'))
    <div class="alert alert-success text-center my-3 p-3 rounded-lg bg-green-100 text-green-700">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger text-center my-3 p-3 rounded-lg bg-red-100 text-red-700">
        {{ session('error') }}
    </div>
@endif
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="owl-carousel owl-theme s_Product_carousel">
                    <div class="single-prd-item">
                        @if ($product->photos->count() > 0)
                        <img class="card-img img-fluid rounded"
                            src="{{ $product->photos[0]->url}}" alt="{{ $product->name }}"
                            style="object-fit: cover; width: 100%; height: 300px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    @else
                        <img class="img-fluid" src="{{ asset('img/no-image.png') }}" alt="No image available">
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
                     
                        <form action="{{ route('send.purchase.request') }}" method="POST" class="mt-3">
                            @csrf
                            <input type="hidden" name="buyer" value="{{ auth()->id() }}">
                            <input type="hidden" name="seller" value="{{ $product->user_id }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="mb-3">
                                <input type="number" name="offer_ratio" 
                                    class="form-control border rounded p-2 w-full" 
                                    placeholder="Enter offer percentage" 
                                    min="0" 
                                    value="0">
                            </div>
                            <button type="submit" style="background-color: blue; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; transition: 0.3s;">
                                Send Purchase Request
                            </button>
                        </form>
                    </div>
                    
                        

<script>
    document.getElementById("buy-button").addEventListener("click", function () {
        let productId = this.getAttribute("data-product-id");

        fetch('/send-purchase-request', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({
        buyer_id: 1,       // عوض هذا بالـ ID الفعلي للمشتري
        product_id: 5,     // ID المنتج المطلوب
        offer_ratio: 10    // نسبة العرض أو السعر
    })
})

</script>
                        

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

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                 aria-selected="false">Specification</a>
            </li>
         
          
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes
                    and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in
                    Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to
                    London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an
                    officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a
                    job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when
                    showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a
                    child’s painting set for her birthday and it was with this that she produced her first significant work, a
                    half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly
                    named ‘Hangover’ by Beryl’s husband and</p>
                <p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing
                    more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and
                    the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for
                    more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a
                    streamlined plan of cooking that is more efficient for one person creating less</p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Width</h5>
                                </td>
                                <td>
                                    <h5>128mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Height</h5>
                                </td>
                                <td>
                                    <h5>508mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Depth</h5>
                                </td>
                                <td>
                                    <h5>85mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Weight</h5>
                                </td>
                                <td>
                                    <h5>52gm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Quality checking</h5>
                                </td>
                                <td>
                                    <h5>yes</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Freshness Duration</h5>
                                </td>
                                <td>
                                    <h5>03days</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>When packeting</h5>
                                </td>
                                <td>
                                    <h5>Without touch of hand</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Each Box contains</h5>
                                </td>
                                <td>
                                    <h5>60pcs</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
       
                
</section>
<!--================End Product Description Area =================-->
<!--================ Start related Product area =================-->  
<section class="related-product-area section-margin--small mt-0">
    <div class="container">
        <div class="section-intro pb-60px">
    <p>Popular Item in the market</p>
    <h2>Top <span class="section-intro__style">Product</span></h2>
  </div>
        <div class="row mt-30">
    <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
      <div class="single-search-product-wrapper">
        <div class="single-search-product d-flex">
          <a href="#"><img src="img/product/product-sm-1.png" alt=""></a>
          <div class="desc">
              <a href="#" class="title">Gray Coffee Cup</a>
              <div class="price">$170.00</div>
          </div>
        </div>
        <div class="single-search-product d-flex">
          <a href="#"><img src="img/product/product-sm-2.png" alt=""></a>
          <div class="desc">
            <a href="#" class="title">Gray Coffee Cup</a>
            <div class="price">$170.00</div>
          </div>
        </div>
        <div class="single-search-product d-flex">
          <a href="#"><img src="img/product/product-sm-3.png" alt=""></a>
          <div class="desc">
            <a href="#" class="title">Gray Coffee Cup</a>
            <div class="price">$170.00</div>
          </div>
        </div>
      </div>
    </div>

 
   

@endsection
