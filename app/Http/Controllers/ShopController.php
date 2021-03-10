<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     * Display a list of category.
     * Display a list of products of category.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->category) 
        {            
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categories = Category::all();
            $categoryName = Category::where('slug', request()->category)->first()->name;
        } 
        else 
        {
            $products = Product::take(6)->where('featured', true);
            $categories = Category::all();
            $categoryName = 'feacher';
        }
        if (request()->sort == 'low_hight')                                 
        {
            $products = $products->orderBy('price')->paginate(9);
        }
        elseif (request()->sort == 'hight_low') 
        {
            $products = $products->orderBy('price','desc')->paginate(9);
        }
        else
        {
            $products = $products->paginate(9);
        }
       
        return view('wayshop.shop', compact('products', 'categories', 'categoryName'));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return void
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->findOrFail($id);
        $mightAlsoLike = Product::where('id', '!=', $id)->take(5)->inRandomOrder()->get();

        return view('wayshop.product', compact(['product'], ['mightAlsoLike']));
    }
}
