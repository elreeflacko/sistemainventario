/*==============================================================
=    CARGAR DISPOSITIVOS DEPENDIENDO EL TIPO DE DISPOSITIVO    =
==============================================================*/
$(document).on("click","#listar_tipo_dispositivo", function(){
	var tipo_dispositivo_id = $(this).attr("tipo_dispositivo_id");
	window.location = "index.php?action=admin-dispositivos&tipo_dispositivo_id="+tipo_dispositivo_id;
});
/*=====  End of CARGAR DISPOSITIVOS DEPENDIENDO EL TIPO DE DISPOSITIVO  ======*/
/*==============================================================
=    REVISAR SI EL TIPO DE DISPOSITIVO YA ESTA REGISTRADO      =
==============================================================*/
$("#nombre_tipoDispositivo_registro").change(function(){

	$(".alert").remove();

	var tipo_dispositivo = $(this).val();
	var datos_tipo_dispositivo = new FormData();
	datos_tipo_dispositivo.append("validar_tipo_dispositivo", tipo_dispositivo);

	$.ajax({
		url:"ajax/tipos-dispositivos.ajax.php",
		method:"POST",
		data:datos_tipo_dispositivo,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			if (respuesta) {
				$("#nombre_tipoDispositivo_registro").parent().after('<div class="alert alert-warning">Este Tipo de dispositivo ya existe en la base de datos</div>');
				$("#nombre_tipoDispositivo_registro").val("");
			}
		}
	})
})

/*=====  End of REVISAR SI EL TIPO DE DISPOSITIVO YA ESTA REGISTRADO  ======*/

/*==============================================================
=                   EDITAR TIPO DE DISPOSITIVO                =
==============================================================*/
$(document).on("click", ".btn_editar_tipo_dispositivo", function(){

	var id_tipo_dispositivo = $(this).attr("id-tipo-dispositivo");
	var datos_tipo_dispositivo = new FormData();
	datos_tipo_dispositivo.append("id_tipo_dispositivo", id_tipo_dispositivo);


	$.ajax({
		url:"ajax/tipos-dispositivos.ajax.php",
		method:"POST",
		data:datos_tipo_dispositivo,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			$("#id_tipo_dispositivo_actual").val(respuesta["tipo_dispositivo_id"]);
			$("#nombre_tipoDispositivo_editar").val(respuesta["tipo_dispositivo_nombre"]);
		}
	});
});

/*=============== End of EDITAR TIPO DE DISPOSITIVO  =========*/

/*=================================================
=            ELIMINAR TIPO DISPOSITIVO            =
=================================================*/
$(document).on("click", ".btn_eliminar_tipo_dispositivo", function(){

	var id_tipo_dispositivo = $(this).attr("id-tipo-dispositivo");

	swal({
    title: '¿Está seguro de borrar el tipo de dispositivo?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar tipo dispositivo!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?action=admin-tipos-dispositivo&id-tipo-dispositivo="+id_tipo_dispositivo;

    }

  })
});
/*=====  End of ELIMINAR TIPO DISPOSITIVO  ======*/

/*=================================================
=            SUBIR IMAGEN                         =
=================================================*/
$("#imagen_dispositivo").change(function(){
	var imagen_dispositivo = this.files[0];
	//Validamos el formato de la imagen en jpg o png
	if (imagen_dispositivo["type"] != "image/jpeg" && imagen_dispositivo["type"] != "image/png") {

		$("#imagen_dispositivo").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });
	}else if(imagen_dispositivo["size"] > 2000000){

  		$("#imagen_dispositivo").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{
  		var datos_imagen = new FileReader;
  		datos_imagen.readAsDataURL(imagen_dispositivo);

  		$(datos_imagen).on("load", function(event){

  			var ruta_imagen = event.target.result;

  			$(".previsualizar").attr("src", ruta_imagen);
  		});
  	}
});
/*=====  End of SUBIR IMAGEN  ======*/
