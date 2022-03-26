<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'text',
        'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
