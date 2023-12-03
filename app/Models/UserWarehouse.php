<?php

namespace App\Models;

use Database\Factories\UserWarehouseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserWarehouse extends Model
{
    use HasFactory;
    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return UserWarehouseFactory::new();
    }

    protected $primaryKey = ['warehouse_id', 'user_id'];

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['warehouse_id', 'user_id', 'created_at'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $validator = validator($model->toArray(), [
                'warehouse_id' => 'unique:user_warehouses,warehouse_id,NULL,id,user_id,' . $model->user_id,
                'user_id' => 'unique:user_warehouses,user_id,NULL,id,warehouse_id,' . $model->warehouse_id,
            ]);

            if ($validator->fails()) {
                // Handle validation failure, e.g., throw an exception or log an error
                return false; // Prevent the model from being saved
            }
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function warehouse() {
        return $this->belongsTo(Warehouse::class);
    }
    
}
