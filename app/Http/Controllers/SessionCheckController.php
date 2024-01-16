<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionCheckController extends Controller
{
    public function checkSession()
    {
        // Dump session data
        dd(session()->all());
    }
}
