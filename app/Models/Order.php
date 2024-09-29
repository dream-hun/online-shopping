<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory, Notifiable,SoftDeletes;

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PAYMENT_TYPE_SELECT = [
        'cash_on_delivery' => 'Cash On Delivery',
        'mobile_money' => 'Mobile Money',
        'bank_transfer' => 'Bank Transfer',
    ];

    public const STATUS_SELECT = [
        'pending' => 'Pending',
        'processing' => 'Processing',
        'shipped' => 'Shipped out',
        'completed' => 'Completed',
        'cancelled' => 'Cancelled',
    ];

    protected $fillable = [
        'order_no',
        'client_name',
        'client_phone',
        'email',
        'status',
        'shipping_address',
        'notes',
        'payment_type',
        'delivery_method',
        'updated_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function setOrderNo(string $prefix = 'ORD', $pad_string = '0', int $len = 8)
    {
        $orderNo = $prefix.str_pad($this->id, $len, $pad_string, STR_PAD_LEFT);
        $this->order_no = $orderNo;
        $this->update();
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
