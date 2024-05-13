<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('inicio', compact('products'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = Session::get('cart', []);
        $cart[] = $product;
        Session::put('cart', $cart);
        return redirect()->route('carrito')->with('success', 'Producto agregado al carrito');
    }
}
