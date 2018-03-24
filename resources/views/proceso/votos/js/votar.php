<script type="text/javascript">

$(document).ready(function() {

    $("#btnbuscar_votos").click(function (){

        if( $.trim($("#txt_codigo").val())!=='')
        {
            AjaxData.buscarPreVoto(HTMLCargarDatos);            
        }
        else
        {
            swal("Mensaje", "Por favor ingrese su código de Voto!");
        }
    });

});


HTMLCargarDatos=function(result){
    
    if( result.rst==1 ){
        
        //console.log(result.data);
        var html = '';

        html += '<div class="row"><div class="col-lg-3"></div>';
        $.each(result.data,function(index, r){

            html+='<div class="col-lg-3">'+
                      '<img class="img-circle" src="'+r.foto+'" alt="Generic placeholder image" width="140" height="140">'+
                      '<h2>'+r.nombre+' '+r.paterno+'</h2>'+
                      '<p>Seleccione su Candidato</p>'+
                      '<p><button type="button" id="btnbuscar_votos" name="btnbuscar_votos" class="btn btn-primary" onclick="guadarVoto('+r.id+', '+result.pre_voto_id+')">VOTAR</button></p>'+
                    '</div>';
        });
        html += '</div>';
        //html += '<div class="row"><button type="button" id="btnbuscar_votos" name="btnbuscar_votos" class="btn btn-primary">GUARDAR</button></div>';

        $("#dv_candidatos").html(html).show('slow');

    }else if( result.rst==3 ){
        $("#dv_candidatos").html('').hide('slow');
        msjG.mensaje('danger',result.msj,4000);
    }else{
        $("#dv_candidatos").html('').hide('slow');
        msjG.mensaje('warning',result.msj,4000);
    }

};

guadarVoto=function(candidato_id, pre_voto_id){
    swal({
          title: "Confirme su Voto!",   
          //text: "Confirme su Voto!",   
          type: "info",   
          showCancelButton: true,   
          confirmButtonColor: "#0489B1",   
          confirmButtonText: "Confirmar",   
          cancelButtonText: "Cancelar",   
          closeOnConfirm: false,   
          closeOnCancel: false
          //showLoaderOnConfirm: true 
        }, function(isConfirm){   
          if (isConfirm) 
          {
            swal("Confirmado!", "Voto registrado satisfactoriamente!", "success");
            AjaxData.guadarVoto(candidato_id, pre_voto_id);
            AjaxData.actualizaPreVoto(pre_voto_id);
            $("#dv_candidatos").html('').hide('slow');
            $("#txt_codigo").val('');
          } 
          else 
          {     
            swal("Cancelado", "No ha confirmado su voto!", "error");   
          } 
    });
    
}

</script>
