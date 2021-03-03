<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class SaveForLaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('add-save-for-later')->remove($id);

        return back()->with('success-message', 'Item succssfully deleted in save for later');
    }

    public function switchToCart($id)
    {
        $item = Cart::instance('add-save-for-later')->get($id);

        Cart::instance('add-save-for-later')->remove($id);

        $double = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });
        if ($double->isNotEmpty()) {
            return redirect()->route('cart-page')->with('success-message', 'Item is already in cart');
        }
        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');
        return redirect()->route('cart-page')->with('success-message', 'Item saved in cart ');
    }
}
