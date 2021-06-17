<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Ver Lugar
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php?action=admin-elementos"><i class="fa fa-dashboard"></i>Administrar elementos</a></li>
        <li><a href="index.php?action=admin-lugares"><i class="fa fa-dashboard"></i>Administrar lugares</a></li>
        <li class="active">Ver Lugar</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Bloque</th>
                <th>Lugar</th>
                <th>Serial</th>
                <th>Activo</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Tipo dispositivo</th>
                <th>Sección</th>
                <th>Persona</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php

                  $item = "lugar_id";
                  $valor = $_GET["id-lugar"];

                  $mostrar_lugar =  ControladorLugares::ctrVerLugar($item, $valor);

                  foreach ($mostrar_lugar as $key => $value) {
                    
                      echo '<tr>
                              <td>'.($key+1).'</td>
                              <td class="text-uppercase">'.$value["bloque_nombre"].'</td>
                              <td class="text-uppercase">'.$value["lugar_nombre"].'</td>
                              <td class="text-uppercase" style="background: #81c3f7">'.$value["dispositivo_serial"].'</td>
                              <td class="text-uppercase" style="background: #81c3f7">'.$value["dispositivo_activo"].'</td>
                              <td class="text-uppercase" style="background: #81c3f7">'.$value["modelo_nombre"].'</td>
                              <td class="text-uppercase">'.$value["marca_nombre"].'</td>
                              <td class="text-uppercase">'.$value["tipo_dispositivo_nombre"].'</td>
                              <td class="text-uppercase">'.$value["seccion_nombre"].'</td>
                              <td class="text-uppercase">'.$value["persona_nombre"].'</td>
                              <td>
                                <div class="btn-group">
                                  <button class="btn btn-info btn_ver_dispositivo" id-dispositivo="'.$value["dispositivo_id"].'" data-toggle="modal" data-target="#modal_ver_dispositivo"><i class="fa fa-info"></i></button>
                                  <button class="btn btn-warning btn_editar_dispositivo" id-dispositivo="'.$value["dispositivo_id"].'" data-toggle="modal" data-target="#modal_editar_dispositivo"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-danger btn_eliminar_dispositivo" id-dispositivo="'.$value["dispositivo_id"].'"><i class="fa fa-times"></i></button>
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
=            MODAL EDITAR dispositivos               =
==============================================-->
<div id="modal_editar_dispositivo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Dispositivo</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->
        
        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--Entrada para el id del dispositivo ,este campo es oculto-->
            <input type="hidden" id="id_dispositivo_actual" name="id_dispositivo_actual">
            <!--Entrada para seleccionar el tipo de dispositivo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="combobox_tipoDispo_editar" id="combobox_tipoDispo_editar">
                  <option id="nombre_tipoDispo_actual"></option>
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
             <!--Entrada para seleccionar el modelo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="combobox_modelo_editar" id="combobox_modelo_editar">
                  <option id="nombre_modelo_actual"></option>
                  
                </select>
              </div>
            </div>
             <!--Entrada para el serial del dispositivo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-chain"></i></span>
                <input type="text" class="form-control input-lg" id="serial_dispositivo_editar" name="serial_dispositivo_editar" maxlength="60">
              </div>
            </div>
            <!--Entrada para el activo del dispositivo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-chain"></i></span>
                <input type="text" class="form-control input-lg" id="activo_dispositivo_editar" name="activo_dispositivo_editar"  maxlength="60">
              </div>
            </div>
            <!--Entrada para el comentario del dispositivo-->
            <div class="form-group">
                <label>Comentarios:</label>
                <textarea class="form-control" rows="3" name="comentario_dispositivo_editar" id="comentario_dispositivo_editar"></textarea>
            </div>
            <!-- Entrada para la fecha de la garantía -->
            <div class="form-group">
                <label>Garantía:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right fecha_garantia_dispositivo_editar" id="datepicker-editar" name="fecha_garantia_dispositivo_editar">
                </div>
                <!-- /.input group -->
              </div>
              <script type="text/javascript">
                $("#datepicker-editar").datepicker({
                  format: 'yyyy-mm-dd'
                });
              </script>
            <!--Entrada para seleccionar el bloque-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-building"></i></span>
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
            <!--Esntrada para seleccionar el lugar-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                <select class="form-control input-lg" name="combobox_lugar_editar" id="combobox_lugar_editar">
                  <option id="nombre_lugar_actual"></option>
                </select>
              </div>
            </div>
            <!--Esntrada para seleccionar la sección-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-group"></i></span>
                <select class="form-control input-lg" name="combobox_seccion_editar" id="combobox_seccion_editar">
                  <option id="nombre_seccion_actual"></option>
                  <?php

                      $item = null;
                      $valor = null;

                      $combobox_secciones = ControladorSecciones::ctrMostrarSecciones($item, $valor);

                          foreach ($combobox_secciones as $key => $value) {
                        
                          echo '<option value="'.$value["seccion_id"].'">'.$value["seccion_nombre"].'</option>';
                      }
                  ?>
                </select>
              </div>
            </div>
            <!--Esntrada para seleccionar la persona-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <select class="form-control input-lg" name="combobox_persona_editar" id="combobox_persona_editar">
                  <option id="nombre_persona_actual"></option>
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
          <button type="submit" class="btn btn-primary pull-right">Actualizar dispositivo</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <?php

            $editar_dispositivo = new ControladorDispositivos();
            $editar_dispositivo-> ctrEditarDispositivo();

        ?>
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL EDITAR DISPOSITIVO  ====-->
<!--=============================================
=            MODAL VER DISPOSITIVO              =
==============================================-->
<div id="modal_ver_dispositivo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ver dispositivo</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->
        
        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="combobox_tipoDispo_ver" id="combobox_tipoDispo_ver">
                  <option id="nombre_tipoDispo_ver"></option>  
                </select>
              </div>
            </div>
            <!--Entrada para ver la marca-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="combobox_marca_ver" id="combobox_marca_ver">
                  <option id="nombre_marca_ver"></option>
                </select>
              </div>
            </div>
             <!--Entrada para ver el modelo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="combobox_modelo_ver" id="combobox_modelo_ver">
                  <option id="nombre_modelo_ver"></option>
                  
                </select>
              </div>
            </div>
             <!--Entrada para ver el serial del dispositivo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-chain"></i></span>
                <input type="text" class="form-control input-lg" id="serial_dispositivo_ver" name="serial_dispositivo_ver" readonly>
              </div>
            </div>
            <!--Entrada para ver el activo del dispositivo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-chain"></i></span>
                <input type="text" class="form-control input-lg" id="activo_dispositivo_ver" name="activo_dispositivo_ver" readonly>
              </div>
            </div>
            <!--Entrada para ver  el comentario del dispositivo-->
            <div class="form-group">
                <label>Comentarios:</label>
                <textarea class="form-control" rows="3" name="comentario_dispositivo_ver" id="comentario_dispositivo_ver"></textarea>
            </div>
            <!-- Entrada para ver la fecha de la garantía -->
            <div class="form-group">
                <label>Garantía:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker-ver" name="fecha_garantia_dispositivo_ver">
                </div>
              </div>
            <!--Entrada para ver el bloque-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                <select class="form-control input-lg" name="combobox_bloque_ver" id="combobox_bloque_ver">
                  <option id="nombre_bloque_ver"></option>
                </select>
              </div>
            </div>
            <!--Entrada para ver el lugar-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                <select class="form-control input-lg" name="combobox_lugar_ver" id="combobox_lugar_ver">
                  <option id="nombre_lugar_ver"></option>
                </select>
              </div>
            </div>
            <!--Esntrada para ver  la sección-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-group"></i></span>
                <select class="form-control input-lg" name="combobox_seccion_ver" id="combobox_seccion_ver">
                  <option id="nombre_seccion_ver"></option>
                </select>
              </div>
            </div>
            <!--Entrada para ver la persona-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <select class="form-control input-lg" name="combobox_persona_ver" id="combobox_persona_ver">
                  <option id="nombre_persona_ver"></option>
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
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL VER DISPOSITIVO  ====-->
<!--=================================================================
=            LLAMAMOS EL METODO PARA ELIMINAR UN DISPOSITIVO        =
==================================================================-->
<?php
    
      $eliminar_dispositivo = new ControladorDispositivos();
      $eliminar_dispositivo-> ctrEliminarDispositivo();
    
?>
<!--====  End of LLAMAMOS EL METODO PARA ELIMINAR UN DISPOSITIVO  -->