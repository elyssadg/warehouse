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
        $provinces = [
            'Aceh',
            'Bali',
            'Bangka Belitung',
            'Banten',
            'Bengkulu',
            'Jawa Tengah',
            'Kalimantan Tengah',
            'Sulawesi Tengah',
            'Jawa Timur',
            'Kalimantan Timur',
            'Nusa Tenggara Timur',
            'Gorontalo',
            'DKI Jakarta',
            'Jambi',
            'Lampung',
            'Maluku',
            'Kalimantan Utara',
            'Maluku Utara',
            'Sulawesi Utara',
            'Sumatera Utara',
            'Papua',
            'Riau',
            'Kepulauan Riau',
            'Kalimantan Selatan',
            'Sulawesi Selatan',
            'Sumatera Selatan',
            'Sulawesi Tenggara',
            'Jawa Barat',
            'Kalimantan Barat',
            'Nusa Tenggara Barat',
            'Papua Barat',
            'Sulawesi Barat',
            'Sumatera Barat',
            'Yogyakarta',
        ];
        return view('warehouse.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'province' => 'required',
            'city' => 'required | min:3',
            'address' => 'required | min:5',
            'postalcode' => 'required | min:4',
        ]);

        $warehouse = new Warehouse;
        $warehouse->province = $request->province;
        $warehouse->city = $request->city;
        $warehouse->address = $request->address;
        $warehouse->postalcode = $request->postalcode;
        $warehouse->save();
        return redirect()->route('warehouse.index')->with('success', 'Warehouse added successfully.');
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
        $warehouse = Warehouse::find($id);
        $provinces = [
            'Aceh',
            'Bali',
            'Bangka Belitung',
            'Banten',
            'Bengkulu',
            'Jawa Tengah',
            'Kalimantan Tengah',
            'Sulawesi Tengah',
            'Jawa Timur',
            'Kalimantan Timur',
            'Nusa Tenggara Timur',
            'Gorontalo',
            'DKI Jakarta',
            'Jambi',
            'Lampung',
            'Maluku',
            'Kalimantan Utara',
            'Maluku Utara',
            'Sulawesi Utara',
            'Sumatera Utara',
            'Papua',
            'Riau',
            'Kepulauan Riau',
            'Kalimantan Selatan',
            'Sulawesi Selatan',
            'Sumatera Selatan',
            'Sulawesi Tenggara',
            'Jawa Barat',
            'Kalimantan Barat',
            'Nusa Tenggara Barat',
            'Papua Barat',
            'Sulawesi Barat',
            'Sumatera Barat',
            'Yogyakarta',
        ];
        return view('warehouse.edit', compact('warehouse', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'province' => 'required',
            'city' => 'required | min:3',
            'address' => 'required | min:5',
            'postalcode' => 'required | min:4',
        ]);
        $warehouse = Warehouse::find($id);

        $warehouse->province = $request->province;
        $warehouse->city = $request->city;
        $warehouse->address = $request->address;
        $warehouse->postalcode = $request->postalcode;
        $warehouse->save();
        return redirect()->route('warehouse.show', ['warehouse' => $id]);
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
