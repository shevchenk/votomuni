<?php

namespace App\Models\Proceso;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use DB;

class Votar extends Model
{
    protected   $table = 'pre_votos';

    public static function listarCandidatos()
    {
        $sql = DB::table('candidatos AS c')
              ->join('procesos.personas AS p',function($join){
                  $join->on('c.persona_id','=','p.id');
              })
              ->select(
              'c.id',
              //DB::raw('p.id AS pregunta_id'),
              'p.paterno',
              'p.materno',
              'p.nombre',
              'p.dni',
              'c.foto'
              )
              ->where('c.estado', '=', 1)
              ->get();
        $result = $sql;
        return $result;
    }

    public static function runEdit($r)
    {
        $opcion = Votar::find($r->pre_voto_id);
        $opcion->estado_voto = 1;
        $opcion->persona_id_updated_at=Auth::user()->id;
        $opcion->save();
    }

    
}
