<?php

namespace App\Models\Proceso;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use DB;

class Votar extends Model
{
    protected   $table = 'pre_votos';

    /*
    public static function runNew($r)
    {
        $opcion = new Pregunta;
        $opcion->curso_id = trim( $r->curso_id );
        $opcion->unidad_contenido_id = trim( $r->unidad_contenido_id );
        $opcion->pregunta = trim( $r->pregunta );
        $opcion->puntaje =1;
        if(trim($r->imagen_nombre)!=''){
            $opcion->imagen=$r->imagen_nombre;
        }else {
            $opcion->imagen=null;    
        }
        if(trim($r->imagen_archivo)!=''){
            $este = new Pregunta;
            $url = "img/question/".$r->imagen_nombre; 
            $este->fileToFile($r->imagen_archivo, $url);
        }
        $opcion->estado = trim( $r->estado );
        $opcion->persona_id_created_at=Auth::user()->id;
        $opcion->save();
    }
    */

    public static function listarCandidatos()
    {
        $sql = DB::table('candidatos AS c')
              ->join('personas AS p',function($join){
                  $join->on('c.persona_id','=','p.id');
              })
              ->select(
              'c.id',
              //DB::raw('p.id AS pregunta_id'),
              'p.paterno',
              'p.materno',
              'p.nombre',
              'p.dni',
              'p.foto'
              )
              ->where('c.estado', '=', 1)
              ->get();
        $result = $sql;
        return $result;
    }
    
}
