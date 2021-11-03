<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','is_active','status'];
    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getTotalAttribute()
    {
        return $this->order_items->sum('total');
    }
    public function getQuantityAttribute()
    {
        return $this->order_items->sum('quantity');
    }
}
