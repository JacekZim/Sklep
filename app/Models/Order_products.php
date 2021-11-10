<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_products extends Model
{
    use HasFactory;

    public $timestamps = false;
protected $table='orders_products';

    protected $fillable = [
        'name',
        'price',
        'qty',
        'order_id',
        'product_id',

    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
