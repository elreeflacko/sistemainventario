<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li><a href="index.php?action=inicio"><i class="fa fa-home"></i><span>Inicio</span></a></li>
      <?php if($_SESSION["usuario_perfil"] == "administrador"): ?>
        <li><a href="index.php?action=admin-usuarios"><i class="fa fa-user"></i><span>Usuarios</span></a></li>
        <li><a href="index.php?action=admin-elementos"><i class="fa fa-cog"></i><span>Elementos</span></a></li>
      <?php endif ?>
      <li><a href="index.php?action=admin-dispositivos"><i class="fa fa-desktop"></i><span>Dispositivos</span></a></li>
      <li><a href="index.php?action=admin-accesorios"><i class="fa fa-keyboard-o"></i><span>Accesorios</span></a></li>
      <?php if ($_SESSION["usuario_perfil"] == "administrador" || $_SESSION["usuario_perfil"] == "especial"): ?>
         <li><a href="index.php?action=prestamos&estado=prestado"><i class="fa fa-share-alt"></i><span>Prestamos</span></a></li>
         <li><a href="index.php?action=en-reparacion&estado=reparacion"><i class="fa fa-wrench"></i><span>En reparación</span></a></li>
         <li><a href="index.php?action=en-seguro&estado=seguro"><i class="fa fa-ambulance"></i><span>Seguro</span></a></li>
         <li><a href="index.php?action=en-garantia&estado=garantia"><i class="fa fa-warning"></i><span>Garantía</span></a></li>
         <li><a href="index.php?action=sin-asignar&estado=no-asignado"><i class="fa fa-ban"></i><span>No asignado</span></a></li>
         <li><a href="index.php?action=dados-baja&estado=baja"><i class="fa fa-arrow-down"></i><span>Dados de Baja</span></a></li>
         <li><a href="index.php?action=hurtados&estado=hurtado"><i class="fa fa-frown-o"></i><span>Hurtados</span></a></li>
         <li><a href="index.php?action=programas"><i class="fa fa-slideshare"></i><span>Programas</span></a></li>
      <?php endif ?>
    </ul>
  </section>
</aside>