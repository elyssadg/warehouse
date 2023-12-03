<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function dashboard() {
        $warehouseController = new WarehouseController();
        $productTypeController = new ProductTypeController();
        $productController = new ProductController();
        $staffController = new UserController();

        $totalWarehouse = $warehouseController->getTotalWarehouse();
        $totalCategory = $productTypeController->getTotalType();
        $totalProduct = $productController->getTotalProduct();
        $totalStaff = $staffController->getTotalStaff();

        return view('dashboard', compact('totalWarehouse', 'totalCategory', 'totalProduct', 'totalStaff'));
    }

}
