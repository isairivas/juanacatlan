<aside id="sidebar">
    <nav id="navigation" class="collapse">
        <ul>

            <?php foreach(Application::get('__view-menu') as $Menu ): ?>
            <li class="<?php echo $Menu->isActive()?'active':''; ?>">
                <span title="<?php echo $Menu->getName(); ?>">
                    <i class="<?php echo $Menu->getIcon(); ?>"></i>
                    <span class="nav-title"><?php echo $Menu->getName(); ?></span>
                </span>
                <ul class="inner-nav">
                    <?php foreach($Menu->getChilds() as $Item): ?>
                    <li class="<?php echo $Item->isActive()?'active':''; ?>"><a href="<?php echo $Item->getLink();  ?>"><i class="<?php echo $Item->getIcon();  ?>"></i> <?php echo $Item->getName();  ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php endforeach; ?>
            
        </ul>
    </nav>
</aside>

<div id="sidebar-separator"></div>
<section id="main" class="clearfix">