<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Administrar Tipos de Dispositivos
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php?action=admin-elementos"><i class="fa fa-dashboard"></i> Administrar elementos</a></li>
        <li class="active">Administrar Tipos de dispositivos</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal_registrar_tipo_dispositivo">Registrar Tipo de dispositivo</button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped table-hover dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Tipo dispositivo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php

                  $item = null;
                  $valor = null;

                  $mostrar_tipos_dispositivos =  ControladorTiposDispositivos::ctrMostrarTiposDispositivos($item, $valor);

                  foreach ($mostrar_tipos_dispositivos as $key => $value) {
                    
                      echo '<tr>
                              <td>'.($key+1).'</td>
                              <td class="text-uppercase">'.$value["tipo_dispositivo_nombre"].'</td>
                              <td>
                                <div class="btn-group">
                                  <button class="btn btn-warning btn_editar_tipo_dispositivo" id-tipo-dispositivo="'.$value["tipo_dispositivo_id"].'" data-toggle="modal" data-target="#modal_editar_tipo_dispositivo"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-danger btn_eliminar_tipo_dispositivo" id-tipo-dispositivo="'.$value["tipo_dispositivo_id"].'"><i class="fa fa-times"></i></button>
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
=      MODAL REGISTRAR TIPOS DE DISPOSITIVO     =
==============================================-->
<div id="modal_registrar_tipo_dispositivo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Tipo de Dispositivo</h4>
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
                <input type="text" class="form-control input-lg" id="nombre_tipoDispositivo_registro" name="nombre_tipoDispositivo_registro" placeholder="Ingresar Tipo dispositivo" maxlength="50" required>
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
          <button type="submit" class="btn btn-primary pull-right">Guardar Tipo dispositivo</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <?php

            $registrar_tipo_dispositivo = new ControladorTiposDispositivos();
            $registrar_tipo_dispositivo-> ctrRegistrarTipoDispositivo();

        ?>
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL REGISTRAR USUARIO  ====-->

<!--=============================================
=      MODAL EDITAR TIPOS DE DISPOSITIVO     =
==============================================-->
<div id="modal_editar_tipo_dispositivo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Tipo de Dispositivo</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->
        
        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--Entrada para el id del tipo dispositivo a editar-->
            <input type="hidden" id="id_tipo_dispositivo_actual" name="id_tipo_dispositivo_actual">
            <!--Entrada para el nombre-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" id="nombre_tipoDispositivo_editar" name="nombre_tipoDispositivo_editar" maxlength="50">
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
          <button type="submit" class="btn btn-primary pull-right">Actualizar Tipo dispositivo</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <?php

            $editar_tipo_dispositivo = new ControladorTiposDispositivos();
            $editar_tipo_dispositivo-> ctrEditarTipoDispositivo();
                  
          ?>  
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL EDITAR USUARIO  ====-->

<!--=================================================================
=         LLAMAMOS EL METODO PARA EL TIPO DE DISPOSITIVO            =
==================================================================-->
<?php

    $eliminar_tipo_dispositivo = new ControladorTiposDispositivos();
    $eliminar_tipo_dispositivo-> ctrEliminarTipoDispositivo();

?>
<!--==End of LLAMAMOS EL METODO PARA EL TIPO DE DISPOSITIVO  ====-->