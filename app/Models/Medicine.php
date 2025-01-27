<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; 
    protected $fillable = [
        'medicine_name', 'category_id', 'price', 'medicine_image',
        'manufacture_date', 'expiry_date', 'description'
    ];

    protected $table = 'medicines';

    public function category()
    {
        return $this->belongsTo(Category::class ,'category_id');
    }
}
