/*==========================================================================================
=            Capturando el id del tipo de dispositivo para generar nuevo activo            =
==========================================================================================*/
$("#combobox_tipoDispositivo_registrar").change(function(){
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

/*=================================================================================
= Cargamos el dispositivo de acuerdo al serial en la pagina registro accesorio    =
==================================================================================*/
$(document).on("change", "#buscar_serial", function(){

	var id_ver_dispositivo = $("#buscar_serial").val();
	//console.log("id_ver_dispositivo", id_ver_dispositivo);

	$.ajax({
		type:"POST",
		url:"ajax/dispositivos.ajax.php",
		data: {'id_ver_dispositivo' : id_ver_dispositivo},
		dataType:"json",
		success:function(respuesta){
			console.log(respuesta);
			$("#tipo_dispo").html(respuesta["tipo_dispositivo_nombre"]);
			$("#marca_dispo").html(respuesta["marca_nombre"]);
			$("#modelo_dispo").html(respuesta["modelo_nombre"]);
			$("#serial_dispo").html(respuesta["dispositivo_serial"]);
			$("#activo_dispo").html(respuesta["dispositivo_activo"]);
			$("#bloque_dispo").html(respuesta["bloque_nombre"]);
			$("#lugar_dispo").html(respuesta["lugar_nombre"]);
			$("#seccion_dispo").html(respuesta["seccion_nombre"]);
			$("#persona_dispo").html(respuesta["persona_nombre"]);
			$("#estado_dispo").html(respuesta["dispositivo_estado"]);
		}
	});
});