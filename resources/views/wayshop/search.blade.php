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
            <search-res></search-res>
    </div>


    <!-- Start All Title Box -->
{{--
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <p>{{ $products->total() }} found '{{request()->input('query')}}'</p>
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
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                     class="img-fluid" alt="Image">
                                                <div class="mask-icon">
                                                    <ul>
                                                        <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                               title="View"><i class="fas fa-eye"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                               title="Compare"><i class="fas fa-sync-alt"></i></a>
                                                        </li>
                                                        <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                               title="Add to Wishlist"><i
                                                                    class="far fa-heart"></i></a></li>
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
--}}
    <!-- End Shop Page -->


@endsection
