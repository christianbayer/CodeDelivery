<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price'
    ];

    public function Category(){
        return $this->belongsTo(Category::class);
    } 
}
