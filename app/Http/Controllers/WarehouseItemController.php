<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockHistory;
use App\Models\Warehouse;
use App\Models\WarehouseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $warehouse_id)
    {
        //
        $warehouse = Warehouse::find($warehouse_id);
        $products = Product::leftJoin('warehouse_items', function ($join) use ($warehouse_id) {
            $join->on('products.id', '=', 'warehouse_items.product_id')
                ->where('warehouse_items.warehouse_id', '=', $warehouse_id);
        })
            ->whereNull('warehouse_items.product_id')
            ->orderBy('products.name', 'asc')
            ->get();
        return view('warehouse-item.create', compact('warehouse', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $warehouse_id)
    {
        //
        $request->validate([
            'warehouse_item_stock' => 'required | numeric | min:1'
        ]);
        $product_id = $request->product;
        $stock = $request->warehouse_item_stock;

        $warehouse_item = WarehouseItem::create([
            'warehouse_id' => $warehouse_id,
            'product_id' => $product_id,
            'stock' => $stock
        ]);

        $stock_history = StockHistory::create([
            'warehouse_id' => $warehouse_id,
            'product_id' => $product_id,
            'user_id' => Auth::getUser()->id,
            'current_stock' => $stock,
            'transaction_type' => 'insert',
            'transaction_value' => $stock
        ]);

        return redirect()->route('warehouse.show', ['warehouse' => $warehouse_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $ids)
    {
        $warehouse_id = explode(' ', $ids)[0];
        $product_id = explode(' ', $ids)[1];
        $warehouse_item = WarehouseItem::where('warehouse_id', $warehouse_id)
            ->where('product_id', $product_id)
            ->first();

        return view('warehouse-item.edit')->with('warehouse_item', $warehouse_item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $ids)
    {
        //
        $warehouse_id = explode(' ', $ids)[0];
        $product_id = explode(' ', $ids)[1];

        $request->validate([
            'stock' => 'required | numeric | min:1'
        ]);

        WarehouseItem::where('warehouse_id', $warehouse_id)
            ->where('product_id', $product_id)
            ->update(['stock' => $request->stock]);
        return redirect()->route('warehouse.show', ['warehouse' => $warehouse_id])->with('success', 'Update warehouse item successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WarehouseItem $warehouse_item)
    {
        $warehouse_id = $warehouse_item->warehouse_id;
        $product_id = $warehouse_item->product_id;

        $warehouseItem = WarehouseItem::where('warehouse_id', $warehouse_id)
            ->where('product_id', $product_id)->delete();
        if ($warehouseItem) {
            return redirect()->route('warehouse.show', ['warehouse' => $warehouse_id])->with('success', 'Product deleted successfully.');
        } else {
            return redirect()->route('warehouse.show', ['warehouse' => $warehouse_id])->with('error', 'Product not found.');
        }
    }
}
