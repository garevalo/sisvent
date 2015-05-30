function guardar_ajax(form) {


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
                       	
                       	if(typeof errores.categoria !=="undefined"){$("#error-categoria").html(errores.categoria[0]); } else{$("#error-categoria").html("");}

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



function editar_categoria(id,url){

    $("#information-title").html("Editar Categoria");

	$.post(url,{id:id},function(data,status){

		if(status==="success"){
		
			console.log(data[0]);

			$("#frm").prop("action","/sisvent/public/categoria/editar");
			$("#idcategoria").html("<input type='hidden' name='idcategoria' value='"+data[0].idcategoria+"'>");
			$("#guardar").html("<span class='glyphicon glyphicon-edit'></span> Editar");
			$("#categoria").val(data[0].nombre_categoria);
			
		}


	},"json");


	

}