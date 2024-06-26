<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'ID_Usuario'; // Clave primaria de la tabla

    protected $fillable = [
        'nombre', 'email', 'contraseña', // Lista de columnas que se pueden llenar masivamente
    ];

    // Opcional: puedes agregar relaciones y métodos personalizados aquí
}
