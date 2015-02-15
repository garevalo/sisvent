@extends('layouts.master')

@section('css')
    @parent
        
 
@stop

@section('title')
   Crear Usuarios
@stop


@section('content')

<!--    <div class=row>
    	<div class="col-lg-12">
    		<div class="ibox float-e-margins">
                 <div class="ibox-title">
                    <h5>Crear Usuarios </h5> || {{ HTML::link('usuarios', 'volver'); }}
                 </div>

                 
       	
            </div>        
    		
    	</div>
    </div>-->

        <div class="row well">
            <div class="col-lg-3 col-sm-5 col-xs-12">
                {{ Form::open(array('url' => 'usuarios/crear')) }}
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
                                                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required="">
                                                        <i class="glyphicon glyphicon-user circular"></i>
                                                    </span>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                        <input type="text" class="form-control" name="contrasena" id="contrasena" placeholder="contraseña" required="">
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
                                                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                                                                <i class="fa fa-user"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <span class="input-icon icon-right">
                                                                <input type="text" class="form-control" placeholder="Apellido Paterno" name="apepaterno" id="apepaterno">
                                                                <i class="fa fa-user"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <span class="input-icon icon-right">
                                                                <input type="text" class="form-control" placeholder="Apellido Materno" name="apematerno" id="apematerno">
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
                                                                <input type="text" class="form-control" placeholder="DNI" id="dni" name="dni">
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
                                               
                                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Guardar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
            {{ Form::close() }}

        </div>


@stop


@section('js')
	@parent

@stop
