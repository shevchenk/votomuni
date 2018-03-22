<div class="modal" id="ModalPersona" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header btn-info">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Datos Personales</h4>
        </div>
        <div class="modal-body">
          <form id="ModalPersonaForm" name="ModalPersonaForm">
          <fieldset>
          
            <div class="row form-group">
              <div class="col-sm-12"> <!--INICIO DE COL SM 12-->
                <div class="col-sm-4">
                  <label>Nombre</label>
                  <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="Nombre">
                </div>
                <div class="col-sm-4">
                  <label>Apellido Paterno</label>
                  <input type="text" class="form-control" id="txt_paterno" name="txt_paterno" placeholder="Apellido Paterno">
                </div>
                <div class="col-sm-4">
                  <label>Apellido Materno</label>
                  <input type="text" class="form-control" id="txt_materno" name="txt_materno" placeholder="Apellido Materno">
                </div>           
              </div> <!--FIN DE COL SM 12-->


              <div class="col-sm-12"><!--INICIO DE COL SM 12-->
                <div class="col-sm-4">
                  <label>DNI</label>
                  <input type="text" onkeypress="return masterG.validaNumerosMax(event,this,8);" class="form-control" id="txt_dni" name="txt_dni">
                </div>

                <div class="col-sm-4">
                  <label>Sexo</label>
                  <select class="form-control selectpicker show-menu-arrow" id="slct_sexo" name="slct_sexo">
                      <option value="0">.::Seleccione::.</option>
                      <option data-icon="fa fa-female" 
                                        value="F">Femenino</option>
                      <option data-icon="fa fa-male" 
                                        value="M">Masculino</option>
                  </select>
                </div>    

                <div class="col-sm-4">
                  <label>Password</label>
                  <input type="password" class="form-control" id="txt_password" name="txt_password" placeholder="Password">
                </div>
              </div><!--FIN DE COL SM 12-->   

              <div class="col-sm-12"><!--INICIO DE COL SM 12-->
                <div class="col-sm-4">
                  <label>Email</label>
                  <input type="text" class="form-control" id="txt_email" name="txt_email" placeholder="Email">
                </div>  

                <div class="col-sm-4">
                    <label>Fecha Nacimiento</label>
                    <input type="text" class="form-control fechas" id="txt_fecha_nacimiento" name="txt_fecha_nacimiento" placeholder="0000-00-00" > <!-- onfocus="blur()"/-->
                </div>

                <div class="col-sm-4">
                  <label>Telefono</label>
                  <input type="text" onkeypress="return masterG.validaNumerosMax(event,this,7);" class="form-control" id="txt_telefono" name="txt_telefono">
                </div>
              </div><!--FIN DE COL SM 12-->

              <div class="col-sm-12"><!--INICIO DE COL SM 12-->
                <div class="col-sm-4">
                  <label>Celular</label>
                  <input type="text" onkeypress="return masterG.validaNumerosMax(event,this,9);" class="form-control" id="txt_celular" name="txt_celular">
                </div>            
                <div class="col-sm-4">
                  <label>Estado</label>
                    <select class="form-control selectpicker show-menu-arrow" name="slct_estado" id="slct_estado">
                                <option  value='0'>Inactivo</option>
                                <option  value='1'>Activo</option>
                    </select>
                </div>
              </div><!--FIN DE COL SM 12-->
            </div>
            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default active pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
