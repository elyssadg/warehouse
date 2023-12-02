<?php

namespace App\Models;

use Database\Factories\WarehouseItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class WarehouseItem extends Model
{
    use HasFactory;
    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return WarehouseItemFactory::new();
    }

    protected $primaryKey = ['warehouse_id', 'product_id'];

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['warehouse_id', 'product_id', 'product_stock', 'created_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $validator = validator($model->toArray(), [
                'warehouse_id' => 'unique:warehouse_items,warehouse_id,NULL,NULL,product_id,' . $model->product_id,
                'product_id' => 'unique:warehouse_items,product_id,NULL,NULL,warehouse_id,' . $model->warehouse_id,
            ]);

            if ($validator->fails()) {
                // Handle validation failure, e.g., throw an exception or log an error
                return false;
            }
        });
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function warehouse() {
        return $this->belongsTo(Warehouse::class);
    }

    public function stock_history() {
        return $this->hasMany(StockHistory::class);
    }

}
