

function notificacion(url,idtipo){

	$.get(url,{tipo:idtipo},function(data,status){

		if(status==="success"){

			$("#notificaciones").html(data);

		}


	});


}