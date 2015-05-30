@extends('layouts.master')

@section('css')
    @parent
        {{ HTML::style('js/jquery.datatables/bootstrap-adapter/css/datatables.css')}}
 
@stop

@section('title')
   Registrar Categoría
@stop

@section('content')

               		
    <div class="row well">

       <div class="col-lg-4 col-sm-5 col-md-4 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption" id="information-title">Registrar Categorías</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">
                           
                           {{ Form::open(array('url' => 'categoria/crear','class'=>"","role"=>"form",'files' => true, 'method' => 'post','id'=>'frm'))}}
                           <div id="idcategoria"></div> 
                           <div class="form-group">

                                <label >Categoría:</label>
                                <input type="text"  name="categoria" id="categoria" class="input-sm form-control" required="">
                                <div >
                                   <small class="text-danger" id="error-categoria"></small>
                               </div>

                            </div>
                            
                           <button onclick="guardar_ajax('frm');" class="btn btn-success" type="submit" name="guardar" id="guardar"><span class="glyphicon glyphicon-save"></span> Guardar </button>
                           {{Form::close()}}
                            
                        </div>
                    </div>
                                        
                    </div>
        </div>
        
        <div class="col-lg-8 col-sm-7 col-md-8 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Lista de Categorías</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">
                           
                            {{ Datatable::table()
                                ->addColumn('ID','Categoria','Editar') 
                                ->setUrl(route('api.getcategorias'))  
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
        {{ HTML::script('js/categoria.js')  }}  
@stop
