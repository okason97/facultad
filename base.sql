
SET FOREIGN_KEY_CHECKS=0;

#
# Structure for the `usuario` table :
#

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `fecha_registracion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Structure for the `_preguntas_usuario` table :
#

DROP TABLE IF EXISTS `preguntas_usuario`;

CREATE TABLE `preguntas_usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `id_usuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_preguntas` (`id_usuario`),
  CONSTRAINT `FK_proyecto` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for the `usuario` table  (LIMIT 0,500)
#

INSERT INTO `usuario` (`id`, `usuario`, `clave`, `nombre`, `apellido`, `mail`, `pais`, `fecha_registracion`) VALUES
  (1,'administrador','123456','Carlos Salvador','Bilardo','cbilardo@gmail.com','Argentina','2016-05-25 00:00:00'),
  (2,'usuario','123456','Pedro','Troglio','troglio@gmail.com','Argentina','2016-06-12 00:00:00'),
  (3,'bruja','123456','Juan Sebasti�n','Ver�n','veronjuanse@gmail.com','Argentina','2016-09-01 00:00:00'),
  (4,'enzo','123456','Enzo','Francescoli','soyderiver@hotmail.com','Uruguay','2016-09-01 00:00:00'),
  (5,'diego','123456','Diego Armando','Maradona','diego_a@gmail.com','Argentina','2016-09-12 00:00:00'),
  (6,'kun','123456','Sergio','Ag�ero','benjamin@gmail.com','Argentina','2016-11-25 00:00:00'),
  (7,'diegom','123456','Diego','Milito','diego_mil@yahoo.com.ar','Argentina','2016-11-25 00:00:00');

COMMIT;

#
# Data for the `_preguntas_usuario` table  (LIMIT 0,500)
#

INSERT INTO `preguntas_usuario` (`id`, `titulo`, `pregunta`, `fecha_creacion`, `id_usuario`) VALUES
  (1,'Error Unexpected character # en plantilla de Symfony con Javascript y Ajax','Estoy intentando probar un formulario con Symfony con un c�digo copiado de internet, pero cuando cargo la pagina me marca el siguiente error: Unexpected character \"#\" in NoxLogicDemoBundle','2016-11-29 00:00:00',2),
  (2,'Hacer que una p�gina solo se acceda desde un enlace espec�fico','Pues tengo un enlace desde un correo electr�nico exclusivo y quiero que s�lo se pueda acceder a trav�s de �ste a la p�gina en cuesti�n (es una oferta s�lo accseible desde ah�). Alguien sabe c�mo?','2016-12-01 00:00:00',2),
  (3,'Python: modo server para comprobar registros en PLC','Me gustar�a imprimir por pantalla el valor del registro 40001 �Alguien puede ayudarme? Adem�s se cae constantemente y vuelve a conectar el server. �Porque?','2016-12-01 00:00:00',7),
  (4,'Modificar nodo en C','Tengo esta funci�n para modificar un nodo, pero cuando la uso lo que hace es modificar el nodo que le ped� pero borra las dem�s. �C�mo puedo hacer para que modifique y no borre los otros nodos?.','2016-11-26 00:00:00',5),
  (5,'ingresar numeros de derecha a izquierda en un cuadro de entrada numerico','�como puedo hacer que en un cuadro de entrada de tipo num�rico al escribir n�meros aparezcan de derecha a izquierda asi como en las calculadoras de los celulares cuando empezamos a poner los numeros?','2016-12-01 00:00:00',3),
  (6,'�Como puedo proteger la privacidad de un dominio .mx?','Quiero proteger la informaci�n de contacto de un dominio .mx para los registros whois, existe alguna manera oficial de hacerlo o pueden compartir algunas tecnicas extra oficiales para lograr esto?','2016-12-01 00:00:00',7),
  (7,'GridView con im�genes en Storage de Firebase','Necesito crear un GridView con im�genes que est�n almacenadas en Firebase Storage, �alguien sabe c�mo puedo acceder a todas las im�genes del Storage en Firebase? ','2016-12-02 00:00:00',5);

COMMIT;
