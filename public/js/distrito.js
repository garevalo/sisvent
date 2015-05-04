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
                       	
                       	if(typeof errores.distrito !=="undefined"){$("#error-distrito").html(errores.distrito[0]); } else{$("#error-distrito").html("");}

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

function atender_pedido(url,id,idprod){

    $.post(url,{id:id,idprod:idprod},function(data,status){

        if(status==="success"){

            var datos = jQuery.parseJSON(data);
            if (datos.dir) {
                        $("#atender"+id).prop("disabled","disabled");
                        $(".modal-body").text(datos.mensaje);
                        $('#modal-success').modal('show');

                       // $("#ok").click(function() {
                            // $("#form")[0].reset();
                         //   window.location = datos.dir;
                        //});
                    }
                    else if (datos.datos) {
                        console.log(data);
                    }
            console.log(data);
        }

    });


}

function editar_distrito(id,url){


	$.post(url,{id:id},function(data,status){

		if(status==="success"){
		
			console.log(data[0]);

			$("#frm").prop("action","/sisvent/public/distrito/editar");
			$("#iddistrito").html("<input type='hidden' name='iddistrito' value='"+data[0].iddistrito+"'>");
			$("#guardar").html("<span class='glyphicon glyphicon-edit'></span> Editar");
			$("#distrito").val(data[0].nombre_distrito);
			$("#sector").val(data[0].sector);
		}


	},"json");


	

}