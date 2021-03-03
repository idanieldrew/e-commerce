<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::takeProduc()->get();

        return view('wayshop.cart', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $double = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if ($double->isNotEmpty()) {

            return redirect()->route('cart-page')->with('success-message', 'Item is already in  your cart.');

        }
        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');

        return redirect()->route('cart-page')->with('success-message', 'this product saved is succssfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('hhhhh');
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', collect(['Quantity must be between 1 and 5.']));
            return response()->json(['success' => false], 400);
        }

        if ($request->quantity > $request->productQuantity) {
            session()->flash('errors', collect(['We currently do not have enough items in stock.']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success-message', 'this product deleted is successfully.');
    }

    /**
     * @param $id
     */
    public function switchToSaveForLater($id)
    {
        $item = Cart::get($id);


        Cart::remove($id);

        $double = Cart::instance('add-save-for-later')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });
        if ($double->isNotEmpty()) {
                return redirect()->route('cart-page')->with('success-message', 'Item is already in saved for later');
            }
            Cart::instance('add-save-for-later')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');
            return redirect()->route('cart-page')->with('success-message', 'Item saved in save for later');
    }
}