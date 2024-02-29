<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MensajeriaController extends Controller
{
    public function index()
    {
        return view('mensajeria.index');
    }
}
