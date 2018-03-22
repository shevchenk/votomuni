@extends('layout.master')  

@section('include')
@parent
{{ Html::style('lib/datatables/dataTables.bootstrap.css') }}
{{ Html::script('lib/datatables/jquery.dataTables.min.js') }}
{{ Html::script('lib/datatables/dataTables.bootstrap.min.js') }}

{{ Html::style('lib/bootstrap-select/dist/css/bootstrap-select.min.css') }}
{{ Html::script('lib/bootstrap-select/dist/js/bootstrap-select.min.js') }}
{{ Html::script('lib/bootstrap-select/dist/js/i18n/defaults-es_ES.min.js') }}

@include( 'basicmanage.generar.js.generar_ajax' )
@include( 'basicmanage.generar.js.generar' )
@stop

@section('content')
<section class="content-header">
    <h1>Candidatos
        <small>Mantenimiento</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-sitemap"></i> Mantenimiento</a></li>
        <li class="active">Generar Código</li>
    </ol>
</section> 

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                        <form id="ModalGenerarForm">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>DNI</label>
                                    <input type="text" class="form-control" id="txt_dni" name="txt_dni" disabled="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <input type="text" class="form-control" id="txt_sexo" name="txt_sexo" disabled="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Código</label>
                                    <input type="text" class="form-control" id="txt_codigo" name="txt_codigo" readOnly="">
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label></label>
                            </div>
                        </form>
                    <div class='btn btn-primary btn-sm' class="btn btn-primary" onClick="AgregarEditarAjax()" >
                        <i class="fa fa-plus fa-lg"></i>&nbsp;Nuevo</a>
                    </div>
                </div><!-- .box-body -->
            </div><!-- .box -->
        </div><!-- .col -->
    </div><!-- .row -->
</section><!-- .content -->

@stop

@section('form')

@stop
