<!-- start: Page Title -->
	<div id="page-title">
		<div id="page-title-inner">
			<!-- start: Container -->
			<div class="container">
				<h2><a href="/gaceta"><i class="ico-bookmark"></i>Gaceta</h2></a>
			</div>
			<!-- end: Container  -->
		</div>	
	</div>
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
			
			<!--start: Row -->
			<div class="row">
			
				<div class="span9">

					<!-- start: Post -->
					<div class="post post-page">
							
						<div class="post-img picture">
							<img src="<?php echo HOME; ?>/uploads/noticias/<?php echo $articulo['imagen'];?>"  alt="" />
						</div>
						<span class="post-icon standard"><i class="ico-pen circle"></i></span>
						<div class="post-content">
							<div class="post-title">
								<h2><?php echo $articulo['titulo'];?></h2>
							</div>
							<div class="post-description">
								<p>
									<?php echo $articulo['contenido'];?>
								</p>
							</div>
							<div class="post-meta">
								<span>
									<i class="mini-ico-calendar"></i><?php echo toDMY($articulo['fecha']);?> 
								</span>
								<span>
									<i class="mini-ico-user"></i>Gobierno de Juanacatlán
								</span>
							</div>
						</div>	
					</div>
					<!-- end: Post -->
					</br>

				</div>
				<!-- start: Sidebar -->

				<div class="span3 hidden-phone">

					<!-- start: Popular Photos -->
					<div class="widget first">
						<div class="title"><h3>Últimas Noticias</h3></div>
						<div class="row ">
							<?php foreach ($lastNoticias as $noticia): ?>
								<div class="span3">
									
										<a href="/articulo/id/<?php echo $noticia['id'];?>/<?php echo cleanTitle($noticia['titulo']);?>">
											<h3><i class="mini-ico-bookmark"></i><?php echo $noticia['titulo'];?></h3>
										</a>
									
								</div>
							<?php endforeach; ?>
						</div>

					</div>
					<!-- end: Popular Photos -->

					<!-- start: Sidebar Menu -->
					<div class="widget">
						<div class="title"><h3>Juanacatlán</h3></div>
						<ul class="links-list-alt">
							<li><a href="/home">Inicio</a></li>
							<li><a href="/gobierno">Gobierno</a></li>
							<li><a href="/eventos">Eventos</a></li>
							<li><a href="/contacto">Contacto</a></li>
						</ul>
					</div>
					<!-- end: Sidebar Menu -->
				</div>
			</div>
		</div>
	</div>

					