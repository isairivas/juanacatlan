   <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#"><?php echo PROYECT_NAME; ?></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li <?php echo $menu_active == 'home'?'class="active"':''; ?>><a href="index.php?section=index&action=index">Home</a></li>
              <?php if ( true): ?>
              	<li <?php echo $menu_active == 'usuarios'?'class="active"':''; ?> ><a href="index.php?section=usuarios&action=index">Usuarios</a></li>
              <?php endif; ?>
              <!--
              <li <?php //echo $menu_active == 'clientes'?'class="active"':''; ?> ><a href="index.php?section=clientes&action=index">Mis Clientes</a></li>
                
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
              -->
              <li style="float: right;margin-left:-500px;width: 300px;"> <a href="<?php echo go('index','profile'); ?>"> Bienvenido: <?php echo $_SESSION['user']['nombre'].' '.$_SESSION['user']['apellidos']; ?></a></li>
              <li style="float: right;margin-left:500px;"> <a href="<?php echo go('security','logout'); ?>">Salir</a></li>
            </ul>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    <div class="container">
