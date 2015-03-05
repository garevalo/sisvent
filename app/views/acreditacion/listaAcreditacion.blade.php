@extends('layouts.master')

@section('css')
    @parent
        {{ HTML::style('js/jquery.datatables/bootstrap-adapter/css/datatables.css')}}
 
@stop

@section('title')
   Lista de clientes para Acreditación
@stop



@section('content')

               		
    <div class="row well">

       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-top bordered-palegreen">
                        <span class="widget-caption">Lista de clientes para acreditación</span>
                    </div>
                    <div class="widget-body">
                        <div class="collapse in">
                           
                            {{ Datatable::table()
                                ->addColumn('RUC','Cliente','Direccion','Teléfono','Fecha','Acción') 
                                ->setUrl(route('api.clientesacreditacion'))  
                                ->render() }}
                            
                        </div>


                    </div>
                                        
                    </div>
        </div>

      
    </div>
<script type="text/javascript">

    function acreditar(idcliente){
        
        if(confirm("esta seguro de realizar esta acción?")){
            $.get("{{url('acreditacion/registrar')}}",{idcliente:idcliente},function(data,status){
                if(status==="success"){
                    var datos=jQuery.parseJSON(data);
                        $(".modal-body").text(datos.mensaje);
                        $('#modal-success').modal('show');

                        $("#ok").click(function() {
                            // $("#form")[0].reset();
                            window.location = datos.dir;
                        });
                    }
      
            });
        }
        else{
            $("#chk"+idcliente).prop('checked', false);
        }

    }
</script>

@stop


@section('js')
	@parent
        {{ HTML::script('js/jquery.datatables/jquery.dataTables.js')  }}
        {{ HTML::script('js/jquery.datatables/dataTables.bootstrap.js')  }}
        {{ HTML::script('js/funciones.js')  }}  
@stop
