<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class ProductUser extends Model
{
    use HasFactory;
    protected $table = "product_user";
    
    protected $fillable = [
        "user_id",
        "product_id",
        'quantity',
        'total_price',
        'order_id'
    ];
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
