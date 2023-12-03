<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(15);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productTypes = ProductType::all();
        return view('products.create', compact('productTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_type' => 'required',
            'product_name' => 'required',
            'product_weight' => 'required|numeric',
            'product_price' => 'required|integer|min:0',
        ]);

        $product = new Product();
        $product->product_type_id = $request->product_type;
        $product->name = $request->product_name;
        $product->weight = $request->product_weight;
        $product->price = $request->product_price;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $productTypes = ProductType::all();
        return view('products.edit', compact('product', 'productTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_type' => 'required',
            'product_name' => 'required',
            'product_weight' => 'required|numeric|min:0',
            'product_price' => 'required|integer|min:0',
        ]);

        $product->product_type_id = $request->product_type;
        $product->name = $request->product_name;
        $product->price = $request->product_weight;
        $product->weight = $request->product_price;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->stock_histories()->delete();
        $product->warehouse_items()->delete();
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }

    public function getTotalProduct()
    {
        $totalProduct = Product::all()->count();

        return $totalProduct;
    }
}
