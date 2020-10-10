/*==============================================================
=    REVISAR SI EL BLOQUE YA ESTA REGISTRADO      =
==============================================================*/
$("#nombre_bloque_registro").change(function(){

	$(".alert").remove();

	var bloque = $(this).val();
	var datos_bloque = new FormData();
	datos_bloque.append("validar_bloque", bloque);

	$.ajax({
		url:"ajax/bloques.ajax.php",
		method:"POST",
		data:datos_bloque,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			if (respuesta) {
				$("#nombre_bloque_registro").parent().after('<div class="alert alert-warning">Este Bloque ya existe en la base de datos</div>');
				$("#nombre_bloque_registro").val("");
			}
		}
	})
});

/*=====  End of REVISAR SI EL BLOQUE YA ESTA REGISTRADO  ======*/

/*==============================================================
=                   EDITAR BLOQUE                              =
==============================================================*/
$(document).on("click", ".btn_editar_bloque", function(){

	var id_bloque = $(this).attr("id-bloque");
	var datos_bloque = new FormData();
	datos_bloque.append("id_bloque", id_bloque);


	$.ajax({
		url:"ajax/bloques.ajax.php",
		method:"POST",
		data:datos_bloque,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			$("#id_bloque_actual").val(respuesta["bloque_id"]);
			$("#nombre_bloque_editar").val(respuesta["bloque_nombre"]);
		}
	});
});

/*=============== End of EDITAR BLOQUE =========*/

/*=================================================
=            ELIMINAR BLOQUE           =
=================================================*/
$(document).on("click", ".btn_eliminar_bloque", function(){

	var id_bloque = $(this).attr("id-bloque");

	swal({
    title: '¿Está seguro de borrar el bloque?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar bloque!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?action=admin-bloques&id-bloque="+id_bloque;

    }

  })
});
/*=====  End of ELIMINAR BLOQUE  ======*/