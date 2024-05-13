<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'ID_Carrito','ID_Usuario', 'ID_Producto', 'Cantidad'
    ];
    protected $primaryKey = 'ID_Carrito';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
}
