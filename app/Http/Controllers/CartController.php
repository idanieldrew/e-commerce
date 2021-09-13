<?php

namespace App\Http\Controllers;

use App\Events\IncompleteCart;
use App\Product;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $qua = session()->get('quantity');
        // $products = Product::takeProduc()->get();

        return view('wayshop.cart', compact('qua'));
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

            return redirect()->route('cart.index')->with('success-message', 'Item is already in  your cart.');
        }
        $cart = Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');

        // $user = User::find(auth()->user())->name;
        // IncompleteCart::dispatch($user);

        return redirect()->route('cart.index')->with('success-message', 'this product saved is succssfully.');
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
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', collect(['Quantity must be between 1 and 5.']));
            return response()->json(['success' => false], 422);
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
            return redirect()->route('cart.index')->with('success-message', 'Item is already in saved for later');
        }
        Cart::instance('add-save-for-later')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');
        return redirect()->route('cart.index')->with('success-message', 'Item saved in save for later');
    }
}
