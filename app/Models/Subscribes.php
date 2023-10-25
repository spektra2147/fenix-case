<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribes extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'receipt_token',
        'device_id'
    ];
}
