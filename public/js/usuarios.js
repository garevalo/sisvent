
function get_usuario(url,id){

	$.get(url,{id:id},function(data){
		//var datos=JQuery.
		console.log(data);
		
		$("#form").attr("action","editar");
		$("#btnguardar").attr("onclick"," editar_usuario_ajax('frm')");
		$("#campo_idusuario").html("<input type='hidden' name='idusuario' value='"+id+"'>");
		$("#producto").val(data.nombre_producto);
		$("#descripcion").val(data.descripcion_producto);
		$("#precio").val(data.precio_producto);
		$("#categoria").val(data.idcategoria);
		
	},"json");
	
}

function guardar_usuario_ajax(form) {


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
                    	var errores=datos.error;
                        console.log(datos.error);
                       	
                       	if(typeof errores.usuario !="undefined"){$("#error-usuario").html(errores.usuario[0]); } else{$("#error-usuario").html("");}

                        if(typeof errores.contrasena !="undefined"){$("#error-contrasena").html(errores.contrasena[0]);} else{$("#error-contrasena").html("");}

                        if(typeof errores.nombre !="undefined"){$("#error-nombre").html(errores.nombre[0]);} else{$("#error-nombre").html("");}
                        
                        if(typeof errores.apepaterno !="undefined"){			
							$("#error-apepaterno").html(errores.apepaterno[0]);
                        }
                        else{$("#error-apepaterno").html("");}

                        if(typeof errores.apematerno !="undefined"){
							
							$("#error-apematerno").html(errores.apematerno[0]);
                        }
                        else{$("#error-apematerno").html("");}

                        if(typeof errores.telefono !="undefined"){
							
							$("#error-telefono").html(errores.telefono[0]);
                        }
                        else{$("#error-telefono").html("");}

                        if(typeof errores.dni !="undefined"){
							
							$("#error-dni").html(errores.dni[0]);
                        }
                        else{$("#error-dni").html("");}

                        if(typeof errores.correo !="undefined"){
							
							$("#error-correo").html(errores.correo[0]);
                        }
                        else{$("#error-correo").html("");}

                        if(typeof errores.tipo !="undefined"){
							
							$("#error-tipo").html(errores.tipo[0]);
                        }
                        else{$("#error-tipo").html("");}
                        
                        
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


function editar_usuario_ajax(form) {


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
                    	var errores=datos.error;
                        console.log(datos.error);
                       	
                       	if(typeof errores.producto !="undefined"){
							
							$("#error-producto").html("<small class='label label-warning'>"+errores.producto[0]+"</small>");
                        }
                        else{$("#error-producto").html("");}

                        if(typeof errores.descripcion !="undefined"){
							
							$("#error-descripcion").html("<small class='label label-warning'>"+errores.descripcion[0]+"</small>");
                        }
                        else{$("#error-descripcion").html("");}

                        if(typeof errores.imagen !="undefined"){
							
							$("#error-imagen").html("<small class='label label-warning'>"+errores.imagen[0]+"</small>");
                        }
                        else{$("#error-imagen").html("");}
                        
                        if(typeof errores.precio !="undefined"){
							
							$("#error-precio").html("<small class='label label-warning'>"+errores.precio[0]+"</small>");
                        }
                        else{$("#error-precio").html("");}
                        
                        
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