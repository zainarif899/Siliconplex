<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'id',
        'cat_name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id', 'id');
    }
}
