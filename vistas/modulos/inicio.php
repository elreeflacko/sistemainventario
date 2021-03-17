<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Página de inicio
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Página de inicio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
      $ruta_memo =  ControladorPlantilla::ctrRutaMemo();
      echo '<pre>'; print_r($ruta_memo); echo '</pre>';
      ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->