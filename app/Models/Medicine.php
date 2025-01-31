<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'unit',
        'status',
        'quantity',
        'manufacture_date',
        'expiry_date',
        'image',
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
