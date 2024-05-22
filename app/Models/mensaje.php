<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class mensaje extends Model
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticatableTrait;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "mensaje";
    protected $fillable = [
        'id_mensaje','nombre', 'email', 'telefono', 'mensaje','respuesta','fecha'
    ];
    protected $primaryKey = 'id_mensaje';
}