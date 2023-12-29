<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderPay extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * type
     */
    const NEWORDER = 1;
    const INSTALMENT = 2;
    const UPGRADE = 3;
    const CORRECTION = 4;

    /**
     * payment method
     */
    const CASH = 1;
    const BKASH = 2;
    const NAGAD = 3;
    const ROCKET = 4;
    const BANK = 5;
    const OTHERS = 6;


    protected $fillable = [
        'order_id',
        'type',
        'name',
        'phone',
        'amount',
        'method',
        'note',
    ];

    public function order($value='')
    {
        return $this->belongsTo(Order::class);
    }
}
