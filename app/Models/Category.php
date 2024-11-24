<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Category extends Model
{
    use HasFactory, Notifiable,HasApiTokens;
    protected $table='category';
    protected $fillable=['name'];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
