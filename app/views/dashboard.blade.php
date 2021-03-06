@extends('layouts.master')


@section('title')
   Menú Principal
@stop


@section('css')
    @parent


@stop

@section('content')

    <div class=row>
        @if( Auth::user()->idtipo==1 )
    	<div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="databox radius-bordered databox-shadowed databox-graded">
                
                <div class="databox-left bg-lightred">
                    <div class="databox-piechart">
                        <span class="white font-90">
                            <i class="fa fa-cog fa-3x"></i>
                        </span>
                    </div>
                </div>
                <div class="databox-right">
                    <a href="{{url("productos/nuevo")}}">
                        <span class="databox-number lightred">Productos</span>
                        <div class="databox-text darkgray">Mantenimiento de Productos</div>
                        <div class="databox-stat bg-lightred radius-bordered">
                            <div class="stat-text">1</div>
                            <i class="stat-icon fa fa-arrow-down"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="databox radius-bordered databox-shadowed databox-graded">
                <div class="databox-left bg-lightred">
                    <div class="databox-piechart">
                        <span class="white font-90">
                            <i class="fa fa-users fa-3x"></i>
                        </span>
                    </div>
                </div>
                <div class="databox-right">
                    <a href="{{url("usuarios/nuevo")}}">
                        <span class="databox-number lightred">Usuarios</span>
                        <div class="databox-text darkgray">Mantenimiento de Usuarios</div>
                        <div class="databox-stat bg-lightred radius-bordered">
                            <div class="stat-text">2</div>
                            <i class="stat-icon fa fa-arrow-down"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="databox radius-bordered databox-shadowed databox-graded">
                <div class="databox-left bg-lightred">
                   <div class="databox-piechart">
                        <span class="white font-90">
                            <i class="fa fa-list-alt fa-3x"></i>
                        </span>
                    </div>
                </div>
                <div class="databox-right">
                    <a href="{{url("cotizacion")}}">
                        <span class="databox-number lightred">Orden Compra</span>
                        <div class="databox-text darkgray">Registrar Orden de Compra</div>
                        <div class="databox-stat bg-lightred radius-bordered">
                            <div class="stat-text">3</div>
                            <i class="stat-icon fa fa-arrow-down"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endif
<!--        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="databox radius-bordered databox-shadowed databox-graded">
                <div class="databox-left bg-lightred">

                </div>
                <div class="databox-right">
                    <span class="databox-number lightred">322</span>
                    <div class="databox-text darkgray">Registro de Productos</div>
                    <div class="databox-stat bg-lightred radius-bordered">
                        <div class="stat-text">4%</div>
                        <i class="stat-icon fa fa-arrow-down"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="databox radius-bordered databox-shadowed databox-graded">
                <div class="databox-left bg-lightred">

                </div>
                <div class="databox-right">
                    <span class="databox-number lightred">322</span>
                    <div class="databox-text darkgray">Registro de Productos</div>
                    <div class="databox-stat bg-lightred radius-bordered">
                        <div class="stat-text">4%</div>
                        <i class="stat-icon fa fa-arrow-down"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="databox radius-bordered databox-shadowed databox-graded">
                <div class="databox-left bg-lightred">

                </div>
                <div class="databox-right">
                    <span class="databox-number lightred">322</span>
                    <div class="databox-text darkgray">Registro de Productos</div>
                    <div class="databox-stat bg-lightred radius-bordered">
                        <div class="stat-text">4%</div>
                        <i class="stat-icon fa fa-arrow-down"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="databox radius-bordered databox-shadowed databox-graded">
                <div class="databox-left bg-lightred">

                </div>
                <div class="databox-right">
                    <span class="databox-number lightred">322</span>
                    <div class="databox-text darkgray">Registro de Productos</div>
                    <div class="databox-stat bg-lightred radius-bordered">
                        <div class="stat-text">4%</div>
                        <i class="stat-icon fa fa-arrow-down"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="databox radius-bordered databox-shadowed databox-graded">
                <div class="databox-left bg-lightred">

                </div>
                <div class="databox-right">
                    <span class="databox-number lightred">322</span>
                    <div class="databox-text darkgray">Registro de Productos</div>
                    <div class="databox-stat bg-lightred radius-bordered">
                        <div class="stat-text">4%</div>
                        <i class="stat-icon fa fa-arrow-down"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="databox radius-bordered databox-shadowed databox-graded">
                <div class="databox-left bg-lightred">

                </div>
                <div class="databox-right">
                    <span class="databox-number lightred">322</span>
                    <div class="databox-text darkgray">Registro de Productos</div>
                    <div class="databox-stat bg-lightred radius-bordered">
                        <div class="stat-text">4%</div>
                        <i class="stat-icon fa fa-arrow-down"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="databox radius-bordered databox-shadowed databox-graded">
                <div class="databox-left bg-lightred">

                </div>
                <div class="databox-right">
                    <span class="databox-number lightred">322</span>
                    <div class="databox-text darkgray">Registro de Productos</div>
                    <div class="databox-stat bg-lightred radius-bordered">
                        <div class="stat-text">4%</div>
                        <i class="stat-icon fa fa-arrow-down"></i>
                    </div>
                </div>
            </div>
        </div>
        
       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="databox bg-white radius-bordered">
                <div class="databox-left bg-themesecondary">
                    <div class="databox-piechart">
                        <span class="white font-90">
                            <i class="fa fa-automobile fa-3x"></i>
                        </span>
                    </div>
                </div>
                <div class="databox-right">
                    <span class="databox-number themesecondary">28</span>
                    <div class="databox-text darkgray">NEW TASKS</div>
                    <div class="databox-stat themesecondary radius-bordered">
                        <i class="stat-icon icon-lg fa fa-tasks"></i>
                    </div>
                </div>
            </div>
      </div>-->
    </div>
@stop


@section('js')
	@parent

@stop