<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Extension;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    
    protected $table = 'ratings';

    protected $fillable = [
        'user_id',
        'ext_id',
        'rating',
        'review'
    ];

    public function extension()
    {
        return $this->belongsTo(Extension::class, 'ext_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
