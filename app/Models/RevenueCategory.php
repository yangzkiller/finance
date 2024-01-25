<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevenueCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'category',
        'icon',
        'color'
    ];
}


