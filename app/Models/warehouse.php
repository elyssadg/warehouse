<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use HasFactory, SoftDeletes;

    public function warehouse_items() {
        return $this->hasMany(WarehouseItem::class);
    }
    
    public function user_warehouses() {
        return $this->hasMany(UserWarehouse::class);
    }

    public function stock_histories()
    {
        return $this->hasMany(StockHistory::class);
    }
    
}
