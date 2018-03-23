<script type="text/javascript">
var AddEdit=0; //0: Editar | 1: Agregar
var CandidatoG={id:0,
persona_id:""}; // Datos Globales
$(document).ready(function() {
    $("#TableCandidato").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
    AjaxCandidato.Cargar(HTMLCargarCandidato);

    $('#ModalCandidato').on('shown.bs.modal', function (event) { 
       
        if( AddEdit==1 ){
            $(this).find('.modal-footer .btn-primary').text('Guardar').attr('onClick','AgregarEditarAjax();');
        }
        else{
            $(this).find('.modal-footer .btn-primary').text('Actualizar').attr('onClick','AgregarEditarAjax();');
            $("#ModalCandidatoForm").append("<input type='hidden' value='"+CandidatoG.id+"' name='id'>");
        }

        $("#ModalCandidatoForm #txt_persona_id").val("");
        $("#ModalCandidatoForm #txt_dni").val("");
        $("#ModalCandidatoForm #txt_sexo").val("");
        $("#ModalCandidatoForm #txt_candidato").val("");
        $('#ModalCandidatoForm #txt_dni').focus();
    });

    $('#ModalCandidato').on('hidden.bs.modal', function (event) {
        $("ModalCandidatoForm input[type='hidden']").not('.mant').remove();
      //  $("ModalCandidatoForm input").val('');
    });
});

ValidaForm=function(){
    var r=true;
    if( $.trim( $("#ModalCandidatoForm #txt_persona_id").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese DNI de Candidato válido',4000);
    }

    return r;
}

AgregarEditar=function(val,id){
    AddEdit=val;
    CandidatoG.id='';
    CandidatoG.persona_id='';

    $('#ModalCandidato').modal('show');
}

CambiarEstado=function(estado,id){
    sweetalertG.confirm("Confirmación!", "Confirme eliminación", function(){
        AjaxCandidato.CambiarEstado(HTMLCambiarEstado,estado,id);
    }); 
}

BuscarPersona=function(){
    var dni=$("#ModalCandidato #txt_dni").val();
    AjaxCandidato.BuscarPersona(HTMLCargarPersona,dni);
}

HTMLCargarPersona=function(result){
    console.log(result);
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        $("#ModalCandidatoForm #txt_persona_id").val(result.data.id);
        $("#ModalCandidatoForm #txt_dni").val(result.data.dni);
        $("#ModalCandidatoForm #txt_sexo").val(result.data.sexo);
        $("#ModalCandidatoForm #txt_candidato").val(result.data.paterno+' '+result.data.materno+' '+result.data.nombre);
    } else{
        msjG.mensaje('warning',result.msj,3000);
        $("#ModalCandidatoForm #txt_persona_id").val("");
        $("#ModalCandidatoForm #txt_dni").val("");
        $("#ModalCandidatoForm #txt_sexo").val("");
        $("#ModalCandidatoForm #txt_candidato").val("");
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

HTMLCargarCandidato=function(result){
    var html="";
    $('#TableCandidato').DataTable().destroy();

    $.each(result.data,function(index,r){
        estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(1,'+r.id+')" class="btn btn-danger">Eliminar</span>';
        if(r.estado==1){
            estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(0,'+r.id+')" class="btn btn-danger">Eliminar</span>';
        }

        html+="<tr id='trid_"+r.id+"'>"+
            "<td class='sucursal'>"+(index+1)+"</td>"+
            "<td class='sucursal'>"+r.candidato+"</td>"+
            "<td class='direccion'>"+r.dni+"</td>"+
            "<td class='telefono'>"+r.sexo+"</td>"+
            "<td>";
        html+="<input type='hidden' class='estado' value='"+r.estado+"'>"+estadohtml+"</td>";
        html+="</tr>";
    });
    $("#TableCandidato tbody").html(html); 
    $("#TableCandidato").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false        
    });
};
</script>
