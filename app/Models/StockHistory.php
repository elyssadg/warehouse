<?php

namespace App\Models;

use Database\Factories\StockHistoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockHistory extends Model
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return StockHistoryFactory::new();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function warehouse_item() {
        return $this->belongsTo(Product::class);
    }

}
