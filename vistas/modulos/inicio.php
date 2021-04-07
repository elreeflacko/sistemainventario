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
      <div class="row">
        <?php
          $item = null;
          $valor = null;
          $tipos_dispositivos = ControladorTiposDispositivos::ctrMostrarTiposDispositivos($item, $valor);
          foreach ($tipos_dispositivos as $key => $value) {
            echo '<div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="box box-primary">
                      <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive" src="'.$rutaServidor.$value["tipo_dispositivo_imagen"].'" alt="User profile picture">
                        <h3 class="profile-username text-center">'.$value["tipo_dispositivo_nombre"].'</h3>
                        <a href="index.php?action=dispositivos&id-tipo-dispositivo='.$value["tipo_dispositivo_id"].'" class="btn btn-primary btn-block"><b>Ver todos</b></a>
                      </div>
                    </div>
                  </div>';
          }

        ?>            
      </div>
    </section>  
  </div>
