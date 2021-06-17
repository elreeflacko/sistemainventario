/*==============================================================
=    REVISAR SI EL LUGAR YA ESTA REGISTRADO      =
==============================================================*/
$("#nombre_lugar_registro").change(function(){

	$(".alert").remove();

	var lugar = $(this).val();
	var datos_lugar = new FormData();
	datos_lugar.append("validar_lugar", lugar);

	$.ajax({
		url:"ajax/lugares.ajax.php",
		method:"POST",
		data:datos_lugar,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			if (respuesta) {
				$("#nombre_lugar_registro").parent().after('<div class="alert alert-warning">Este Lugar ya existe en la base de datos</div>');
				$("#nombre_lugar_registro").val("");
			}
		}
	})
});

/*=====  End of REVISAR SI EL LUGAR YA ESTA REGISTRADO  ======*/

/*============================================================
=            EDITAR LUGAR                      =
==============================================================*/
$(document).on("click", ".btn_editar_lugar", function(){

	var id_lugar = $(this).attr("id-lugar");
	var datos_lugar = new FormData();
	datos_lugar.append("id_lugar", id_lugar);

	$.ajax({
		url:"ajax/lugares.ajax.php",
		method:"POST",
		data:datos_lugar,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			$("#id_lugar_actual").val(respuesta["lugar_id"]);
			$("#nombre_lugar_editar").val(respuesta["lugar_nombre"]);
			$("#nombre_bloque_actual").html(respuesta["bloque_nombre"]);
			$("#nombre_bloque_actual").val(respuesta["bloque_id"]);
			
		}
	});
});
/*=====  End of  TRAER EL BLOQUE Y EL LUGAR A EDITAR   ==================*/

/*========================================
=            ELIMINAR LUGAR            =
========================================*/
$(document).on("click", ".btn_eliminar_lugar", function(){

	var id_lugar = $(this).attr("id-lugar");

	swal({
    title: '¿Está seguro de borrar el lugar?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar borrar lugar!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?action=admin-lugares&id-lugar="+id_lugar;
    }
  })
});

/*=====  End of ELIMINAR LUGAR  ======*/
/*=================================
=            VER LUGAR            =
=================================*/
/*$(document).on("click", ".btn_ver_lugar", function(){

	var ver_lugar = $(this).attr("id-lugar");
	
	$.ajax({
		type:"POST",
		url:"ajax/lugares.ajax.php",
		data: {'ver_lugar' : ver_lugar},
		success:function(respuesta){
			
			$("#ver_dispositivos_del_lugar").html(respuesta);
		}
	})
})*/
/*=====  End of VER LUGAR  ======*/

