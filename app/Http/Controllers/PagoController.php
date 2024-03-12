<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::orderBy('id', 'DESC')->paginate(15);
        return view('pagos.index', compact('pagos'));
    }
}
