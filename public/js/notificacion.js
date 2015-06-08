

function notificacion(url,idtipo){

	$.get(url,{tipo:idtipo},function(data,status){

		if(status==="success"){

			$("#notificaciones").html(data);

		}


	});


}

function cerrar_notificacion(url,idnotificacion){

	//alert(idnotificacion);

	$.get(url,{idnotificacion:idnotificacion},function(data,status){

		if(status==="success"){

			alert("ok");

		}


	});


}