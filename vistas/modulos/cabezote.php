<header class="main-header">
	<!--==============================
	=            LOGOTIPO            =
	===============================-->
	<a href="index.php?action=inicio" class="logo">
		<!-- logo mini -->
			<span class="logo-mini"><b>CB</b></span>
		<!-- logo normal -->
		<span class="logo-lg">
			<img src="vistas/img/plantilla/logo.PNG" class="img-responsive" style="padding: 7px 15px 0px 0px"> 
		</span>
	</a>
	<!--====  End of LOGOTIPO  ====-->

	<!--=========================================
	=            BARRA DE NAVEGACION            =
	==========================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Boton de Navegacion -->
    	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	<span class="sr-only">Toggle navigation</span>
    	</a>
      	<!-- Perfil Usuario -->
    	<div class="navbar-custom-menu">
      	<ul class="nav navbar-nav">
        	<li class="dropdown user user-menu">
          	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $_SESSION["usuario_nombre"]; ?></span>
          	</a>
         	 <!-- Dropdown-toggle -->
          	<ul class="dropdown-menu">
            	<li class="user-body">
              	<div class="pull-right">
                	<a href="index.php?action=cerrar-sesion" class="btn btn-default btn-flat">Cerrar sesión</a>
              	</div>
            	</li>
          	</ul>
        	</li>
      	</ul>
    	</div>
  	</nav>
	<!--====  End of BARRA DE NAVEGACION  ====-->
</header>