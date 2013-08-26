<div class="transparencia-wrapper">
         <div id="page-title">
		<div id="page-title-inner">
			<div class="container">
				<h2>Transparencia</h2>
			</div>
		</div>	
	</div>
        <!-- <h2><i class="ico-check"></i>Transparencia</h2> -->
        <div id="wrapper">
        <div class="container">
            <div class="row offset1">
                <h2><i class="ico-check"></i><?php echo $registros[0]['categoria']; ?></h2>
                <div class="span8">
                    <ul class="" style="">
                    <?php foreach ($registros as $registro): ?>
                       <?php if($registro['is_subcategoria'] == 'TRUE'): ?>
                        <li><h4 style="font-weight: bold;color:#000;" ><?php echo $registro['nombre']; ?></h4></li>
                     <?php else: ?>
                        <li> <a target="_blank" href="<?php echo $registro['link_descarga']; ?>"> <?php echo $registro['nombre']; ?> </a> </li>
                    <?php endif; ?>
                    <?php endforeach; ?>
                        </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
