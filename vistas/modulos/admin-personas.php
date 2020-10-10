<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Administrar personas
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php?action=admin-elementos"><i class="fa fa-dashboard"></i> Administrar elementos</a></li>
        <li class="active">Administrar personas</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal_registrar_persona">Registrar persona</button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped table-hover dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Persona</th>
                <th>Seccion</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php

                  $item = null;
                  $valor = null;

                  $mostrar_personas =  ControladorPersonas::ctrMostrarPersonas($item, $valor);

                  foreach ($mostrar_personas as $key => $value) {
                    
                      echo '<tr>
                              <td>'.($key+1).'</td>
                              <td class="text-uppercase">'.$value["persona_nombre"].'</td>
                              <td class="text-uppercase">'.$value["seccion_nombre"].'</td>
                              <td>
                                <div class="btn-group">
                                  <button class="btn btn-info btn_ver_persona" id-persona="'.$value["persona_id"].'" data-toggle="modal" data-target="#modal_ver_persona"><i class="fa fa-info"></i></button>
                                  <button class="btn btn-warning btn_editar_persona" id-persona="'.$value["persona_id"].'" data-toggle="modal" data-target="#modal_editar_persona"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-danger btn_eliminar_persona" id-persona="'.$value["persona_id"].'"><i class="fa fa-times"></i></button>
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
=            MODAL REGISTRAR PERSONA           =
==============================================-->
<div id="modal_registrar_persona" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar persona</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->
        
        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--Esntrada para seleccionar la sección-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="combobox_seccion_registro" id="combobox_seccion_registro" required>
                  <option value="">Seleccionar sección</option>
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
            <!--Entrada para el nombre-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="nombre_persona_registro" name="nombre_persona_registro" placeholder="Ingresar persona" maxlength="60" required>
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
          <button type="submit" class="btn btn-primary pull-right">Guardar personas</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <?php

            $registrar_persona = new ControladorPersonas();
            $registrar_persona-> ctrRegistrarPersona();

        ?>
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL REGISTRAR personas  ====-->

<!--=============================================
=            MODAL EDITAR PERSONA           =
==============================================-->
<div id="modal_editar_persona" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar persona</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->
        
        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--Entrada para el id del persona ,este campo es oculto-->
            <input type="hidden" id="id_persona_actual" name="id_persona_actual">
            <!--Entrada para seleccionar el lugar-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
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
            <!--Entrada para el nombre-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="nombre_persona_editar" name="nombre_persona_editar" maxlength="60">
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
          <button type="submit" class="btn btn-primary pull-right">Guardar persona</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <?php

            $editar_persona = new ControladorPersonas();
            $editar_persona-> ctrEditarPersona();

        ?>
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL EDITAR persona  ====-->

<!--=====================================
=            MODAL VER PERSONA          =
======================================-->
<div id="modal_ver_persona" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ver dispositivos de la persona</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->
        
        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <div id="ver_dispositivos_de_la_persona">
              
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        </div>
    </div>    
  </div>
</div>  
<!--====  End of MODAL VER PERSONA  ====-->

<!--=================================================================
=            LLAMAMOS EL METODO PARA ELIMINAR UN PERSONA            =
==================================================================-->
<?php

    $eliminar_persona = new ControladorPersonas();
    $eliminar_persona-> ctrEliminarPersona();

?>
<!--====  End of LLAMAMOS EL METODO PARA ELIMINAR UN PERSONA  ====-->