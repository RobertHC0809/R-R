<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class carritodecompras extends Model
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticatableTrait;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "carrito_de_compras";
    protected $fillable = [
        'ID_Carrito','ID_Usuario', 'ID_Producto', 'Cantidad', 'Nombre'
    ];
    protected $primaryKey = 'ID_Carrito';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
}
