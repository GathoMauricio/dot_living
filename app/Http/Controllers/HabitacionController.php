<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    public function index()
    {
        return view('habitaciones.index');
    }
}
