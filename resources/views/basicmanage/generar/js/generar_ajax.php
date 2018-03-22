<script type="text/javascript">
var AjaxCandidato={
    AgregarEditar:function(evento){
        var data=$("#ModalGenerarForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDinamic/BasicManage.CandidatoBM@NewVotante';
        masterG.postAjax(url,data,evento);
    }, 
    BuscarPersona:function(evento,dni){
        data={dni:dni};
        $("#ModalGenerarForm input[type='hidden']").not('.mant').remove();
        url='AjaxDinamic/BasicManage.CandidatoBM@SearchPerson';
        masterG.postAjax(url,data,evento);
        
    },
};
</script> 
