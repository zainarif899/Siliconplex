<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    use HasFactory;

    protected $table = 'extensions';

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    public function rating_product(){
        
        return $this->hasMany(Rating::class,'pro_id','id');
    }
}
