<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Administrar Secciones
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php?action=admin-elementos"><i class="fa fa-dashboard"></i> Administrar elementos</a></li>
        <li class="active">Administrar Secciones</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal_registrar_seccion">Registrar Sección</button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped table-hover dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Sección</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php

                  $item = null;
                  $valor = null;

                  $mostrar_secciones =  ControladorSecciones::ctrMostrarSecciones($item, $valor);

                  foreach ($mostrar_secciones as $key => $value) {
                    
                      echo '<tr>
                              <td>'.($key+1).'</td>
                              <td class="text-uppercase">'.$value["seccion_nombre"].'</td>
                              <td>
                                <div class="btn-group">
                                  <button class="btn btn-warning btn_editar_seccion" id-seccion="'.$value["seccion_id"].'" data-toggle="modal" data-target="#modal_editar_seccion"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-danger btn_eliminar_seccion" id-seccion="'.$value["seccion_id"].'"><i class="fa fa-times"></i></button>
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
=      MODAL REGISTRAR SECCION                 =
==============================================-->
<div id="modal_registrar_seccion" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Sección</h4>
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
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" id="nombre_seccion_registro" name="nombre_seccion_registro" placeholder="Ingresar Sección" maxlength="60" required>
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
          <button type="submit" class="btn btn-primary pull-right">Guardar Sección</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <?php

            $registrar_seccion = new ControladorSecciones();
            $registrar_seccion-> ctrRegistrarSeccion();

        ?>
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL REGISTRAR SECCION  ====-->

<!--=============================================
=      MODAL EDITAR SECCION                     =
==============================================-->
<div id="modal_editar_seccion" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Sección</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->
        
        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--Entrada para el id de la seccion a editar-->
            <input type="hidden" id="id_seccion_actual" name="id_seccion_actual">
            <!--Entrada para el nombre-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" id="nombre_seccion_editar" name="nombre_seccion_editar" maxlength="60">
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
          <button type="submit" class="btn btn-primary pull-right">Actualizar Sección</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <?php

            $editar_seccion = new ControladorSecciones();
            $editar_seccion-> ctrEditarSeccion();
                  
        ?>
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL EDITAR BLOQUE  ====-->

<!--=================================================================
=                           ELIMINAR SECCION                         =
==================================================================-->
<?php

    $eliminar_seccion = new ControladorSecciones();
    $eliminar_seccion-> ctrEliminarSeccion();

?>
<!--==End of ELIMINAR SECCION   ==================================-->