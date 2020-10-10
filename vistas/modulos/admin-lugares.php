<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Administrar Lugares
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php?action=admin-elementos"><i class="fa fa-dashboard"></i>Administrar elementos</a></li>
        <li class="active">Administrar Lugares</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal_registrar_lugar">Registrar Lugar</button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped table-hover dt-responsive tablas">
            <thead>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Lugar</th>
                <th>Bloque</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php

                  $item = null;
                  $valor = null;

                  $mostrar_lugares =  ControladorLugares::ctrMostrarLugares($item, $valor);

                  foreach ($mostrar_lugares as $key => $value) {
                    
                      echo '<tr>
                              <td>'.($key+1).'</td>
                              <td class="text-uppercase">'.$value["lugar_nombre"].'</td>
                              <td class="text-uppercase">'.$value["bloque_nombre"].'</td>
                              <td>
                                <div class="btn-group">
                                  <a class="btn btn-info" href="index.php?action=ver-lugar&id-lugar='.$value["lugar_id"].'"><i class="fa fa-info"></i></a>
                                  <button class="btn btn-warning btn_editar_lugar" id-lugar="'.$value["lugar_id"].'" data-toggle="modal" data-target="#modal_editar_lugar"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-danger btn_eliminar_lugar" id-lugar="'.$value["lugar_id"].'"><i class="fa fa-times"></i></button>
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
=            MODAL REGISTRAR LUGAR            =
==============================================-->
<div id="modal_registrar_lugar" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Lugar</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->
        
        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--Esntrada para seleccionar el bloque-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="combobox_bloque_registro" id="combobox_bloque_registro" required>
                  <option value="">Seleccionar bloque</option>
                  <?php

                      $item = null;
                      $valor = null;

                      $combobox_bloques = ControladorBloques::ctrMostrarBloques($item, $valor);

                      foreach ($combobox_bloques as $key => $value) {
                        
                        echo '<option value="'.$value["bloque_id"].'">'.$value["bloque_nombre"].'</option>';
                      }

                  ?>
                </select>
              </div>
            </div>
            <!--Entrada para el nombre-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="nombre_lugar_registro" name="nombre_lugar_registro" placeholder="Ingresar lugar" maxlength="60" required>
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
          <button type="submit" class="btn btn-primary pull-right">Guardar Lugar</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <?php

            $registrar_lugar = new ControladorLugares();
            $registrar_lugar-> ctrRegistrarLugar();

        ?>
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL REGISTRAR LUGAR  ====-->

<!--=============================================
=            MODAL EDITAR LUGAR            =
==============================================-->
<div id="modal_editar_lugar" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Lugar</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->
        
        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--Entrada para el id del lugar-->
            <input type="hidden" id="id_lugar_actual" name="id_lugar_actual">
            <!--Entrada para seleccionar el bloque-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="combobox_bloque_editar" id="combobox_bloque_editar">
                  <option id="nombre_bloque_actual"></option>
                  <?php

                      $item = null;
                      $valor = null;

                      $combobox_bloques = ControladorBloques::ctrMostrarBloques($item, $valor);

                      foreach ($combobox_bloques as $key => $value) {
                        
                        echo '<option value="'.$value["bloque_id"].'">'.$value["bloque_nombre"].'</option>';
                      }

                  ?>
                </select>
              </div>
            </div>
            <!--Entrada para el nombre-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="nombre_lugar_editar" name="nombre_lugar_editar" maxlength="60">
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
          <button type="submit" class="btn btn-primary pull-right">Guardar Lugar</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <?php

            $editar_lugar = new ControladorLugares();
            $editar_lugar-> ctrEditarLugar();

        ?>
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL EDITAR LUGAR  ====-->

<!--=================================================================
=            LLAMAMOS EL METODO PARA ELIMINAR UN LUGAR            =
==================================================================-->
<?php

    $eliminar_lugar = new ControladorLugares();
    $eliminar_lugar-> ctrEliminarLugar();

?>
<!--====  End of LLAMAMOS EL METODO PARA ELIMINAR UN LUGAR  ====-->
