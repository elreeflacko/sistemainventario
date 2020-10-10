<div class="login-box">
  <div class="login-logo">
    <img src="vistas/img/plantilla/logo_normal.png" class="img-responsive" style="margin: auto;">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingresar al Sistema</p>

    <form role="form" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="email_usuario_ingreso" placeholder="Ingresar Email" name="email_usuario_ingreso"  required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="pwd_usuario_ingreso" placeholder="Ingresar password" name="pwd_usuario_ingreso"  required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
      </div>
      <?php
        $ingreso_usuario = new ControladorUsuarios();
        $ingreso_usuario->ctrIngresoUsuario();
      ?>
    </form>
  </div> 
</div>
