<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductUser;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    public function orderItem(){
        return $this->hasMany(ProductUser::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
