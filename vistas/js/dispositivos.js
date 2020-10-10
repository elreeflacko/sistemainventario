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
		}
	});
});
/*=====  End of CARGAR LOS DATOS DEL DISPOSITIVO A EDITAR ===*/

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

      window.location = "index.php?action=admin-dispositivos&id-dispositivo="+id_dispositivo;

    }

  })
});

/*=====  End of ELIMINAR DISPOSITIVO ======*/