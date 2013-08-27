ALTER TABLE  `transparencia` ADD  `is_subcategoria` ENUM(  'TRUE',  'FALSE' ) NULL AFTER  `categoria_transparencia_id` ;
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `contenido` text,
  `fecha` date NOT NULL,
  `status` enum('ACTIVO','INACTIVO') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
