<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(Product $product)
    {

        $products = $product->where('on_sale', true)->paginate(16);
        // dump($products);
        return view('products.index', compact('products'));
    }
}
