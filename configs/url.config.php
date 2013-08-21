<?php

$urls = array(
    'contacto' => array('module' => 'frontend','controller' => 'Index', 'action' => 'contacto'),
    'transparencia' => array('module' => 'frontend','controller' => 'Index', 'action' => 'transparencia'),
    'home' => array('module' => 'frontend','controller' => 'Index', 'action' => 'index')
);

/* no eliminar esta linea */
Application::$urls = $urls;

