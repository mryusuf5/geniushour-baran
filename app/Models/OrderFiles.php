<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFiles extends Model
{
    use HasFactory;

    protected $table = "orderfiles";

    protected $fillable = [
        "workerId", "orderId", "fileName"
    ];
}
