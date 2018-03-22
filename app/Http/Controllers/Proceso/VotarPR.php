<?php
namespace App\Http\Controllers\Proceso;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proceso\Votar;
use App\Models\Proceso\Votos;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DB;

class VotarPR extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  //Esto debe activarse cuando estemos con sessión
    }

    public function buscarVoto (Request $r )
    {
        if ( $r->ajax() ) {

            $votos = Votar::where('codigo', '=', $r->codigo)
                              ->first();

            if($votos->estado == 1)
            {
                if($votos->estado_voto == 0)
                {
                    $renturnModel = Votar::listarCandidatos();       
                    $return['rst'] = 1;
                    $return['data'] = $renturnModel;
                    $return['msj'] = "";
                }
                else
                {
                    $return['rst'] = 2;
                    $return['data'] = '';
                    $return['msj'] = "Ya realizó una votación con el código que ingresó!";
                }
            }
            else
            {
                $return['rst'] = 3;
                $return['data'] = '';
                $return['msj'] = "Codigo no generado!";
            }
            
            return response()->json($return);
        }
    }

    public function nuevoVoto(Request $r )
    {
        Votos::runNew($r);
        $return['rst'] = 1;
        $return['msj'] = 'Registro creado';
        return response()->json($return);
    }

}
