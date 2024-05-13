<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        // Aquí irá la lógica para procesar el pago
        // Puedes acceder a los datos del formulario a través de $request
        
        return redirect()->back()->with('success', 'Pago procesado exitosamente');
    }
}