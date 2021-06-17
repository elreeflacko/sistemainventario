/*==============================================================
=    REVISAR SI LA PERSONA YA ESTA REGISTRADA      =
==============================================================*/
$("#nombre_persona_registro").change(function(){

	$(".alert").remove();

	var persona = $(this).val();
	var datos_persona = new FormData();
	datos_persona.append("validar_persona", persona);

	$.ajax({
		url:"ajax/personas.ajax.php",
		method:"POST",
		data:datos_persona,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			if (respuesta) {
				$("#nombre_persona_registro").parent().after('<div class="alert alert-warning">Esta persona ya existe en la base de datos</div>');
				$("#nombre_persona_registro").val("");
			}
		}
	})
});

/*=====  End of REVISAR SI LA PERSONA YA ESTA REGISTRADA  ======*/

/*=================================================
=            EDITAR  PERSONA                     =
=================================================*/
$(document).on("click", ".btn_editar_persona", function(){

	var id_persona = $(this).attr("id-persona");
	var datos_persona = new FormData();
	datos_persona.append("id_persona", id_persona);

	//console.log("id_persona", id_persona);

	$.ajax({
		url:"ajax/personas.ajax.php",
		method:"POST",
		data:datos_persona,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			$("#id_persona_actual").val(respuesta["persona_id"]);
			$("#nombre_persona_editar").val(respuesta["persona_nombre"]);
			$("#nombre_seccion_actual").html(respuesta["seccion_nombre"]);
			$("#nombre_seccion_actual").val(respuesta["seccion_id"]);
		}
	})
});
/*=====  End of EDITAR PERSONA  =========================*/

/*========================================
=            ELIMINAR PERSONA            =
========================================*/
$(document).on("click", ".btn_eliminar_persona", function(){

	var id_persona = $(this).attr("id-persona");

	swal({
    title: '¿Está seguro de borrar la persona?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar persona!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?action=admin-personas&id-persona="+id_persona;

    }

  })
});

/*=====  End of ELIMINAR PERSONA  ======*/
/*=================================
=            VER PERSONA          =
=================================*/
$(document).on("click", ".btn_ver_persona", function(){

	var ver_persona = $(this).attr("id-persona");

	$.ajax({
		type:"POST",
		url:"ajax/personas.ajax.php",
		data: {'ver_persona' : ver_persona},
		success:function(respuesta){

			$("#ver_dispositivos_de_la_persona").html(respuesta);
		}
	})
});
/*=====  End of VER PERSONA  ======*/

/*===================================
= PONER LA PERSONA EN PAZ Y SALVO  =
===================================*/
$("#paz_salvo").click(function(){
	$(".alert").remove();
	if (this.checked) {

		var id_persona = $("#id_persona_actual").val();
		var paz_salvo = $("#paz_salvo").val();
		var persona_pazsalvo_array = new Array (id_persona, paz_salvo);

		$.ajax({
			type:"POST",
			url:"ajax/personas.ajax.php",
			data: {'persona_pazsalvo_array' : persona_pazsalvo_array},
			success:function(respuesta){
				$("#respuesta-paz-salvo").html(respuesta);
			}
		});
	}
});
/*=====  End of PONER LA PERSONA EN PAZ Y SALVO  ======*/

/*===================================
= PONER LA PERSONA EN  NO PAZ Y SALVO  =
===================================*/
$("#no_paz_salvo").click(function(){
	$(".alert").remove();
	if (this.checked) {

		var id_persona = $("#id_persona_actual").val();
		var no_paz_salvo = $("#no_paz_salvo").val();
		var no_persona_pazsalvo_array = new Array (id_persona, no_paz_salvo);

		$.ajax({
			type:"POST",
			url:"ajax/personas.ajax.php",
			data: {'no_persona_pazsalvo_array' : no_persona_pazsalvo_array},
			success:function(respuesta){
				$("#respuesta-no-paz-salvo").html(respuesta);
			}
		});
	}
});
/*=====  End of PONER LA PERSONA EN NO PAZ Y SALVO  ======*/

$("#salir_editar_persona").click(function(){
	$(".alert").remove();
	$("#paz_salvo").prop("checked", false);
	$("#no_paz_salvo").prop("checked", false);
	window.location = "index.php?action=admin-personas";
});



