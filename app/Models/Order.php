<?php

namespace App\Models;

use App\Enums\DeliveryMethod;
use App\Enums\OrderStatus;
use App\Notifications\OrderStatusNotification;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

class Order extends Model
{
    use Notifiable, SoftDeletes;

    public $table = 'orders';

    protected $casts = [
        'delivery_method' => DeliveryMethod::class,
        'status' => OrderStatus::class,
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected array $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PAYMENT_TYPE_SELECT = [
        'Cash on Delivery' => 'Cash On Delivery',
        'Mobile Money' => 'Mobile Money',
        'Bank Transfer' => 'Bank Transfer',
        'Cash' => 'Cash',
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

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function updated_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function setOrderNo(string $prefix = 'ORD', $pad_string = '0', int $len = 8): void
    {
        $orderNo = $prefix.str_pad($this->id, $len, $pad_string, STR_PAD_LEFT);
        $this->order_no = $orderNo;
        $this->save();
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /*public static function boot(): void
    {
        parent::boot();

        self::updated(function (Order $order) {
            // Only notify if the status field was changed
            if ($order->isDirty('status') && $order->status instanceof OrderStatus) {
                $order->notifyOrderStatusChange();
            }
        });
    }

    public function notifyOrderStatusChange(): void
    {
        if (!empty($this->email) && filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            Notification::route('mail', $this->email)
                ->notify(new OrderStatusNotification($this->status));
        }
    }*/
}
