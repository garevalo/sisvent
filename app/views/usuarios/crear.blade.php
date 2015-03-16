@extends('layouts.master')

@section('css')
    @parent
    {{ HTML::style('js/jquery.datatables/bootstrap-adapter/css/datatables.css')}}     
 
@stop

@section('title')
   Crear Usuarios
@stop


@section('content')

        <div class="row well">
            <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                {{ Form::open(array('url' => 'usuarios/crear','name'=>'form','id'=>'form')) }}
                                <div class="widget">
                                    <div class="widget-header bordered-top bordered-palegreen">
                                        <span class="widget-caption">Registro de Usuario</span>
                                    </div>
                                    <div class="widget-body">
                                        <div id="registration-form">
                                            <form role="form">
                                                <div class="form-title">
                                                    Información de Usuario
                                                </div>
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required="" autocomplete="off">
                                                        <i class="glyphicon glyphicon-user circular"></i>
                                                    </span>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="contraseña" required="">
                                                        <i class="fa fa-lock circular"></i>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        
                                                        <select class="form-control" name="tipo" id="tipo" required="">
                                                            <option value="">Seleccione</option>
                                                            <option value="1">Administrador</option>
                                                            <option value="2">Administrativo</option>
                                                            <option value="3">Almacen</option>
                                                            <option value="4">Acreditación</option>
                                                            <option value="5">Despacho</option>
                                                        </select>
                                                        <i class="fa fa-weibo circular"></i>
                                                    </span>
                                                </div>
                                                <div class="form-title">
                                                    Información Personal
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <span class="input-icon icon-right">
                                                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required="">
                                                                <i class="fa fa-user"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <span class="input-icon icon-right">
                                                                <input type="text" class="form-control" placeholder="Apellido Paterno" name="apepaterno" id="apepaterno" required="">
                                                                <i class="fa fa-user"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <span class="input-icon icon-right">
                                                                <input type="text" class="form-control" placeholder="Apellido Materno" name="apematerno" id="apematerno" required="">
                                                                <i class="fa fa-user"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <span class="input-icon icon-right">
                                                                <input type="text" class="form-control" placeholder="telefono" id="telefono" name="telefono">
                                                                <i class="glyphicon glyphicon-phone circular"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
<!--                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <span class="input-icon icon-right">
                                                                <input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" placeholder="Birth Date">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                        </div>
                                                    </div>-->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <span class="input-icon icon-right">
                                                                <input type="text" class="form-control" placeholder="DNI" id="dni" name="dni" required="">
                                                                <i class="glyphicon glyphicon-user circular"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <span class="input-icon icon-right">
                                                                <input type="text" class="form-control" placeholder="Correo" name="correo" id="correo">
                                                                <i class="fa fa-mail-reply-all circular"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <button type="submit" class="btn btn-primary" onclick="registrar_ajax('form',2)"><i class="glyphicon glyphicon-save"></i> Guardar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
            {{ Form::close() }}
                            
            <div class="col-lg-8 col-sm-6 col-md-6 col-xs-12">
                <div class="widget">
                        <div class="widget-header bordered-top bordered-palegreen">
                            <span class="widget-caption">Lista de Productos Registrados</span>
                        </div>
                        <div class="widget-body">
                            <div class="collapse in">
                              
                                {{ Datatable::table()
                                ->addColumn('Id','Usuario','Nombres','Apellido','Accion')       // these are the column headings to be shown
                                ->setUrl(route('api.usuarios'))   // this is the route where data will be retrieved
                                ->render() }}
                            </div>

                        </div>
                </div>
        </div>
        </div>


@stop


@section('js')
	@parent
        {{  HTML::script('js/funciones.js')  }}
        {{ HTML::script('js/jquery.datatables/jquery.dataTables.js')  }}
        {{ HTML::script('js/jquery.datatables/dataTables.bootstrap.js')  }}
@stop
