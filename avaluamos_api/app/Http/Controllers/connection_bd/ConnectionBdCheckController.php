<?php

namespace App\Http\Controllers\connection_bd;

use App\Http\Controllers\Controller;
use App\Http\Responsable\connection_bd\ConnectionBdCheck;

class ConnectionBdCheckController extends Controller
{
    public function index()
    {
        return new ConnectionBdCheck();
    }
}
