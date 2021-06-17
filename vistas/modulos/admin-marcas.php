<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Administrar Marcas
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="index.php?action=admin-elementos"><i class="fa fa-dashboard"></i> Administrar elementos</a></li>
        <li class="active">Administrar Marcas</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal_registrar_marca">Registrar Marca</button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped table-hover dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Marca</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php

                  $item = null;
                  $valor = null;

                  $mostrar_marcas =  ControladorMarcas::ctrMostrarMarcas($item, $valor);

                  foreach ($mostrar_marcas as $key => $value) {
                    
                      echo '<tr>
                              <td>'.($key+1).'</td>
                              <td class="text-uppercase">'.$value["marca_nombre"].'</td>
                              <td>
                                <div class="btn-group">
                                  <button class="btn btn-warning btn_editar_marca" id-marca="'.$value["marca_id"].'" data-toggle="modal" data-target="#modal_editar_marca"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-danger btn_eliminar_marca" id-marca="'.$value["marca_id"].'"><i class="fa fa-times"></i></button>
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
=      MODAL REGISTRAR MARCA                  =
==============================================-->
<div id="modal_registrar_marca" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Marca</h4>
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
                <input type="text" class="form-control input-lg" id="nombre_marca_registro" name="nombre_marca_registro" placeholder="Ingresar Marca" maxlength="60" required>
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
          <button type="submit" class="btn btn-primary pull-right">Guardar Marca</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <?php

            $registrar_marca = new ControladorMarcas();
            $registrar_marca-> ctrRegistrarMarca();

        ?>
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL REGISTRAR MARCA  ====-->

<!--=============================================
=      MODAL EDITAR MARCA                      =
==============================================-->
<div id="modal_editar_marca" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--======================================
        =            CABEZA DEL MODAL            =
        =======================================-->
        <div class="modal-header" style="background: #3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Marca</h4>
        </div>
        <!--====  End of CABEZA DEL MODAL  ====-->
        
        <!--======================================
        =            CUERPO DEL MODAL            =
        =======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!--Entrada para el id de la  marca a editar-->
            <input type="hidden" id="id_marca_actual" name="id_marca_actual">
            <!--Entrada para el nombre-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" id="nombre_marca_editar" name="nombre_marca_editar" maxlength="50">
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
          <button type="submit" class="btn btn-primary pull-right">Actualizar Marca</button>
        </div>
        <!--====  End of PIE DEL MODAL  ====-->
        <?php

            $editar_marca = new ControladorMarcas();
            $editar_marca-> ctrEditarMarca();
                  
          ?>
      </form>
    </div>
  </div>
</div>
<!--====  End of MODAL EDITAR MARCA  ====-->

<!--=================================================================
=                           ELIMINAR MARCA                         =
==================================================================-->
<?php

    $eliminar_marca = new ControladorMarcas();
    $eliminar_marca-> ctrEliminarMarca();

?>

<!--==End of ELIMINAR MARCA   ==================================-->