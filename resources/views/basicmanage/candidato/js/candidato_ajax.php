<script type="text/javascript">
var AjaxCandidato={
    AgregarEditar:function(evento){
        var data=$("#ModalCandidatoForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDinamic/BasicManage.CandidatoBM@New';
        if(AddEdit==0){
            url='AjaxDinamic/BasicManage.CandidatoBM@Edit';
        }
        masterG.postAjax(url,data,evento);
    }, 
    Cargar:function(evento,pag){
        data={};
        $("#CandidatoForm input[type='hidden']").not('.mant').remove();
        url='AjaxDinamic/BasicManage.CandidatoBM@Load';
        masterG.postAjax(url,data,evento);
        
    },
    BuscarPersona:function(evento,dni){
        data={dni:dni};
        $("#CandidatoForm input[type='hidden']").not('.mant').remove();
        url='AjaxDinamic/BasicManage.CandidatoBM@SearchPerson';
        masterG.postAjax(url,data,evento);
        
    },
    CambiarEstado:function(evento,AI,id){
        $("#ModalCandidatoForm").append("<input type='hidden' value='"+AI+"' name='estadof'>");
        $("#ModalCandidatoForm").append("<input type='hidden' value='"+id+"' name='id'>");
        var data=$("#ModalCandidatoForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ModalCandidatoForm input[type='hidden']").not('.mant').remove();
        url='AjaxDinamic/BasicManage.CandidatoBM@EditStatus';
        masterG.postAjax(url,data,evento);
    }
};
</script> 
