@extends('wayshop.layouts.master')
@section('content')
    <div>
        @if (count($errors) > 0)
            @foreach ($errors as $error)
                <ul>
                    <li>{{ $error }}</li>
                </ul>
            @endforeach
        @endif
    </div>
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                        <li class="breadcrumb-item active">{{ $categoryName }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                         <div class="filter-sidebar-left">
                     <div class="title-left">
                        <h3>Categories</h3>
                    </div>
                    <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men"
                        data-children=".sub-men">
                        <div class="list-group-collapse sub-men">
                            <a class="list-group-item list-group-item-action" href="#sub-men1"
                                data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">Clothing
                                <small class="text-muted">(100)</small>
                            </a>
                            <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                <div class="list-group">
                                    @foreach ($categories as $category)
                                        <a href="{{ route('shop-page', ['category' => $category->slug]) }}"
                                            class="list-group-item list-group-item-action {{ setActiveCategories($category->slug) }} ">{{ $category->name }}
                                            <small class="text-muted">(50)</small></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                        {{-- <div class="list-group-collapse sub-men">
                                <a class="list-group-item list-group-item-action" href="#sub-men2"
                                    data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2">Footwear
                                    <small class="text-muted">(50)</small>
                                </a>
                                <div class="collapse" id="sub-men2" data-parent="#list-group-men">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action">Sports Shoes <small
                                                class="text-muted">(10)</small></a>
                                        <a href="#" class="list-group-item list-group-item-action">Sneakers <small
                                                class="text-muted">(20)</small></a>
                                        <a href="#" class="list-group-item list-group-item-action">Formal Shoes <small
                                                class="text-muted">(20)</small></a>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="list-group-item list-group-item-action"> Men <small
                                    class="text-muted">(150) </small></a>
                            <a href="#" class="list-group-item list-group-item-action">Accessories <small
                                    class="text-muted">(11)</small></a>
                            <a href="#" class="list-group-item list-group-item-action">Bags <small
                                    class="text-muted">(22)</small></a> --}}

                        <div class="filter-price-left">
                            <div class="title-left">
                                <h3>Price</h3>
                            </div>
                            <div class="price-box-slider">
                                <div id="slider-range"></div>
                                <p>
                                    <input type="text" id="amount" readonly
                                        style="border:0; color:#fbb714; font-weight:bold;">
                                    <button class="btn hvr-hover" type="submit">Filter</button>
                                </p>
                            </div>
                        </div>
                        <div class="filter-brand-left">
                            <div class="title-left">
                                <h3>Brand</h3>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                {{-- <select>
                            <option>Nothing</option>
                            <option value="1" id="low-to-hight">low to hight</option>
                            <option value="2">High Price ??? High Price</option>
                            <option value="3">Low Price ??? High Price</option>
                            <option value="4">Best Selling</option>
                        </select> --}}
                            </div>
                            <a class="active"
                                href="{{ route('shop-page', ['category' => request()->category, 'sort' => 'low_hight']) }}"
                                id="low-to-hight" onclick="lowTo()">
                                low to hight
                            </a>
                            |
                            <a
                                href="{{ route('shop-page', ['category' => request()->category, 'sort' => 'hight_low']) }}">
                                hight to low
                            </a>
                        </div>
                        <div class="col-12 col-sm-4 text-center text-sm-right">
                            <ul class="nav nav-tabs ml-auto">
                                <li>
                                    <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i
                                            class="fa fa-th"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#list-view" data-toggle="tab"> <i
                                            class="fa fa-list-ul"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="{{ asset('front-assets/images/Desktops.jpg') }}"
                                                        class="img-fluid" alt="Image">
                                                    {{-- <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="Image"> --}}
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="View"><i
                                                                        class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Compare"><i
                                                                        class="fas fa-sync-alt"></i></a>
                                                            </li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right"
                                                                    title="Add to Wishlist"><i
                                                                        class="far fa-heart"></i></a>
                                                            </li>
                                                        </ul>
                                                        <a class="cart"
                                                            href="{{ route('special-product', $product->id) }}">
                                                            details...
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>{{ $product->details }}</h4>
                                                    <h5>{{ $product->price }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div style="text-align: center">
                                {{ $products->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->


    <!-- Start Blog  -->
    <div class="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>latest blog</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="{{ asset('front-assets/images/blog-img.jpg') }}" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Fusce in augue non nisi fringilla</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet
                                    urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc
                                    sed
                                    mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Likes"><i
                                            class="far fa-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Views"><i
                                            class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Comments"><i
                                            class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="{{ asset('front-assets/images/blog-img-01.jpg') }}"
                                alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Fusce in augue non nisi fringilla</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet
                                    urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc
                                    sed
                                    mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Likes"><i
                                            class="far fa-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Views"><i
                                            class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Comments"><i
                                            class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="{{ asset('front-assets/images/blog-img-02.jpg') }}"
                                alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Fusce in augue non nisi fringilla</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet
                                    urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc
                                    sed
                                    mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Likes"><i
                                            class="far fa-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Views"><i
                                            class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Comments"><i
                                            class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection
