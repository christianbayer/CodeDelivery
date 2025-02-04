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
        'user_id',
        'phone',
        'address',
        'city',
        'state',
        'zipcode'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
