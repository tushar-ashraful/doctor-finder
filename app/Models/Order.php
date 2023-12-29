<?php

namespace App\Models;

use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     *  Status
     */
    const NEWORDER = 0;
    const PROGRESS = 1;
    const REVIEW = 2;
    const COMPLETE = 3;
    const CORRECTION_UPGRADE = 4;
    const DELIVERED = 5;
    const CANCEL = 6;

    protected $fillable = [
        'id',
        'sku',
        'university_id',
        'title',
        'description',
        'reference',
        'supervisor',
        'supervisor_phone',
        'name',
        'phone',
        'email',
        'batch',
        'address',
        'members',
        'additional_fees',
        'discount',
        'total',
        'advanced',
        'due',
        'loss',
        'note',
        'is_urgent',
        'delivery',
        'progress_at',
        'review_at',
        'completed_at',
        'correction_at',
        'upgrade_at',
        'delivery_at',
        'cancel_at',
        'return_at',
        'return_amount',
        'status',
    ];

    protected $casts = [
        'members' => 'array',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class)->with(['item','work']);
    }

    public function orderPay()
    {
        return $this->hasMany(OrderPay::class);
    }

    public function works()
    {
        return $this->hasMany(Work::class)->with(['user','orderItem']);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function getMembersAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * new order sku create 
     */
    protected function newSku()
    {
        $query = $this->query();
        $text = '#ZSP';
        $total = $query->count();
        $running_month_total = $query->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->count();
        $this_month = date('m');
        $this_year = date('y');
        return $text.str_pad(++$total, 2, '0', STR_PAD_LEFT).'-'.str_pad(++$running_month_total, 2, '0', STR_PAD_LEFT).'/'.'M'.$this_month.'Y'.$this_year;
    }

    /**
     * order item create comount method 
     */
    public function createItem($items, $orderId, $type = null)
    {
        if (!empty($items)) {
            foreach($items as $item){
                $data = [];
                $data['item_id'] = $item['item'];
                $data['order_id'] = $orderId;
                $data['description'] = $item['description'];
                $data['qty'] = $item['qty'];
                $data['price'] = $item['price'];
                $data['total'] = $item['total'];
                $data['is_urgent'] = $item['is_urgent'];
                if ($type == 'upgrade') {
                    $data['upgrade_at'] = now();
                }
                if ($type == 'correction') {
                    $data['correction_at'] = now();
                }
                $itemCreate = OrderItem::create($data);
                if (!empty($item['worker'])) {
                    $workCreate = Work::create([
                        'order_id' => $orderId,
                        'user_id' => $item['worker'],
                        'order_item_id' => $itemCreate->id,
                        'note' => $item['note'],
                        'dateline_on' => $item['dateline_on'],
                        'dateline_to' => $item['dateline_to'],
                    ]);
                    $itemCreate->update([
                        'assign_at' => now(),
                    ]);
                }
            }
        }
       return true;
    }

    /**
     * order pay create comount method 
     */
    public function createPay($orderId,$type,$name,$phone,$amount,$method,$note = null)
    {
        $orderPay = OrderPay::create([
            'order_id' => $orderId,
            'type' => $type,
            'name' => $name,
            'phone' => $phone,
            'amount' => $amount,
            'method' => $method,
            'note' => $note,
        ]);

        if ($orderPay) {
            return true;
        }
        return false;
    }

    /**
     * order project sub total amount in ordert table sum total column
     */
    public function subTotal()
    {
        return $this->orderItems->sum('total');
    }

    /**
     * order project total
     */
    public function total($discount = false)
    {
        return ($this->subTotal() + $this->additional_fees) - $this->discount;
    }

    /**
     * order project total pay amount sum in order pay amount column
     */
    public function paid($discount = false)
    {
        return $this->orderPay->sum('amount');
    }
    /**
     * order project due amount
     */
    public function due()
    {
        return $this->total() - $this->paid();
    }
    // order Progress 
    public function orderProgress()
    {
        $query = $this->orderItems;
        $totalItems = $query->count();
        if ($totalItems) {
           $totalCompleteItems = $query->whereNotNull('completed_at')->count();
           $progress = round((100 / $totalItems) * $totalCompleteItems);
           return $progress;
        }
        return 0;
       
    }

    // order Status

    public function statusType($isTime = false)
    {
        if ($this::NEWORDER == $this->status) {
            return $isTime ? 'New Order ('.myDateTime($this->created_at,true).')' : 'New Order';
        }
        if ($this::PROGRESS == $this->status) {
             return $isTime ?  'Progress ('.myDateTime($this->progress_at,true).')' : 'Progress';
        }
        if ($this::REVIEW == $this->status) {
             return $isTime ?  'Review ('.myDateTime($this->review_at,true).')' : 'Review';
        }
        if ($this::COMPLETE == $this->status) {
             return $isTime ?  'Complete ('.myDateTime($this->completed_at,true).')' : 'Complete';
        }
        if ($this::CORRECTION_UPGRADE == $this->status) {
            if ($this->upgrade_at == null && $this->correction_at == null) {
                 return 'Some one Mistake';
            }
            if ($this->upgrade_at != null && $this->correction_at != null) {
                 return $isTime ?  'Upgrade & Correction ('.myDateTime($this->created_at,true).')' : 'Upgrade & Correction';
            }

            if ($this->correction_at != null) {
                 return $isTime ?  'Correction ('.myDateTime($this->correction_at,true).')' : 'Correction';
            }
            if ($this->upgrade_at != null) {
                 return $isTime ?  'Upgrade ('.myDateTime($this->upgrade_at,true).')' : 'Upgrade';
            }
            
        }
        if ($this::DELIVERED == $this->status) {
             return $isTime ?  'Delivered ('.myDateTime($this->delivery_at,true).')' : 'Delivered';
        }
        if ($this->return_at != Null) {
             return $isTime ?  'Return ('.myDateTime($this->return_at,true).')' : 'Return';
        }
        if ($this::CANCEL == $this->status) {
             return $isTime ?  'Cancel ('.myDateTime($this->cancel_at,true).')' : 'Cancel';
        }
        
        
    }
}
