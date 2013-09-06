    <!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-bookmark"></i>Noticias</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	<div id="wrapper">
		<div class="container">
				
				<!--start: Row -->
				<div class="row">
				
					<div class="span12">
						 <?php foreach ($registros as $registro): ?>
	                    	<!-- start: Post -->
							<div class="post">
								<div class="post-img picture"><a href="/noticias/id/<?php echo $registro['id']; ?>"><img src="<?php echo HOME; ?>/uploads/noticias/heaven.jpg" alt="" /><div class="image-overlay-link"></div></a></div>
								<span class="post-icon standard"><i class="ico-pen circle"></i></span>
								<div class="post-content">
									<div class="post-title"><h2><a href="post.html"><?php echo $registro['titulo']; ?></a></h2></div>
									<div class="post-description">
										<p>
											<?php echo $registro['contenido']; ?>
											<a class="post-entry" href="post.html">Leer más...</a>
										</p>
									</div>
									
									<div class="post-meta">
										<span>
											<i class="mini-ico-calendar"></i><?php echo $registro['fecha']; ?>
										</span> 

										<span>
											<i class="mini-ico-user"></i>Gobierno de Juanacatlán
										</span>

									</div>
								</div>
							</div>
							<!-- end: Post -->   
	                    <?php endforeach; ?>

						<ul class="pagination">
							<a href="#"><li class="current">1</li></a>
							<a href="#">2</a>
						</ul>

					</div>
				<!--end: Row -->
				</div>
				
			</div>
			<!--end: Container-->
		</div>