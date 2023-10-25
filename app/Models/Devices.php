<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_token',
        'config',
        'last_activity',
        'is_premium'
    ];

    public function getID()
    {
        return $this->getAttribute('id');
    }

    public function setPremium(bool $value)
    {
        $this->setAttribute('is_premium', $value);
        $this->save();
    }
}
