<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Administrar Bloques
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php?action=admin-elementos"><i class="fa fa-dashboard"></i>Administrar elementos</a></li>
        <li class="active">Administrar Bloques</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal_registrar_bloque">Registrar Bloque</button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Bloque</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php

                  $item = null;
                  $valor = null;

                  $mostrar_bloques =  ControladorBloques::ctrMostrarBloques($item, $valor);

                  foreach ($mostrar_bloques as $key => $value) {
                    
                      echo '<tr>
                              <td>'.($key+1).'</td>
                              <td class="text-uppercase">'.$value["bloque_nombre"].'</td>
                              <td>
                                <div class="btn-group">
                                  <button class="btn btn-warning btn_editar_bloque" id-bloque="'.$value["bloque_id"].'" data-toggle="modal" data-target="#modal_editar_bloque"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-danger btn_eliminar_bloque" id-bloque="'.$value["bloque_id"].'"><i class="fa fa-times"></i></button>
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
=      MODAL REGISTRAR BLOQUE                  =
==============================================-->
<div id="modal_registrar_bloque" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Bloque</h4>
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
                <input type="text" class="form-control input-lg" id="nombre_bloque_registro" name="nombre_bloque_registro" placeholder="Ingresar Bloque" maxlength="50" required>
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
          <button type="submit" class="btn btn-primary pull-right">Guardar Bloque</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <?php

            $registrar_bloque = new ControladorBloques();
            $registrar_bloque-> ctrRegistrarBloque();

        ?>
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL REGISTRAR BLOQUE  ====-->

<!--=============================================
=      MODAL EDITAR BLOQUE                      =
==============================================-->
<div id="modal_editar_bloque" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Bloque</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->
        
        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--Entrada para el id del tipo dispositivo a editar-->
            <input type="hidden" id="id_bloque_actual" name="id_bloque_actual">
            <!--Entrada para el nombre-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" id="nombre_bloque_editar" name="nombre_bloque_editar" maxlength="50">
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
          <button type="submit" class="btn btn-primary pull-right">Actualizar Bloque</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <?php

            $editar_bloque = new ControladorBloques();
            $editar_bloque-> ctrEditarBloque();
                  
          ?>
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL EDITAR BLOQUE  ====-->

<!--=================================================================
=                           ELIMINAR BLOQUE                         =
==================================================================-->
<?php

    $eliminar_bloque = new ControladorBloques();
    $eliminar_bloque-> ctrEliminarBloque();

?>
<!--==End of ELIMINAR BLOQUE   ==================================-->