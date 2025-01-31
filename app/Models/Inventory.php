<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;


    protected $table = 'inventory';

    protected $fillable = [
        'item_name',
        'category',
        'quantity',
        'supplier_id',
        'purchase_date',
        'expiry_date',
        'status',
    ];

    // Relationship with Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
