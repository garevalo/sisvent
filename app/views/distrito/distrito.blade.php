@extends('layouts.master')

@section('css')
    @parent
        {{ HTML::style('js/jquery.datatables/bootstrap-adapter/css/datatables.css')}}
 
@stop

@section('title')
   Registrar Distrito
@stop

@section('content')

               		
    <div class="row well">

       <div class="col-lg-4 col-sm-5 col-md-4 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Registrar Distrito</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">
                           
                           {{ Form::open(array('url' => 'distrito/crear','class'=>"","role"=>"form",'files' => true, 'method' => 'post','id'=>'frm'))}}
                           <div id="iddistrito"></div> 
                           <div class="form-group">

                                <label >Distrito:</label>
                                <input type="text"  name="distrito" id="distrito" class="input-sm form-control" required="">
                                <div >
                                   <small class="text-danger" id="error-distrito"></small>
                               </div>

                            </div>

                            <div class="form-group" >

                                <label >Sector:</label>
                                <select class="form-control input-sm" name="sector" id="sector" required="">
                                    <option value="">Seleccione Sector</option>
                                    <option value="1">Lima Centro</option>
                                    <option value="2">Lima Moderna</option>
                                    <option value="3">Lima Norte</option>
                                    <option value="4">Lima Sur</option>
                                    <option value="5">Lima Este</option>
                                    <option value="6">Callao</option>
                                </select>
                               
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
                        <span class="widget-caption">Lista de Productos</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">
                           
                            {{ Datatable::table()
                                ->addColumn('ID','Distrito','Sector','Editar') 
                                ->setUrl(route('api.getdistritos'))  
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
        {{ HTML::script('js/distrito.js')  }}  
@stop
