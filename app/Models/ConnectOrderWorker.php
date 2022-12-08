<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectOrderWorker extends Model
{
    use HasFactory;

    protected $table = "connectorderworker";

    protected $fillable = [
        "workerId",
        "orderId"
    ];
}
