<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'price',
        'desc',
        'category_id'
    ];

    protected $appends = [
        'category_name',
    ];
    // Model relations

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    // Model Getters

    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }


    // Model methods 

    public function timesince()
    {
        return $this->created_at->diffForHumans();
    }

    public function showUrl()
    {
        return route('products.show',$this->id);
    }
}
