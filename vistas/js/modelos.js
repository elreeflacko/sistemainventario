/*==============================================================
=    REVISAR SI EL MODELO YA ESTA REGISTRADA      =
==============================================================*/
$("#nombre_modelo_registro").change(function(){

	$(".alert").remove();

	var modelo = $(this).val();
	var datos_modelo = new FormData();
	datos_modelo.append("validar_modelo", modelo);

	$.ajax({
		url:"ajax/modelos.ajax.php",
		method:"POST",
		data:datos_modelo,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			if (respuesta) {
				$("#nombre_modelo_registro").parent().after('<div class="alert alert-warning">Este modelo ya existe en la base de datos</div>');
				$("#nombre_modelo_registro").val("");
			}
		}
	})
});

/*=====  End of REVISAR SI EL MODELO YA ESTA REGISTRADO ======*/

/*=================================================
=            EDITAR  MODELO                     =
=================================================*/
$(document).on("click", ".btn_editar_modelo", function(){

	var id_modelo = $(this).attr("id-modelo");
	var datos_modelo = new FormData();
	datos_modelo.append("id_modelo", id_modelo); 

	$.ajax({
		url:"ajax/modelos.ajax.php",
		method:"POST",
		data:datos_modelo,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){
			
			$("#id_modelo_actual").val(respuesta["modelo_id"]);
			$("#nombre_modelo_editar").val(respuesta["modelo_nombre"]);
			$("#nombre_tipo_dispositivo_actual").html(respuesta["tipo_dispositivo_nombre"]);
			$("#nombre_tipo_dispositivo_actual").val(respuesta["tipo_dispositivo_id"]);
			$("#nombre_marca_actual").html(respuesta["marca_nombre"]);
			$("#nombre_marca_actual").val(respuesta["marca_id"]);
		}
	});
});
/*=====  End of EDITAR MODELO  =========================*/

/*========================================
=            ELIMINAR MODELO           =
========================================*/
$(document).on("click", ".btn_eliminar_modelo", function(){

	var id_modelo = $(this).attr("id-modelo");

	swal({
    title: '¿Está seguro de borrar el modelo?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar modelo!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?action=admin-modelos&id-modelo="+id_modelo;

    }

  })
});

/*=====  End of ELIMINAR MODELO ======*/

/*==================================
=            VER MODELO            =
==================================*/
$(document).on("click", ".btn_ver_modelo", function(){

	var id_modelo = $(this).attr("id-modelo");

	if (id_modelo) {
		window.location = "index.php?action=info-modelo&id-modelo="+id_modelo;
	}
});
/*=====  End of VER MODELO  ======*/
