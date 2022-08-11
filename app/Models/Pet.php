<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    /* Dados que serão manipulados */
    protected $fillable = [
        'id',
        'name',
        'age',
        'fk_user',
        'details',
        'image',
        'description'
    ];

    /* Declarando que todos dados podem ser manipulados */
    protected $guarded = [];
    
    /* Armazenando arrays no banco de dados */
    protected $casts = [
        'details' => 'array'
    ];
}