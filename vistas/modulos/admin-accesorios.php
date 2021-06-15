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
          <a class="btn btn-primary" href="index.php?action=registrar-accesorio">Registrar accesorio</a>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablaAccesorios" width="100%">
            <thead>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Activo</th>
                <th>Serial</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Categoría</th>
                <th>Acciones</th>
              </tr>
            </thead>
          </table>
          <input type="hidden" value="<?php echo $_SESSION['usuario_perfil']; ?>" id="perfil_oculto">
        </div>
      </div>
    </section>
</div>
