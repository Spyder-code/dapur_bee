<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'whatsapp',
        'province_id',
        'city_id',
        'district_id',
        'distance_price',
        'distance_min',
        'address',
        'midtrans_client_key',
        'midtrans_server_key',
        'raja_ongkir_key',
        'raja_ongkir_tipe',
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

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by');
    }
}
