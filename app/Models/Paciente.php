<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    public function municipio()
{
    return $this->belongsTo(Cidade::class, 'cidade_id');
}

    public function internacoes()
    {
        return $this->hasMany(Internacao::class);
    }
}