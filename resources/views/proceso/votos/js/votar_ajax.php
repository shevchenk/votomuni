<script type="text/javascript">
var AjaxData={    
    buscarPreVoto:function(evento){
        var data=$('#form_prevoto').serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDinamic/Proceso.VotarPR@buscarVoto';
        masterG.postAjax(url,data,evento);
    },
    guadarVoto:function(candidato_id, pre_voto_id, evento) {

        var data={pre_voto_id : pre_voto_id, candidato_id : candidato_id};
        url='AjaxDinamic/Proceso.VotarPR@nuevoVoto';
        masterG.postAjax(url,data,evento);
    }    
};
</script>
