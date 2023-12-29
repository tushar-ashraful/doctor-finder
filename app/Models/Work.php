<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'order_item_id',
        'user_id',
        'type',
        'name',
        'note',
        'worker_note',
        'dateline_on',
        'dateline_to',
        'completed_at',
    ];
    // type assign 
    /**
     * new = 1 , 
     * update = 2 , 
     * currection = 3, 
     * other = 4
     */
    const NEWORDER = 1;
    const UPGRADE = 2;
    const CORRECTION = 3;
    const OTHER = 4;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class)->with('item');
    }

}
