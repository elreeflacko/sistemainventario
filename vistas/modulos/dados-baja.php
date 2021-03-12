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
                <!--<th>Acciones</th>-->
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
                              <!--<td>
                                <div class="btn-group">
                                  <button class="btn btn-warning btn_editar_dispositivo" id-dispositivo="'.$value["dispositivo_id"].'" data-toggle="modal" data-target="#modal_editar_dispositivo"><i class="fa fa-pencil"></i></button>
                                </div>
                              </td>-->
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