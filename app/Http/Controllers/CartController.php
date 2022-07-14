<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        Cart::add(
            $product->product_id,
            $product->product_name,
            $request->input('quantity'),
            $product->product_price
        );
        return redirect()->route('welcome')->with('msg', 'Product toegevoegd aan mandje');
    }
    public function update(Request $request, $rowId)
    {

        // dd(Cart::content());
        // dd($request->all());

        $row = Cart::get($rowId);

        Cart::update($rowId, $row->qty + 1);
        return back();
    }

    public function remove(Request $request, $rowId)
    {
        Cart::remove($rowId);
        //dd(Cart::content());
        return redirect()->route('welcome')->with('success', 'Product verwijderd');
    }

    public function lessen(Request $request, $rowId)
    {

        // dd(Cart::content());
        // dd($request->all());

        $row = Cart::get($rowId);

        Cart::update($rowId, $row->qty - 1);
        return back();
    }
}
