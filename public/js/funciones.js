


function contador_input(form) {

    var cont = 0;
    $(form).find(':input').each(function() {
        var type = this.type;
        var tag = this.tagName.toLowerCase();
        if (type === 'text' || type === 'password' || tag === 'textarea' || type === 'date' || tag === 'select' || type === 'number')
        {
            if (this.value === '') {
                cont++;
            }
        }

    });
    return cont;
}

function registrar_ajax(form, c) {


    if (contador_input('#' + form) <= c) {

        $('#' + form).submit(function(event) {
            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr("action"),
                data: formData,
                cache: false,
                mimeType: 'multipart/form-data',
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data) {
                    var datos = jQuery.parseJSON(data);
                    if (datos.error) {

                        bootbox.alert(datos.error);
                        //location.reload();
                    }

                    else if (datos.dir) {
                        $(".modal-body").text(datos.mensaje);
                        $('#modal-success').modal('show');

                        $("#ok").click(function() {
                            // $("#form")[0].reset();
                            window.location = datos.dir;
                        });
                    }
                    else if (datos.datos) {
                        console.log(data);
                    }
                }
            });

            event.preventDefault();
            event.unbind();
        });
    }
}

function registrar_modal(form, c) {


    if (contador_input('#' + form) <= c) {


        $('#' + form).submit(function(event) {
            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr("action"),
                data: formData,
                cache: false,
                mimeType: 'multipart/form-data',
                contentType: false,
                cache: false,
                        processData: false,
                type: 'POST',
                success: function(data) {
                    var datos = jQuery.parseJSON(data);
                    if (datos.error) {

                        $("#modal-error").fadeIn(100).html(datos.error);
                        //location.reload();
                    }

                    else if (datos.dir) {

                        $('.bootbox ').modal('hide');
                        
                    }
                    else if (datos.datos) {
                        console.log(data);
                    }
                    $(".modal-body").text(datos.mensaje);
                    $('#modal-success').modal('show');
                }
            });

            event.preventDefault();

        });
    }
}


function buscar_ajax(form, content) {


    if (contador_input('#' + form) === 0) {


        $('#' + form).submit(function(event) {

            //// $("#"+content).html("Cargando..."); 
            //$( "#dialog" ).dialog();
            $('#small-modal').modal('show');
            $.post($(this).attr("action"), $(this).serialize(), function(data, status) {

                if (status === "success") {
                    $('#small-modal').modal('hide');
                    //$( "#dialog" ).dialog( "close" );  
                    $("#" + content).html(data);

                }
            });

            event.preventDefault();
            event.unbind();
        });

    }

    //alert(contador_input('#'+form));
}


function buscar_ajax_3(form, content) {


    if (contador_input('#' + form) === 0) {


        $('#' + form).submit(function(event) {

            $('#small-modal').modal('show');

            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr("action"),
                data: formData,
                cache: false,
                mimeType: 'multipart/form-data',
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data) {
                    $('#small-modal').modal('hide');
                    $("#" + content).html(data);
                }
            });

            event.preventDefault();
            event.unbind();
        });

    }

    //alert(contador_input('#'+form));
}


function buscar_ajax2(form, content) {


    $('#' + form).submit(function(event) {

        //// $("#"+content).html("Cargando..."); 
        //$( "#dialog" ).dialog();
        $('#small-modal').modal('show');
        $.post($(this).attr("action"), $(this).serialize(), function(data, status) {

            if (status === "success") {
                $('#small-modal').modal('hide');
                //$( "#dialog" ).dialog( "close" );  
                $("#" + content).html(data);

            }
        });

        event.preventDefault();
    });


}

function eliminar_ajax(dir, id) {


    $('#mod-warning').modal('show');

    $("#eliminar").click(function(event) {
        $.post(dir, {"id": id}, function(data, status) {

            if (status === "success") {
                $(".fila" + id).fadeOut(500);
            }
            else {
                alert("error");
            }
        });

        event.preventDefault();
    });


}


function limpiar() {
    $("#form")[0].reset();

}



function seg(id,idasig,url) {


    $("#" + id).toggle("2000");
    $.post(url,{id:idasig},function(data){
        $("#" + id).html(data);
    });
}

function proceso(id,url,idseg) {

    var cantidad = $("#enviar").parents("tr").find("input[name*='cantidad']").val();
    var area =     $("#enviar").parents("tr").find("select[name*='area']").val();
    var max  =      $("#enviar").parents("tr").find("input[name*='maximo']").val();
    console.log(max);
    if(parseInt(cantidad)>0){
        
        
        if(parseInt(cantidad) > parseInt(max)){
            $("#cantidad").attr("data-content","Debe ser menor a "+max+"");
            $("#cantidad").attr("data-toggle","popover");
            $("#cantidad").attr("data-placement","top");
            $("#cantidad").popover('show');
            $("#cantidad").focus();
        }
        else{
            $("#cantidad").popover('destroy');
            $("#cantidad").click(function(){
                $("#cantidad").popover('destroy');
            });
            if(area==="0"){

                $("#area").attr("data-content","Debe seleccionar una opcion");
                $("#area").attr("data-toggle","popover");
                $("#area").attr("data-placement","top");
                $("#area").popover('show');
                $("#area").focus();
            }
            else{
                $("#area").popover('destroy');
                $("#area").click(function(){
                     $("#area").popover('destroy');
                });

               $.post(url,{cantidad:cantidad,area:area,idasignar:id,idsegui:idseg},function(data){
                   
                   $("#vercantidad").text(max-cantidad);
                   $("#maximo").val(max-cantidad);
                   
                   $("#resultados2").html(data);
//                   console.log(data);
               });
            }
        }
    }
    
    else{

         $("#cantidad").attr("data-content","Debe ser mayor a 0");
         $("#cantidad").attr("data-toggle","popover");
         $("#cantidad").attr("data-placement","top");
         $("#cantidad").popover('show');
         $("#cantidad").focus();
    }
    event.unbind();



}


 function form_modal(titulo,form){
 
    $.get(form,function(data){


        bootbox.dialog({
                   title: titulo,
                   message: data
               }
           );

    });
 
 }
 
  function form_modal_acreditacion(titulo,form){
   
    var idcliente =$("#idcliente").val();
    var idcotizacion =$("#codigo").val();
    var ruc=$("#ruc").val();
    var nombre=$("#nombre").val();
    var precio=$("#precioneto").val();
      console.log(idcliente);
    $.get(form,{ruc:ruc,"nombre":nombre,"precio":precio,"idcliente":idcliente,"idcotizacion":idcotizacion},function(data){


        bootbox.dialog({
                   title: titulo,
                   message: data
               }
           );

    });
 
 }
 

 
function agregar_producto(url,id){
    var filas = ($("#table-body tr").length)+1;
    var idprod = ($("."+id).length);
   
   if(idprod>0){ 
       
       //alert("Este producto ya ha sido añadido a la cotización. Seleccione otro producto porfavor");
       $("#warning-title").text('Alerta');
       $("#warning-body").text('Este producto ya ha sido añadido a la cotización. Seleccione otro producto porfavor');
       $('#modal-warning').modal('show');
   }else{
    $.post(url,{id:id,filas:filas},function(data,status){
       
       if(status==="success"){
           
           $("#table-body").append(data);
           $(".bootbox").modal("hide");
           $('#modal-success').modal('show');
           
            
       }
     }); 
  }
 

 }
 
function solicitar_productos(idcli){
     $("#modal-body-success").text(idcli);
     $('#modal-success').modal('show');
} 
