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
	<!-- end: Page Title -->
	<div id="wrapper">
		<div class="container">	
			<!--start: Row -->
			<div class="row">
			
				<div class="span12">
					 <?php foreach ($registros as $registro): ?>
                    	<!-- start: Post -->
						<div class="post span11">
							<div class="row">

								<span class="span3">
									<div class="post-img picture"><a href="/noticias/id/<?php echo $registro['id']; ?>"><img class="notice"src="<?php echo HOME; ?>/uploads/noticias/<?php echo $registro['imagen'];?>" alt="" /><div class="image-overlay-link"></div></a></div>
								</span>
								<span class="span8">
									<span class="post-icon standard"><i class="ico-bookmark circle"></i></span>
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

								</span>
							</div>
						</div>
						<!-- end: Post -->   
                    <?php endforeach; ?>
                    <span class="span11">
                    	<ul class="pagination">
                     <?php for ($i=1; $i <= $pages ; $i++) { 
                     	if($i == $current){
                     		echo '<a href="/noticias/'.$i.'"><li class="current">'.$i.'</li></a>';
                     	}else{
                     		echo '<a href="/noticias/'.$i.'"><li>'.$i.'</li></a>';
                     	}
                     } ?>
						</ul>
                    </span>

				</div>
			<!--end: Row -->
			</div>
			
		</div>
		<!--end: Container-->
	</div>