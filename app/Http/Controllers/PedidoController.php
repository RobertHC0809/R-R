<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::select('fecha_pedido', 'estado')->get();
        return view('Electromecanica.Home.pedidos', compact('pedidos'));
    }
}
