<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product toegevoegd in db');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index')
            ->with('success', 'Product geupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product verwijderd');
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');
        $key = trim($request->get('q'));
        // Search in the title and body columns from the posts table
        $products = Product::query()
            ->where('product_name', 'LIKE', "%{$key}%")
            ->orWhere('product_description', 'LIKE', "%{$key}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('search', ['products' => $products]);
    }
    public function welcome()
    {
        $products = Product::all();
        $cart = Cart::content();

        return view('welcome', compact('products', 'cart'));
    }
    public function nintendo()
    {
        $products = Product::where('category_id', 1)->get();
        $cart = Cart::content();

        return view('gameboy', compact('products', 'cart'));
    }
    public function sega()
    {
        $products = Product::where('category_id', 2)->get();
        $cart = Cart::content();

        return view('products.sega', compact('products', 'cart'));
    }

    public function playstation()
    {
        $products = Product::where('category_id', 3)->get();
        $cart = Cart::content();

        return view('products.playstation', compact('products', 'cart'));
    }

    public function xbox()
    {
        $products = Product::where('category_id', 4)->get();
        $cart = Cart::content();

        return view('products.xbox', compact('products', 'cart'));
    }

    public function figurines()
    {
        $products = Product::where('category_id', 6)->get();
        $cart = Cart::content();

        return view('products.figurines', compact('products', 'cart'));
    }
}
