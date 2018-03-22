<script type="text/javascript">
var AddEdit=0; //0: Editar | 1: Agregar
var CandidatoG={id:0,
persona_id:""}; // Datos Globales
$(document).ready(function() {

});

ValidaForm=function(){
    var r=true;
    if( $.trim( $("#ModalGenerarForm #txt_persona_id").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese DNI de Candidato válido',4000);
    }
    else if( $.trim( $("#ModalGenerarForm #txt_codigo").val() )=='' ){
        r=false;
        msjG.mensaje('warning','No hay código generado',4000);
    }

    return r;
}

CambiarEstado=function(estado,id){
    AjaxCandidato.CambiarEstado(HTMLCambiarEstado,estado,id);
}

BuscarPersona=function(){
    var dni=$("#ModalGenerarForm #txt_dni").val();
    AjaxCandidato.BuscarPersona(HTMLCargarPersona,dni);
}

HTMLCargarPersona=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        $("#ModalGenerarForm #txt_persona_id").val(result.data.id);
        $("#ModalGenerarForm #txt_dni").val(result.data.dni);
        $("#ModalGenerarForm #txt_sexo").val(result.data.sexo);
        $("#ModalGenerarForm #txt_candidato").val(result.data.paterno+' '+result.data.materno+' '+result.data.nombre);
        
        var numero;
        var numero="";
        var cifra=[];
        for(a=0;a<4;a++){
                cifra[a]=parseInt(Math.random()*10);
                if(a==0){	//quita esto si el número puede empezar por cero
                        cifra[a]=parseInt(Math.random()*9)+1;//quita esto si el número puede empezar por cero
                }//quita esto si el número puede empezar por cero
                for(aa=0;aa<a;aa++){
                        if(cifra[a]==cifra[aa]){a-=1;break}

                }
        }
        for(a=0;a<4;a++){
                numero+=cifra[a];
        }
        numero=parseInt(numero);//quita esto para que pueda empezar por cero.
        
        $("#ModalGenerarForm #txt_codigo").val(numero);
    } else{
        msjG.mensaje('warning',result.msj,3000);
        $("#ModalGenerarForm #txt_persona_id").val("");
        $("#ModalGenerarForm #txt_dni").val("");
        $("#ModalGenerarForm #txt_sexo").val("");
        $("#ModalGenerarForm #txt_candidato").val("");
        $("#ModalGenerarForm #txt_codigo").val("");
    }
    
}

HTMLCambiarEstado=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        AjaxCandidato.Cargar(HTMLCargarCandidato);
    }
}

AgregarEditarAjax=function(){
    if( ValidaForm() ){
        AjaxCandidato.AgregarEditar(HTMLAgregarEditar);
    }
}

HTMLAgregarEditar=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        $('#ModalCandidato').modal('hide');
        AjaxCandidato.Cargar(HTMLCargarCandidato);
    }
    else{
        msjG.mensaje('warning',result.msj,3000);
        
    }
}

</script>
