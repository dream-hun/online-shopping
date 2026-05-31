<?php

declare(strict_types=1);

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
use Illuminate\Support\Str;

final class Order extends Model
{
    use Notifiable, SoftDeletes;

    public const PAYMENT_TYPE_SELECT = [
        'Cash on Delivery' => 'Cash On Delivery',
        'Mobile Money' => 'Mobile Money',
        'Bank Transfer' => 'Bank Transfer',
        'Cash' => 'Cash',
    ];

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

    protected $fillable = [
        'uuid',
        'order_no',
        'client_name',
        'client_phone',
        'email',
        'status',
        'shipping_address',
        'house_number',
        'customer_id',
        'notes',
        'total_amount',
        'payment_type',
        'delivery_method',
        'updated_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function updated_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function setOrderNo(string $prefix = 'ORD', $pad_string = '0', int $len = 8): void
    {
        $orderNo = $prefix.mb_str_pad((string) $this->id, $len, $pad_string, STR_PAD_LEFT);
        $this->order_no = $orderNo;
        $this->save();
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    protected static function booted(): void
    {
        self::creating(function (self $model): void {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
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
