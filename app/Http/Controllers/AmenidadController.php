<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmenidadController extends Controller
{
    public function index()
    {
        return view('amenidades.index');
    }
}
