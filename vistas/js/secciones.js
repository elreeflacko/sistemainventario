/*==============================================================
=    REVISAR SI LA SECCION YA ESTA REGISTRADA      =
==============================================================*/
$("#nombre_seccion_registro").change(function(){

	$(".alert").remove();

	var seccion = $(this).val();
	var datos_seccion = new FormData();
	datos_seccion.append("validar_seccion", seccion);

	$.ajax({
		url:"ajax/secciones.ajax.php",
		method:"POST",
		data:datos_seccion,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			if (respuesta) {
				$("#nombre_seccion_registro").parent().after('<div class="alert alert-warning">Esta Sección ya existe en la base de datos</div>');
				$("#nombre_seccion_registro").val("");
			}
		}
	})
});

/*=====  End of REVISAR SI LA SECCION YA ESTA REGISTRADA  ======*/

/*==============================================================
=                   EDITAR SECCION                              =
==============================================================*/
$(document).on("click", ".btn_editar_seccion", function(){

	var id_seccion = $(this).attr("id-seccion");
	var datos_seccion = new FormData();
	datos_seccion.append("id_seccion", id_seccion);


	$.ajax({
		url:"ajax/secciones.ajax.php",
		method:"POST",
		data:datos_seccion,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			$("#id_seccion_actual").val(respuesta["seccion_id"]);
			$("#nombre_seccion_editar").val(respuesta["seccion_nombre"]);S
		}
	});
});

/*=============== End of EDITAR SECCION =========*/

/*=================================================
=            ELIMINAR SECCION           =
=================================================*/
$(document).on("click", ".btn_eliminar_seccion", function(){

	var id_seccion = $(this).attr("id-seccion");

	swal({
    title: '¿Está seguro de borrar la sección?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar sección!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?action=admin-secciones&id-seccion="+id_seccion;

    }

  })
});
/*=====  End of ELIMINAR SECCION  ======*/