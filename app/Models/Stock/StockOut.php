<?php

namespace App\Models\Stock;

use App\Models\MasterData\Customer;
use App\Models\User;
use App\Traits\DoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StockOut extends Model
{
    use HasFactory, DoTrait;

    protected $fillable = [
        'bill_no',
        'customer_id',
        'user_id',
        'date',
        'do_number',
        'attn',
        'via',
        'carrier',
        'reff',
        'truck_no',
        'delivered_by',
        'from'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detail(): HasMany
    {
        return $this->hasMany(StockOutDetail::class, 'stock_id', 'id');
    }
}
