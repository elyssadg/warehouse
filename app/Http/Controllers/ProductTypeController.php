<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productTypes = ProductType::paginate(5);;

        return view('product-types.index', compact('productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_type_name' => 'required|string|max:255',
        ]);

        $productType = new ProductType();
        $productType->name = $request->input('product_type_name');
        $productType->save();

        return redirect()->route('product-type.index')->with('success', 'Product type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductType $productType)
    {
        $products = $productType->products()->paginate(15);
        return view('product-types.show', compact('productType', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductType $productType)
    {
        return view('product-types.edit', compact('productType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductType $productType)
    {
        $request->validate([
            'product_type_name' => 'required|string|max:255',
        ]);

        $productType->name = $request->input('product_type_name');
        $productType->save();

        return redirect()->route('product-type.index')->with('success', 'Product type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $productType)
    {
        $productType->products->each(function ($product) {
            $product->stock_histories()->delete();
            $product->warehouse_items()->delete();
            $product->delete();
        });
        $productType->delete();

        return redirect()->route('product-type.index')->with('success', 'Product type deleted successfully.');
    }

    public function getTotalType()
    {
        $totalProductType = ProductType::all()->count();
        return $totalProductType;
    }
}
