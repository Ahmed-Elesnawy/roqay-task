<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    // Model Relations

    public function products()
    {
        return $this->hasMany(Product::class);
    }


    // Model methods 

    public function timesince()
    {
        return $this->created_at->diffForHumans();
    }

    public function showUrl()
    {
        return route('categories.show',$this->id);
    }
}
