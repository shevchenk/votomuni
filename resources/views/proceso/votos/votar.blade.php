@extends('layout.master')

@section('include')
    @parent
    {{ Html::style('lib/datatables/dataTables.bootstrap.css') }}
    {{ Html::script('lib/datatables/jquery.dataTables.min.js') }}
    {{ Html::script('lib/datatables/dataTables.bootstrap.min.js') }}

    {{ Html::style('lib/bootstrap-select/dist/css/bootstrap-select.min.css') }}
    {{ Html::script('lib/bootstrap-select/dist/js/bootstrap-select.min.js') }}
    {{ Html::script('lib/bootstrap-select/dist/js/i18n/defaults-es_ES.min.js') }}

    {{ Html::style('lib/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
    {{ Html::script('lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}
    {{ Html::script('lib/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js') }}

    @include( 'proceso.votos.js.votar_ajax' )
    @include( 'proceso.votos.js.votar' )

@stop

@section('content')
<section class="content-header">
    <h1>Votar
        <small>Votaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-sitemap"></i> Votaciones</a></li>
        <li class="active">Votar</li>
    </ol>
</section>

<section class="content">
    <div class="col-md-12">
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <form id="form_prevoto" name="form_prevoto" method="post" class="form-inline">        
              <div class="form-group">
                <label class="sr-only" for="exampleInputAmount"></label>
                <div class="input-group">
                  <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                  <input type="text" class="form-control" id="txt_codigo" name="txt_codigo" placeholder="0000">
                </div>
              </div>
              <button type="button" id="btnbuscar_votos" name="btnbuscar_votos" class="btn btn-primary">Votar</button>
            </form>
        </div>

        <div class="col-md-4"></div>
    </div>

    <div id="dv_candidatos" class="col-lg-12 text-center" style="display:none; margin-top: 30px; background-color: white; padding: 10px 10px;">
        <div class="row">
            <div class="col-lg-4">
              <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
              <h2>Candidato 1</h2>
              <p>Puede votar por este candidato</p>
              <p><a class="btn btn-default" href="#" role="button">VOTAR</a></p>
            </div>
            <div class="col-lg-4">
              <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
              <h2>Candidato 2</h2>
              <p>Puede votar por este candidato</p>
              <p><a class="btn btn-default" href="#" role="button">VOTAR</a></p>
            </div>
            <div class="col-lg-4">
              <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
              <h2>Candidato 3</h2>
              <p>Puede votar por este candidato</p>
              <p><a class="btn btn-default" href="#" role="button">VOTAR</a></p>
            </div>
        </div>
        <div class="row"><button type="button" id="btnbuscar_votos" name="btnbuscar_votos" class="btn btn-primary">GUARDAR</button></div>
    </div>
    
</section>
@stop

