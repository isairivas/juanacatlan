<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-birthday-cake"></i>Eventos</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>

	<!--start: Wrapper-->
	<div id="wrapper">
		
		<!-- start: Container -->	
		<div class="container">

			<div class="span7" id="filters">
				<ul data-option-key="filter">
					<?
					$cont = 1;
					foreach ($meses as $key){
						if($cont == $actual){
							echo '<li><a href="/eventos/'.$cont.'" class="selected">'.$key.'</a></li>
								<li>/</li>';
						} else {
							echo '<li><a href="/eventos/'.$cont.'" >'.$key.'</a></li>
								<li>/</li>';
						}
						$cont++;
					}?>
				</ul>
			</div>

		</div>
		<!-- start: Portfolio -->
		<div class="container">
			<div id="portfolio-wrapper" class="row">
				<?php 
				if (empty($eventos)) {
					echo '<div class="alert alert-error span11">
					<strong>:(</strong>
					Este mes aún no tiene eventos.
					</div>';
				} else {
					foreach ($eventos as $evento): ?>
					<div class="span4 portfolio-item nature people">
						<span><i class="mini-ico-bookmark"></i><?php echo toDMY($evento['fecha']); ?></span>
						<div class="picture"><a href="project.html" title="Title"><img src="img/photo1.jpg" alt=""/><div class="image-overlay-link"></div></a>
							<div class="post-meta"><?php echo $evento['nombre']; ?></div>
							<div class="item-description alt">
								<p>
									<?php echo $evento['fecha']; ?>
								</p>
							</div>
						</div>					
					</div>
				<?php endforeach; 
				}
				?>
				</div>
		</div>
	</div>
