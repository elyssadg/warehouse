<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Product extends Model
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return ProductFactory::new();
    }

    public function product_type() {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    public function warehouse_item() {
        return $this->hasMany(WarehouseItem::class, 'product_id');
    }

}
