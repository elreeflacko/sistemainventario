/*=================================================
=            CARGAR MODELOS                       =
=================================================*/
$("#combobox_marca_registro").change(function(){

	var tipo_dispositivo = $("#combobox_tipoDispo_registro").val();
	var marca = $("#combobox_marca_registro").val();
	var tipo_marca_array = new Array (tipo_dispositivo, marca);

	$.ajax({
		type:"POST",
		url:"ajax/dispositivos.ajax.php",
		data: {'tipo_marca_array' : tipo_marca_array},
		success:function(respuesta){
			$("#combobox_modelo_registro").html(respuesta);
		}
	})
});
/*=====  End of CARGAR MODELOS ==========*/

/*=================================================
=            CARGAR LUGARES                       =
=================================================*/
$("#combobox_bloque_registro").change(function(){

	var bloque = $("#combobox_bloque_registro").val();
	$.ajax({
		type:"POST",
		url:"ajax/dispositivos.ajax.php",
		data: {'bloque' : bloque},
		success:function(respuesta){
			$("#combobox_lugar_registro").html(respuesta);
		}
	})
});
/*=====  End of CARGAR LUGARES ==========*/

/*=================================================
=            CARGAR PERSONAS                       =
=================================================*/
$("#combobox_seccion_registro").change(function(){

	var seccion = $("#combobox_seccion_registro").val();
	$.ajax({
		type:"POST",
		url:"ajax/dispositivos.ajax.php",
		data: {'seccion' : seccion},
		success:function(respuesta){
			$("#combobox_persona_registro").html(respuesta);
		}
	})
});
/*=====  End of CARGAR PERSONAS ==========*/

/*=================================================
=   CARGAR LOS DATOS DEL DISPOSITIVO A EDITAR     =
=================================================*/
$(document).on("click", ".btn_editar_dispositivo", function(){

	var id_dispositivo = $(this).attr("id-dispositivo");
	var datos_dispositivo = new FormData();
	datos_dispositivo.append("id_dispositivo", id_dispositivo);

	$.ajax({
		url:"ajax/dispositivos.ajax.php",
		method:"POST",
		data:datos_dispositivo,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			$("#id_dispositivo_actual").val(respuesta["dispositivo_id"]);
			//cambio temporal
			//$("#id_dispositivo_editar").val(respuesta["dispositivo_id"]);
			//$("#id_dispositivo_editar").html(respuesta["dispositivo_id"]);
			//Este input de arriba es temporal
			$("#nombre_tipoDispo_actual").html(respuesta["tipo_dispositivo_nombre"]);
			$("#nombre_tipoDispo_actual").val(respuesta["tipo_dispositivo_id"]);
			$("#nombre_marca_actual").html(respuesta["marca_nombre"]);
			$("#nombre_marca_actual").val(respuesta["marca_id"]);
			$("#nombre_modelo_actual").html(respuesta["modelo_nombre"]);
			$("#nombre_modelo_actual").val(respuesta["modelo_id"]);
			$("#serial_dispositivo_editar").val(respuesta["dispositivo_serial"]);
			$("#activo_dispositivo_editar").val(respuesta["dispositivo_activo"]);
			$("#comentario_dispositivo_editar").val(respuesta["dispositivo_comentario"]);
			$(".fecha_garantia_dispositivo_editar").val(respuesta["dispositivo_garantia"]);
			$("#nombre_bloque_actual").html(respuesta["bloque_nombre"]);
			$("#nombre_bloque_actual").val(respuesta["bloque_id"]);
			$("#nombre_lugar_actual").html(respuesta["lugar_nombre"]);
			$("#nombre_lugar_actual").val(respuesta["lugar_id"]);
			$("#nombre_seccion_actual").html(respuesta["seccion_nombre"]);
			$("#nombre_seccion_actual").val(respuesta["seccion_id"]);
			$("#nombre_persona_actual").html(respuesta["persona_nombre"]);
			$("#nombre_persona_actual").val(respuesta["persona_id"]);
			$("#estado_dispositivo_actual").html(respuesta["dispositivo_estado"]);
			$("#estado_dispositivo_actual").val(respuesta["dispositivo_estado"]);
			$("#datepicker-prestar").val(respuesta["dispositivo_estado_fecha"]);
		}
	});
});
/*=====  End of CARGAR LOS DATOS DEL DISPOSITIVO A EDITAR ===*/

