<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservas extends Model
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticatableTrait;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "reservas";
    protected $fillable = [
        'ID_Reserva', 'ID_Usuario', 'ID_Servicio', 'Fecha', 'Hora'
    ];
    protected $primaryKey = 'ID_Reserva';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
}
