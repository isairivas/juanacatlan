<!-- start: Page Title -->
	<div id="page-title">
		<div id="page-title-inner">
			<!-- start: Container -->
			<div class="container">
				<h2><i class="ico-bookmark"></i><?php echo $evento['nombre'];?> </h2>
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
							<img src="<?php echo HOME; ?>/uploads/eventos/<?php echo $evento['imagen']; ?>"  alt="" />
						</div>
						<span class="post-icon standard"><i class="ico-pen circle"></i></span>
						<div class="post-content">
							<div class="post-description">
								<p>
									<?php echo $evento['descripcion'];?>
								</p>
							</div>
							<div class="post-meta">
								<span>
									<i class="mini-ico-calendar"></i><?php echo toDMY($evento['fecha']);?> 
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
						<div class="title"><h3><a href="eventos/">Eventos del Mes</h3></a></div>
						<div class="row ">
							<?php foreach ($otros as $evento): ?>
								<div class="span3">
									
										<a href="/evento/<?php echo $evento['id'];?>">
											<h3><i class="mini-ico-bookmark"></i><?php echo $evento['nombre'];?></h3>
										</a>
									
								</div>
							<?php endforeach; ?>
						</div>

					</div>
					<!-- end: Popular Photos -->

					<!-- start: Sidebar Menu -->
					<div class="widget">
						<div class="title"><h3><a href="/home">Juanacatlán</h3></a></div>
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

					