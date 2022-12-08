<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyableOrders extends Model
{
    use HasFactory;

    protected $table = "buyableorders";

    protected $fillable = [
        "workerId", "fileName", "actualName"
    ];
}
