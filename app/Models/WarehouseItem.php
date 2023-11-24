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
}
