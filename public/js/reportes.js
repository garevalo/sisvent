function generar_reporte(form,content){


  if( contador_input('#'+form) === 0){
   
     

     $('#'+form).submit(function(event){
      var formData = new FormData(this); 
       $.ajax({
                url: $(this).attr("action"),
                data: formData,
                cache: false,
                mimeType: 'multipart/form-data',
                contentType: false,
                processData: false,
                type: 'POST',
                beforeSend: function( xhr ) {
                  $("#reporte").html("Cargando...");
                },
                success: function(data) {
                    $("#reporte").html(data);
                }
            });

        event.preventDefault();
        event.unbind();
      });
    
  }

 //alert(contador_input('#'+form));
}