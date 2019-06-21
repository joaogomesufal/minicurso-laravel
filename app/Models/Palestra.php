<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Palestra extends Model
{
  
    public $fillable = ['titulo', 'descricao', 'data', 'hora_inicio', 'hora_fim', 'local', 'id_ministrante', 'id_area'];

    public function ministrante() {
        return $this->hasOne('App\Models\Ministrante', 'id', 'id_ministrante');
    }
}
