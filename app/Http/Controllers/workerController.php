<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class workerController extends Controller
{
    public function index()
    {
        return view("worker.dashboard");
    }
}
