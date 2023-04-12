<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Gloudemans\Shoppingcart\CanBeBought;

// class Product extends Model implements Buyable
class Product extends Model
{
    use HasFactory;
    // use Gloudemans\Shoppingcart\CanBeBought;

    protected $fillable = [
        'imagePath',
        'prod_name',
        'prod_layout',
        'description',
        'price'
    ];

    // public function getBuyableIdentifier($options = null)
    // {
    //     return $this->id;
    // }
    // public function getBuyableDescription($options = null)
    // {
    //     return $this->prod_name;
    // }
    // public function getBuyablePrice($options = null)
    // {
    //     return $this->price;
    // }
    // public function getBuyableWeight($options = null)
    // {
    //     return $this->weight;
    // }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('id', 'category_id', 'product_id');
    }
}