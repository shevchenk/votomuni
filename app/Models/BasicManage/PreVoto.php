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
        $candidato= new PreVoto;
        $candidato->persona_id = trim( $r->persona_id );
        $candidato->codigo = trim( $r->codigo );
        $candidato->estado = 1;
        $candidato->persona_id_created_at = Auth::user()->id;
        $candidato->save();
    }

}
