<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $table = 'pacientes';
    public $timestamps = false;

    public function nacion() {
        return $this->hasOne(Nacion::class);
    }

    /* public function historia() {
        return $this->hasMany(Historia::class);
    } */
}
