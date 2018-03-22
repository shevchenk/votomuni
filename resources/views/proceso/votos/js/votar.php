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

        html += '<div class="row">';
        $.each(result.data,function(index, r){

            html+='<div class="col-lg-4">'+
                      '<img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">'+
                      '<h2>'+r.nombre+' '+r.paterno+'</h2>'+
                      '<p>Puede votar por este candidato</p>'+
                      '<p><button type="button" id="btnbuscar_votos" name="btnbuscar_votos" class="btn btn-primary" onclick="guadarVoto('+r.id+', 1)">VOTAR</button></p>'+
                    '</div>';
        });
        html += '</div>';
        //html += '<div class="row"><button type="button" id="btnbuscar_votos" name="btnbuscar_votos" class="btn btn-primary">GUARDAR</button></div>';

        $("#dv_candidatos").html(html).show('slow');

    }else if( result.rst==3 ){
        msjG.mensaje('danger',result.msj,4000);
    }else{
        msjG.mensaje('warning',result.msj,4000);
    }

};



guadarVoto=function(candidato_id, pre_voto_id){
    sweetalertG.confirm("¿Estás seguro?", "Confirme su Voto", function(){
        AjaxData.guadarVoto(candidato_id, pre_voto_id);
        $("#dv_candidatos").html('').hide('slow');
    });
    
}

</script>
