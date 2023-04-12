<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Order extends Model
{
    use HasFactory;

    // protected $dateFormat = 'm/d/y';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'user_id',
        'contact_s',
        'address_s',
        'confirmation',
        'subtotal',
        'pack',
        'tax',
        'total',
        'cart',
        'order_array',
    ];

    // protected $casts = [
    //     'order_array' => 'array',
    // ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}