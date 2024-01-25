<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_category',
        'value',
        'description',
        'pending',
        'fixed',
        'date'
    ];

    public function RevenueCategory()
    {
        return $this->belongsTo(RevenueCategory::class, 'id_category', 'id');
    }
}
