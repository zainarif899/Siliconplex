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
        'image',
        'price'
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'ext_id', 'id');
    }
}
