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
 
/* constantes para los datos del proyecto */
define('PROYECT_NAME','nombre del proyecto');

/* constantes donde se definen los valores de la base de datos */
define('DB_SERVER', 'localhost');
define('DB_USER','root');
define('DB_PASSWORD','PlTwI6df');
define('DB_NAME','juanacatlan');


/* configuracion donde se definen si se muestra los errores y warnigs o se ocultan */
define('DISPLAY_ERRORS',true); 
define('SHOW_DETAILS',false);

/* Aqui deberan ponerse todas las configuraciones que necesite el proyecto */

/* configuraciones del path para los archivos */
define('PATH_UPLOADS_FILES_TRANSPARENCIA', PATH_APP . '/../uploads/transparencia/');
define('PATH_UPLOADS_FILES_NOTICIAS', PATH_APP . '/../uploads/noticias/');
