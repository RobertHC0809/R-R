<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
    use HasFactory;

    /**
     * Guardar un nuevo pago en la base de datos.
     *
     * @param array $paymentData Los datos del pago a guardar
     * @return Payment El pago guardado
     */
    public static function savePayment(array $paymentData)
    {
        $payment = new Payment();
        $payment->payment_id = $paymentData['id'];
        $payment->payer_id = $paymentData['payer']['payer_info']['payer_id'];
        $payment->amount = $paymentData['transactions'][0]['amount']['total'];
        $payment->currency = env('PAYPAL_CURRENCY');
        $payment->payment_status = $paymentData['state'];

        $payment->save();

        return $payment;
    }

    /**
     * Obtener el estado del pago.
     *
     * @param string $paymentId El ID del pago
     * @return string El estado del pago
     */
    public static function getPaymentStatus($paymentId)
    {
        $payment = Payment::where('payment_id', $paymentId)->first();

        if ($payment) {
            return $payment->payment_status;
        }

        return 'Pago no encontrado';
    }
}
