<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use App\Models\WarehouseItem;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $warehouses = Warehouse::paginate(15);
        return view('warehouse.index')->with('warehouses', $warehouses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $warehouse = Warehouse::find($id);
        $products = WarehouseItem::where('warehouse_id', $id)->paginate(10);
        return view('warehouse.show')->with('warehouse', $warehouse)->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getTotalWarehouse()
    {
        $totalWarehouse = Warehouse::all()->count();

        return $totalWarehouse;
    }

    public function getAllWarehouse()
    {
        $warehouse = Warehouse::all();

        return $warehouse;
    }
}
