<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dispositivos dados de baja
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">dados de baja</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-body">
          <table class="table table-bordered table-striped table-hover dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Tipo dispositivo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Serial</th>
                <th>Tuvo el activo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                
                  if (isset($_GET["estado"])) {
                    
                    $valor = $_GET["estado"];
                    $item = "dispositivo_estado";

                    $dispositivos_dados_baja =  ControladorDispositivos::ctrMostrarEstadoDispositivos($item, $valor);

                    foreach ($dispositivos_dados_baja as $key => $value) {

                      echo '<tr>
                              <td>'.($key+1).'</td>
                              <td class="text-uppercase">'.$value["tipo_dispositivo_nombre"].'</td>
                              <td class="text-uppercase">'.$value["marca_nombre"].'</td>
                              <td class="text-uppercase">'.$value["modelo_nombre"].'</td>
                              <td class="text-uppercase">'.$value["dispositivo_serial"].'</td>
                              <td class="text-uppercase">'.$value["dispositivo_activo"].'</td>
                              <td>';
                                
                                  if ($_SESSION["usuario_email"] == "agomez@colegiobolivar.edu.co") {
                                    echo '<div class="btn-group">
                                            <button class="btn btn-warning btn_editar_dispositivo" id-dispositivo="'.$value["dispositivo_id"].'" data-toggle="modal" data-target="#modal_editar_dispositivo"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn_eliminar_dispositivo" id-dispositivo="'.$value["dispositivo_id"].'"><i class="fa fa-times"></i></button>
                                          </div>';
                                   
                                  }    
                        echo '</td>
                            </tr>';
                    }
                  }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!--=============================================
=            MODAL EDITAR dispositivos               =
==============================================-->
<div id="modal_editar_dispositivo" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
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
            <!--<div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-chain"></i></span>
                <input type="text" class="form-control input-lg" id="id_dispositivo_editar" name="id_dispositivo_editar" maxlength="60">
              </div>
            </div>-->
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
            <!--Entrada para seleccionar la sección-->
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
            <!--Entrada para seleccionar la persona-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <select class="form-control input-lg" name="combobox_persona_editar" id="combobox_persona_editar">
                  <option id="nombre_persona_actual"></option>
                </select>
              </div>
            </div>
            <!--Entrada para el estado del dispositivo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa  fa-gavel"></i></span>
                <select class="form-control input-lg" name="combobox_estado_editar" id="combobox_estado_editar">
                  <option id="estado_dispositivo_actual"></option>
                  <option value="asignado">Asignado</option>
                  <option value="no-asignado">No asignado</option>
                  <option value="prestado">Prestado</option>
                  <option value="reparacion">Reparación</option>
                  <option value="garantia">Garantía</option>
                  <option value="seguro">Seguro</option>
                  <option value="baja">Dar de baja</option>
                  <option value="hurtado">Hurto</option>
                </select>
              </div>
            </div>
            <!-- Entrada para la fecha del prestamo -->
            <div class="form-group">
              <label>Fecha del prestamo del dispositivo:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right fecha_prestamo_dispositivo" id="datepicker-prestar" name="fecha_prestamo_dispositivo">
              </div>
              <!-- /.input group -->
            </div>
            <script type="text/javascript">
              $("#datepicker-prestar").datepicker({
                format: 'yyyy-mm-dd'
              });
            </script>
            <!--Entrada para la firma-->
            <div class="form-group" style="margin-left: 20px;">
              <div class="input-group">
                <div id="signatureparent">
                  <div id="signature"></div>  
                </div>
                <div id="respuesta-firma" style="margin: 20px;"></div>
                <!--Estilos en linea para la ingresar la firma-->
                <style type="text/css">
                  #signatureparent{
                  margin-top: 20px;
                  margin-bottom: 20px;
                  width: 800px;
                  border-bottom: 2px solid #333;
                }
                </style>
                <button type="button" class="btn btn-warning" id="repetir_firma" style="margin-right: 20px;">Repetir Firma</button>
                <button type="button" class="btn btn-info" id="guardar_firma">Guardar Firma</button>  
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
  <!--=================================================================
=            LLAMAMOS EL METODO PARA ELIMINAR UN DISPOSITIVO        =
==================================================================-->
<?php

      $eliminar_dispositivo = new ControladorDispositivos();
      $eliminar_dispositivo-> ctrEliminarDispositivo();

?>
<!--====  End of LLAMAMOS EL METODO PARA ELIMINAR UN DISPOSITIVO  -->