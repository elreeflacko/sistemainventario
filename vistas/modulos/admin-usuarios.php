<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Administrar usuarios
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar usuarios</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_registrar_usuario">Registrar usuario</button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped table-hover table-hover dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Último login</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php

                  $item = null;
                  $valor = null;

                  $mostrar_usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                  foreach ($mostrar_usuarios as $key => $value) {

                    echo '<tr>
                             <td>'.($key+1).'</td>
                             <td>'.strtolower($value["usuario_nombre"]).'</td>
                             <td>'.$value["usuario_email"].'</td>
                             <td>'.$value["usuario_perfil"].'</td>';

                             if ($value["usuario_estado"] != 0) {

                                echo '<td><button class="btn btn-success btn-xs btn_activar" id-usuario="'.$value["usuario_id"].'" estado-usuario="0">Activado</button></td>';

                             }else{

                                echo '<td><button class="btn btn-danger btn-xs btn_activar" id-usuario="'.$value["usuario_id"].'" estado-usuario="1">Desactivado</button></td>';
                             }


                       echo '<td>'.$value["usuario_ultimoLogin"].'</td>
                             <td>
                               <div class="btn-group">
                                 <button class="btn btn-warning btn_editar_usuario" id-usuario="'.$value["usuario_id"].'" data-toggle="modal" data-target="#modal_editar_usuario"><i class="fa fa-pencil"></i></button>
                                 <button class="btn btn-danger btn_eliminar_usuario" id-usuario="'.$value["usuario_id"].'"><i class="fa fa-times"></i></button>
                               </div>
                             </td>
                          </tr>';
                  }

              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
</div>
<!--=============================================
=            MODAL REGISTRAR USUARIO            =
==============================================-->
<div id="modal_registrar_usuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Usuario</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->

        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--Entrada para el nombre-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="nombre_usuario_registro" name="nombre_usuario_registro" placeholder="Ingresar nombre" maxlength="50" required>
              </div>
            </div>
            <!--Entrada para el email-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control input-lg" id="email_usuario_registro" name="email_usuario_registro" placeholder="Ingresar correo" maxlength="60" required>
              </div>
            </div>
            <!--Entrada para la contraseña-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" id="pwd_usuario_registro" name="pwd_usuario_registro" placeholder="Ingresar contraseña" maxlength="100" required>
              </div>
            </div>
            <!--Esntrada para seleccionar tipo de perfil-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="perfil_usuario_registro" id="perfil_usuario_registro">
                  <option value="">Seleccionar perfil</option>
                  <option value="administrador">Administrador</option>
                  <option value="especial">Especial</option>
                  <option value="lectura">Solo lectura</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <!--====  End of CUERPO DEL MODAL  ====-->
        <!--===================================
        =            PIE DEL MODAL            =
        ====================================-->
        <!--Botones-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary pull-right">Guardar Usuario</button>
          <?php

            $registrar_usuario = new ControladorUsuarios();
            $registrar_usuario->ctrRegistrarUsuario();

          ?>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL REGISTRAR USUARIO  ====-->

<!--=============================================
=            MODAL EDITAR USUARIO              =
==============================================-->
<div id="modal_editar_usuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Usuario</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->

        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--Entrada para el id del usuario a editar-->
            <input type="hidden" id="id_usuario_actual" name="id_usuario_actual">
            <!--Entrada para el nombre-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="nombre_usuario_editar" name="nombre_usuario_editar" value="Ingresar nombre" maxlength="60">
              </div>
            </div>
            <!--Entrada para el email-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control input-lg" id="email_usuario_editar" name="email_usuario_editar" value="Ingresar correo" maxlength="60">
              </div>
            </div>
            <!--Entrada para la contraseña-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" id="pwd_usuario_editar" name="pwd_usuario_editar" placeholder="Nueva contraseña" maxlength="100">
                <input type="hidden" id="pwd_usuario_actual" name="pwd_usuario_actual">
              </div>
            </div>
            <!--Esntrada para seleccionar tipo de perfil-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="perfil_usuario_editar" id="perfil_usuario_editar">
                  <option value="" id="editar_perfil"></option>
                  <option value="administrador">Administrador</option>
                  <option value="especial">Especial</option>
                  <option value="lectura">Solo lectura</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <!--====  End of CUERPO DEL MODAL  ====-->
        <!--===================================
        =            PIE DEL MODAL            =
        ====================================-->
        <!--Botones-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary pull-right">Modificar Usuario</button>
          <?php

            $editar_usuario = new ControladorUsuarios();
            $editar_usuario->ctrEditarUsuario();

          ?>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL REGISTRAR USUARIO  ====-->

<!--=================================================================
=            LLAMAMOS EL METODO PARA ELIMINAR UN USUARIO            =
==================================================================-->
<?php

    $eliminar_usuario = new ControladorUsuarios();
    $eliminar_usuario-> ctrEliminarUsuario();

?>
<!--====  End of LLAMAMOS EL METODO PARA ELIMINAR UN USUARIO  ====-->
