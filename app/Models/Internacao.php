<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internacao extends Model
{
    protected $table = 'internacoes';

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}