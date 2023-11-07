-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2022 a las 23:45:43
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juegos_retro_rossi_pestalardo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumna`
--

CREATE TABLE `alumna` (
  `alumnas_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `apellido` varchar(256) NOT NULL,
  `edad` tinyint(4) NOT NULL,
  `email` varchar(256) NOT NULL,
  `instagram` varchar(256) NOT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumna`
--

INSERT INTO `alumna` (`alumnas_id`, `nombre`, `apellido`, `edad`, `email`, `instagram`, `img`) VALUES
(1, 'Verona', 'Rossi', 24, 'verona.rossi@davinci.edu.ar', 'verona_rossi_', 'verona.png'),
(2, 'Maria Jorgelina', 'Pestalardo', 29, 'maria.pestalardo@davinci.edu.ar', 'jorpesta', 'jorgelina.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `carrito_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `precio` float(8,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `nombreComprador` varchar(256) NOT NULL,
  `mail` varchar(256) NOT NULL,
  `direccion` varchar(256) NOT NULL,
  `numeroTarjeta` int(11) NOT NULL,
  `nombreTarjeta` varchar(256) NOT NULL,
  `codigo` int(11) NOT NULL,
  `pago` enum('debito','credito','efectivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`carrito_id`, `nombre`, `precio`, `cantidad`, `nombreComprador`, `mail`, `direccion`, `numeroTarjeta`, `nombreTarjeta`, `codigo`, `pago`) VALUES
(2, 'Nintendo 64', 14500.00, 1, 'Jorgelina Pestalardo', 'jorpestalardo@gmail.com', 'calle 123', 2147483647, 'Jorgelina Pestalardo Titular', 123, 'debito'),
(3, 'Nintendo 64', 14500.00, 1, 'Jorgelina Pestalardo', 'jorpestalardo@gmail.com', 'calle 123', 2147483647, 'Jorgelina Pestalardo Titular', 123, 'debito'),
(4, 'Nintendo 64', 14500.00, 1, 'Juan Gimenez', 'JuanGimenez@gmail.com', 'calle 231', 2147483647, 'Juan Gimenez', 456, 'credito'),
(5, 'Battletoads', 1550.00, 1, 'Juan Gimenez', 'JuanGimenez@gmail.com', 'calle 231', 2147483647, 'Juan Gimenez', 456, 'credito'),
(10, 'Nintendo 64', 14500.00, 1, 'Verona Rossi', 'veroRossi@gmail.com', 'calle 789', 2147483647, 'Verona Rossi', 123, 'credito'),
(11, 'Battletoads', 1550.00, 1, 'Mirta Martinez', 'mirtayolanda@gmail.com', 'Calle 789', 2147483647, 'Mirta Yolanda Martinez', 123, 'credito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consola`
--

CREATE TABLE `consola` (
  `consola_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `anio` int(4) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float(8,2) NOT NULL,
  `alt` varchar(256) NOT NULL,
  `imagen` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consola`
--

INSERT INTO `consola` (`consola_id`, `nombre`, `anio`, `descripcion`, `precio`, `alt`, `imagen`) VALUES
(1, 'Sega Genesis', 1988, 'Clásica videoconsola de sobremesa de 16 bits desarrollada por Sega Enterprises, Ltd. Mega Drive fue la tercera consola de Sega y la sucesora de Master System conocida en diversos territorios de América como Genesis, es una clásica videoconsola de sobremesa de 16 bits desarrollada por Sega Enterprises, Ltd. Mega Drive fue la tercera consola de Sega y la sucesora de Master System. Compitió contra la SNES de Nintendo, como parte de las videoconsolas de cuarta generación. La primera versión fue lanzada en Japón en 1988, sucedida por el lanzamiento en Norteamérica bajo el renombramiento de Genesis en 1989,  la placa arcade Sega System 16, centrado en un procesador Motorola 68000 como CPU primaria y un Zilog Z80 como segundo procesador. El sistema alberga una biblioteca de más de 900 juegos creados por Sega y una amplia serie de terceros, siendo publicados en formato de cartuchos.                                                                                                ', 5500.00, 'Imagen de Consola Sega Genesis', '1668730850_sega genesis.jpg'),
(2, 'Nintendo 64', 1996, 'Clásica videoconsola de sobremesa de 16 bits desarrollada por Sega Enterprises, Ltd. Mega Drive fue la tercera consola de Sega y la sucesora de Master System conocida en diversos territorios de América como Genesis, es una clásica videoconsola de sobremesa de 16 bits desarrollada por Sega Enterprises, Ltd. Mega Drive fue la tercera consola de Sega y la sucesora de Master System. Compitió contra la SNES de Nintendo, como parte de las videoconsolas de cuarta generación. La primera versión fue lanzada en Japón en 1988, sucedida por el lanzamiento en Norteamérica bajo el renombramiento de Genesis en 1989,  la placa arcade Sega System 16, centrado en un procesador Motorola 68000 como CPU primaria y un Zilog Z80 como segundo procesador. El sistema alberga una biblioteca de más de 900 juegos creados por Sega y una amplia serie de terceros, siendo publicados en formato de cartuchos.                        ', 14500.00, 'Imagen de consola Nintendo 64', '1668730594_nintendo 64.jpg'),
(3, 'Play Station 1', 1994, 'PlayStation es la primera videoconsola de Sony, y la primera de dicha compañía en ser diseñada por Ken Kutaragi, y es una videoconsola de sobremesa de 32 bits lanzada por Sony Computer Entertainment.                                                ', 9500.00, 'Imagen de Consola Play Station 1', '1668730524_play station 1.jpg'),
(8, 'Play 2', 1990, 'jeje', 6000.00, 'jejej', '1669679304_play-2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creadores`
--

CREATE TABLE `creadores` (
  `creadores_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `biografia` text DEFAULT NULL,
  `company` varchar(256) NOT NULL,
  `alt` varchar(256) NOT NULL,
  `imagen` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `creadores`
--

INSERT INTO `creadores` (`creadores_id`, `nombre`, `biografia`, `company`, `alt`, `imagen`) VALUES
(1, 'Martin Bromley y Richard Stewart', 'COPIAR BIOGRAFIAssss\r\n                                    ', 'Sega Games Company                                                            ', 'Retrato de Martin Bromley y Richard Stewart', '1668740669_martin bromley y richard stewart.PNG'),
(2, 'Shigeru Miyamoto', 'Shigeru Miyamoto ​ es un diseñador y productor de videojuegos japonés que trabaja para Nintendo desde 1977.\r\n                        ', 'Nintendo                        ', 'Fotografía de retrato de Shigeru Miyamoto', '1668740679_shigeru miyamoto.jpg'),
(3, 'Ken Kutaragi', 'Ken Kutaragi es el exdirector y director ejecutivo de Sony Computer Entertainment, la división de videojuegos de Sony Corporation. Se le conoce como \"El Padre de la PlayStation\" y sus sucesores y spin-offs, como la PlayStation 2, PocketStation, PlayStation 3, y PlayStation Portable.            ', 'Sony Computer Entertainment            ', 'Fotografía retrato de Ken Kutaragi', '1668740692_ken kutaragi.jpg'),
(4, 'Doug TenNapel y David Perry.', 'Douglas Richard TenNapel es un animador, escritor, caricaturista, diseñador de videojuegos y dibujante de cómics estadounidense cuyo trabajo ha abarcado la televisión animada, los videojuegos y los cómics.\r\n\r\nDavid Perry es un desarrollador de videojuegos, entre los cuales se encuentran Earthworm Jim, MDK, Messiah, Wild 9 y Enter the Matrix.\r\nNacio el 4 de abril de 1967 (edad 55 años), Lisburn, Reino Unido, estudio en Methodist College Belfast, se caso con Elaine Perry (m. 2001).             ', 'Sega Genesis            ', 'Fotografías retrato de Doug TenNepal y David Perry', '1668740705_doug tennapel y david perry..jpg'),
(5, 'Tim & Chris Stamper, Gregg Mayles.', 'Tim Stamper y Chris Stamper son emprendedores británicos que fundaron las compañías Ultimate Play The Game y Rare.\r\n\r\nGregg Mayles es un diseñador de videojuegos británico que actualmente trabaja para la compañía de videojuegos Rare como director creativo. Es uno de los miembros más antiguos de la empresa, habiendo trabajado allí desde 1989.\r\n            ', 'Sega Genesis            ', 'Imagenes de retrato de Tim y Chris Stamper junto con Gregg Mayles. ', '1668740719_tim & chris stamper, gregg mayles..jpg'),
(6, 'Yūji Naka, Takashi Iizuka, Sonic Team', 'Yūji Naka, nacido el 17 de septiembre de 1965 en Osaka, Prefectura de Osaka, es un diseñador de videojuegos, programador, primer jefe del Sonic Team, director de la empresa Prope y además el programador líder del juego original Sonic the Hedgehog.\r\n\r\nakashi Iizuka es un director, productor, diseñador y guionista de videojuegos japonés. Desde 2008, Iizuka ha sido vicepresidente de desarrollo de productos de la serie Sonic the Hedgehog en Sega, así como jefe de Sonic Team, aunque ha estado trabajando en juegos de la serie Sonic desde 1994.            ', 'Sega Genesis            ', 'Fotografia retrato de Yūji Naka, Takashi Iizuka, Sonic Team.', '1668740731_yūji naka, takashi iizuka, sonic team.jpg'),
(7, 'Keiji Inafune, Tokuro Fujiwara. ', 'Keiji Inafune era la cabeza del equipo de investigación, desarrollo y negocio en red de Capcom, es más conocido por ser uno de los diseñadores de Megaman y productor de Onimusha y la saga de Dead Rising. En varios de los créditos de sus juegos, él usa el nombre de \"INAFKING\".\r\n\r\nTokurō Fujiwara, más conocido como profesor F o Arthur King, es un diseñador de videojuegos japonés, conocido por la creación de Ghosts \'n Goblins y producir la serie de videojuegos de Mega Man. Trabajó como gerente general de la División de Juegos de consola de Capcom desde 1988 hasta 1996.\r\n            ', 'Sega Genesis - CAPCOM            ', 'Retrato del lider de diseño Keiji Inafune. ', '1668740744_keiji inafune, tokuro fujiwara. .jpg'),
(8, 'Brian Fargo', 'Frank Brian Fargo es un diseñador, productor, programador y ejecutivo de videojuegos estadounidense, y fundador de Interplay Entertainment, inXile Entertainment y Robot Cache.            ', 'Interplay Entertainment - Sega Genesis            ', 'Retrato del diseñador Brian Fargo', '1668740754_brian fargo.jpg'),
(9, 'Chris Seavor', 'Christopher \"Chris\" Seavor es un diseñador británico de videojuegos y actor de voz que ha trabajado en varios videojuegos, incluyendo la voz de Conker y muchos otros en Conker Bad Fur Day y Conker: Live & Reloaded. Chris era el líder del proyecto y el diseñador del juego de ambos de los juegos mencionados de Conker.            ', 'Nintendo 64            ', 'Retrato del diseñador Chris Seavor. ', '1668740782_chris seavor.png'),
(10, 'Shinji Mikami', 'Shinji Mikami es un diseñador de videojuegos japonés. Es conocido por videojuegos como Resident Evil 3, Resident Evil, Dino Crisis, The Evil Within y su última producción Ghostwire: Tokyo.\r\n\r\n            ', 'CAPCOM - Sonic Entertainment Group            ', 'Fotografía retrato de Shinji Mikami', '1668740802_shinji mikami.jpg'),
(11, 'Jason Rubin', 'Jason Rubin es un director de videojuegos norteamericano, creador de historietas, y fundador de una compañía por Internet. Es mayormente reconocido por la serie de videojuegos Crash Bandicoot, producido por el estudio Naughty Dog, del cual es cofundador junto con su socio y amigo de la infancia Andy Gavin            ', 'Sony Interactive Entertainment            ', 'Fotografía retrato de Jason Rubin.', '1668740814_jason rubin.jpg'),
(12, 'Eikichi Kawasaki', 'Eikichi Kawasaki (川崎 英吉, Kawasaki Eikichi) (nacido en 1944) es un director, productor, planificador y diseñador de videojuegos japonés, fundador de la compañía SNK original. Él permaneció en la compañía hasta su quiebra, creando al grupo Playmore para compensarla.            ', 'Sony Interactive Entertainment            ', 'Fotografia retrato de Eikichi Kawasaki. ', '1668740826_eikichi kawasaki.jpg'),
(13, 'Keiichiro Toyama', 'Keiichiro Toyama es un escritor, diseñador y productor de videojuegos japonés, es reconocido por ser el creador de los videojuegos de terror psicológico Silent Hill y Siren.​            ', 'Konami, Bloober Team, Kojima Productions, sony interactive entertainment            ', 'Fotografia retrato de Keiichiro Toyama', '1668740846_keiichiro toyama.jpg'),
(14, 'Michel Ancel', 'Michel Ancel es un desarrollador de videojuegos francés que trabajó en Ubisoft. Es creador, entre otros, del personaje Rayman. El 13 de marzo de 2006 fue nombrado Caballero de las artes y la literatura por el Primer Ministro francés, junto a Shigeru Miyamoto y Frédérick Raynal.', 'Ubisoft Montpellier                        ', 'Fotografia retrato de Michel Ancel. ', '1668740859_michel ancel.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `producto_id` int(10) UNSIGNED NOT NULL,
  `creadores_id` int(10) UNSIGNED NOT NULL,
  `personaje_id` int(10) UNSIGNED NOT NULL,
  `consola_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `anio` int(4) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float(8,2) NOT NULL,
  `imagen` varchar(256) NOT NULL,
  `alt` varchar(256) NOT NULL,
  `player` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`producto_id`, `creadores_id`, `personaje_id`, `consola_id`, `nombre`, `anio`, `descripcion`, `precio`, `imagen`, `alt`, `player`) VALUES
(2, 4, 12, 1, 'EarthWorm Jim', 1994, ' VideoJuego de aventura y acción, lanzado en el año 1994, un solo jugador, creado por \'Shiny Entertainment Playmates Interactive Entertainment\', cuenta la historia de una Lombriz llamada Jim que, enfundado en un traje cibernético y armado con una pistola, se dedica a recorrer el universo en busca de la princesa \'Cuál es su nombre\' es un juego de plataformas en dos dimensiones. El jugador controla a Jim moviéndole a través del nivel, evitando obstáculos y enemigos, con una pistola para hacer frente a los enemigos, o bien utilizar su cabeza como un látigo. Este látigo (que es el propio gusano).\r\n', 1300.00, 'earthwormjim.jpg', 'Imagen de videojuego Earthworm Jim', 1),
(3, 5, 11, 1, 'Battletoads', 1991, ' VideoJuego de aventura y Brawler, lanzado en el año 1991, hasta dos jugadores, creado por una empresa corportativa llamada \'Rare\', cuenta la historia de tres sapos antropomorfos llamados Rash, Zitz y Pimple, esta saga intentaba rivalizar con la de los juegos de las Tortugas Ninja... Los protagonistas tienen que derrotar a la Reina Oscura y rescatar a sus amigos, Pimple y la Princesa Angélica.\r\n', 1550.00, 'battletoads.jpg', 'Imagen de videojuego Battletoads. ', 2),
(4, 6, 14, 1, 'Sonic 1', 1991, 'VideoJuego de aventura y acción, lanzado en el año 1991, hasta dos jugadores, creado por Naoto Ōshima, Yuji Naka Hirokazu Yasuhara, cuenta la historia de Sonic the Hedgehog, es un consola de ficción, es el protagonista de la saga de videojuegos del mismo nombre y la mascota de la compañía Sega. También está presente en cómics, dibujos animados y libros. Es un erizo azul antropomórfico que tiene la habilidad de moverse a altas velocidades comparables a la velocidad del sonido, presenta una personalidad aventurera, decidida, confiado de sí mismo, algo egocéntrico, y presumido.\r\n', 1500.00, 'sonic-1.jpg', 'Imagen de videojuego Sonic 1', 2),
(5, 7, 13, 1, 'Mega Man', 1994, 'VideoJuego de aventura y acción, lanzado en el año 1994, creada por Capcom en 1987 (pensado para Nes, pero ésta exclusiva desarrollada para Sega). Cuenta la historia de En el año 20XX (algún momento del siglo XXI), el genio de la robótica Dr. Thomas Xavier Light comenzó a trabajar en un proyecto cuyo fin era crear un robot humanoide. Este robot haría uso de un programa de inteligencia artificial avanzado que le permitiría tomar decisiones por sí mismo basado en estímulos y órdenes básicas, Mega Man voluntariamente se ofreció como protector de la especie humana, a favor de su coexistencia con los robots en sociedad. Con la ayuda de muchos amigos suyos, Mega Man estropeó los planes del Dr. Wily y otros villanos y salvó muchas vidas en el proceso, convirtiéndose así en héroe justiciero de muchos.\r\n', 1600.00, 'mega-man.jpg', 'Imagen de videojuego Mega Man', 1),
(6, 3, 15, 1, 'Boogerman', 1994, 'VideoJuego de aventura y acción, lanzado en el año 1994, creado por la gente de Interplay Entertainment y lanzado para la Mega Drive. Cuenta la historia de El héroe \'Boogerman\' es un hombre tira-mocos, ruidoso eructador, lanza-gases llamado Snotty Ragsdale. Mientras vive su vida normal como un excéntrico millonario, su naturaleza \'apestosa\' le viene bien para ponerse la máscara del oloroso héroe Boogerman.\r\n', 1450.00, 'boogerman.jpg', 'Imagen de videojuego Boogerman', 1),
(8, 2, 4, 2, 'Super Mario 64', 1996, 'Super Mario 64 es un videojuego de plataformas 3D donde el jugador controla a Mario a través de varios niveles. Cada nivel es un mundo cerrado en el que el jugador es libre de explorar a su antojo sin limitaciones de tiempo.', 2500.00, 'super-mario-64.jpg', 'Imagen videojuego Mario Bross 64', 1),
(9, 2, 5, 2, 'La Leyenda de Zelda y la Ocarina del Tiempo', 1998, 'La historia del juego se enfoca en el joven héroe Link, quien emprende una aventura en el reino de Hyrule para detener a Ganondorf, rey de la tribu Gerudo, antes de que encuentre la Trifuerza, una reliquia sagrada capaz de concederle cualquier deseo a su poseedor. Para ello, debe viajar a través del tiempo y explorar varios templos con el fin de despertar a algunos sabios que tienen el poder para aprisionar de forma definitiva a Ganondorf. Se ha de mencionar que la música juega un papel muy importante en la trama del juego, puesto que el jugador tiene que aprender a tocar varias canciones con una ocarina. Incluso, la popularidad de Ocarina of Time incrementó de forma significativa las ventas de ocarinas reales.\r\n', 6000.00, 'legend-of-zelda-the-ocarina-of-time.jpg', 'Imagen de video Juego La leyenda de Zelda y la Ocarina del tiempo', 1),
(10, 2, 3, 2, 'Kirby The Crystal Shards', 2000, 'El argumento nos sitúa en Ripple Star, donde habitan seres con forma de hada. Un día el cielo se oscurece, y misteriosas nubes formadas por materia oscura, provenientes de la fuente de materia oscura un ser conocido como Dark Matter, aparecen de repente. Este ser trata de hacerse con el cristal místico, el mayor tesoro de los habitantes de Ripple Star. La pequeña Ribbon de este mundo huye con el cristal pero se ve perseguida por las nubes de marteria oscura. Durante la persecución el cristal se rompe en fragmentos (en el juego no se pueden contar las piezas, ya que algunas son más grandes que las otras) que se dividen por todo el Sistema planetario. Uno de estos cristales es encontrado por Kirby y ella tiene otro de Ripple Star. Kirby, tras escuchar lo sucedido, parte en busca de los cristales.A su búsqueda se unen amigos y no tan amigos.\r\n', 4500.00, 'kirby64-the-crystal-shards.jpg', 'Imagen de videojuego Kirby 64 the Crystal shards', 1),
(11, 9, 2, 2, 'Conker\'s band fur day', 2001, 'El juego sigue a Conker, una ardilla roja codiciosa y bebedora que debe regresar a su casa con su novia Berri. La mayor parte del juego requiere que el jugador complete una secuencia lineal de desafíos que implican saltar obstáculos, resolver acertijos y luchar contra enemigos. También se incluye un modo multijugador en el que hasta cuatro jugadores pueden competir entre sí en siete tipos de juegos diferentes.\r\n', 5450.00, 'conker-s-bad-fur-day.jpg', 'Imagen de videojuego Conker\'s bad fur day', 1),
(12, 9, 1, 2, 'Banjo Kazooie', 1998, 'Es el primer juego de la serie Banjo-Kazooie y sigue la historia de un oso, Banjo, y una pájara, Kazooie, mientras intentan detener a la bruja Gruntilda, que pretende robar la belleza de la hermana menor de Banjo, Tooty, para ella. El juego presenta nueve mundos no lineales donde el jugador debe usar la amplia gama de habilidades de Banjo y Kazooie para reunir elementos y avanzar en la historia. Presenta desafíos como resolver acertijos, saltar obstáculos, recolectar elementos y derrotar a los oponentes.\r\n', 6550.00, 'banjo-kazooie.jpg', 'Imagen de videojuego Banjo Kazooie', 2),
(14, 10, 8, 3, 'Resident Evil 3 Nemesis', 1999, ' La historia se divide en dos mitades; la primera discurre durante las primeras horas del brote del virus T en Raccoon City situándose 24 horas antes de los acontecimientos ocurridos en Resident Evil 2 y la última toma lugar dos días después de dichos sucesos. La protagonista Jill Valentine, quien sobrevivió al desastre viral de la mansión Spencer de la primera entrega, deberá escapar de la ciudad antes de que el gobierno de los Estados Unidos decida erradicarla junto con su población infectada por medio de un misil nuclear, pero lo que no sabe es que la corporación Umbrella ha creado un arma biológica programada especialmente para eliminar a todos los miembros restantes de S.T.A.R.S. Jill deberá sobrevivir de los peligros que le acechan en su próximo escape.\"', 2550.00, 'resident-evil-3-nemesis.jpg', 'Imagen de videojuego Resident Evil 3 Nemesis', 2),
(15, 11, 6, 3, 'Crash Bandicoot', 1996, 'Fue introducido en el videojuego del año 1996 Crash Bandicoot. Crash es un bandicut oriental que fue mejorado genéticamente por el principal antagonista de la serie, el Doctor Neo Cortex, y luego escapó del castillo de Cortex después de un experimento fallido en el \'Cortex Vortex\'. A lo largo de la serie, Crash actúa como la principal oposición contra Cortex y sus malvados planes para la dominación mundial. Si bien Crash tiene varias maniobras defensivas a su disposición, su técnica más distintiva es aquella en la que gira como un tornado a gran velocidad y golpea casi cualquier cosa que toca.\r\n', 3050.00, 'crash-bandicoot.jpg', 'Imagen de videojuego Crash Bandicoot', 2),
(16, 12, 10, 3, 'Metal Slug X', 2001, 'La historia se desarrolla a partir del año 2008 en adelante, cuando un escuadrón llamado Halcones Peregrinos (Peregrin Falcons) debe frustrar los intentos de golpe de estado que pretende el General Morden, líder del Ejército Rebelde y principal antagonista de la serie.', 2250.00, 'metal-slug-x.jpg', 'Imagen de videojuegos Metal Slug X', 2),
(17, 13, 7, 3, 'Silent Hill', 1999, 'Silent Hill transcurre en la ciudad ficticia homónima, localizada en Estados Unidos. La serie está fuertemente influenciada por el terror psicológico y presenta a protagonistas sin cualidades o destrezas físicas fuera de lo normal; en contraste con otros títulos de terror y supervivencia. Las mecánicas de juego giran en torno a resolver acertijos, explorar el mapa en busca de objetos interesantes y combatir monstruos. 20 años después de su creación, un modder encontró monstruos inéditos que Konami había mantenido dormidos en los ficheros del juego.\r\n', 3450.00, 'silent-hill.jpg', 'Imagen de videojuego Silent Hill', 1),
(18, 14, 9, 3, 'Rayman', 1996, 'La serie estar ambientada en un mundo mágico y fantástico que presenta una ampliar gama de entornos que a menudo se basan en ciertos temas, como «Eraser Plains», un paisaje hecho completamente de papelería. Los juegos principales de la serie son plataformas, pero hay varios títulos derivados de la saga de otros géneros. El protagonista es Rayman, un ser mágico reconocido por su coraje y determinación que con ayuda de sus amigos, debe salvar su mundo de varios villanos.\r\n', 2550.00, 'rayman.jpg', 'Imagen de videojuego Rayman', 2),
(119, 1, 50, 8, 'jorgelina', 231, 'jejejej', 3455.00, '1669679367_jorgelina.jpg', 'gfdgfd', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

CREATE TABLE `personajes` (
  `personaje_id` int(10) UNSIGNED NOT NULL,
  `personaje` varchar(256) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `alt` varchar(256) NOT NULL,
  `imagen` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`personaje_id`, `personaje`, `descripcion`, `alt`, `imagen`) VALUES
(1, 'Banjo y Kazooie', 'Banjo Es un oso color marrón que viste unos pantaloncillos amarillos, un collar hecho de dientes de tiburón y una mochila azul. En esta mochila es donde reside Kazooie,es el otro de los dos protagonistas principales de la serie. Es una pájara hembra, larguirucha y roja, perteneciente a la especie ficticia Breegull de cresta roja (red-crested Breegull). Su personalidad es completamente opuesta a la de Banjo, mientras que Banjo es amable y de buenos modales, Kazooie es grosera, impertinente y sarcástica. Es el personaje que tiene más habilidades de los dos, que van desde picotear para eliminar enemigos, hasta volar. También toca el kazoo, instrumento que le da su nombre.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             ', 'Imagen de Banjo y Kazooie', '1668720510_banjo-y-kazooie.png'),
(2, 'Conker ', 'Cuando era joven, sus padres le decían que nunca debía beber alcohol, ser codicioso o jurar. En los videojuegos Diddy Kong Racing y Conker\'s Pocket Tales, Conker parece ser una persona agradable y amable que obedece las reglas y siempre parece ser feliz-afortunado. En Conker\'s Bad Fur Day, sin embargo, Conker pasó por un cambio dramático en la personalidad. Se había convertido en una ardilla ligeramente codiciosa y alcohólica. Su relación con Berri no es tan buena como lo era antes, y beber bebidas alcohólicas es una parte regular de la vida de Conker.                                                                                                                        ', 'Dibujo de Conker', '1668720529_conker.png'),
(3, 'Kirby ', 'Kirby proviene del planeta Pop Star, donde vive en una casa con forma de cúpula en el lugar imaginario de Dream Land. ​ Tiene una actitud positiva, amistosa e ingenua, y en ocasiones se le caracteriza con un apetito voraz. ​ Además es alguien valiente y siempre dispuesto a usar sus poderes para ayudar a los demás.                                                                        ', 'Imagen de Kirby', '1668720535_kirby.png'),
(4, 'Mario Bross', 'Mario es un héroe amable, valiente y paciente con un fuerte sentido de la justicia, moralidad y bondad. Siempre pone las necesidades y problemas de otros antes que los suyos. Está dispuesto a arriesgar su vida para salvar a millones de las fuerzas del mal.                        ', 'Imagen de Mario Bross', '1668720544_mario-bross.png'),
(5, 'Link', 'Link nace durante la Guerra Civil de Hyrule, y su madre, moribunda, lo deja en el Bosque Kokiri al cargo del Gran Árbol Deku, para evitar que quede expuesto a la guerra. Tiene que enfrentarse ante su enemigo Ganon, quien tiene capturada a la princesa Zelda y está atormentando a todos los demas pueblos. \r\nLink es un niño de 10 años, fuerte valiente y junto a su amiga \"Navi\" empezaran una gran aventura, con viajes en el tiempo.                         ', 'Imagen de Link ', '1668720550_link.png'),
(6, 'Crash Bandicoot', 'El protagonista principal es Crash Bandicoot, un marsupial naranja capturado por el Dr. Neo Cortex que quería convertirlo en el líder de su ejército de animales mutantes. Rechazado por Cortex porque el Evolvo-Ray no pudo tomar el control del cerebro del bandicoot, la misión de Crash es frustrar los planes de Cortex y salvar a Tawna, un bandicoot femenino propiedad del científico loco. Crash es ayudado en su búsqueda por Aku Aku, una máscara asistente que guía y protege del mal.                        ', 'Imagen de Crash Bandicoot', '1668720558_crash-bandicoot.png'),
(7, 'James Sunderland', 'juego comienza, James señala que su esposa, Mary Shepherd-Sunderland, lleva tres años muerta. Sin embargo, James ha recibido una misteriosa carta con la letra de Mary, en la que afirma que ella le espera en su \"lugar especial\", en algún lugar de Silent Hill. Cuando James llega al pueblo, se ve envuelto en una serie de acontecimientos extraños y de pesadilla que le obligan a cuestionar su cordura, su memoria y su personalidad.\r\n\r\n            ', 'Imagen de James Sunderland', '1668720567_james-sunderland.png'),
(8, 'Jill Valentine', 'Jill es miembro de los STARS, un grupo de trabajo especial en el departamento de policía de Raccoon City. Es especialista en tácticas de combate, desarmar trampas explosivas y abrir cerraduras gracias a su paso por la Delta Force.\r\nEs un personaje que se preocupa mucho por sus compañeros y siempre trata de ayudarlos en caso de que la necesiten. A la edad adulta se unió a un programa de las Fuerzas Especiales Delta del Ejército de los Estados Unidos de América donde entrenó y obtuvo muy buenas calificaciones en desactivación de bombas. Para 1996 dejó el ejército y se unió al recién creado equipo de Servicio de Rescate y Tácticas Especiales, mejor conocido como S.T.A.R.S., una subdivisión del Departamento de Policía de Raccoon City. Al unirse a S.T.A.R.S. se le asignó el puesto de Retaguardia del Equipo Alfa. Destacada por ser una especialista en cerraduras y explosivos.            ', 'Imagen de Jill Valentine', '1668720577_jill-valentine.png'),
(9, 'Rayman', 'Rayman: es el protagonista principal de la serie, Es un híbrido entre Humano / vegetal que no tiene brazos, piernas ni cuello, aunque tiene manos, pies y una cabeza que pueden moverse independientemente de su cuerpo. Debido a su falta de brazos, Rayman puede lanzar sus puños en golpes de largo alcance a sus enemigos, y en algunos juegos incluso puede proyectar bolas de energía en sus manos. Es capaz de deslizarse girando su cabello como las aspa de un helicóptero. Por lo general, se lo encuentra con guantes blancos, un pañuelo rojo y un cuerpo morado con anillo blanco en el centro (el pañuelo fue reemplazado por una capucha en entregas posteriores) y zapatillas amarillas (nuevamente, ligeramente modificada en juegos posteriores).             ', 'Imagen de Rayman', '1668720586_rayman.png'),
(10, 'Tarma Roving', 'Tarma, cuyo padre fue un soldado condecorado, ingresó de inmediato a la Academia de Oficiales de Tácticas Especiales y Batalla cuando se graduó de la secundaria. Fue asignado al Escuadrón PF luego de rescatar al presidente cuando tenía veinte años. Aquí conoció y se hizo amigo (luego mejor amigo) de Marco.\r\nEl pasatiempo de Tarma es personalizar motocicletas, en las que saca lo mejor de ellas. Luego de la Primera Misión contra el temido Morden, planeó entrar en el negocio de las motocicletas, pero puso sus planes en espera luego de sufrir las súplicas desesperadas de su jefe.                        ', 'Imagen de Tarma', '1668720597_tarma-roving.png'),
(11, 'Pimple', 'Pimple ( George Pie ) es el músculo de los \'Toads y prefiere pelear en lugar de hablar. Pimple es el \'Toad\' más grande y fuerte. Lleva rodilleras negras con pinchos y brazaletes negros con pinchos. Las primeras ilustraciones lo mostraban usando un cinturón negro con púas, pero nunca se lo vio usando este cinturón en ninguno de los juegos y las ilustraciones posteriores eliminaron el cinturón. Según su perfil en el arcade Battletoads , se encuentra a una altura de 7\'4 \". La piel de Pimple ha cambiado de apariencia varias veces en el transcurso de la serie.                        ', 'Imagen de Pimple, una de las ranas del juego ', '1668720610_pimple.png'),
(12, 'Earthworm Jim', 'Es una Lombriz llamada Jim que, enfundado en un traje cibernético y armado con una pistola, se dedica a recorrer el universo en busca de la princesa \"Cuál es su nombre\". Es muy divertido, audaz y valiente.            ', 'Imagen del personaje Earthworm Jim', '1668720619_earthworm-jim.png'),
(13, 'Mega Man', 'Mega Man es un robot, su principal rol se centra en su eterna batalla para detener al malvado científico loco, el Dr. Wily, y su cada día más creciente ejército de robots y parar su ambición de conquistar al mundo, gracias a su voluntad y buenas intenciones. Utilizando su arma principal, el Mega Buster, un brazo-cañón que se puede adaptar a las Armas Especiales de los Robot Masters que derrota, mientras viaja alrededor del mundo con tal objetivo. Con la constante ayuda de su \"padre\", el Dr. Light y sus compañeros robóticos, Mega Man lucha por la victoria y conseguir su principal objetivo, \"LA PAZ ETERNA\".            ', 'Imagen del personaje Mega Man', '1668720628_mega-man.png'),
(14, 'Sonic', 'Él es un erizo antropomórfico nacido con la habilidad de correr más rápido que el sonido, de allí su nombre. Su mejor amigo es Tails (Conocido como \"Colitas\" en Español).\r\nDesde que entró en la batalla contra la injusticia, Sonic ha sido el vencedor de la paz y es reconocido en la Tierra por haberlo salvado incontables veces. Durante sus muchas aventuras, Sonic ha viajado desde los confines del mundo hasta los confines del espacio y del tiempo, enfrentando innumerables pruebas que lo han probado al máximo, ganándose muchos títulos, aliados y el desprecio de varios enemigos. Conocido por su legendaria actitud arrogante, tranquila y un temperamento algo corto, pero con un fuerte sentido de la justicia, la compasión y el amor por la libertad y la aventura, Sonic utiliza sus habilidades para proteger a los inocentes de su mundo y del más allá de las fuerzas del mal, especialmente de su archienemigo, el Dr. Eggman, y su imperio.            ', 'Imagen del personaje Sonic', '1668720645_sonic.png'),
(15, 'Boogerman', 'Era una oscura y tormentosa noche en el laboratorio del Profesor Stinkbaum, donde secretamente este construía una máquina que salvaría al mundo de la contaminación al trasladarla a la Dimensión X-Cremento. El millonario excéntrico, Snotty Ragsdale, consiguió trabajo en el lugar para investigar y encontrar de dónde proviene la contaminación. Tenía un mal presentimiento sobre la extraña máquina.\r\n\r\nRagsdale, al limpiar el polvo cerca de la máquina hizo que una bola de polvo llegara a su nariz, causándole un pequeño pero fuerte estornudo. El poder de este estornudo rompió la máquina y un largo brazo apareció de la nada para robarse la fuente de electricidad de la máquina. En un corto instante desapareció Ragsdale para ir al baño de hombres y regresó vestido como su alter ego, ¡Boogerman! Tras esto, saltó dentro del portal de la máquina para seguir al brazo misterioso y resolver el enigma...            ', 'Imagen del personaje Boogerman', '1668720661_boogerman.png'),
(16, 'Tails', 'Es un pequeño zorro antropomórfico de dos colas, gracias a las cuales, tiene la capacidad de volar (debido al giro rápido de éstas), y de nadar.                        ', 'Imagen del Personaje Secundario Colitas de Sonic', '1669158247_tails.png'),
(17, 'Rash', ' Rana con anteojos de sol y de color verde. Es jugable en la primera versión del juego.                        ', 'Imagen de personaje secundario Rash', '1669159147_rash.png'),
(18, 'Carlos Oliveira', 'Es experto en armas pesadas y operaciones con vehículos, haciendo de él un miembro de mucho valor. Es una persona afectuosa y suele bromear a menudo. Quizá, por haber crecido en un ambiente de violencia, es valiente y siempre está dispuesto a enfrentarse al peligro.                        ', 'Imagen del personaje Carlos Oliveira', '1669159858_carlos-oliveira.png'),
(19, 'Mikhail Victor', 'Mikhail es miembro del ejército privado de Umbrella, el U.B.C.S., además de ser el líder del escuadrón Delta. Sus habilidades como tal son excelentes, y su experiencia en puestos de mando es indiscutible. Ha dirigido al escuadrón Delta del U.B.C.S. en una misión para rescatar a civiles en Raccoon City, pero el caos con el que se han encontrado ha superado todas las expectativas, lo que ha provocado el casi total exterminio de su escuadrón, así como heridas personales. Aun así, Mikhail está decidido a rescatar a todo civil que esté a su alcance, y se niega a retirarse hasta que su objetivo sea cumplido en la medida de lo posible            ', 'Imagen del personaje Mikhail Victor', '1669164801_mikhail-victor.png'),
(20, 'Nicholai Ginovaef', 'Sargento del Pelotón Delta del U.B.C.S.                        ', 'Imagen del personaje Nicholai Ginovaef', '1669165396_nicholai-ginovaef.png'),
(21, 'Fio Germi', 'Fio es la única hija de una familia italiana rica. La familia Germi fue una histórica familia de militares que originalmente eran comerciantes que hicieron su fortuna en la región del Mediterráneo durante la antigua era de la exploración, y hoy en día siguen siendo ricos a través de la gestión de varias empresas. También se han distinguido por su papel en el servicio militar en la primera época pasada, en la guerra napoleónica en 1800, y luego en las guerras de la unificación italiana de 1900. Hoy en día todavía destacan por su participación en la lucha contra el terrorismo por todo el mundo. Luchar se ha convertido en una costumbre necesaria que el heredero elegido de la familia Germi deba servir en el ejército.                        ', 'Imagen de personaje Fio Germi', '1669165324_fio-germi.png'),
(22, 'Marco Rossi', 'Marco es un italoamericano que ingresó en la escuela de oficiales de la Academia de Tecnologías Especiales tras asistir a un instituto técnico estatal. Al graduarse, Marco entró en los Halcones Peregrinos (PF, por sus siglas en inglés), una fuerza de ataque especial del ejército.            ', 'Imagen de Personaje Marco Rossi', '1669165258_marco-rossi.png'),
(23, 'Globox', 'Globox parece ser de una especie de anuros. Él tiene la piel azul, sus dos manos y su vientre son de color amarillo. Sus dos pies están separados de sus extremidades. Es el más alto de los habitantes del Claro de los Sueños salvo Ly y Clark, cuya altura es mayor que él                                                ', 'Imagen de personaje Globox', '1669165276_globox.png'),
(50, 'nombre2!!!!', 'descripcion            ', 'alt', '1669679245_nombre2!!!!.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes_por_juego`
--

CREATE TABLE `personajes_por_juego` (
  `personajes_por_juego_id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `personajes_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personajes_por_juego`
--

INSERT INTO `personajes_por_juego` (`personajes_por_juego_id`, `producto_id`, `personajes_id`) VALUES
(1, 4, 16),
(4, 17, 19),
(6, 16, 21),
(7, 16, 22),
(8, 18, 23),
(28, 3, 17),
(36, 14, 18),
(37, 14, 19),
(38, 14, 20),
(44, 119, 2),
(45, 119, 12),
(46, 119, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(256) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `rol` enum('superadmin','admin','usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `email`, `nombre_usuario`, `nombre_completo`, `password`, `rol`) VALUES
(1, 'maria.pestalardo@davinci.edu.ar', 'jorpesta', 'Maria Jorgelina Pestalardo', '$2y$10$LUSJlcNUshscwvC6QdWi9.OJCq0ktnbAKsyvOptoLj0RCl4mpj8Qe', 'superadmin'),
(2, 'verona.rossi@davinci.edu.ar', 'veroRossi', 'Verona Rossi', '$2y$10$LUSJlcNUshscwvC6QdWi9.OJCq0ktnbAKsyvOptoLj0RCl4mpj8Qe', 'usuario'),
(3, 'juana.gomez@gmail.com', 'juli', 'Juana Gomez', '$2y$10$LUSJlcNUshscwvC6QdWi9.OJCq0ktnbAKsyvOptoLj0RCl4mpj8Qe', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumna`
--
ALTER TABLE `alumna`
  ADD PRIMARY KEY (`alumnas_id`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`carrito_id`);

--
-- Indices de la tabla `consola`
--
ALTER TABLE `consola`
  ADD PRIMARY KEY (`consola_id`);

--
-- Indices de la tabla `creadores`
--
ALTER TABLE `creadores`
  ADD PRIMARY KEY (`creadores_id`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `creadores_id` (`creadores_id`),
  ADD KEY `personaje_id` (`personaje_id`),
  ADD KEY `consola_id` (`consola_id`);

--
-- Indices de la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD PRIMARY KEY (`personaje_id`);

--
-- Indices de la tabla `personajes_por_juego`
--
ALTER TABLE `personajes_por_juego`
  ADD PRIMARY KEY (`personajes_por_juego_id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `personajes_id` (`personajes_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumna`
--
ALTER TABLE `alumna`
  MODIFY `alumnas_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `carrito_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `consola`
--
ALTER TABLE `consola`
  MODIFY `consola_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `creadores`
--
ALTER TABLE `creadores`
  MODIFY `creadores_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `producto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de la tabla `personajes`
--
ALTER TABLE `personajes`
  MODIFY `personaje_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `personajes_por_juego`
--
ALTER TABLE `personajes_por_juego`
  MODIFY `personajes_por_juego_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juego`
--
ALTER TABLE `juego`
  ADD CONSTRAINT `juego_ibfk_1` FOREIGN KEY (`creadores_id`) REFERENCES `creadores` (`creadores_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `juego_ibfk_2` FOREIGN KEY (`personaje_id`) REFERENCES `personajes` (`personaje_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `juego_ibfk_3` FOREIGN KEY (`consola_id`) REFERENCES `consola` (`consola_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `personajes_por_juego`
--
ALTER TABLE `personajes_por_juego`
  ADD CONSTRAINT `personajes_por_juego_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `juego` (`producto_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personajes_por_juego_ibfk_2` FOREIGN KEY (`personajes_id`) REFERENCES `personajes` (`personaje_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
