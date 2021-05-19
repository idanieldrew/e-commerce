<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Faades\App\Repository\Posts;

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
        //count rel
        // $categories = Category::where('id', 4)->with('products')->get()->sortBy(function ($category) {
        //     dd($category->products->count());
        // });
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categories = Category::all();
            $categoryName = Category::where('slug', request()->category)->first()->name;
        } else {
            $products = Product::take(6)->where('featured', true);
            $categories = Category::all();
            $categoryName = 'feacher';
        }
        if (request()->sort == 'low_hight') {
            $products = $products->orderBy('price')->get();
        } elseif (request()->sort == 'hight_low') {
            $products = $products->orderBy('price', 'desc')->get();
        } else {
            $products = $products->get();
        }
         return view('wayshop.shop', compact('products', 'categories', 'categoryName'));

        // return response()->json([$products, $categories, $categoryName]);
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
        session()->put('quantity', $product->quantity);
        $mightAlsoLike = Product::where('id', '!=', $id)->take(5)->inRandomOrder()->get();

        return view('wayshop.product', compact(['product'], ['mightAlsoLike']));
    }

    /**/
    public function search()
    {
        return view('wayshop.search');
    }

    public function searches(Request $request)
    {
        // $query =  $request->input('query');

        $products = Product::where('featured', true)->where('name', 'LIKE', "%" . $request->keyword . "%")->orWhere('details', 'like', "%" . $request->keyword . "%")->orWhere('description', 'like', "%" . $request->keyword . "%")->orWhere('price', 'LIKE', "%" . $request->keyword . "%")->get();

        return response()->json($products);
    }
}
