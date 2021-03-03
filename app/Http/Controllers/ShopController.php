<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::take(12)->inRandomOrder()->get();

        return view('wayshop.shop',compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return void
     */
    public function show($id)
    {
        $product = Product::where('id',$id)->findOrFail($id);
        $mightAlsoLike = Product::where('id','!=',$id)->take(5)->inRandomOrder()->get();

        return view('wayshop.product',compact(['product'],['mightAlsoLike']));
    }

}
