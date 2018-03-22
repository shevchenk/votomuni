<?php
namespace App\Http\Controllers\BasicManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BasicManage\Candidato;
use App\Models\BasicManage\PreVoto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;



class CandidatoBM extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  //Esto debe activarse cuando estemos con sessión
    }

    public function EditStatus(Request $r )
    {
        if ( $r->ajax() ) {
            Candidato::runEditStatus($r);
            $return['rst'] = 1;
            $return['msj'] = 'Registro actualizado';
            return response()->json($return);
        }
    }
    
        public function SearchPerson(Request $r )
    {
        if ( $r->ajax() ) {
            $result=Candidato::runSearchPerson($r);
            if($result){
                $return['rst'] = 1;
                $return['data'] = $result;
                $return['msj'] = 'Persona encontrada';
            }else{
                $return['rst'] = 2;
                $return['data'] = $result;
                $return['msj'] = 'Persona no encontrada';
            }

            return response()->json($return);
        }
    }

    public function New(Request $r )
    {
        if ( $r->ajax() ) {

            $mensaje= array(
                'required'    => ':attribute es requerido',
                'unique'        => ':attribute solo debe ser único',
            );

            $rules = array(
                'persona_id' => 
                       ['required',
                    
                        ],
            );

            
            $validator=Validator::make($r->all(), $rules,$mensaje);

            if ( !$validator->fails() ) {
                Candidato::runNew($r);
                $return['rst'] = 1;
                $return['msj'] = 'Registro creado';
            }
            else{
                $return['rst'] = 2;
                $return['msj'] = $validator->errors()->all()[0];
            }
            return response()->json($return);
        }
    }
    
        public function NewVotante(Request $r )
    {
        if ( $r->ajax() ) {

            $mensaje= array(
                'required'    => ':attribute es requerido',
                'unique'        => ':attribute solo debe ser único',
            );

            $rules = array(
                'persona_id' => 
                       ['required',
                    
                        ],
            );

            
            $validator=Validator::make($r->all(), $rules,$mensaje);

            if ( !$validator->fails() ) {
                $aleatorio=PreVoto::runNew($r);
                $return['rst'] = 1;
                $return['aleatorio'] = $aleatorio;
                $return['msj'] = 'Registro creado';
            }
            else{
                $return['rst'] = 2;
                $return['msj'] = $validator->errors()->all()[0];
            }
            return response()->json($return);
        }
    }

    public function Edit(Request $r )
    {
        if ( $r->ajax() ) {
            $mensaje= array(
                'required'    => ':attribute es requerido',
                'unique'        => ':attribute solo debe ser único',
            );

            $rules = array(
                'persona_id' => 
                       ['required',
                        Rule::unique('candidatos','id')->ignore($r->id),
                        ],
            );

            $validator=Validator::make($r->all(), $rules,$mensaje);

            if ( !$validator->fails() ) {
                Candidato::runEdit($r);
                $return['rst'] = 1;
                $return['msj'] = 'Registro actualizado';
            }
            else{
                $return['rst'] = 2;
                $return['msj'] = $validator->errors()->all()[0];
            }
            return response()->json($return);
        }
    }

    public function Load(Request $r )
    {
        if ( $r->ajax() ) {
            $renturnModel = Candidato::runLoad($r);
            $return['rst'] = 1;
            $return['data'] = $renturnModel;
            $return['msj'] = "No hay registros aún";
            return response()->json($return);
        }
    }
    
        public function ListCandidato (Request $r )
    {
        if ( $r->ajax() ) {
            $renturnModel = Candidato::ListCandidato($r);
            $return['rst'] = 1;
            $return['data'] = $renturnModel;
            $return['msj'] = "No hay registros aún";
            return response()->json($return);
        }
    }

}
