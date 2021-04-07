<?php session_start();
  $rutaServidor = ControladorPlantilla::ctrRuta(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventario de Sistemas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="vistas/img/plantilla/herramienta.png">
  <!--=====================================
  =            Plugins de CSS            =
  ======================================-->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="vistas/bower_components/select2/dist/css/select2.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <!--Calendarios-->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> 
  <!--Estilos personalizados-->
  <link rel="stylesheet" href="vistas/css/estilos.css">
  <!--=====================================
  =           Plugins de Javascript       =
  ======================================-->
  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!--Calendarios-->
  <script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!--Jsignature-->
  <script src="vistas/plugins/Jsignature/jSignature.js"></script>
  <script src="vistas/plugins/Jsignature/jSignature.CompressorSVG.js"></script>
</head>
<!--=====================================
=            Cuerpo del documento       =
======================================-->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->

  <?php

      if (isset($_SESSION["usuario_valido"]) && $_SESSION["usuario_valido"] == true){

          echo '<div class="wrapper">';
          /*================================
           =            CABEZOTE            =
           ================================*/

          include "modulos/cabezote.php";

          /*=====  End of CABEZOTE  ======*/

          /*============================
          =            MENU            =
          ============================*/

          include "modulos/menu.php";

          /*=====  End of MENU  ======*/

          /*===========================================
          =            MODULOS - CONTENIDO            =
          ===========================================*/

          if (isset($_GET["action"])) {

            switch ($_GET["action"]) {

              case 'inicio':
                    include "modulos/".$_GET["action"].".php";
                    break;

            //Seccion administracion

              case 'registro-dispositivo':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'admin-usuarios':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'admin-elementos':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'admin-dispositivos':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'admin-portatiles':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'admin-bloques':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'admin-lugares':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'admin-secciones':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'admin-personas':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'admin-tipos-dispositivo':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'admin-modelos':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'admin-marcas':
                    include "modulos/".$_GET["action"].".php";
                    break;

              //Seccion ver

              case 'ver-lugar':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'ver-dispositivo':
                    include "modulos/".$_GET["action"].".php";
                    break;

              //------Fin Ver------------------------------------

              case 'dispositivos':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'prestamos':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'en-reparacion':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'en-seguro':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'en-garantia':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'sin-asignar':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'dados-baja':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'hurtados':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'programas':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case 'cerrar-sesion':
                    include "modulos/".$_GET["action"].".php";
                    break;

              case  'php-info':
                    include "modulos/".$_GET["action"].".php";
                    break;

              default:
                    include "modulos/404.php";
                    break;
            }
          }
          else {

            include "modulos/inicio.php";
          }
          /*=====  End of MODULOS - CONTENIDO  ======*/

          /*==============================
          =            PIE               =
          ==============================*/

          include "modulos/pie.php";

          /*=====  End of PIE  =========*/
          echo '</div>';
      }else{
        include "modulos/login.php";
      }
  ?>
<!-- Javascript personalizado-->
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/tipos-dispositivos.js"></script>
<script src="vistas/js/bloques.js"></script>
<script src="vistas/js/secciones.js"></script>
<script src="vistas/js/marcas.js"></script>
<script src="vistas/js/lugares.js"></script>
<script src="vistas/js/personas.js"></script>
<script src="vistas/js/modelos.js"></script>
<script src="vistas/js/dispositivos.js"></script>
<script src="vistas/js/tabla-dispositivos.js"></script>
<script src="vistas/js/tabla-personas.js"></script>
<script src="vistas/js/tabla-prestar.js"></script>
<script src="vistas/js/capturar-datos.js"></script>
<!-- Select2 -->
<script src="vistas/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
  //Inicializamos select2
   $('.select2').select2();
</script>
</body>
</html>
