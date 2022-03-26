<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'comment_text'];

    public function commentProduct(){
        return $this-> belongsTo(Product::class);
    }
    public function user(){
        return $this-> belongsTo(User::class);
    }
}
