<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Slider;
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'category_description',
        'category_image'
    ];
    public function subcategory() {
        return $this->hasMany(SubCategory::class);
    }
    public function slider() {
        return $this->hasOne(Slider::class);
    }

}
