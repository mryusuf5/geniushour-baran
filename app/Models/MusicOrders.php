<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicOrders extends Model
{
    use HasFactory;

    protected $table = "musicorders";

    protected $fillable = [
        "firstName",
        "prefix",
        "lastName",
        "email",
        "message",
        "connectedWorkersId"
    ];
}
