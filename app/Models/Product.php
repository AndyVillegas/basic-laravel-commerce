<?php

namespace App\Models;

use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','image','cost','pvp','code','category_id','description'
    ];
    public function getImageUrlAttribute()
    {
        if($this->image)
            return url($this->image);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
