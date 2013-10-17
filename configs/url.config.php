<?php

$urls = array(
    'contacto' => array('module' => 'frontend','controller' => 'Index', 'action' => 'contacto'),
    'transparencia' => array('module' => 'frontend','controller' => 'Index', 'action' => 'transparencia'),
    'home' => array('module' => 'frontend','controller' => 'Index', 'action' => 'index'),
    'gaceta' => array('module' => 'frontend','controller' => 'Noticias', 'action' => 'gaceta'),
    'articulo' => array('module' => 'frontend','controller' => 'Noticias', 'action' => 'articulo'),
    'eventos' => array('module' =>  'frontend','controller'=>'Eventos', 'action' => 'index'),
    'evento' => array('module' =>  'frontend','controller'=>'Eventos', 'action' => 'desc')
);

/* no eliminar esta linea */
Application::$urls = $urls;

