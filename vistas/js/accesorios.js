/*==========================================================================================
=            Capturando el id del tipo de dispositivo para generar nuevo activo            =
==========================================================================================*/
$("#combobox_tipoDispositivo").change(function(){
	var tipo_dispositivo_id = $(this).val();
	
	var datos = new FormData();
	datos.append("tipo_dispositivo_id", tipo_dispositivo_id);

	$.ajax({
		url:"ajax/accesorios.ajax.php",
		method: "POST",
		data:datos,
		cahe:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			if (!respuesta) {

				var nuevo_activo = tipo_dispositivo_id+"00001";
				$("#activo_accesorio_registro").val(nuevo_activo);

			}else{
				var nuevo_activo = Number(respuesta["accesorio_activo"]) + 1;
				$("#activo_accesorio_registro").val(nuevo_activo);
			}	
		}
	});
});
/*=====  End of Capturando el id del tipo de dispositivo para generar nuevo activo  ======*/
