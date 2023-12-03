<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return ProductFactory::new();
    }

    public function product_type() {
        return $this->belongsTo(ProductType::class);
    }

    public function warehouse_items() {
        return $this->hasMany(WarehouseItem::class);
    }

    public function stock_histories() {
        return $this->hasMany(StockHistory::class);
    }

}
