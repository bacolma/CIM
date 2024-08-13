<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHorario extends Model
{
    use HasFactory;
    public function HoraUser(){
        return $this->hasMany('Hora_User');
    }
}
