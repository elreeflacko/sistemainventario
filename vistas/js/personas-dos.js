/*=========================================
= CARGAR PERSONA PARA PRESTAR DISPOSITIVO =
=========================================*/
/*$(document).on("change", "#personas_bd", function(){
	var persona_buscar = $(this).val();
	$.ajax({
		type: "POST",
		url:"ajax/personas-dos.ajax.php",
		data: {'persona_buscar': persona_buscar},
		success:function(respuesta){
			//console.log(respuesta);
			$("#cargar_persona").html(respuesta);
		}
	});
});
/*=====  End of CARGAR PERSONA PARA PRESTAR DISPOSITIVO  ======*/