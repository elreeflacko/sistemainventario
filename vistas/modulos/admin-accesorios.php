<?php
/*===========================================================================
=            LLamamos el metodo para llamar la ruta del servidor            =
===========================================================================*/
$ruta = ControladorPlantilla::ctrRuta();
/*=====  End of LLamamos el metodo para llamar la ruta del servidor  ======*/
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Administrar Accesorios
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php?action=admin-elementos"><i class="fa fa-dashboard"></i> Administrar elementos</a></li>
        <li><a href="index.php?action=admin-dispositivos"><i class="fa fa-dashboard"></i>Administrar Dispositivos</a></li>
        <li class="active">Administrar accesorios</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal_registrar_accesorio">Registrar accesorio</button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablaAccesorios" width="100%">
            <thead>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Activo</th>
                <th>Serial</th>
                <th>Descripción</th>
                <th>Dispositivo Serial</th>
                <th>Acciones</th>
              </tr>
            </thead>
          </table>
          <input type="hidden" value="<?php echo $_SESSION['usuario_perfil']; ?>" id="perfil_oculto">
        </div>
      </div>
    </section>
</div>
<!--=============================================
=            MODAL REGISTRAR ACCESORIO        =
==============================================-->
<div id="modal_registrar_accesorio" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Accesorio</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->

        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--Entrada para seleccionar el tipo de dispositivo al cual va a pertenecer el accesorio-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th-list"></i></span>
                <select class="form-control input-lg" name="combobox_tipoDispo" id="combobox_tipoDispo" required>
                  <option value="">Seleccionar tipo dispositivo</option>
                  <?php

                      $item = null;
                      $valor = null;

                      $lista_tipos_dispositivos = ControladorTiposDispositivos::ctrMostrarTiposDispositivos($item, $valor);

                      foreach ($lista_tipos_dispositivos as $key => $value) {

                        echo '<option value="'.$value["tipo_dispositivo_id"].'">'.$value["tipo_dispositivo_nombre"].'</option>';
                      }

                  ?>
                </select>
              </div>
            </div>
            <!--Entrada para el activo del accesorio-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-chain"></i></span>
                <input type="text" class="form-control input-lg" id="activo_accesorio_registro" name="activo_accesorio_registro" placeholder="Activo">
              </div>
            </div>
            <!--Entrada para el serial del accesorio-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-chain"></i></span>
                <input type="text" class="form-control input-lg" id="serial_accesorio_registro" name="serial_accesorio_registro" placeholder="Ingresar serial" maxlength="60">
              </div>
            </div>
            <!--Entrada para la descripcion del accesorio-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-chain"></i></span>
                <input type="text" class="form-control input-lg" id="descripcion_accesorio_registro" name="descripcion_accesorio_registro" placeholder="Descripción" maxlength="60">
              </div>
            </div>
            <!--Entrada para el comentario del accesorio-->
            <div class="form-group">
                <label>Comentarios:</label>
                <textarea class="form-control" rows="3" placeholder="Información importante ..." name="comentario_accesorio_registro"></textarea>
            </div>
            <!--Entrada para el estado del accesorio-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-gavel"></i></span>
                <select class="form-control input-lg" name="combobox_estado_registrar" id="combobox_estado_registrar">
                  <option value="">Estado</option>
                  <option value="asignado">Asignado</option>
                  <option value="no-asignado">No asignado</option>
                  <option value="prestado">Prestado</option>
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
          <button type="submit" class="btn btn-primary pull-right">Guardar accesorio</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <!--<?php

           // $registrar_accesorio = new ControladorAccesorios();
            //$registrar_accesorio-> ctrRegistrarAccesorio();

        ?>-->
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL REGISTRAR accesorio  ====-->
