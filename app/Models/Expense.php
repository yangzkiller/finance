<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
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

    public function ExpenseCategory()
    {
        return $this->belongsTo(ExpenseCategory::class, 'id_category', 'id');
    }
}