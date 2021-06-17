/*==============================================================
=    REVISAR SI LA MARCA YA ESTA REGISTRADO      =
==============================================================*/
$("#nombre_marca_registro").change(function(){

	$(".alert").remove();

	var marca = $(this).val();
	var datos_marca = new FormData();
	datos_marca.append("validar_marca", marca);

	$.ajax({
		url:"ajax/marcas.ajax.php",
		method:"POST",
		data:datos_marca,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			if (respuesta) {
				$("#nombre_marca_registro").parent().after('<div class="alert alert-warning">Esta Marca ya existe en la base de datos</div>');
				$("#nombre_marca_registro").val("");
			}
		}
	})
});

/*=====  End of REVISAR SI LA MARCA YA ESTA REGISTRADO  ======*/

/*==============================================================
=                   EDITAR MARCA                              =
==============================================================*/
$(document).on("click", ".btn_editar_marca", function(){

	var id_marca = $(this).attr("id-marca");
	var datos_marca = new FormData();
	datos_marca.append("id_marca", id_marca);

	$.ajax({
		url:"ajax/marcas.ajax.php",
		method:"POST",
		data:datos_marca,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			$("#id_marca_actual").val(respuesta["marca_id"]);
			$("#nombre_marca_editar").val(respuesta["marca_nombre"]);
		}
	});
});

/*=============== End of EDITAR MARCA =========*/

/*=================================================
=            ELIMINAR MARCA           =
=================================================*/
$(document).on("click", ".btn_eliminar_marca", function(){

	var id_marca = $(this).attr("id-marca");

	swal({
    title: '¿Está seguro de borrar la marca?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar marca!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?action=admin-marcas&id-marca="+id_marca;

    }

  })
});
/*=====  End of ELIMINAR MARCA  ======*/