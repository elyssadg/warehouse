<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    //
    public function login()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        } else {
            return view('auth.login');
        }
    }

    public function dashboard(WarehouseController $warehouseController, ProductTypeController $productTypeController, ProductController $productController, UserController $staffController, StockHistoryController $stockController)
    {

        $totalWarehouse = $warehouseController->getTotalWarehouse();
        $totalCategory = $productTypeController->getTotalType();
        $totalProduct = $productController->getTotalProduct();
        $totalStaff = $staffController->getTotalStaff();
        $monthlyData = $stockController->getItemYearlysStatistic();
        $warehouse = $warehouseController->getAllWarehouse();
        $stockHistory = $stockController->getAllHistory();
        $activity = $stockController->getTopWarehousesPerformanceAndTransactions();
        // dd($activity);
        return view('dashboard', compact('totalWarehouse', 'totalCategory', 'totalProduct', 'totalStaff', 'monthlyData', 'warehouse', 'stockHistory', 'activity'));
    }
}
