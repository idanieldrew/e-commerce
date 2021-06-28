<?php

namespace App\Http\Controllers;

use App\Jobs\OrderSendMailJob;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Order;
use App\OrderProduct;
use Illuminate\Support\Facades\Bus;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wayshop.checkout')->with([
            'discount' => $this->getValues()->get('discount'),
            'newSubtotal' => $this->getValues()->get('newSubtotal'),
            'newTax' => $this->getValues()->get('newTax'),
            'newTotal' => $this->getValues()->get('newTotal'),

        ]);
    }
    public function store(Request $request)
    {
        $this->addDataToOrders($request);
    }

    protected function addDataToOrders(Request $request)
    {
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->postalcode,
            'billing_phone' => $request->phone,
            'billing_name_on_card' => $request->name_on_card,
            'billing_discount' => $this->getValues()->get('discount'),
            'billing_discount_code' =>  $this->getValues()->get('code'),
            'billing_subtotal' => $this->getValues()->get('newSubtotal'),
            'billing_tax' =>  $this->getValues()->get('newTax'),
            'billing_total' =>  12345,
            'error' => 'error',
        ]);

        foreach (Cart::content() as $value) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $value->id,
                'quantity' => 1
            ]);
        }
        Bus::chain([
            new OrderSendMailJob($order->billing_email),
            //some order  
        ])->dispatch();
        // dispatch(new OrderSendMailJob($order->billing_email));
    }

    private function getValues()
    {
        //tax = 15
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = Cart::subtotal() - $discount;
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal * $newTax;

        return collect([
            'tax' => $tax,
            'discount' => $discount,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal,
        ]);
    }
}
