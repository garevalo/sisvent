
function editar_producto(url,id){

	$.get(url,{id:id},function(data){
		//var datos=JQuery.
		console.log(data);
		$("#frm").attr("action","editar");
		$("#btnguardar").attr("onclick"," editar_producto_ajax('frm')");
        $("#btnguardar").attr("value","Modificar");
		$("#campo_idproducto").html("<input type='hidden' name='idproducto' value='"+id+"'>");
		$("#producto").val(data.nombre_producto);
		$("#descripcion").val(data.descripcion_producto);
		$("#precio").val(data.precio_producto);
		//$("#imagen").val(data.descripcion_producto);
        
		$("#categoria").val(data.idcategoria);
        $("#campo-estado").html('<div class="form-group">'+
                                    '<label>Estado:</label>'+
                                     '<select name="idestado" id="idestado" class="form-control input-sm">'+
                                                                   '<option value="1">Activo</option>'+
                                                                    '<option value="2">Inactivo</option>'+
                                                                '</select>'+
                                                                '<small id="error-estado" class="text-danger"></small>'+
                                                                '</div>' );
        $("#idestado").val(data.estado_producto);
		
	},"json");
	
}


function editar_producto_ajax(form) {


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