/*=================================================
=            EDITAR USUARIO                      =
=================================================*/
$(document).on("click", ".btn_editar_usuario", function(){

	var id_usuario = $(this).attr("id-usuario");
	var datos_usuario = new FormData();
	datos_usuario.append("id_usuario", id_usuario);

	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data:datos_usuario,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){
			$("#id_usuario_actual").val(respuesta["usuario_id"]);
			$("#nombre_usuario_editar").val(respuesta["usuario_nombre"]);
			$("#email_usuario_editar").val(respuesta["usuario_email"]);
			$("#editar_perfil").html(respuesta["usuario_perfil"]);
			$("#editar_perfil").val(respuesta["usuario_perfil"]);
			$("#pwd_usuario_actual").val(respuesta["usuario_password"]);
		}
	})
});
/*=====  End of EDITAR USUARIO             ======*/

/*=================================================
=            ACTIVAR USUARIO                      =
=================================================*/
$(document).on("click", ".btn_activar", function(){

	var id_usuario = $(this).attr("id-usuario");
	var estado_usuario = $(this).attr("estado-usuario");
	
	var datos_usuario = new FormData();
	datos_usuario.append("activar_id", id_usuario);
	datos_usuario.append("activar_usuario", estado_usuario);

	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data:datos_usuario,
		cache:false,
		contentType:false,
		processData:false,
		success: function(respuesta){

					swal({
						type:"success",
						title:"¡Ok!",
						text:"¡La información fue actualizada con éxito!",
						showConfirmButton:true,
						confirmButtonText:"Cerrar"
					}).then((result)=>{
							if(result.value){
							window.location="admin-usuarios";
							}
						});
				}
	})
	
	if (estado_usuario == 0) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html("Desactivado");
		$(this).attr("estado-usuario", 1);
	}
	else{

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html("Activado");
		$(this).attr("estado-usuario", 0);
	}
});
/*=====  End of ACTIVAR USUARIO             ======*/

/*==============================================================
=            REVISAR SI EL EMAIL YA ESTA REGISTRADO            =
==============================================================*/

$("#email_usuario_registro").change(function(){

	$(".alert").remove();

	var email_usuario = $(this).val();
	var datos_usuario = new FormData();
	datos_usuario.append("validar_email", email_usuario);

	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data:datos_usuario,
		cache:false,
		contentType:false,
		processData:false,
		dataType:"json",
		success:function(respuesta){

			if (respuesta) {
				$("#email_usuario_registro").parent().after('<div class="alert alert-warning">Este Email ya existe en la base de datos</div>');
				$("#email_usuario_registro").val("");
			}
		}	
	})
});

/*=====  End of REVISAR SI EL EMAIL YA ESTA REGISTRADO  ======*/

/*========================================
=            ELIMINAR USUARIO            =
========================================*/
$(document).on("click", ".btn_eliminar_usuario", function(){

	var id_usuario = $(this).attr("id-usuario");

	swal({
    title: '¿Está seguro de borrar el usuario?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?action=admin-usuarios&id-usuario="+id_usuario;

    }

  })
});

/*=====  End of ELIMINAR USUARIO  ======*/



