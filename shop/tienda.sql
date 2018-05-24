-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.26-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para dershop
CREATE DATABASE IF NOT EXISTS `dershop` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `dershop`;

-- Volcando estructura para tabla dershop.articulos
CREATE TABLE IF NOT EXISTS `articulos` (
  `codart` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_spanish_ci NOT NULL,
  `existencias` int(5) NOT NULL,
  `precio` float(8,2) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `oferta` int(11) DEFAULT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codart`),
  KEY `categoria` (`categoria`),
  CONSTRAINT `categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`categoria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla dershop.articulos: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` (`codart`, `nombre`, `descripcion`, `existencias`, `precio`, `categoria`, `oferta`, `imagen`) VALUES
	(1, 'Disco Duro 2tb', 'Disco duro', 1, 60.00, 'Componentes PC', 1, 'img/discoduro2tb.jpg'),
	(3, 'Mando Xbox 360', 'Rojo y negro', 0, 30.00, 'Accesorios', 1, 'img/mandoxbox360.jpg'),
	(4, 'Kit Realidad Virtual', 'Las gafas de realidad virtualHTC Vive son el equipo mÃ¡s completo de realidad virtual del momento. Gracias al complejo sistema de lentes y tecnologÃ­a, asÃ­ como con los detectores de movimiento internos y externos, podrÃ¡s experimentar una autÃ©ntica experiencia virtual sin lÃ­mites. Â¡AlucinarÃ¡s!\r\n\r\nGracias a los 32 sensores instalados, estas gafas VR te seguirÃ¡n allÃ¡ donde vayas, sin Ã¡ngulos muertos, al cubrir los 360Âº para que te muevas con total libertad. El Ãºnico lÃ­mite lo pones tÃº.\r\n\r\nDisfruta de los videojuegos mÃ¡s realistas, sumÃ©rgete de lleno en un mundo virtual con ellas y sorprÃ©ndete con cada nuevo detalle, cada interacciÃ³n. El campo de visiÃ³n de las HTC Vive es de 110Âº, para que alucines con una inmersiÃ³n total.\r\n\r\nLlegando a 90 fps y una resoluciÃ³n de 2160x1200 pÃ­xeles, la fluidez y definiciÃ³n de las imÃ¡genes te dejarÃ¡ boquiabierto cada vez que te enfundes en las HTC Vive.\r\n\r\nLas esponjas intercambiables y las almohadillas para la nariz te garantizan un confort insuperable que se adapta perfectamente a tu fisonomÃ­a para que la integraciÃ³n sea total con tus gafas de realidad virtual.\r\n\r\nUn Trackpad multifunciÃ³n te brinda la precisiÃ³n que necesitas para navegar con naturalidad y sin esfuerzo, convirtiÃ©ndose en uno de los elementos clave de las gafas de realidad virtualHTC Vive y una herramienta muy Ãºtil para los juegos virtuales. Los dos controladores tienen 24 sensores cada uno para que cada movimiento que realices sea recreado fielmente en el mundo virtual en el que te encuentres, permitiÃ©ndote interactuar con un nivel de detalle y precisiÃ³n nunca antes visto hasta ahora. Cada controlador dispone de un gatillo de dos etapas para ampliar aÃºn mÃ¡s el nÃºmero de acciones que podemos realizar con el control de las gafas vr.\r\n\r\nInteracciÃ³n total, 360 grados de diversiÃ³n absoluta e inmersiÃ³n hÃ­per real. Dos estaciones colocadas en la habitaciÃ³n crean un entramado de detecciÃ³n de movimiento 360 para conseguir experiencias de realidad virtual superiores. AdemÃ¡s, la configuraciÃ³n de estas estaciones es bastante simple, se sincronizan automÃ¡ticamente y de forma inalÃ¡mbrica y tan solo necesitan de un cable de alimentaciÃ³n para funcionar.\r\n\r\nAl comprar las HTC Vive recibirÃ¡s las gafas de realidad HTC Vive, 2 controladores inalÃ¡mbricos, 2 estaciones base, un link box, Earbuds, varios accesorios Vive y una guÃ­a para instalar y utilizar tus gafas VR.', 9, 685.00, 'Accesorios', NULL, 'img/htcvive.jpg'),
	(5, 'AMD Ryzen R5 2400G 3.6GHZ', 'Te presentamos el AMD Ryzen 5 2400G, un procesador que cuenta con 4 nÃºcleos, socket AMD AM4 y arquitectura de 64 bits. Y es que la forma de contratacar de AMD ha sido contundente, lo nuevos Ryzen no solo demuestran mayor efectividad si no tambien un consumo mucho mÃ¡s contenido que sus predecesores. Los procesadores AMD Ryzen estÃ¡n diseÃ±ados para satisfacer las necesidades de los usuarios mÃ¡s avanzados y exigentes. Para minimizar la latencia de respuesta AMD lanza la tecnologÃ­a Turbo Core que darÃ¡ la mayor frecuencia del nÃºcleo cuando lo necesita', 2, 159.00, 'Componentes PC', NULL, 'img/3.jpg'),
	(6, 'AeroCool Cylon LED USB 3.0 con Ventana Negra', 'Â¡Un panel frontal Ãºnico! La torre Aerocool Cylon cuenta con un elegante barra trasera LED con 13 modos de luz en el panel frontal, seis modos de luz de flujo RGB y siete modos de color sÃ³lido.', 0, 40.00, 'Componentes PC', NULL, 'img/a1.jpg'),
	(7, 'MSI GeForce GTX 1050Ti GAMING X 4GB GDDR5', 'Te presentamos la GTX 1050Ti Gaming X, una grÃ¡fica con 4GB GDDR5 y VR Ready', 2, 200.00, 'Componentes PC', NULL, 'img/1111.jpg'),
	(8, 'Nokia 8 Dual Sim Azul Libre', 'Nokia 8, a la vanguardia del diseÃ±o. Como antaÃ±o, los diseÃ±os de Nokia vuelven a dar que hablar. El Nokia 8 se presenta con un cuerpo de aluminio pulido en una Ãºnica pieza. Presenta un acabado de espejo, con las cÃ¡maras ultrafinas que apenas sobresalen. La pantalla se despide de los marcos laterales con bordes redondeados.\r\n\r\nColores vivos y una claridad sobresaliente. Es lo que muestra el Nokia 8 en su pantalla. Alcanza las 5,3 pulgadas con resoluciÃ³n 2K y estÃ¡ polarizada para evitar las molestias del sol. Echa todas las fotos que quieras, porque con la carga rÃ¡pida 3.0 de Qualcomm recuperas autonomÃ­a en cuestiÃ³n de minutos.', 0, 399.00, 'Smartphones', 1, 'img/1.jpg'),
	(9, 'Lenovo Legion Y720-15IKB Intel Core i7-7700HQ/16GB/1TB+128GB SSD/GTX1060/15.6', 'Forma parte de la acciÃ³n estÃ©s donde estÃ©s mediante este PC de juego portÃ¡til pero potente, el Lenovo LegionY720-15IKB. Su pantalla de 15,6â€ presenta una increÃ­ble resoluciÃ³n Ultra High Definition, con un sonido envolvente a la altura. Este â€œbestialâ€ portÃ¡til, con procesadores IntelÂ® Coreâ„¢ de 7.Âª generaciÃ³n y los grÃ¡ficos diferenciados de NVIDIA GTX 1060, podrÃ¡ con cualquier juego, incluso en un entorno virtual. Potencia + rendimiento = perfecciÃ³n.', 0, 1399.00, 'Portatiles', 1, 'img/lenovo-idea-legion-y720-01.jpg'),
	(10, 'LG 43LJ500V 43" LED Full HD', 'Un televisor completo con muchÃ­simas prestaciones y tecnologÃ­as de imagen de calidad, asÃ­ es el 43LJ500V de LG. Disfruta de 43 pulgadas de calidad de imagen Full HD, con una nitidez tan elevada que parece que mires por una ventana. AcomÃ³date en el sofÃ¡, prepara unas palomitas yâ€¦ Â¡silencio, empieza la pelÃ­cula! La resoluciÃ³n de imagen de 1920 x 1080 consigue un color y unas imÃ¡genes mÃ¡s detallas y brillantes. El panel con resoluciÃ³n Full HD harÃ¡ que vibres en tu sofÃ¡ con las escenas de acciÃ³n.\r\n\r\nDisfruta de tus contenidos favoritos en el televisor de 43 pulgadas LG 43LJ500V. Con alta calidad de imagen, un buen sonido y opciones de conectividad, se convertirÃ¡ en el centro del entretenimiento de tu casa.', 5, 299.00, 'Televisores', 1, 'img/i-1.jpg'),
	(11, 'G.Skill FlareX DDR4 3200 PC4-25600 16GB 2x8GB CL14 Negra', 'El resurgir de las Flare de G.Skill. DiseÃ±ado para el Ãºltimo procesador AMD Ryzen â„¢, el kit de memoria DDR4 de la serie Flare X marca el regreso de la legendaria memoria Flare que proporcionÃ³ un rendimiento impresionante en la generaciÃ³n anterior de memoria DDR. Actualice su prÃ³ximo sistema AMD en la Ãºltima plataforma de juego o una potente estaciÃ³n de trabajo con la memoria DDR4 de la serie X de Flare!\r\n\r\nLa nueva gama de memorias RAM G.Skill FlareX ofrece soluciones para un rendimiento increÃ­ble. Estos kits optimizan el rendimiento de las plataformas de nueva generaciÃ³n AMD Ryzen, con la ventaja aÃ±adida de un alto potencial de overclocking.. \r\n\r\nLa compaÃ±Ã­a G.Skill, gracias a un intenso trabajo de I+D durante sus mÃ¡s de 25 aÃ±os de historia, ha diseÃ±ado y fabricado las memorias FlareX para el overclocking y el gaming mÃ¡s exigente. Con un PCB de alta calidad de 10 capas, un disipador denso de aluminio para una Ã³ptima temperatura, los mejores chips de memoria seleccionados a mano, estas memorias te darÃ¡n el rendimiento que necesitas en tu sistema, tanto si vas a hacer overclocking como si vas a jugar.', 0, 234.00, 'Componentes PC', 1, 'img/1211800.jpg'),
	(12, 'Microsoft Xbox One X 1TB', 'Con un 40 % mÃ¡s de potencia que cualquier otra consola, disfruta de la autÃ©ntica experiencia de inmersiÃ³n de juego en 4K. Los juegos se reproducen mejor en Xbox One X. Procesamiento mÃ¡s rÃ¡pido: Experiencia de juego mÃ¡s fluida La CPU AMD personalizada de 8 nÃºcleos y 2,3 GHz ofrece una inteligencia artificial mejorada, detalles de gran realismo e interacciones mÃ¡s fluidas durante tus partidas.\r\n\r\nMÃ¡s memoria: Mundos mÃ¡s amplios La memoria grÃ¡fica GDDR5 de 12 GB aporta velocidad y potencia al rendimiento de juego para permitir mundos mÃ¡s amplios, horizontes mÃ¡s lejanos y tiempos de carga mÃ¡s rÃ¡pidos.\r\nMundos envolventes: Detalles realistas La GPU de 6 teraflops permite que los personajes y los entornos 4K sean mÃ¡s realistas que nunca, con un mayor nivel de detalle y animaciones mÃ¡s fluidas.\r\nAncho de banda de memoria: Tiempos de carga mÃ¡s rÃ¡pidos Los grÃ¡ficos del juego son mÃ¡s rÃ¡pidos y detallados gracias al ancho de banda de memoria de 326 GB/s, para que no haya ninguna interrupciÃ³n en tus partidas.', 0, 489.00, 'Videojuegos', NULL, 'img/1 (1).jpg'),
	(14, 'Cable USB 2.0 AM/AH Alargador Macho/Hembra 1.8m', 'Fabricado con cable Doble Apantallado\r\n4 conductores (UL2725, 2 x AWG24, 2 x AWG28 )\r\nCarcasas de plÃ¡stico inyectado\r\nConector 1: USB A (6 Pines) Macho\r\nConector 2: USB A (6 Pines) Hembra\r\nCompatible USB VersiÃ³n 1.1\r\nCertificado USB VersiÃ³n 2.0', 100, 1.00, 'Accesorios', NULL, 'img/cable-usb-2-0-am-ah-alargador-macho-hembra-1-8m.jpg'),
	(15, 'Asus K541UA-GO1205T Intel Core i7-7500U/8GB/1TB/15.6"', 'Te presentamos el portÃ¡til Asus K541UA-GO1205T. Un eficiente y fiable portÃ¡til con procesador intel i7 y 8GB de memoria RAM, todo ello combinado con un disco HDD de 1TB. Un portÃ¡til barato que gracias a su diseÃ±o compacto y su tecnologÃ­a avanzada, responde a las necesidades diarias allÃ¡ donde le lleve un duro dÃ­a de trabajo.\r\n\r\nEspecificaciones K541UA-GO1205T:\r\nProcesador IntelÂ® Coreâ„¢ i7-7500U (2 NÃºcleos, 4M Cache, 2.7GHz hasta 3.5GHz)\r\nMemoria RAM 8GB (8GB en placa) DDR4 2133MHz\r\nDisco duro 1TB 5400rpm SATA\r\nDisplay 15.6" LED Retroiluminado / Ultra Slim / 200nits / HD (1366x768/16:9) / Anti-Glare / NTSC:45%\r\nControlador grÃ¡fico IntelÂ® HD Graphics\r\nUnidad Ã“ptica DVD 8X Supermulti, Doble Capa [SATA]\r\nConectividad\r\nWifi 802.11 bgn\r\nBluetooth 4.0\r\nRed 10/100 Mbps\r\nCÃ¡mara de portÃ¡til VGA (640x480)\r\nMicrÃ³fono SÃ­\r\nBaterÃ­a 36Wh, 3 celdas, Ion de LÃ­tio\r\nConexiones\r\n1 x USB 2.0\r\n1 x USB 3.0\r\n1 x USB-C 3.1 (Gen 1)\r\n1 x Entrada/Salida lÃ­nea audio (combo)\r\n1 x Conector RJ45 LAN\r\n1 x VGA (D-Sub)\r\n1 x HDMI\r\n1 x Entrada de Corriente\r\nLector de tarjetas SD (SDHC/SDXC)\r\nSistema operativo Windows 10 Home (64 bit)\r\nColor Plata', 1, 639.00, 'Portatiles', NULL, 'img/1348530.jpg'),
	(16, 'Newskill Aura Teclado MecÃ¡nico RGB Switch Brown', 'Newskill Aura Teclado MecÃ¡nico RGB Switch Brown Para los jugadores mÃ¡s exigentes. Su retroiluminaciÃ³n RGB te proporcionarÃ¡ una ventaja clave durante esas partidas nocturnas en las que necesitan tener claro dÃ³nde estÃ¡ cada tecla. Y no solo eso, sus trece teclas macro programables on-the-fly te garantizarÃ¡n que cada uno de tus comandos se ejecute de forma precisa.', 2, 99.00, 'Accesorios', NULL, 'img/1337980.jpg'),
	(17, 'Owlotech K9 RGB Backlit Teclado Gaming RGB', 'Con un diseÃ±o gaming, ligero y sÃºper compacto, el K9 RGB Backlit Gaming Keyboard es un increÃ­ble teclado con retroiluminaciÃ³n RGB, conexiÃ³n USB y 105 teclas con disposiciÃ³n en espaÃ±ol. Elige entre sus nueve modos de retroiluminaciÃ³n, diviÃ©rtete con los siete colores diferentes integrados y ajusta el brillo de las teclas de acuerdo con tus necesidades.\r\n\r\nEl K9 cuenta tambiÃ©n con varias teclas de acceso rÃ¡pido a Internet, contenidos multimedia y otras funciones bÃ¡sicas que te proporcionan mayor control sobre tu mÃºsica y una navegaciÃ³n mÃ¡s cÃ³moda. Este teclado incorpora ademÃ¡s un diseÃ±o resistente a derrames y salpicaduras protegiÃ©ndote de pequeÃ±os accidentes domÃ©sticos.\r\n\r\nPuedes elegir entre los siete colores disponibles y ajustar el brillo fÃ¡cilmente para adaptarlo a tus preferencias personales. La retroiluminaciÃ³n es ideal para entornos oscuros, por lo que no te perderÃ¡s ni un disparo ni darÃ¡s con con la tecla equivocada.\r\n\r\nAdemÃ¡s, el K9 lleva incorporados nueve modos o efectos de retroliminaciÃ³n distintos: luz estÃ¡tica, onda, arcoiris, retroiluminaciÃ³n personalizada, etc. Puedes elegir la velocidad del sistema LED (tres niveles diferentes) y el brillo de forma rÃ¡pida mediante simples comandos.\r\n\r\nTambiÃ©n puedes navegar por Internet y acceder a tus correos electrÃ³nicos cÃ³modamente con las teclas de acceso rÃ¡pido integradas. Controla tu reproductor multimedia con un solo click y disfruta de tus listas de reproducciÃ³n de videos o mÃºsica favoritas.', 13, 13.00, 'Accesorios', 1, 'img/photo-3.jpg'),
	(18, 'Owlotech MS-200 RatÃ³n Gaming 2400 DPI', 'Te presentamos el ratÃ³n gaming MS-200 de Owlotech. El ratÃ³n MS-200 de Owlotech posee un sensor Ã³ptico de alta resoluciÃ³n, sin duda un ratÃ³n idela para los recien iniciados en el mundo gaming.\r\n\r\nCaracterÃ­sticas\r\nSensor Ã“ptico de alta resoluciÃ³n y 4 niveles: El MS200 cuenta con un sensor Ã³ptico de alta resoluciÃ³n y rÃ¡pida respuesta ademÃ¡s de 4 niveles distintos seleccionables a gusto del jugador 800/1200/1600/2400 DPI\r\nIluminaciÃ³n en cada estado de DPI: Cada uno de los perfiles cuentan con un tipo de iluminaciÃ³n diferente 800 PÃºrpura 1200 Azul 1600 Rosa 2400 Rojo para que selecciones la sensibilidad e iluminaciÃ³n que mÃ¡s se adapte a ti.\r\nDiseÃ±o ergonÃ³mico adaptable a la mano: MS200  de OG Gaming dispone de un diseÃ±o atractivo y sobre todo efectivo y ergonÃ³mico, haciendo las largas horas de juego mucho mÃ¡s cÃ³modas\r\n4 perfiles y colores de iluminaciÃ³n\r\nSensor optico con 2400DPI\r\nDiseÃ±o ergonÃ³mico\r\nMaterial de alta calidad\r\nPies de polymero de alta calidad\r\nDiseÃ±o exclusivo con iluminaciÃ³n de alta intensidad\r\nEspecificaciones\r\nSensor Ã³ptico\r\nResoluciÃ³n 800/1200/1600/2400DPI\r\n6 Botones\r\nLongitud del cable 1.50m\r\nFPS 4000\r\nMax aceleraciÃ³n 8G\r\n30 IPS\r\n250HZ\r\n100Ma Max\r\nDimensiones 120*62*35mm\r\nWindows 7/8/10/ Mac OSX', 1, 19.99, 'Accesorios', 1, 'img/ewgrrgh.jpg'),
	(19, 'MSI Interceptor DS B1 RatÃ³n Gaming 1600 DPI Negro', 'El ratÃ³n gaming Interceptor DS B1 de MSI cuenta con un sensor Ã³ptico perfecto para tus juegos, detecciÃ³n de movimiento de alta velocidad a 37ips, aceleraciÃ³n de hasta 15g y 1600 DPI. El diseÃ±o ergonÃ³mico del DS B1 mejora la comodidad del usuario mientras usa el mouse y ayuda a evitar lesiones graves por el uso diario de la computadora a largo plazo.\r\n\r\nCon empuÃ±aduras antideslizantes laterales, asegura el agarre perfecto y nunca mÃ¡s perderÃ¡s el control del ratÃ³n. DS B1 viene con ocho pesas de 2 gramos para adaptarse a una variedad de juegos. Personaliza el peso perfecto para una sensaciÃ³n perfecta. AdemÃ¡s, incorpora un conector USB dorado con cable forrado de goma.\r\n\r\nCaracterÃ­sticas:\r\nSensor Ã³ptico gaming\r\nBotÃ³n DPI\r\nDiseÃ±o ergonÃ³mico\r\nSuperficie antideslizante\r\nSistema de pesas\r\nConector dorado\r\nEspecificaciones MSI Interceptor DS B1:\r\nPeso y dimensiones\r\nAncho: 71 mm\r\nProfundidad: 123 mm\r\nAltura: 39 mm\r\nPeso del ratÃ³n: 108 g\r\nControl de energÃ­a\r\nFuente de energÃ­a: Cable\r\nDispositivo de entrada\r\nInterfaz del dispositivo: USB\r\nUtilizar con: Juego\r\nTipo de botones: Botones presionados\r\nCantidad de botones: 6\r\nTipo de desplazamiento: Rueda\r\nTecnologÃ­a de detecciÃ³n de movimientos: Ã“ptico\r\nResoluciÃ³n de movimiento: 1600 DPI\r\nUso recomendado: PC/ordenador portÃ¡til\r\nRueda de desplazamiento: Si\r\nNÃºmero de ruedas de desplazamiento: 1\r\nDirecciones de desplazamiento: Vertical\r\nErgonomÃ­a\r\nConectar y usar (Plug and Play): Si\r\nDiseÃ±o de plancha ergonÃ³mico: Si\r\nDiseÃ±o\r\nFactor de forma: Ambidextro\r\nColor del producto: Negro, Rojo', 11, 23.95, 'Accesorios', 1, 'img/msi-interceptor-ds-b1-mouse-product-pictures-3d3.jpg');
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;

-- Volcando estructura para tabla dershop.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla dershop.categorias: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `categoria`) VALUES
	(2, 'Accesorios'),
	(1, 'Componentes PC'),
	(4, 'Portatiles'),
	(3, 'Smartphones'),
	(5, 'Televisores'),
	(6, 'Videojuegos');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla dershop.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `numped` int(10) NOT NULL AUTO_INCREMENT,
  `productos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pretotal` float NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaped` date NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`numped`),
  KEY `correo` (`correo`),
  CONSTRAINT `correoid` FOREIGN KEY (`correo`) REFERENCES `usuarios` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla dershop.pedidos: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` (`numped`, `productos`, `pretotal`, `correo`, `fechaped`, `estado`) VALUES
	(126, '3#3#3#1#1#1', 180, 'daniel.ecijar@gmail.com', '2018-02-12', 'Completado'),
	(128, '3#3#1#1', 180, 'daniel.ecijar@gmail.com', '2018-02-12', 'Pagado'),
	(129, '3#1#3#1#1', 240, 'daniel.ecijar@gmail.com', '2018-02-12', 'Enviado'),
	(130, '#4#8#94#10#9#17', 2795, 'lmg.baroja@gmail.com', '2018-02-18', 'Enviado'),
	(132, '11#11', 468, 'lmg.baroja@gmail.com', '2018-02-18', 'Completado'),
	(133, '9', 1399, 'daniel.ecijar@gmail.com', '2018-02-19', 'Enviado'),
	(134, '1#1#1#7#17#17#7#7#17', 819, 'daniel.ecijar@gmail.com', '2018-03-04', 'Completado'),
	(135, '17#1#6#8', 512, 'lmg.baroja@gmail.com', '2018-03-04', 'Pagado'),
	(136, '11#10#10#10#10', 1430, 'daniel.ecijar@gmail.com', '2018-03-04', 'Pagado'),
	(137, '17#17', 26, 'daniel.ecijar@gmail.com', '2018-03-04', 'Pagado');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Volcando estructura para tabla dershop.reclamaciones
