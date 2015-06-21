@extends('layouts.master')

@section('css')
    @parent
        {{ HTML::style('js/jquery.datatables/bootstrap-adapter/css/datatables.css')}}
 
@stop

@section('title')
   Lista de Ordenes de Compra
@stop

@section('content')

               		
    <div class="row well">

       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <?php /*<button class="btn btn-primary btn-lg">Cerrar Despacho</button><br>*/ ?>
        <a href="{{url("despacho/cerrar")}}" class="btn btn-primary btn-lg">Cerrar Envíos En Despacho</a>
        
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Lista de Ordenes de Compra Despachadas</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">
                           
                            {{ Datatable::table()
                                ->addColumn('OC','Cliente','RUC','Precio','Estado','Documentos') 
                                ->setUrl(route('api.despacho'))  
                                ->render() }}
                            
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
