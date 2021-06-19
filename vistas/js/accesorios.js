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
/*=================================================================================
= Cargamos el dispositivo de acuerdo al activo en la pagina registro accesorio    =
==================================================================================*/
$(document).on("change", "#buscar_activo", function(){

	var id_ver_dispositivo = $("#buscar_activo").val();
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

/*=================================================
=   CARGAR LOS DATOS DEL ACCESORIO PARA REVISAR =
=================================================*/
$(document).on("click", ".btn_ver_accesorio", function(){

	var id_ver_accesorio = $(this).attr("id-ver-accesorio");
	var datos_accesorio_ver = new FormData();
	datos_accesorio_ver.append("id_ver_accesorio", id_ver_accesorio);

	$.ajax({
		url:"ajax/accesorios.ajax.php",
		method:"POST",
		data:datos_accesorio_ver,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){
			$("#nombre_tipoDispo_ver").html(respuesta["tipo_dispositivo_nombre"]);
			$("#nombre_marca_ver").html(respuesta["marca_nombre"]);
			$("#nombre_modelo_ver").html(respuesta["modelo_nombre"]);
			$("#serial_dispositivo_ver").val(respuesta["dispositivo_serial"]);
			$("#activo_dispositivo_ver").val(respuesta["dispositivo_activo"]);
			$("#comentario_dispositivo_ver").val(respuesta["dispositivo_comentario"]);
			//$(".fecha_garantia_dispositivo_editar").val(respuesta["dispositivo_garantia"]);
			$("#datepicker-ver").val(respuesta["dispositivo_garantia"]);
			$("#nombre_bloque_ver").html(respuesta["bloque_nombre"]);
			$("#nombre_lugar_ver").html(respuesta["lugar_nombre"]);
			$("#nombre_seccion_ver").html(respuesta["seccion_nombre"]);
			$("#nombre_persona_ver").html(respuesta["persona_nombre"]);
			$("#estado_dispositivo_ver").html(respuesta["dispositivo_estado"]);
			$(".fecha_prestamo_dispositivo").val(respuesta["dispositivo_estado_fecha"]);
			$("#firma_ver").html(respuesta["dispositivo_firma"]);
		}
	});
});
/*=====  End of CARGAR LOS DATOS DEL DISPOSITIVO PARA REVISAR ===*/