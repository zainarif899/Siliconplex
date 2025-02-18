<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'cat_id'
    ];
    

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
}
