


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
                        $('#mod-success').modal('show');

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


function verificar_existe(valor, caja) {



}
/*
 * 
 * 
 * 
 * function calculo(obj,turno,prove1,tiempop,n){
 
 if(prove1==="proveedor1"){
 var prove=10;
 }
 if(prove1==="proveedor2"){
 prove=15;
 }
 if(prove1==="proveedor3"){
 prove=20;
 }
 
 var tf1=(obj*tiempop)/(turno*8);
 $("#tf"+n).val(tf1);
 $("#coste"+n).val(obj*prove);
 
 $("#boton").removeAttr("disabled");
 
 
 }
 function calculotot(){
 
 var   tf= parseFloat( $("#tf1").val()) +parseFloat($("#tf2").val()) ;
 var   tc= parseFloat( $("#coste1").val()) +parseFloat($("#coste2").val()) ;
 $("#total1").val(tf);
 $("#total2").val(tc);
 }
 
 
 $(function(){
 
 $("#obj1").keyup(function(){
 var obj=$("#obj1").val();
 var turno=$("input[name=turno]:checked").val();
 var prove=$("#prove1").val();
 var tiempop=$("#tiempop1").val();
 
 calculo(obj,turno,prove,tiempop,1);
 calculotot();
 //alert("hola");
 });
 
 $("#obj2").keyup(function(){
 var obj=$("#obj2").val();
 var turno=$("input[name=turno]:checked").val();
 var prove=$("#prove2").val();
 var tiempop=$("#tiempop2").val();
 
 calculo(obj,turno,prove,tiempop,2);
 calculotot();
 //alert("hola");
 });
 
 
 $("input[name=turno]:radio").click(function(){
 var obj1=$("#obj1").val();
 var turno=$("input[name=turno]:checked").val();
 var prove1=$("#prove1").val();
 var tiempop1=$("#tiempop1").val();
 
 var obj2=$("#obj2").val();
 var prove2=$("#prove2").val();
 var tiempop2=$("#tiempop2").val();
 
 
 calculo(obj1,turno,prove1,tiempop1,1);
 calculo(obj2,turno,prove2,tiempop2,2);
 calculotot();
 });
 $("#prove1").click(function(){
 var obj=$("#obj1").val();
 var turno=$("input[name=turno]:checked").val();
 var prove=$("#prove1").val();
 var tiempop=$("#tiempop1").val();
 
 calculo(obj,turno,prove,tiempop,1);
 calculotot();
 });
 $("#prove2").click(function(){
 var obj=$("#obj2").val();
 var turno=$("input[name=turno]:checked").val();
 var prove=$("#prove2").val();
 var tiempop=$("#tiempop2").val();
 
 calculo(obj,turno,prove,tiempop,2);
 calculotot();
 });
 });
 
 */

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


function terminar_produccion(idasig,url){
    
   if( confirm("¿esta seguro de cerrar esta produccion?")){
        $.post(url,{id:idasig},function(data){
//        disabled="disabled"
        $("#cierre"+idasig).attr("disabled","disabled");
//        alert(data);
    });
   }
    
   
    
}