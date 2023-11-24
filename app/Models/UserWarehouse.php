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
}
