 <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Administrar modelos
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php?action=admin-elementos"><i class="fa fa-dashboard"></i> Administrar elementos</a></li>
        <li class="active">Administrar modelos</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal_registrar_modelo">Registrar modelo</button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped table-hover dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Tipo Dispositivo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php

                  $item = null;
                  $valor = null;

                  $mostrar_modelos =  ControladorModelos::ctrMostrarModelos($item, $valor);

                  foreach ($mostrar_modelos as $key => $value) {
                    
                      echo '<tr>
                              <td>'.($key+1).'</td>
                              <td class="text-uppercase">'.$value["modelo_nombre"].'</td>
                              <td class="text-uppercase">'.$value["marca_nombre"].'</td>
                              <td class="text-uppercase">'.$value["tipo_dispositivo_nombre"].'</td>
                              <td>
                                <div class="btn-group">
                                  <button class="btn btn-warning btn_editar_modelo" id-modelo="'.$value["modelo_id"].'" data-toggle="modal" data-target="#modal_editar_modelo"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-info btn_ver_modelo" id-modelo="'.$value["modelo_id"].'"><i class="fa fa-eye"></i></button>
                                  <button class="btn btn-danger btn_eliminar_modelo" id-modelo="'.$value["modelo_id"].'"><i class="fa fa-times"></i></button>
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
=            MODAL REGISTRAR modelo           =
==============================================-->
<div id="modal_registrar_modelo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar modelo</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->
        
        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--Esntrada para seleccionar el tipo de dispositivo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="combobox_tipoDispositivo_registro" id="combobox_tipoDispositivo_registro" required>
                  <option value="">Seleccionar tipo dispositivo</option>
                  <?php

                      $item = null;
                      $valor = null;

                      $combobox_tipos_dispositivos = ControladorTiposDispositivos::ctrMostrarTiposDispositivos($item, $valor);

                      foreach ($combobox_tipos_dispositivos as $key => $value) {
                        
                        echo '<option value="'.$value["tipo_dispositivo_id"].'">'.$value["tipo_dispositivo_nombre"].'</option>';
                      }

                  ?>
                </select>
              </div>
            </div>
            <!--Esntrada para seleccionar la marca-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="combobox_marca_registro" id="combobox_marca_registro" required>
                  <option value="">Seleccionar Marca</option>
                  <?php

                      $item = null;
                      $valor = null;

                      $combobox_marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);

                      foreach ($combobox_marcas as $key => $value) {
                        
                        echo '<option value="'.$value["marca_id"].'">'.$value["marca_nombre"].'</option>';
                      }

                  ?>
                </select>
              </div>
            </div>
            <!--Entrada para el nombre del modelo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="nombre_modelo_registro" name="nombre_modelo_registro" placeholder="Ingresar modelo" maxlength="60" required>
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
          <button type="submit" class="btn btn-primary pull-right">Guardar modelos</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <?php

            $registrar_modelo = new ControladorModelos();
            $registrar_modelo-> ctrRegistrarModelo();

        ?>
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL REGISTRAR modelos  ====-->

<!--=============================================
=            MODAL EDITAR MODELOS               =
==============================================-->
<div id="modal_editar_modelo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar modelo</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->
        
        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--Entrada para el id del modelo ,este campo es oculto-->
            <input type="hidden" id="id_modelo_actual" name="id_modelo_actual">
            <!--Entrada para seleccionar el tipo de dispositivo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="combobox_tipoDispositivo_editar" id="combobox_tipoDispositivo_editar">
                  <option id="nombre_tipo_dispositivo_actual"></option>
                   <?php

                      $item = null;
                      $valor = null;

                      $combobox_tipos_dispositivos = ControladorTiposDispositivos::ctrMostrarTiposDispositivos($item, $valor);

                      foreach ($combobox_tipos_dispositivos as $key => $value) {
                        
                        echo '<option value="'.$value["tipo_dispositivo_id"].'">'.$value["tipo_dispositivo_nombre"].'</option>';
                      }

                  ?>
                </select>
              </div>
            </div>
            <!--Entrada para seleccionar la marca-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="combobox_marca_editar" id="combobox_marca_editar">
                  <option id="nombre_marca_actual"></option>
                  <?php

                      $item = null;
                      $valor = null;

                      $combobox_marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);

                      foreach ($combobox_marcas as $key => $value) {
                        
                        echo '<option value="'.$value["marca_id"].'">'.$value["marca_nombre"].'</option>';
                      }

                  ?>
                </select>
              </div>
            </div>
            <!--Entrada para el nombre del modelo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="nombre_modelo_editar" name="nombre_modelo_editar" maxlength="60">
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
          <button type="submit" class="btn btn-primary pull-right">Guardar modelo</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <?php

            $editar_modelo = new ControladorModelos();
            $editar_modelo-> ctrEditarModelo();

        ?>
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL EDITAR modelo  ====-->

<!--=================================================================
=            LLAMAMOS EL METODO PARA ELIMINAR UN modelo            =
==================================================================-->
<?php

    $eliminar_modelo = new ControladorModelos();
    $eliminar_modelo-> ctrEliminarModelo();

?>
<!--====  End of LLAMAMOS EL METODO PARA ELIMINAR UN modelo  ====-->