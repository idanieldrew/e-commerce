@extends('wayshop.layouts.master')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Product Detail</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div>
                        <div>
                            <div><img class="main-image d-block w-100"
                                    src="{{ asset('front-assets/images/instagram-img-08.jpg') }}" alt="First slide">
                            </div>
                        </div>
                        <div style="display: grid; grid-template-columns: repeat(3,1fr)">
                            <div class="products-images" style="display: flex; flex-wrap: nowrap;cursor: pointer">
                                <img class="products-images"
                                    style="display: inline-block;width: 150px;padding: 2px 3px;border-color: transparent"
                                    src="{{ asset('storage/' . $product->image) }}">
                            </div>
                            @if ($product->images > 0)
                                @foreach (json_decode($product->images) as $image)
                                    <div class="products-images" style="display: flex; flex-wrap: nowrap;cursor: pointer">
                                        <img style="display: inline-block;width: 150px;padding: 2px 3px"
                                            src="{{ asset('storage/' . $image) }}">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{ $product->name }}</h2>
                        <h5>{{ $product->price }}</h5>
                        <p class="available-stock"><span> More than {{ $product->quantity }} available / <a href="#">8
                                    sold </a></span>
                        <p>
                        <h4>Short Description:</h4>
                        <p>{!! $product->description !!}</p>
                        <ul>
                            <li>
                                <div class="form-group size-st">
                                    <label class="size-label">Size</label>
                                    <select id="basic" class="selectpicker show-tick form-control">
                                        <option value="0">Size</option>
                                        <option value="0">S</option>
                                        <option value="1">M</option>
                                        <option value="1">L</option>
                                        <option value="1">XL</option>
                                        <option value="1">XXL</option>
                                        <option value="1">3XL</option>
                                        <option value="1">4XL</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="form-group quantity-box">
                                    <label class="control-label">Quantity</label>
                                    <input class="form-control" value="0" min="0" max="20" type="number">
                                </div>
                            </li>
                        </ul>

                        <div class="price-box-bar">
                            <div class="cart-and-bay-btn">
                                {{-- <a class="btn hvr-hover" data-fancybox-close="" href="#">Buy New</a> --}}
                                <form action="{{ route('cart.index') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    {{-- <input type="hidden" name="quantity" value="{{ $product->quantity }}"> --}}
                                    <button type="submit" class="btn btn-primary btn hover">Add to cart</button>
                                </form>
                            </div>
                        </div>

                        <div class="add-to-btn">
                            <div class="add-comp">
                                <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>
                                <a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt"></i> Add to Compare</a>
                            </div>
                            <div class="share-bar">
                                <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        @foreach ($mightAlsoLike as $p)
                            <div class="item">
                                <div class="products-single fix">
                                    <div class="box-img-hover">
                                        <img src="{{ asset('front-assets/images/instagram-img-08.jpg') }}"
                                            class="img-fluid" alt="Image">
                                        <div class="mask-icon">
                                            <ul>
                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                                            class="fas fa-eye"></i></a></li>
                                                <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                        title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                        title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                            <a class="cart" href="{{ route('special-product', $p->id) }}">Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="why-text">
                                        <h4>{{ $p->name }}</h4>
                                        <h5>{{ $p->price }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->


    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

@endsection
@section('script')
    <script>
        let mainImage = document.querySelector(".main-image");
        let productsImages = document.querySelectorAll(".products-images");

        productsImages.forEach((e) => e.addEventListener('click', toMain));


        function toMain() {
            mainImage.src = this.querySelector('img').src;
        }

    </script>
@endsection
