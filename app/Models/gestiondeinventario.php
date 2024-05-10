<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class gestiondeinventario extends Model
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticatableTrait;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "gestion_de_inventarios";
    protected $fillable = [
        'ID_Inventario','ID_Producto', 'Cantidad_Stock', 'Ubicacion', 'Fecha_Entrada', 'Fecha_Salida'
    ];
    protected $primaryKey = 'ID_Inventario';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
}
