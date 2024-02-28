<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolesPermisosController extends Controller
{
    public function index()
    {
        return view('roles_permisos.index');
    }
}
