<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    public function warehouse_item() {
        return $this->hasMany(WarehouseItem::class, 'warehouse_id');
    }
    
    public function user_warehouse() {
        return $this->hasMany(UserWarehouse::class, 'warehouse_id');
    }
    
}
