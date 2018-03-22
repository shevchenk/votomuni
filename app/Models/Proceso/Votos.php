<?php

namespace App\Models\Proceso;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use DB;

class Votos extends Model
{
    protected   $table = 'votos';

    public static function runNew($r)
    {
        $opcion = new Votos;
        $opcion->candidato_id = trim( $r->candidato_id );
        $opcion->pre_voto_id = trim( $r->pre_voto_id );
        $opcion->estado = 1;
        $opcion->persona_id_created_at=Auth::user()->id;
        $opcion->save();
    }
    
}
