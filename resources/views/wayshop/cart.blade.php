@extends('wayshop.layouts.master')
@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    @if(\Illuminate\Support\Facades\Session::has('success-message'))
        <div class="alert alert-success small" style="text-align: center">
            {{ \Illuminate\Support\Facades\Session::get('success-message') }}
        </div>
    @endif
    <div>
        @if(count($errors) > 0)
            @foreach($errors as $error)
                <ul>
                    <li>{{ $error }}</li>
                </ul>
            @endforeach
        @endif
    </div>
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
                                <tbody>
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                            <img class="img-fluid"
                                                 src="{{ asset('front-assets/images/instagram-img-01.jpg') }}" alt=""/>
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                            {{ $item->name }}
                                        </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>{{ $item->price }}</p>
                                    </td>
                                    <td class="quantity-box">
                                        <div>
                                            <select class="quantity" data-id="{{ $item->rowId }}">
                                                @for ($i = 1; $i < 5 + 1 ; $i++)
                                                    <option {{ $item->qty == $i ? 'selected'  : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </td>
                                    <td class="total-pr">
                                        <p>{{ $item->subtotal }}</p>
                                    </td>
                                    <td class="remove-pr">
                                        <form action="{{ route('cart-destroy',$item->rowId) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('cart.SaveForLater',$item->rowId) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-warning">
                                                Save for later
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code"
                                   type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <input value="Update Cart" type="submit">
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div
                                class="ml-auto font-weight-bold">{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</div>
                        </div>
                        <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold">0</div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold">0</div>
                        </div>
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div
                                class="ml-auto font-weight-bold">{{ \Gloudemans\Shoppingcart\Facades\Cart::tax() }}</div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free</div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5">{{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}</div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="{{ route('checkout.index') }}"
                                                           class="ml-auto btn hvr-hover">Checkout</a></div>
            </div>
            @if(\Gloudemans\Shoppingcart\Facades\Cart::instance('add-save-for-later')->count() > 0)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-main table-responsive">
                            <h3>Save for later</h3>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                                </thead>
                                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('add-save-for-later')->content() as $item)
                                    <tbody>
                                    <tr>
                                        <td class="thumbnail-img">
                                            <a href="#">
                                                <img class="img-fluid"
                                                     src="{{ asset('front-assets/images/instagram-img-01.jpg') }}"
                                                     alt=""/>
                                            </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="#">
                                                {{ $item->name }}
                                            </a>
                                        </td>
                                        <td class="price-pr">
                                            <p>{{ $item->price }}</p>
                                        </td>
                                        <td class="quantity-box"><input type="number" size="4" value="1" min="0"
                                                                        step="1" class="c-input-text qty text"></td>
                                        <td class="total-pr">
                                            <p>{{ $item->price }}</p>
                                        </td>
                                        <td class="remove-pr">
                                            <form action="{{ route('SaveForLater.destroy',$item->rowId) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('SaveForLater.switchToCart',$item->rowId) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-warning">
                                                    Save in Cart
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
    <!-- End Cart -->

@endsection
@section('sc')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    (function(){
        const className = document.querySelectorAll('.quantity')

        Array.from(className).forEach(function(element) {
            element.addEventListener('change', function() {
                const id = element.getAttribute('data-id')

                axios.patch(`/cart/${id}`, {
                    quantity: this.value
                })
                    .then(function (response) {
                        window.location.href = '{{ route('cart-page',) }}'
                    })
                    .catch(function (error) {
                        window.location.href = '{{ route('cart-page',) }}'
                    });
            })
        })
    })();
</script>

@endsection
