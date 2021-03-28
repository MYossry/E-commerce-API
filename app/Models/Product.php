<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about',
        'price',
        'rate',
        'discount_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }
}
