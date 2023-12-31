<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'path',
        'mime',
        'size',
        'product_id',
        'order',
    ];
}
