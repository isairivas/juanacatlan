<?php
/**
 * 
 * Proyect Name: mini-linker-core
 * Linkerweb Corporation.
 * 
 * description: framework sencillo para la creacion de sitios pequenos pero bien
 *               estructurados y con buenas practicas
 *  
 * 
 * @author Uriel isai Rodriguez rivas <isairivas@gmail.com>
 * 
*/

/* Se incluye la clase que inicia todo el cotorreo */
require_once 'src/Application.php';

 
/* clase principal donde se desencadena las acciones */
$app = new Application();

/* corremos la aplicacion */
$app->run();
 