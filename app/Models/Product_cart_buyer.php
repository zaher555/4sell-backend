<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product_cart_buyer extends Model
{
    use HasFactory;
    protected $fillable=['product_id','cart_id','user_id'];
}
