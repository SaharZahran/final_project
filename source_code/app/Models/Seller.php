<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Product;

class Seller extends Authenticatable
{
    use HasFactory;
    protected $guard = 'seller';

    protected $fillable = [
        'company_name',
        'company_email',
        'password',
        'confirm_password',
        'grower_method',
        'phone',
        'hero_image',
        'category_one',
        'category_two',
        'category_three',
        'category_four',
        'category_five',
    ];
    public function product(){
        return $this->hasMany(Product::class);
    }
}