CREATE TABLE IF NOT EXISTS `reclamaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numped` int(11) NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `detalle` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecharec` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `correo` (`correo`),
  KEY `numped` (`numped`),
  CONSTRAINT `correo` FOREIGN KEY (`correo`) REFERENCES `usuarios` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedido` FOREIGN KEY (`numped`) REFERENCES `pedidos` (`numped`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla dershop.reclamaciones: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `reclamaciones` DISABLE KEYS */;
INSERT INTO `reclamaciones` (`id`, `numped`, `correo`, `titulo`, `detalle`, `estado`, `fecharec`) VALUES
	(6, 136, 'daniel.ecijar@gmail.com', 'envio', 'envio no llega', 'En Tramite', '2018-03-04');
/*!40000 ALTER TABLE `reclamaciones` ENABLE KEYS */;

-- Volcando estructura para tabla dershop.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apell` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `codpos` int(5) NOT NULL,
  `dire` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `perm` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla dershop.usuarios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`correo`, `nombre`, `apell`, `pass`, `codpos`, `dire`, `perm`) VALUES
	('admin@admin.com', 'Administrador', '', '1234', 28945, '', 1),
	('daniel.ecijar@gmail.com', 'Daniel E', 'Ruiz', '1234', 28945, 'Calle mejico 7,3B', 1),
	('ecijon@gmail.com', 'Daniel', 'Ecija Ruiz', '1234', 28945, 'Calle Mejico, 7, Madrid', 3),
	('lmg.baroja@gmail.com', 'laura', 'martin', 'carobaroja22', 45230, '', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
