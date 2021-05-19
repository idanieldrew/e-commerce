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

    @if (\Illuminate\Support\Facades\Session::has('success-message'))
        <div class="alert alert-success small" style="text-align: center">
            {{ \Illuminate\Support\Facades\Session::get('success-message') }}
        </div>
    @endif
    @if ($errors->count())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <ul>
                    <li>{{ $error }}</li>
                </ul>
            @endforeach
        </div>
    @endif
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
                            @foreach (\Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
                                <tbody>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                            <img class="img-fluid"
                                                src="{{ asset('front-assets/images/instagram-img-01.jpg') }}" alt="" />
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                            {{ $item->name }}
                                        </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>{{ $item->price }}</p>
                                        <p>{{ $item->quantity }}</p>
                                    </td>
                                    <td>
                                        <div>
                                            <select class="quantity" data-id="{{ $item->rowId }}" name="quantity">
                                                @for ($i = 1; $i < 5 + 1; $i++)
                                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        {{-- <form action="{{ route('cart.update', $item->rowId) }}" method="post">
                                            @csrf
                                            <div>
                                                <select class="quantity" onchange="location = this.value">
                                                    @for ($i = 1; $i < 5 + 1; $i++)
                                                    <button type="submit">
                                                            <option {{ $item->qty == $i ? 'selected' : '' }}>
                                                                {{ $i }}</option>
                                                            </button>
                                                        @endfor
                                                    </select>
                                            </div>
                                        </form> --}}
                                    </td>
                                    <td class="total-pr">
                                        <p>{{ $item->price * $qua }}</p>
                                    </td>
                                    <td class="remove-pr">
                                        <form action="{{ route('cart-destroy', $item->rowId) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('cart.SaveForLater', $item->rowId) }}" method="post">
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
                    <form action="{{ route('coupon.store') }}" method="POST">
                        @csrf
                        <div class="coupon-box">
                            <div class="input-group input-group-sm">
                                <input class="form-control" name="couponCode" placeholder="Enter your coupon code"
                                    aria-label="Coupon code" type="text">
                                <div class="input-group-append">
                                    <button class="btn btn-theme" type="submit">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <a href="{{ route('shop-page') }}"><input value="Update Cart" type="submit"></a>
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
                            <div class="ml-auto font-weight-bold">{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}
                            </div>
                        </div>
                        {{-- <div class="d-flex">
                            <h4>Tax(15%)</h4>
                            <div class="ml-auto font-weight-bold">{{ \Gloudemans\Shoppingcart\Facades\Cart::tax() }}
                            </div>
                        </div> --}}
                        {{-- <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free</div>
                        </div> --}}
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
            @if (\Gloudemans\Shoppingcart\Facades\Cart::instance('add-save-for-later')->count() > 0)
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
                                @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('add-save-for-later')->content() as $item)
                                    <tbody>
                                        <tr>
                                            <td class="thumbnail-img">
                                                <a href="#">
                                                    <img class="img-fluid"
                                                        src="{{ asset('front-assets/images/instagram-img-01.jpg') }}"
                                                        alt="" />
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
                                                <a href="{{ route('SaveForLater.destroy', $item->rowId) }}"
                                                    onclick="deleteProduct(event)">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                                <form action="{{ route('SaveForLater.destroy', $item->rowId) }}"
                                                    id="delete-{{ $user->rowId }}">
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <form action="{{ route('SaveForLater.switchToCart', $item->rowId) }}"
                                                    method="post">
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
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function() {
            const classname = document.querySelectorAll('.quantity');
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    // const productQuantity = element.getAttribute('data-productQuantity')
                    axios.patch(`/cart/${id}`, {
                            quantity: this.value,
                            // productQuantity: this.productQuantity
                        })
                        .then(function(response) {
                            console.log(response)
                            window.location.href = '{{ route('cart.index') }}'
                        })
                        .catch(function(error) {
                            console.log(error)
                            // window.location.href = '{{ route('cart.index') }}'
                        });
                })
            })
        })();

    </script>
@endsection
