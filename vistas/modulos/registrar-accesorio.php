<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-bottom: 30px">
      <h1>
        Registrar Accesorio
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php?action=admin-accesorios"><i class="fa fa-dashboard"></i>Administrar Accesorios</a></li>
        <li class="active">Registrar Accesorio</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" style="background: white">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-body">
              <form role="form" method="post" enctype="multipart/form-data">
                <!--Entrada para seleccionar el tipo de dispositivo al cual va a pertenecer el accesorio-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon" style="background: #d9edf7"><i class="fa fa-th-list"></i></span>
                    <select class="form-control input-lg" name="combobox_tipoDispositivo_registrar" id="combobox_tipoDispositivo_registrar" required>
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
                    <input type="text" class="form-control input-lg" id="activo_accesorio_registro" name="activo_accesorio_registro" readonly required>
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
                    <span class="input-group-addon" style="background: #d9edf7"><i class="fa fa-chain"></i></span>
                    <input type="text" class="form-control input-lg" id="descripcion_accesorio_registro" name="descripcion_accesorio_registro" placeholder="Descripción" maxlength="60" required>
                  </div>
                </div>
                <!--Entrada para relacionar el Accesorio a un dispositivo usando el serial-->
                <div class="form-group well well-sm">
                  <label>Buscar el Serial: </label>
                  <select class="form-control input-lg" name="buscar_serial" id="buscar_serial">
                    <option value="">Escribir Serial</option>
                    <?php
                      $item = null;
                      $valor = null;

                      $buscar_dispositivo =  ControladorDispositivos::ctrMostrarDispositivos($item, $valor); 

                      foreach ($buscar_dispositivo as $key => $value) {
                        echo '<option value="'.$value["dispositivo_id"].'">'.$value["dispositivo_serial"].'</option>';
                      } 
                    ?>
                  </select> 
                </div>
                <!--Entrada para relacionar el Accesorio a un dispositivo usando el serial-->
                <div class="form-group well well-sm">
                  <label>Buscar el Activo: </label>
                  <select class="form-control input-lg" name="buscar_activo" id="buscar_activo">
                    <option value="">Escribir Activo</option>
                    <?php
                      $item = null;
                      $valor = null;

                      $buscar_dispositivo =  ControladorDispositivos::ctrMostrarDispositivos($item, $valor); 

                      foreach ($buscar_dispositivo as $key => $value) {
                        echo '<option value="'.$value["dispositivo_id"].'">'.$value["dispositivo_activo"].'</option>';
                      } 
                    ?>
                  </select> 
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
                <a class="btn btn-default pull-left" href="index.php?action=admin-accesorios">Volver</a>
                <button type="submit" class="btn btn-primary pull-right">Guardar accesorio</button>
                <?php

                  $registrar_accesorio = new ControladorAccesorios();
                  $registrar_accesorio-> ctrRegistrarAccesorio();

                ?>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <p id="tipo_dispo">hollla</p>
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th style="width:50%">Subtotal:</th>
                  <td>$250.30</td>
                </tr>
                <tr>
                  <th>Tax (9.3%)</th>
                  <td>$10.34</td>
                </tr>
                <tr>
                  <th>Shipping:</th>
                  <td>$5.80</td>
                </tr>
                <tr>
                  <th>Total:</th>
                  <td>$265.24</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div> 
    </section>
</div>