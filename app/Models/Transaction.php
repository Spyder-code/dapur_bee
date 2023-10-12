<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_id',
        'invoice',
        'amount',
        'receiver',
        'phone',
        'province_id',
        'distance',
        'city_id',
        'district_id',
        'expedition_name',
        'expedition_type',
        'expedition_price',
        'address',
        'city',
        'postcode',
        'total',
        'is_paid',
        'payment_method',
        'payment_file',
        'payment_status_id',
        'token',
        'status',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->created_by = Auth::id();
            $model->updated_by = Auth::id();
        });
        static::saving(function ($model) {
            $model->updated_by = Auth::id();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment_status()
    {
        return $this->belongsTo(PaymentStatus::class);
    }

    public function transaction_details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by');
    }
}
