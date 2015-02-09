@extends('layouts.master')

@section('css')
    @parent
        {{ HTML::style('js/jquery.datatables/bootstrap-adapter/css/datatables.css')}}
 
@stop

@section('title')
   Registrar Producto
@stop



@section('content')

   @if(isset($confirm))
    
    <div id="modal-success" class="modal modal-message modal-success" style="" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="glyphicon glyphicon-check"></i>
                    </div>
                    <div class="modal-title">Success</div>

                    <div class="modal-body">You have done great!</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                    </div>
                </div>  / .modal-content 
            </div>  / .modal-dialog 
    </div>
    @endif
               		
    <div class="row well">

       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Lista de Cotizacion</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">
                            <table class="table table-bordered table-condensed table-striped">
                                <thead>
                                    <th>id</th>
                                    <th>Contacto</th>
                                    <th>Tipo Pago</th>
                                    <th>Cliente</th>
                                    <th>Generar Orden Compra</th>
                                </thead>
                                <tbody>
                                    @foreach($cotizacion as $key=>$cotiza)
                                    <tr>
                                        <td>{{$cotiza->idcotizacion}}</td>
                                        <td>{{$cotiza->contacto}}</td>
                                        <td>{{$cotiza->tipo_pago}}</td>
                                        <td>{{$cotiza->idclientes}}</td>
                                        
                                        <td><a href="#">Generar</a></td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                                    
                                
                            </table>
                               
                        </div>


                    </div>
                                        
                    </div>
        </div>

      
    </div>


@stop


@section('js')
	@parent
        {{ HTML::script('js/jquery.datatables/jquery.dataTables.js')  }}
        {{ HTML::script('js/jquery.datatables/dataTables.bootstrap.js')  }}
        {{ HTML::script('js/funciones.js')  }}  
@stop