/*=================================================
=   CARGAR LOS DATOS DEL DISPOSITIVO PARA REVISAR =
=================================================*/
$(document).on("click", ".btn_ver_dispositivo", function(){

	var id_ver_dispositivo = $(this).attr("id-ver-dispositivo");
	var datos_dispositivo_ver = new FormData();
	datos_dispositivo_ver.append("id_ver_dispositivo", id_ver_dispositivo);

	$.ajax({
		url:"ajax/dispositivos.ajax.php",
		method:"POST",
		data:datos_dispositivo_ver,
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

/*=================================================
=            CARGAR MODELOS  EDITAR               =
=================================================*/
$("#combobox_marca_editar").change(function(){

	var tipo_dispositivo = $("#combobox_tipoDispo_editar").val();
	var marca = $("#combobox_marca_editar").val();
	var tipo_marca_editar = new Array (tipo_dispositivo, marca);

	$.ajax({
		type:"POST",
		url:"ajax/dispositivos.ajax.php",
		data: {'tipo_marca_editar' : tipo_marca_editar},
		success:function(respuesta){
			$("#combobox_modelo_editar").html(respuesta);
		}
	})
});
/*=====  End of CARGAR MODELOS ==========*/

/*=================================================
=            CARGAR LUGARES  EDITAR               =
=================================================*/
$("#combobox_bloque_editar").change(function(){

	var bloque_editar = $("#combobox_bloque_editar").val();
	$.ajax({
		type:"POST",
		url:"ajax/dispositivos.ajax.php",
		data: {'bloque_editar' : bloque_editar},
		success:function(respuesta){
			$("#combobox_lugar_editar").html(respuesta);
		}
	})
});
/*=====  End of CARGAR LUGARES EDITAR ==========*/

/*=================================================
=            CARGAR PERSONAS  EDITAR              =
=================================================*/
$("#combobox_seccion_editar").change(function(){

	var seccion_editar = $("#combobox_seccion_editar").val();
	$.ajax({
		type:"POST",
		url:"ajax/dispositivos.ajax.php",
		data: {'seccion_editar' : seccion_editar},
		success:function(respuesta){
			$("#combobox_persona_editar").html(respuesta);
		}
	})
});
/*=====  End of CARGAR PERSONAS EDITAR ==========*/

/*========================================
=         ELIMINAR DISPOSITIVO           =
========================================*/
$(document).on("click", ".btn_eliminar_dispositivo", function(){

	var id_dispositivo = $(this).attr("id-dispositivo");

	swal({
    title: '¿Está seguro de borrar el dispositivo?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar dispositivo!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?action=dados-baja&id-dispositivo="+id_dispositivo;

    }

  })
});

/*=====  End of ELIMINAR DISPOSITIVO ======*/

/*=====================================
=            Imprimir Memo            =
=====================================*/
/*$(document).on("click", "#btn_imprimir_memo", function(){
	var id_dispositivo_imprimir = $('input:text[name=id_dispositivo_editar]').val();
	//console.log("id_dispositivo_imprimir", id_dispositivo_imprimir);
		window.location = "extensiones/TCPDF-main/examples/memo.php?dispoId="+id_dispositivo_imprimir;	
		//window.location = "index.php";
	
});*/
/*=====  End of Imprimir Memo  ======*/


/*=================================================================
=            firma asignada al dispositivo            =
=================================================================*/
$("#signatureparent").jSignature({
	color:"#333",
	lineWidth:1,
	width:800,
	height:200,
});
$("#repetir_firma").click(function(){
	$("#signatureparent").jSignature("reset");
});
/*=====  End of firma asignada al dispositivo  ======*/

/*====================================================================================
=            Validamos si la firma exite para guardar en la base de datos            =
====================================================================================*/
$("#guardar_firma").click(function(){
	if($("#signatureparent").jSignature("isModified")){
		var firma = $("#signatureparent").jSignature("getData", "image/svg+xml");
		var dispositivo_id = $("#id_dispositivo_actual").val();
		var idDispositivo_firma = new Array (dispositivo_id, firma);

		$.ajax({
			type:"POST",
			url:"ajax/dispositivos.ajax.php",
			data: {'idDispositivo_firma': idDispositivo_firma},
			success:function(respuesta){
				$("#respuesta-firma").html(respuesta);
			}
		});
	}
});
/*=====  End of Validamos si la firma exite para guardar en la base de datos  ======*/


