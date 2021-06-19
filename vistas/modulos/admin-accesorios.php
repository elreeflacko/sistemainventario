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
                <th class="info">Serial Dispositivo Rel</th>
                <th>Acciones</th>
              </tr>
            </thead>
          </table>
          <input type="hidden" value="<?php echo $_SESSION['usuario_perfil']; ?>" id="perfil_oculto">
        </div>
      </div>
    </section>
</div>
<!--=============================================
=            MODAL VER DISPOSITIVO              =
==============================================-->
<div id="modal_ver_accesorio" class="modal fade" role="dialog">
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
                <select class="form-control input-lg" name="combobox_tipoDispo_ver" id="combobox_tipoDispo_ver" readonly>
                  <option id="nombre_tipoDispo_ver"></option>
                </select>
              </div>
            </div>
            <!--Entrada para ver la marca-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="combobox_marca_ver" id="combobox_marca_ver" readonly>
                  <option id="nombre_marca_ver"></option>
                </select>
              </div>
            </div>
             <!--Entrada para ver el modelo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="combobox_modelo_ver" id="combobox_modelo_ver" readonly>
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
                <textarea class="form-control" rows="3" name="comentario_dispositivo_ver" id="comentario_dispositivo_ver" readonly></textarea>
            </div>
            <!-- Entrada para ver la fecha de la garantía -->
            <div class="form-group">
                <label>Garantía:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker-ver" name="fecha_garantia_dispositivo_ver" readonly>
                </div>
              </div>
            <!--Entrada para ver el bloque-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                <select class="form-control input-lg" name="combobox_bloque_ver" id="combobox_bloque_ver" readonly>
                  <option id="nombre_bloque_ver"></option>
                </select>
              </div>
            </div>
            <!--Entrada para ver el lugar-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                <select class="form-control input-lg" name="combobox_lugar_ver" id="combobox_lugar_ver" readonly>
                  <option id="nombre_lugar_ver"></option>
                </select>
              </div>
            </div>
            <!--Esntrada para ver  la sección-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-group"></i></span>
                <select class="form-control input-lg" name="combobox_seccion_ver" id="combobox_seccion_ver" readonly>
                  <option id="nombre_seccion_ver"></option>
                </select>
              </div>
            </div>
            <!--Entrada para ver la persona-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <select class="form-control input-lg" name="combobox_persona_ver" id="combobox_persona_ver" readonly>
                  <option id="nombre_persona_ver"></option>
                </select>
              </div>
            </div>
            <!--Entrada para ver el estado del dispositivo-->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa  fa-gavel"></i></span>
                <select class="form-control input-lg" name="combobox_estado_ver" id="combobox_estado_ver" readonly>
                  <option id="estado_dispositivo_ver"></option>
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
                <input type="text" class="form-control pull-right fecha_prestamo_dispositivo" readonly>
              </div>
              <!-- /.input group -->
            </div>
            <!--Entrada para ver la firma-->
            <div class="form-group">
              <div class="input-group">
                <div style="border-style: groove; border-radius: 4px; width: 550px;">
                  <div id="firma_ver"></div>  
                </div>  
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




