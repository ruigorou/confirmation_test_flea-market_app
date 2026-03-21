<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post',
        'address',
        'building',
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }
}
