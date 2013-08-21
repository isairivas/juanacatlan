<body>
    <header>        
        <!--start: Container -->
        <div class="container">
            
            <!--start: Navigation -->
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">
                        <img src="<?php echo HOME; ?>/assets/magnus/img/escudo.png">
                        <span>Juanacatlán</span>
                    </a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="<?php echo Application::get('menu-active')=='1'?'active':''; ?>"><a href="<?php echo HOME ?>/home">Inicio</a></li>
                            <li><a href="#">Gobierno</a></li>                                
                            <li class="<?php echo Application::get('menu-active')=='3'?'active':''; ?>" ><a href="<?php echo HOME; ?>/transparencia">Transparencia</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Eventos</a></li>
                            <li><a href="#">Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </div>  
            <!--end: Navigation -->                             
        </div>
        <!--end: Container-->           
    </header>