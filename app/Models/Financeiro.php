<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financeiro extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'gasto_1',
        'gasto_2',
        'gasto_3',
        'gasto_4'
    ];
}
