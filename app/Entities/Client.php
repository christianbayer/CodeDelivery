<?php

namespace CodeDelivery\Entities;

use CodeDelivery\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Client extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

}
