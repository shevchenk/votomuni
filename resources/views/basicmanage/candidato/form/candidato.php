<div class="modal" id="ModalCandidato" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Producto</h4>
            </div>
            <div class="modal-body">
                <form id="ModalCandidatoForm">
                    <div class="col-md-12">
                        <label>DNI</label>
                    </div>

                    <div class="input-group margin">
                        <input type="hidden" class="form-control mant" id="txt_persona_id" name="txt_persona_id" readOnly="">
                        <input type="text" class="form-control" id="txt_dni" name="txt_dni" onkeypress="return masterG.validaNumeros(event);" maxlength="8">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" onclick="BuscarPersona()">Buscar</button>
                        </span>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Candidato</label>
                            <input type="text" class="form-control" id="txt_candidato" name="txt_candidato" disabled="">
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>DNI</label>
                            <input type="text" class="form-control" id="txt_dni" name="txt_dni" disabled="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sexo</label>
                            <input type="text" class="form-control" id="txt_sexo" name="txt_sexo" disabled="">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label></label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default active pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
