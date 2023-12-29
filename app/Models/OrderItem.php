<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'item_id',
        'order_id',
        'description',
        'qty',
        'price',
        'total',
        'is_urgent',
        'is_upgrade',
        'upgrade_at',
        'is_correction',
        'correction_at',
        'assign_at',
        'completed_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function work()
    {
        return $this->hasOne(Work::class);
    }

    
}
