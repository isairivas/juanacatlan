<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">
				<h2><i class="ico-birthday-cake"></i><?php echo $año; ?></h2>
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
					echo '<li>
							<a href="/eventos/'.($año-1).'/1" >'.($año-1).'</a>
						</li>
						<li>/</li>';
					$cont = 1;
					foreach ($meses as $key){
						if($cont == $mes){
							echo '<li><a href="/eventos/'.$año.'/'.$cont.'" class="selected">'.$key.'</a></li>
								<li>/</li>';
						} else {
							echo '<li><a href="/eventos/'.$año.'/'.$cont.'" >'.$key.'</a></li>
								<li>/</li>';
						}
						$cont++;
					}
					echo '<li><a href="/eventos/'.($año+1).'/1" >'.($año+1).'</a></li>';
					?>

				</ul>
			</div>
	<a href=""></a>
		</div>
		<!-- start: Portfolio -->
		<div class="container">
			<div id="portfolio-wrapper" class="row">
				<?php 
				if (empty($eventos)) {
					echo '<div class="alert alert-error span11">
					<strong>:(</strong>
					Aún no hay eventos en este mes.
					</div>';
				} else {
					foreach ($eventos as $evento): ?>
					<div class="span4 portfolio-item nature people">
						<span><i class="mini-ico-bookmark"></i><?php echo toDMY($evento['fecha']); ?></span>
						<div class="picture">
							<a href="/evento/<?php echo $evento['id']; ?>" title="<?php echo $evento['nombre']; ?>">
								<img src="img/photo1.jpg" alt=""/><div class="image-overlay-link"></div>
							</a>
							<div class="item-description alt">
								
								<h5><a href=""><?php echo $evento['nombre']; ?></a></h5>
								
								<p>
									<?php echo cutTextWithTags($evento['descripcion']).'...'; ?>
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
