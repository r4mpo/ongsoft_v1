<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'age',
        'fk_user',
        'details',
        'image',
        'description'
    ];

    protected $guarded = [];
    
    protected $casts = [
        'details' => 'array'
    ];
}
