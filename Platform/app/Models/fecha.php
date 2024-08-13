<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fecha extends Model
{
    use HasFactory;

    public function agendas()
    {
        return $this->hasMany(agendas::class);
    }
}
