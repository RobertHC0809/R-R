<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class factura extends Model
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticatableTrait;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "factura";
    protected $fillable = [
        'id_factura','itbs', 'descuento', 'monto_total', 'ID_Metodo', 'id_banco', 'total'
    ];
    protected $primaryKey = 'id_factura';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
}
