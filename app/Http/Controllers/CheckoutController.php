<?php

// Ubicación: app/Http/Controllers/CheckoutController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function processPayment(Request $request)
    {
        // Lógica para procesar el pago

        // Limpiar el carrito después de procesar el pago
        Session::forget('cart');

        return redirect()->route('carrito')->with('success', 'Pago procesado exitosamente');
    }
}
