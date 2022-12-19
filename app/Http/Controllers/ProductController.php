<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('pages.products.product', compact('products'));
    }

    public function store()
    {
        return view('pages.products.product-create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'unit_price' => 'required',
            'specification' => 'required'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->unit_price = $request->unit_price;
        $product->specification = $request->specification;

        $product->save();
        return redirect()->route('products.index');
    }

    public function show(Request $request)
    {
        $product = Product::find($request->id);

        return view('pages.products.product-detail', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $request->validate([
            'name' => 'required',
            'unit_price' => 'required',
            'specification' => 'required'
        ]);

        $product->name = $request->name;
        $product->unit_price = $request->unit_price;
        $product->specification = $request->specification;

        $product->save();
        return redirect()->route('products.index');
    }
}
