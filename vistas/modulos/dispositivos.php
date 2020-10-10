<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Dispositivos</h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="admin-elementos"><i class="fa fa-dashboard"></i> Administrar Elementos</a></li>
        <li class="active">Dispositivos</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <?php
          $item = null;
          $valor = null;

          $mostrar_tipos_dispositivos = ControladorTiposDispositivos::ctrMostrarTiposDispositivos($item, $valor);

          foreach ($mostrar_tipos_dispositivos as $key => $value) {
            echo '<div class="col-lg-3 col-xs-6">
                    <div class="small-box">
                      <img src="'.$value["tipo_dispositivo_imagen"].'">
                      <a id="listar_tipo_dispositivo" tipo_dispositivo_id="'.$value["tipo_dispositivo_id"].'" class="small-box-footer tabla-dispositivo" href="#">'.$value["tipo_dispositivo_nombre"].'</a>
                    </div>
                  </div>';
          }
        ?>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->