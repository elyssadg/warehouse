<?php

namespace App\Models;

use Database\Factories\StockHistoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockHistory extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'warehouse_id',
        'product_id',
        'user_id',
        'current_stock',
        'transaction_type',
        'transaction_value'
    ];

    protected $dates = ['deleted_at', 'updated_at', 'created_at'];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return StockHistoryFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
