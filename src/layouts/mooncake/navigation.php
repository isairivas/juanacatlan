
    <div id="main-header" class="page-header">
        <ul class="breadcrumb">
            <?php $i = 0; foreach(Application::get('navegation') as $nombre => $url ): ?>
            <li>
                <?php if($i==0): ?>
                <i class="icon-home"></i>
                <?php endif; ?>
                <a href="<?php echo $url; ?>"> <?php echo $nombre; ?> <a/>
                <span class="divider">&raquo;</span>
            </li>
            <?php $i++; endforeach; ?>
            <!--
            <li>
                <a href="#">Dashboard</a>
            </li>
            -->
        </ul>

        <h1 id="main-heading"><?php echo Application::get('view-title'); ?>
            <span><?php echo Application::get('view-subtitle'); ?></span>
        </h1>
    </div>
<section class="main-content">