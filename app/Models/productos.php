<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class productos extends Model
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticatableTrait;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "productos";
    protected $fillable = [
        'ID_Producto','Nombre', 'Descripcion', 'Precio', 'Categoria', 'imagen'
    ];
    protected $primaryKey = 'ID_Producto';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
}
