@extends('layouts.master')

@section('css')
    @parent

@stop

@section('title')
    Usuarios
@stop


@section('content')

<div class=row>
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
             <div class="ibox-title">
                <h5>Usuarios</h5> 
                 || 
                 {{ HTML::link('usuarios/nuevo', 'Crear Usuario'); }}
             </div>

             <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-12">
             	
                        <div class="panel panel-primary">
                            <div class="panel-heading">Panel heading</div>
                             <table class="table table-bordered table-condensed table-hover">
                                <thead>
                                    <th>Usuario</th>
                                    <th>Contraseña</th>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $usuario)
                                      <!-- Equivalente en Blade a <?php //foreach ($usuarios as $usuario) ?> -->
                                        <tr>
                                          <td>{{$usuario->usuario}}</td>
                                          <td>{{$usuario->password }} </td>
                                        </tr>
                                        <!-- Equivalente en Blade a <?php //echo $usuario->nombre.' '.$usuario->apellido ?> -->
                                    @endforeach 

                                </tbody>    
                             </table>   
                        </div>
                    </div>
                </div>
             </div>	
   	
        </div>        
		
	</div>
</div>
@stop


@section('js')
	@parent
     
@stop