<?php

namespace App\Models\BasicManage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use DB;
class PreVoto extends Model
{
    protected   $table = 'pre_votos';

    public static function runNew($r)
    {
        DB::beginTransaction();
        $aleatorio=rand(1000,9999);
        $prevoto= PreVoto::where('codigo','=',$aleatorio)->first();
        if($prevoto){
            while(count($prevoto)==1){
                $aleatorio=rand(1000,9999);
                $prevoto= PreVoto::where('codigo','=',$aleatorio)->first();
            }
        }else{
        $updt="UPDATE pre_votos SET estado=0 WHERE persona_id=".$r->persona_id;
        DB::update($updt);
        $candidato= new PreVoto;
        $candidato->persona_id = trim( $r->persona_id );
        $candidato->codigo = trim( $aleatorio );
        $candidato->estado = 1;
        $candidato->persona_id_created_at = Auth::user()->id;
        $candidato->save();
        DB::commit();
        return $aleatorio;
        }
    }

}
