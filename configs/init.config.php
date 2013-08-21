<?php
/**
 *
 * Proyect Name: mini-linker-core
 * Linkerweb Corporation.
 *
 * description: framework sencillo para la creacion de sitios pequeños pero bien
 *               estructurados y con buenas practicas
 *
 *
 * @author Uriel isai Rodriguez rivas <isairivas@gmail.com>
 *
 */

/* define la ruta por default */
define('LINKER_DEFAULT_MODULE','frontend');
define('LINKER_DEFAULT_CONTROLLER','Index');
define('LINKER_DEFAULT_ACTION','index');

/* define el layout por default */
define('APP_DEFAULT_LAYOUT','magnus');

/* configura si usara url amigables o variables GET para el rooteo */
define('LINKER_ROOTER_URLAMIGABLES',TRUE); // puede ser TRUE  o FALSE cualquiero otro valor tomara FALSE