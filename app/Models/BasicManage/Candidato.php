<?php

namespace App\Models\BasicManage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use DB;
class Candidato extends Model
{
    protected   $table = 'candidatos';

    public static function runEditStatus($r)
    {        
        $candidato = Candidato::find($r->id);
        $candidato->estado = trim( $r->estadof );
        $candidato->persona_id_updated_at=Auth::user()->id;
        $candidato->save();
    }
    
        public static function runSearchPerson($r)
    {        
        $candidato = Persona::where('dni','=',$r->dni)->first();
        return $candidato;
    }

    public static function runNew($r)
    {
        $candidato=Candidato::where("persona_id","=",$r->persona_id)->first();
        if($candidato){
            $candidato->estado=1;
        }else{
        $candidato = new Candidato;
        $candidato->persona_id = trim( $r->persona_id );
        $candidato->estado = 1;
        $candidato->persona_id_created_at = Auth::user()->id;
        }
        $candidato->save();
    }

    public static function runLoad($r)
    {
        $sql=Persona::select('ca.id',DB::raw('CONCAT_WS(" ",personas.paterno,personas.materno,personas.nombre) as candidato'),'personas.dni','personas.sexo','ca.estado')
            ->join('votaciones.candidatos AS ca','ca.persona_id','=','personas.id')
            ->where( 
                function($query) use ($r){
                $query->where('ca.estado','=',1);

                }
            );
        $result = $sql->orderBy('personas.paterno','asc')->get();
        return $result;
    }

 
            public static function ListCandidato($r)
    {
        $sql=Candidato::select('id','sucursal','estado')
            ->where('estado','=','1');
        $result = $sql->orderBy('sucursal','asc')->get();
        return $result;
    }
}
