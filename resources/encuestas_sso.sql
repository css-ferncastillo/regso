-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-07-2022 a las 19:11:46
-- Versión del servidor: 10.8.3-MariaDB
-- Versión de PHP: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuestas_sso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_actividades`
--

CREATE TABLE `t_actividades` (
  `id` int(11) NOT NULL,
  `tipo_actividad` int(11) NOT NULL,
  `descripcion` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_actividades`
--

INSERT INTO `t_actividades` (`id`, `tipo_actividad`, `descripcion`, `estado`) VALUES
(1, 1, 'Capsulas informativa', 1),
(2, 1, 'Talleres de Capacita', 1),
(3, 1, 'Cursos y Seminarios', 1),
(4, 1, 'Charlas Educativas', 1),
(5, 1, 'Asesoría Comité de Salud e Higíene\r\nAsesoría Comité de Salud e Higíene\r\nAsesoria', 1),
(6, 1, 'Seguimiento Comite de Salud e Higiene', 1),
(7, 2, 'Numero de Trabajadores vacunados', 1),
(8, 2, 'Numero de Trabajadores con esquema completo', 1),
(9, 2, 'Numero de trabajodores con cobertura de vacun', 1),
(10, 2, 'Enlace/comunicación con la Empresa', 1),
(11, 2, 'Inspeccion', 1),
(12, 2, 'Identificacion y Evaluación de Riesgos', 1),
(13, 2, 'Verificación la gestión de los Riesgos', 1),
(14, 2, 'Revisión del Plan de Prevención Evaluacion...', 1),
(15, 2, 'Reuniones Intramuro Reuniones Extramuro Elaboración de Informes y peritajes Trám', 1),
(16, 3, 'Reuniones Intramuro', 1),
(17, 3, 'Reuniones Extramuro', 1),
(18, 3, 'Elaboracion de Informes y peritajes', 1),
(19, 3, 'Trámite de documentos', 1),
(20, 3, 'Revisión de Expediente', 1),
(21, 3, 'Elaboracion de Material Didactico', 1),
(22, 3, 'Discusion de Casos', 1),
(23, 3, 'Actividades de Investigacion', 1),
(24, 4, 'Investigación de Accidentes (Incidente con Lesion)', 1),
(25, 4, 'Medidas de Prevención en Higiene y Seguridad', 1),
(26, 4, 'Evaluación de Puestos de Trabajo', 1),
(27, 4, 'Evaluación Técnicas de Riesgo Inminentes', 1),
(28, 4, 'Monitoreo', 1),
(29, 4, 'Inventarios de sustancias químicas y MSDS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_act_economica`
--

CREATE TABLE `t_act_economica` (
  `id` int(11) NOT NULL,
  `actividad_economica` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_act_economica`
--

INSERT INTO `t_act_economica` (`id`, `actividad_economica`) VALUES
(1, 'Agricultura, Silvicultura, Caza y Pesca'),
(6, 'Comercio'),
(4, 'Construcción'),
(5, 'Electricidad, Gas, Agua y Servicios Sanitarios'),
(2, 'Explotación de Minas y Canteras'),
(3, 'Industrias Manufactureras'),
(9, 'Otros'),
(8, 'Servicios'),
(7, 'Transporte, Almacén y Comunicaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_alta_laboral`
--

CREATE TABLE `t_alta_laboral` (
  `id` int(11) NOT NULL,
  `alta_laboral` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_alta_laboral`
--

INSERT INTO `t_alta_laboral` (`id`, `alta_laboral`) VALUES
(1, 'CON RECOMENDACIÓN'),
(3, 'NO'),
(2, 'SIN RECOMENDACIÓN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_control_usuario`
--

CREATE TABLE `t_control_usuario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `ultimo_acceso` datetime NOT NULL,
  `ip_acceso` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ultimo_update` datetime NOT NULL,
  `actualizado_por` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_control_usuario`
--

INSERT INTO `t_control_usuario` (`id`, `id_usuario`, `ultimo_acceso`, `ip_acceso`, `ultimo_update`, `actualizado_por`) VALUES
(1, 19, '2022-07-06 23:37:10', '127.0.0.1', '2022-07-06 00:00:00', '19'),
(2, 21, '1990-01-01 00:00:00', '127.0.0.1', '1990-01-01 00:00:00', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_corregimientos`
--

CREATE TABLE `t_corregimientos` (
  `id` int(11) NOT NULL,
  `cod_correg` smallint(6) DEFAULT NULL,
  `id_distrito` int(11) NOT NULL,
  `desc_correg` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_corregimientos`
--

INSERT INTO `t_corregimientos` (`id`, `cod_correg`, `id_distrito`, `desc_correg`) VALUES
(632, 1, 1, 'Bocas del Toro'),
(633, 2, 1, 'Bastimentos'),
(634, 3, 1, 'Cauchero'),
(635, 4, 1, 'Punta Laurel'),
(636, 5, 1, 'Tierra Oscura'),
(637, 6, 2, 'Changuinola'),
(638, 7, 2, 'Almirante'),
(639, 8, 2, 'Guabito'),
(640, 9, 2, 'Teribe'),
(641, 10, 2, 'Valle del Risco'),
(642, 11, 2, 'El Empalme'),
(643, 12, 2, 'Las Tablas'),
(644, 13, 2, 'Cochigró'),
(645, 14, 2, 'La Gloria'),
(646, 15, 2, 'Las Delicias'),
(647, 16, 2, 'Nance del Risco'),
(648, 17, 2, 'Valle de Agua Arriba'),
(649, 18, 3, 'Chiriquí Grande'),
(650, 19, 3, 'Miramar'),
(651, 20, 3, 'Punta Peña'),
(652, 21, 3, 'Punta Robalo'),
(653, 22, 3, 'Rambala'),
(654, 23, 3, 'Bajo Cedro'),
(655, 24, 4, 'Aguadulce'),
(656, 25, 4, 'El Cristo'),
(657, 26, 4, 'El Roble'),
(658, 27, 4, 'Pocrí'),
(659, 28, 4, 'Barrios Unidos'),
(660, 29, 5, 'Antón'),
(661, 30, 5, 'Cabuya'),
(662, 31, 5, 'El Chirú'),
(663, 32, 5, 'El Retiro'),
(664, 33, 5, 'El Valle'),
(665, 34, 5, 'Juan Díaz'),
(666, 35, 5, 'Río Hato'),
(667, 36, 5, 'San Juan de Dios'),
(668, 37, 5, 'Santa Rita'),
(669, 38, 5, 'Caballero'),
(670, 39, 6, 'La Pintada'),
(671, 40, 6, 'El Harino'),
(672, 41, 6, 'El Potrero'),
(673, 42, 6, 'Llano Grande'),
(674, 43, 6, 'Piedras Gordas'),
(675, 44, 6, 'Las Lomas'),
(676, 45, 7, 'Natá'),
(677, 46, 7, 'Capellanía'),
(678, 47, 7, 'El Caño'),
(679, 48, 7, 'Guzmán'),
(680, 49, 7, 'Las Huacas'),
(681, 50, 7, 'Toza'),
(682, 51, 8, 'Olá'),
(683, 52, 8, 'El Copé'),
(684, 53, 8, 'El Palmar'),
(685, 54, 8, 'El Picacho'),
(686, 55, 8, 'La Pava'),
(687, 56, 9, 'Penonomé'),
(688, 57, 9, 'Cañaveral'),
(689, 58, 9, 'Coclé'),
(690, 59, 9, 'Chiguirí Arriba'),
(691, 60, 9, 'El Coco'),
(692, 61, 9, 'Pajonal'),
(693, 62, 9, 'Río Grande'),
(694, 63, 9, 'Río Indio'),
(695, 64, 9, 'Toabré'),
(696, 65, 9, 'Tulú'),
(697, 66, 10, 'Barrio Norte'),
(698, 67, 10, 'Barrio Sur'),
(699, 68, 10, 'Buena Vista'),
(700, 69, 10, 'Cativá'),
(701, 70, 10, 'Ciricito'),
(702, 71, 10, 'Cristóbal'),
(703, 72, 10, 'Escobal'),
(704, 73, 10, 'Limón'),
(705, 74, 10, 'Nueva Providencia'),
(706, 75, 10, 'Puerto Pilón'),
(707, 76, 10, 'Sabanitas'),
(708, 77, 10, 'Salamanca'),
(709, 78, 10, 'San Juan'),
(710, 79, 10, 'Santa Rosa'),
(711, 80, 11, 'Nuevo Chagres'),
(712, 81, 11, 'Achiote'),
(713, 82, 11, 'El Guabo'),
(714, 83, 11, 'La Encantada'),
(715, 84, 11, 'Palmas Bellas'),
(716, 85, 11, 'Piña'),
(717, 86, 11, 'Salud'),
(718, 87, 12, 'Miguel de la Borda'),
(719, 88, 12, 'Coclé del Norte'),
(720, 89, 12, 'El Guásimo'),
(721, 90, 12, 'Gobea'),
(722, 91, 12, 'Río Indio'),
(723, 92, 12, 'San José del General'),
(724, 93, 13, 'Portobelo'),
(725, 94, 13, 'Cacique'),
(726, 95, 13, 'Puerto Lindo o Garrote'),
(727, 96, 13, 'Isla Grande'),
(728, 97, 13, 'María Chiquita'),
(729, 98, 14, 'Palenque'),
(730, 99, 14, 'Cuango'),
(731, 100, 14, 'Miramar'),
(732, 101, 14, 'Nombre de Dios'),
(733, 102, 14, 'Palmira'),
(734, 103, 14, 'Playa Chiquita'),
(735, 104, 14, 'Santa Isabel'),
(736, 105, 14, 'Viento Frío'),
(737, 106, 15, 'Alanje'),
(738, 107, 16, 'Divalá'),
(739, 108, 16, 'El Tejar'),
(740, 109, 16, 'Guarumal'),
(741, 110, 16, 'Palo Grande'),
(742, 111, 16, 'Querévalo'),
(743, 112, 16, 'Santo Tomás'),
(744, 113, 16, 'Canta Gallo'),
(745, 114, 16, 'Nuevo México'),
(746, 115, 17, 'Puerto Armuelles'),
(747, 116, 17, 'Limones'),
(748, 117, 17, 'Progreso'),
(749, 118, 17, 'Baco'),
(750, 119, 17, 'Rodolfo Aguilar Delgado'),
(751, 120, 18, 'Boquerón'),
(752, 121, 18, 'Bágala'),
(753, 122, 18, 'Cordillera'),
(754, 123, 18, 'Guabal'),
(755, 124, 18, 'Guayabal'),
(756, 125, 18, 'Paraíso'),
(757, 126, 18, 'Pedregal'),
(758, 127, 18, 'Tijeras'),
(759, 128, 19, 'Bajo Boquete'),
(760, 129, 19, 'Caldera'),
(761, 130, 19, 'Palmira'),
(762, 131, 19, 'Alto Boquete'),
(763, 132, 19, 'Jaramillo'),
(764, 133, 19, 'Los Naranjos'),
(765, 134, 20, 'La Concepción'),
(766, 135, 20, 'Aserrío de Gariché'),
(767, 136, 20, 'Bugaba'),
(768, 137, 20, 'Cerro Punta'),
(769, 138, 20, 'Gómez'),
(770, 139, 20, 'La Estrella'),
(771, 140, 20, 'San Andrés'),
(772, 141, 20, 'Santa Marta'),
(773, 142, 20, 'Santa Rosa'),
(774, 143, 20, 'Santo Domingo'),
(775, 144, 20, 'Sortová'),
(776, 145, 20, 'Volcán'),
(777, 146, 20, 'El Bongo'),
(778, 147, 21, 'David'),
(779, 148, 21, 'Bijagual'),
(780, 149, 21, 'Cochea'),
(781, 150, 21, 'Chiriquí'),
(782, 151, 21, 'Guacá'),
(783, 152, 21, 'Las Lomas'),
(784, 153, 21, 'Pedregal'),
(785, 154, 21, 'San Carlos'),
(786, 155, 21, 'San Pablo Nuevo'),
(787, 156, 21, 'San Pablo Viejo'),
(788, 157, 22, 'Dolega'),
(789, 158, 22, 'Dos Ríos'),
(790, 159, 22, 'Los Anastacios'),
(791, 160, 22, 'Potrerillos'),
(792, 161, 22, 'Potrerillos Abajo'),
(793, 162, 22, 'Rovira'),
(794, 163, 22, 'Tinajas'),
(795, 164, 22, 'Los Algarrobos'),
(796, 165, 23, 'Gualaca'),
(797, 166, 23, 'Hornito'),
(798, 167, 23, 'Los Angeles'),
(799, 168, 23, 'Paja de Sombrero'),
(800, 169, 23, 'Rincón'),
(801, 170, 24, 'Remedios'),
(802, 171, 24, 'El Nancito'),
(803, 172, 24, 'El Porvenir'),
(804, 173, 24, 'El Puerto'),
(805, 174, 24, 'Santa Lucia'),
(806, 175, 25, 'Río Sereno'),
(807, 176, 25, 'Breñon'),
(808, 177, 25, 'Cañas Gordas'),
(809, 178, 25, 'Monte Lirio'),
(810, 179, 25, 'Plaza Caisán'),
(811, 180, 25, 'Santa Cruz'),
(812, 181, 25, 'Dominical'),
(813, 182, 25, 'Santa Clara'),
(814, 183, 26, 'Las Lajas'),
(815, 184, 26, 'Juay'),
(816, 185, 26, 'Lajas Adentro'),
(817, 186, 26, 'San Félix'),
(818, 187, 26, 'Santa Cruz'),
(819, 188, 27, 'Horconcitos'),
(820, 189, 27, 'Boca Chica'),
(821, 190, 27, 'Boca del Monte'),
(822, 191, 27, 'San Juan'),
(823, 192, 27, 'San Lorenzo'),
(824, 193, 28, 'Tolé'),
(825, 194, 28, 'Bella Vista'),
(826, 195, 28, 'Cerro Viejo'),
(827, 196, 28, 'El Cristo'),
(828, 197, 28, 'Justo Fidel Palacios'),
(829, 198, 28, 'Lajas de Tolé'),
(830, 199, 28, 'Potrero de Caña'),
(831, 200, 28, 'Quebrada de Piedra'),
(832, 201, 28, 'Veladero'),
(833, 202, 29, 'La Palma'),
(834, 203, 29, 'Camogantí'),
(835, 204, 29, 'Chepigana'),
(836, 205, 29, 'Garachiné'),
(837, 206, 29, 'Jaqué'),
(838, 207, 29, 'Puerto Piña'),
(839, 208, 29, 'Río Congo'),
(840, 209, 29, 'Río Iglesias'),
(841, 210, 29, 'Sambú'),
(842, 211, 29, 'Setegantí'),
(843, 212, 29, 'Taimatí'),
(844, 213, 29, 'Tucutí'),
(845, 214, 29, 'Agua Fría'),
(846, 215, 29, 'Cucunatí'),
(847, 216, 29, 'Río Congo Arriba'),
(848, 217, 29, 'Santa Fé'),
(849, 218, 30, 'El Real de Santa María'),
(850, 219, 30, 'Boca de Cupé'),
(851, 220, 30, 'Paya'),
(852, 221, 30, 'Pinogana'),
(853, 222, 30, 'Púcuro'),
(854, 223, 30, 'Yape'),
(855, 224, 30, 'Yaviza'),
(856, 225, 30, 'Metetí'),
(857, 226, 30, 'Comarca Kuna de Wargandí'),
(858, 227, 31, 'Chitré'),
(859, 228, 31, 'La Arena'),
(860, 229, 31, 'Monagrillo'),
(861, 230, 31, 'Llano Bonito'),
(862, 231, 31, 'San Juan Bautista'),
(863, 232, 32, 'Las Minas'),
(864, 233, 32, 'Chepo'),
(865, 234, 32, 'Chumical'),
(866, 235, 32, 'El Toro'),
(867, 236, 32, 'Leones'),
(868, 237, 32, 'Quebrada del Rosario'),
(869, 238, 32, 'Quebrada El Ciprián'),
(870, 239, 33, 'Los Pozos'),
(871, 240, 33, 'Capurí'),
(872, 241, 33, 'El Calabacito'),
(873, 242, 33, 'El Cedro'),
(874, 243, 33, 'La Arena'),
(875, 244, 33, 'La Pitaloza'),
(876, 245, 33, 'Los Cerritos'),
(877, 246, 33, 'Los Cerros de Paja'),
(878, 247, 33, 'Las Llanas'),
(879, 248, 34, 'Ocú'),
(880, 249, 34, 'Cerro Largo'),
(881, 250, 34, 'Los Llanos'),
(882, 251, 34, 'Llano Grande'),
(883, 252, 34, 'Peñas Chatas'),
(884, 253, 34, 'El Tijera'),
(885, 254, 34, 'Menchaca'),
(886, 255, 35, 'Parita'),
(887, 256, 35, 'Cabuya'),
(888, 257, 35, 'Los Castillos'),
(889, 258, 35, 'Llano de la Cruz'),
(890, 259, 35, 'París'),
(891, 260, 35, 'Portobelillo'),
(892, 261, 35, 'Potuga'),
(893, 262, 36, 'Pesé'),
(894, 263, 36, 'Las Cabras'),
(895, 264, 36, 'El Pájaro'),
(896, 265, 36, 'El Barrero'),
(897, 266, 36, 'El Pedregoso'),
(898, 267, 36, 'El Ciruelo'),
(899, 268, 36, 'Sabanagrande'),
(900, 269, 36, 'Rincón Hondo'),
(901, 270, 37, 'Santa María'),
(902, 271, 37, 'Chupampa'),
(903, 272, 37, 'El Rincón'),
(904, 273, 37, 'El Limón'),
(905, 274, 37, 'Los Canelos'),
(906, 275, 38, 'Guararé'),
(907, 276, 38, 'El Espinal'),
(908, 277, 38, 'El Macano'),
(909, 278, 38, 'Guararé Arriba'),
(910, 279, 38, 'La Enea'),
(911, 280, 38, 'La Pasera'),
(912, 281, 38, 'Las Trancas'),
(913, 282, 38, 'Llano Abajo'),
(914, 283, 38, 'El Hato'),
(915, 284, 38, 'Perales'),
(916, 285, 39, 'Las Tablas'),
(917, 286, 39, 'Bajo Corral'),
(918, 287, 39, 'Bayano'),
(919, 288, 39, 'El Carate'),
(920, 289, 39, 'El Cocal'),
(921, 290, 39, 'El Manantial'),
(922, 291, 39, 'El Muñoz'),
(923, 292, 39, 'El Pedregoso'),
(924, 293, 39, 'La Laja'),
(925, 294, 39, 'La Miel'),
(926, 295, 39, 'La Palma'),
(927, 296, 39, 'La Tiza'),
(928, 297, 39, 'Las Palmitas'),
(929, 298, 39, 'Las Tablas Abajo'),
(930, 299, 39, 'Nuario'),
(931, 300, 39, 'Palmira'),
(932, 301, 39, 'Peña Blanca'),
(933, 302, 39, 'Río Hondo'),
(934, 303, 39, 'San José'),
(935, 304, 39, 'San Miguel'),
(936, 305, 39, 'Santo Domingo'),
(937, 306, 39, 'Sesteadero'),
(938, 307, 39, 'Valle Rico'),
(939, 308, 39, 'Vallerriquito'),
(940, 309, 40, 'La Villa de los Santos'),
(941, 310, 40, 'El Guásimo'),
(942, 311, 40, 'La Colorada'),
(943, 312, 40, 'La Espigadilla'),
(944, 313, 40, 'Las Cruces'),
(945, 314, 40, 'Las Guabas'),
(946, 315, 40, 'Los Angeles'),
(947, 316, 40, 'Los Olivos'),
(948, 317, 40, 'Llano Largo'),
(949, 318, 40, 'Sabanagrande'),
(950, 319, 40, 'Santa Ana'),
(951, 320, 40, 'Tres Quebradas'),
(952, 321, 40, 'Agua Buena'),
(953, 322, 40, 'Villa Lourdes'),
(954, 323, 41, 'Macaracas'),
(955, 324, 41, 'Bahía Honda'),
(956, 325, 41, 'Bajos de Güera'),
(957, 326, 41, 'Corozal'),
(958, 327, 41, 'Chupá'),
(959, 328, 41, 'El Cedro'),
(960, 329, 41, 'Espino Amarillo'),
(961, 330, 41, 'La Mesa'),
(962, 331, 41, 'Las Palmas'),
(963, 332, 41, 'Llano de Piedra'),
(964, 333, 41, 'Mogollón'),
(965, 334, 42, 'Pedasí'),
(966, 335, 42, 'Los Asientos'),
(967, 336, 42, 'Mariabé'),
(968, 337, 42, 'Purio'),
(969, 338, 42, 'Oria Arriba'),
(970, 339, 43, 'Pocrí'),
(971, 340, 43, 'El Cañafístulo'),
(972, 341, 43, 'Lajamina'),
(973, 342, 43, 'Paraíso'),
(974, 343, 43, 'Paritilla'),
(975, 344, 44, 'Tonosí'),
(976, 345, 44, 'Altos de Güera'),
(977, 346, 44, 'Cañas'),
(978, 347, 44, 'El Bebedero'),
(979, 348, 44, 'El Cacao'),
(980, 349, 44, 'El Cortezo'),
(981, 350, 44, 'Flores'),
(982, 351, 44, 'Guánico'),
(983, 352, 44, 'Tronosa'),
(984, 353, 44, 'Cambutal'),
(985, 354, 44, 'Isla de Cañas'),
(986, 355, 45, 'San Miguel'),
(987, 356, 45, 'La Ensenada'),
(988, 357, 45, 'La Esmeralda'),
(989, 358, 45, 'La Guinea'),
(990, 359, 45, 'Pedro González'),
(991, 360, 45, 'Saboga'),
(992, 361, 46, 'Chepo'),
(993, 362, 46, 'Cañita'),
(994, 363, 46, 'Chepillo'),
(995, 364, 46, 'El Llano'),
(996, 365, 46, 'Las Margaritas'),
(997, 366, 46, 'Santa Cruz de Chinina'),
(998, 367, 46, 'Comarca Kuna de Madungandí'),
(999, 368, 46, 'Tortí'),
(1000, 369, 47, 'Chimán'),
(1001, 370, 47, 'Brujas'),
(1002, 371, 47, 'Gonzalo Vásquez'),
(1003, 372, 47, 'Pásiga'),
(1004, 373, 47, 'Unión Santeña'),
(1005, 374, 48, 'San Felipe'),
(1006, 375, 48, 'El Chorrillo'),
(1007, 376, 48, 'Santa Ana'),
(1008, 377, 48, 'La Exposición o Calidonia'),
(1009, 378, 48, 'Curundú'),
(1010, 379, 48, 'Betania'),
(1011, 380, 48, 'Bella Vista'),
(1012, 381, 48, 'Pueblo Nuevo'),
(1013, 382, 48, 'San Francisco'),
(1014, 383, 48, 'Parque Lefevre'),
(1015, 384, 48, 'Río Abajo'),
(1016, 385, 48, 'Juan Díaz'),
(1017, 386, 48, 'Pedregal'),
(1018, 387, 48, 'Ancón'),
(1019, 388, 48, 'Chilibre'),
(1020, 389, 48, 'Las Cumbres'),
(1021, 390, 48, 'Pacora'),
(1022, 391, 48, 'San Martín'),
(1023, 392, 48, 'Tocumen'),
(1024, 393, 48, 'Las Mañanitas'),
(1025, 394, 48, '24 de diciembre'),
(1026, 395, 48, 'Alcalde Díaz'),
(1027, 396, 48, 'Ernesto Córdoba Campos'),
(1028, 397, 49, 'Amelia Denis de Icaza'),
(1029, 398, 49, 'Belisario Porras'),
(1030, 399, 49, 'José Domingo Espinar'),
(1031, 400, 49, 'Mateo Iturralde'),
(1032, 401, 49, 'Victoriano Lorenzo'),
(1033, 402, 49, 'Arnulfo Arias'),
(1034, 403, 49, 'Belisario Frías'),
(1035, 404, 49, 'Omar Torrijos'),
(1036, 405, 49, 'Rufina Alfaro'),
(1037, 406, 50, 'Taboga'),
(1038, 407, 50, 'Otoque Oriente'),
(1039, 408, 50, 'Otoque Occidente'),
(1040, 409, 51, 'Arraiján'),
(1041, 410, 51, 'Juan Demóstenes Arosemena'),
(1042, 411, 51, 'Nuevo Emperador'),
(1043, 412, 51, 'Santa Clara'),
(1044, 413, 51, 'Veracruz'),
(1045, 414, 51, 'Vista Alegre'),
(1046, 415, 51, 'Burunga'),
(1047, 416, 51, 'Cerro Silvestre'),
(1048, 417, 52, 'Capira'),
(1049, 418, 52, 'Caimito'),
(1050, 419, 52, 'Campana'),
(1051, 420, 52, 'Cermeño'),
(1052, 421, 52, 'Cirí de los Sotos'),
(1053, 422, 52, 'Cirí Grande'),
(1054, 423, 52, 'El Cacao'),
(1055, 424, 52, 'La Trinidad'),
(1056, 425, 52, 'Las Ollas Arriba'),
(1057, 426, 52, 'Lídice'),
(1058, 427, 52, 'Villa Carmen'),
(1059, 428, 52, 'Villa Rosario'),
(1060, 429, 52, 'Santa Rosa'),
(1061, 430, 53, 'Chame'),
(1062, 431, 53, 'Bejuco'),
(1063, 432, 53, 'Buenos Aires'),
(1064, 433, 53, 'Cabuya'),
(1065, 434, 53, 'Chicá'),
(1066, 435, 53, 'El Líbano'),
(1067, 436, 53, 'Las Lajas'),
(1068, 437, 53, 'Nueva Gorgona'),
(1069, 438, 53, 'Punta Chame'),
(1070, 439, 53, 'Sajalices'),
(1071, 440, 53, 'Sorá'),
(1072, 441, 54, 'Barrio Balboa'),
(1073, 442, 54, 'Barrio Colón'),
(1074, 443, 54, 'Amador'),
(1075, 444, 54, 'Arosemena'),
(1076, 445, 54, 'El Arado'),
(1077, 446, 54, 'El Coco'),
(1078, 447, 54, 'Feuillet'),
(1079, 448, 54, 'Guadalupe'),
(1080, 449, 54, 'Herrera'),
(1081, 450, 54, 'Hurtado'),
(1082, 451, 54, 'Iturralde'),
(1083, 452, 54, 'La Represa'),
(1084, 453, 54, 'Los Díaz'),
(1085, 454, 54, 'Mendoza'),
(1086, 455, 54, 'Obaldía'),
(1087, 456, 54, 'Playa Leona'),
(1088, 457, 54, 'Puerto Caimito'),
(1089, 458, 54, 'Santa Rita'),
(1090, 459, 55, 'San Carlos'),
(1091, 460, 55, 'El Espino'),
(1092, 461, 55, 'El Higo'),
(1093, 462, 55, 'Guayabito'),
(1094, 463, 55, 'La Ermita'),
(1095, 464, 55, 'La Laguna'),
(1096, 465, 55, 'Las Uvas'),
(1097, 466, 55, 'Los Llanitos'),
(1098, 467, 55, 'San José'),
(1099, 468, 56, 'Atalaya'),
(1100, 469, 56, 'El Barrito'),
(1101, 470, 56, 'La Montañuela'),
(1102, 471, 56, 'La Carrillo'),
(1103, 472, 56, 'San Antonio'),
(1104, 473, 57, 'Calobre'),
(1105, 474, 57, 'Barnizal'),
(1106, 475, 57, 'Chitra'),
(1107, 476, 57, 'El Cocla'),
(1108, 477, 57, 'El Potrero'),
(1109, 478, 57, 'La Laguna'),
(1110, 479, 57, 'La Raya de Calobre'),
(1111, 480, 57, 'La Tetilla'),
(1112, 481, 57, 'La Yeguada'),
(1113, 482, 57, 'Las Guías'),
(1114, 483, 57, 'Monjarás'),
(1115, 484, 57, 'San José'),
(1116, 485, 58, 'Cañazas'),
(1117, 486, 58, 'Cerro de Plata'),
(1118, 487, 58, 'El Picador'),
(1119, 488, 58, 'Los Valles'),
(1120, 489, 58, 'San José'),
(1121, 490, 58, 'San Marcelo'),
(1122, 491, 58, 'El Aromillo'),
(1123, 492, 58, 'Las Cruces'),
(1124, 493, 59, 'La Mesa'),
(1125, 494, 59, 'Bisvalles'),
(1126, 495, 59, 'Boró'),
(1127, 496, 59, 'Llano Grande'),
(1128, 497, 59, 'San Bartolo'),
(1129, 498, 59, 'Los Milagros'),
(1130, 499, 60, 'Las Palmas'),
(1131, 500, 60, 'Cerro de Casa'),
(1132, 501, 60, 'Corozal'),
(1133, 502, 60, 'El María'),
(1134, 503, 60, 'El Prado'),
(1135, 504, 60, 'El Rincón'),
(1136, 505, 60, 'Lolá'),
(1137, 506, 60, 'Pixvae'),
(1138, 507, 60, 'Puerto Vidal'),
(1139, 508, 60, 'San Martín de Porres'),
(1140, 509, 60, 'Viguí'),
(1141, 510, 60, 'Zapotillo'),
(1142, 511, 61, 'Montijo'),
(1143, 512, 61, 'Gobernadora'),
(1144, 513, 61, 'La Garceana'),
(1145, 514, 61, 'Leones'),
(1146, 515, 61, 'Pilón'),
(1147, 516, 61, 'Cébaco'),
(1148, 517, 61, 'Costa Hermosa'),
(1149, 518, 61, 'Unión del Norte'),
(1150, 519, 62, 'Río de Jesús'),
(1151, 520, 62, 'Las Huacas'),
(1152, 521, 62, 'Los Castillos'),
(1153, 522, 62, 'Utira'),
(1154, 523, 62, 'Catorce de Noviembre'),
(1155, 524, 63, 'San Francisco'),
(1156, 525, 63, 'Corral Falso'),
(1157, 526, 63, 'Los Hatillos'),
(1158, 527, 63, 'Remance'),
(1159, 528, 63, 'San Juan'),
(1160, 529, 63, 'San José'),
(1161, 530, 64, 'Santa Fé'),
(1162, 531, 64, 'Calovébora'),
(1163, 532, 64, 'El Alto'),
(1164, 533, 64, 'El Cuay'),
(1165, 534, 64, 'El Pantano'),
(1166, 535, 64, 'Gatú o Gatucito'),
(1167, 536, 64, 'Río Luis'),
(1168, 537, 64, 'Rubén Cantú'),
(1169, 538, 65, 'Santiago'),
(1170, 539, 65, 'La Colorada'),
(1171, 540, 65, 'La Peña'),
(1172, 541, 65, 'La Raya de Santa María'),
(1173, 542, 65, 'Ponuga'),
(1174, 543, 65, 'San Pedro del Espino'),
(1175, 544, 65, 'Canto del Llano'),
(1176, 545, 65, 'Los Algarrobos'),
(1177, 546, 65, 'Carlos Santana Ávila'),
(1178, 547, 65, 'Edwin Fábrega'),
(1179, 548, 65, 'San Martín de Porres'),
(1180, 549, 65, 'Urracá'),
(1181, 550, 66, 'Soná'),
(1182, 551, 66, 'Bahía Honda'),
(1183, 552, 66, 'Calidonia'),
(1184, 553, 66, 'Cativé'),
(1185, 554, 66, 'El Marañón'),
(1186, 555, 66, 'Guarumal'),
(1187, 556, 66, 'La Soledad'),
(1188, 557, 66, 'Quebrada de Oro'),
(1189, 558, 66, 'Río Grande'),
(1190, 559, 66, 'Rodeo Viejo'),
(1191, 560, 67, 'Llano de Catival o Mariato (Cabec)'),
(1192, 561, 67, 'Arenas'),
(1193, 562, 67, 'El Cacao'),
(1194, 563, 67, 'Quebro'),
(1195, 564, 67, 'Tebario'),
(1196, 565, 68, 'Narganá'),
(1197, 566, 68, 'Ailigandí'),
(1198, 567, 68, 'Puerto Obaldía'),
(1199, 568, 68, 'Tubualá'),
(1200, 569, 69, 'Cirilo Guainora'),
(1201, 570, 69, 'Lajas Blancas'),
(1202, 571, 69, 'Manuel Ortega'),
(1203, 572, 70, 'Río Sábalo'),
(1204, 573, 70, 'Jingurudó'),
(1205, 574, 71, 'Soloy'),
(1206, 575, 71, 'Boca de Balsa'),
(1207, 576, 71, 'Camarón Arriba'),
(1208, 577, 71, 'Cerro Banco'),
(1209, 578, 71, 'Cerro de Patena'),
(1210, 579, 71, 'Emplanada de Chorcha'),
(1211, 580, 71, 'Nämnoni'),
(1212, 581, 71, 'Niba'),
(1213, 582, 72, 'Hato Pilón'),
(1214, 583, 72, 'Cascabel'),
(1215, 584, 72, 'Hato Corotú'),
(1216, 585, 72, 'Hato Culantro'),
(1217, 586, 72, 'Hato Jobo'),
(1218, 587, 72, 'Hato Julí'),
(1219, 588, 72, 'Quebrada de Loro'),
(1220, 589, 72, 'Salto Dupí'),
(1221, 590, 73, 'Chichica'),
(1222, 591, 73, 'Alto Caballero'),
(1223, 592, 73, 'Bakama'),
(1224, 593, 73, 'Cerro Caña'),
(1225, 594, 73, 'Cerro Puerco'),
(1226, 595, 73, 'Krüa'),
(1227, 596, 73, 'Maraca'),
(1228, 597, 73, 'Nibra'),
(1229, 598, 73, 'Peña Blanca'),
(1230, 599, 73, 'Roka'),
(1231, 600, 73, 'Sitio Prado'),
(1232, 601, 73, 'Umani'),
(1233, 602, 74, 'Cerro Iglesias'),
(1234, 603, 74, 'Hato Chamí'),
(1235, 604, 74, 'Jädaberi'),
(1236, 605, 74, 'Lajero'),
(1237, 606, 74, 'Susama'),
(1238, 607, 75, 'Buenos Aires'),
(1239, 608, 75, 'Agua de Salud'),
(1240, 609, 75, 'Alto de Jesús'),
(1241, 610, 75, 'Cerro Pelado'),
(1242, 611, 75, 'El Bale'),
(1243, 612, 75, 'El Paredón'),
(1244, 613, 75, 'El Piro'),
(1245, 614, 75, 'Guayabito'),
(1246, 615, 75, 'Güibale'),
(1247, 616, 76, 'Bisira'),
(1248, 617, 76, 'Bürí'),
(1249, 618, 76, 'Guariviara'),
(1250, 619, 76, 'Guoroni'),
(1251, 620, 76, 'Kankintú'),
(1252, 621, 76, 'Mününi'),
(1253, 622, 76, 'Piedra Roja'),
(1254, 623, 76, 'Tuwai'),
(1255, 624, 76, 'Man Creek'),
(1256, 625, 77, 'Kusapín'),
(1257, 626, 77, 'Bahía Azul'),
(1258, 627, 77, 'Calovébora o Santa Catalina'),
(1259, 628, 77, 'Loma Yuca'),
(1260, 629, 77, 'Río Chiriquí'),
(1261, 630, 77, 'Tobobe'),
(1262, 631, 77, 'Valle Bonito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_distritos`
--

CREATE TABLE `t_distritos` (
  `id` int(11) NOT NULL,
  `cod_dist` smallint(6) DEFAULT NULL,
  `id_provincia` int(11) NOT NULL,
  `desc_dist` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_distritos`
--

INSERT INTO `t_distritos` (`id`, `cod_dist`, `id_provincia`, `desc_dist`) VALUES
(1, 1, 1, 'Bocas del Toro'),
(2, 2, 1, 'Changuinola'),
(3, 3, 1, 'Chiriquí Grande'),
(4, 4, 2, 'Aguadulce'),
(5, 5, 2, 'Antón'),
(6, 6, 2, 'La Pintada'),
(7, 7, 2, 'Natá'),
(8, 8, 2, 'Olá'),
(9, 9, 2, 'Penonomé'),
(10, 10, 3, 'Colón'),
(11, 11, 3, 'Chagres'),
(12, 12, 3, 'Donoso'),
(13, 13, 3, 'Portobelo'),
(14, 14, 3, 'Santa Isabel'),
(15, 15, 4, 'undefined'),
(16, 16, 4, 'Alanje'),
(17, 17, 4, 'Barú'),
(18, 18, 4, 'Boquerón'),
(19, 19, 4, 'Boquete'),
(20, 20, 4, 'Bugaba'),
(21, 21, 4, 'David'),
(22, 22, 4, 'Dolega'),
(23, 23, 4, 'Gualaca'),
(24, 24, 4, 'Remedios'),
(25, 25, 4, 'Renacimiento'),
(26, 26, 4, 'San Félix'),
(27, 27, 4, 'San Lorenzo'),
(28, 28, 4, 'Tolé'),
(29, 29, 5, 'Chepigana'),
(30, 30, 5, 'Pinogana'),
(31, 31, 6, 'Chitré'),
(32, 32, 6, 'Las Minas'),
(33, 33, 6, 'Los Pozos'),
(34, 34, 6, 'Ocú'),
(35, 35, 6, 'Parita'),
(36, 36, 6, 'Pesé'),
(37, 37, 6, 'Santa María'),
(38, 38, 7, 'Guararé'),
(39, 39, 7, 'Las Tablas'),
(40, 40, 7, 'Los Santos'),
(41, 41, 7, 'Macaracas'),
(42, 42, 7, 'Pedasí'),
(43, 43, 7, 'Pocrí'),
(44, 44, 7, 'Tonosí'),
(45, 45, 8, 'Balboa'),
(46, 46, 8, 'Chepo'),
(47, 47, 8, 'Chimán'),
(48, 48, 8, 'Panamá'),
(49, 49, 8, 'San Miguelito'),
(50, 50, 8, 'Taboga'),
(51, 51, 9, 'Arraiján'),
(52, 52, 9, 'Capira'),
(53, 53, 9, 'Chame'),
(54, 54, 9, 'La Chorrera'),
(55, 55, 9, 'San Carlos'),
(56, 56, 10, 'Atalaya'),
(57, 57, 10, 'Calobre'),
(58, 58, 10, 'Cañazas'),
(59, 59, 10, 'La Mesa'),
(60, 60, 10, 'Las Palmas'),
(61, 61, 10, 'Montijo'),
(62, 62, 10, 'Río de Jesús'),
(63, 63, 10, 'San Francisco'),
(64, 64, 10, 'Santa Fé'),
(65, 65, 10, 'Santiago'),
(66, 66, 10, 'Soná'),
(67, 67, 10, 'Mariato'),
(68, 68, 11, 'Comarca Kuna Yala'),
(69, 69, 12, 'Cémaco'),
(70, 70, 12, 'Sambú'),
(71, 71, 13, 'Besiko'),
(72, 72, 13, 'Mironó'),
(73, 73, 13, 'Müna'),
(74, 74, 13, 'Nole Duima'),
(75, 75, 13, 'Ñürüm'),
(76, 76, 13, 'Kankintú'),
(77, 77, 13, 'Kusapín');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_hoja_especialista`
--

CREATE TABLE `t_hoja_especialista` (
  `id` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `dt_atencion` datetime NOT NULL,
  `nombre_profecional` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar_atencion` int(11) NOT NULL,
  `h_contratadas` int(11) NOT NULL,
  `h_trabajadas` int(11) NOT NULL,
  `h_administrativas` int(11) NOT NULL,
  `num_vacaciones` int(11) NOT NULL,
  `num_licencias` int(11) NOT NULL,
  `num_permiso` int(11) NOT NULL,
  `num_incapacidad` int(11) NOT NULL,
  `num_fortuitas` int(11) NOT NULL,
  `carga_laboral` int(11) NOT NULL,
  `cupo_utilizado` int(11) NOT NULL,
  `cupo_disponible` int(11) NOT NULL,
  `cupo_ausente` int(11) NOT NULL,
  `cupo_no_solicitado` int(11) NOT NULL,
  `dt_creacion` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_hoja_especialista`
--

INSERT INTO `t_hoja_especialista` (`id`, `id_unidad`, `id_servicio`, `dt_atencion`, `nombre_profecional`, `lugar_atencion`, `h_contratadas`, `h_trabajadas`, `h_administrativas`, `num_vacaciones`, `num_licencias`, `num_permiso`, `num_incapacidad`, `num_fortuitas`, `carga_laboral`, `cupo_utilizado`, `cupo_disponible`, `cupo_ausente`, `cupo_no_solicitado`, `dt_creacion`, `id_usuario`, `estado`) VALUES
(1, 73, 1, '2022-07-05 00:00:00', 'Especialista de Prueba', 1, 5, 3, 2, 2, 1, 2, 1, 1, 1, 1, 1, 1, 1, '2022-07-06 13:43:57', 19, 1),
(2, 69, 7, '2022-06-29 00:00:00', 'Nombre Especialista1', 2, 8, 5, 7, 5, 2, 2, 1, 1, 1, 1, 1, 1, 1, '2022-07-06 18:05:50', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_provincias`
--

CREATE TABLE `t_provincias` (
  `id` int(11) NOT NULL,
  `cod_prov` smallint(6) DEFAULT NULL,
  `desc_prov` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_provincias`
--

INSERT INTO `t_provincias` (`id`, `cod_prov`, `desc_prov`, `estado`) VALUES
(1, 1, 'BOCAS DEL TORO', 1),
(2, 2, 'COCLÉ', 1),
(3, 3, 'COLÓN', 1),
(4, 4, 'CHIRIQUÍ', 1),
(5, 5, 'DARIÉN', 1),
(6, 6, 'HERRERA', 1),
(7, 7, 'LOS SANTOS', 1),
(8, 8, 'PANAMÁ', 1),
(9, 9, 'PANAMÁ OESTE', 1),
(10, 10, 'VERAGUAS', 1),
(11, 11, 'COMARCA KUNA YALA', 1),
(12, 12, 'COMARCA EMBERÁ', 1),
(13, 13, 'COMARCA NGÄBE BUGLÉ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_ref_empresas`
--

CREATE TABLE `t_ref_empresas` (
  `id` int(11) NOT NULL,
  `ref_empresa` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_ref_empresas`
--

INSERT INTO `t_ref_empresas` (`id`, `ref_empresa`) VALUES
(2, 'Empresa de Seguimiento'),
(1, 'Empresa Nueva'),
(3, 'Instalaciones CSS'),
(4, 'Otras Empresas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_reg_actividades`
--

CREATE TABLE `t_reg_actividades` (
  `id` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `dt_visita` datetime NOT NULL,
  `htrabajadas` int(11) NOT NULL,
  `nombre_profecional` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_empresa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_patronal` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_actividad_economica` int(11) NOT NULL,
  `id_referencia` int(11) NOT NULL,
  `num_empleados` int(11) NOT NULL,
  `num_hombres` int(11) NOT NULL,
  `num_mujeres` int(11) NOT NULL,
  `num_beneficiados` int(11) NOT NULL,
  `id_corregimiento` int(11) NOT NULL,
  `json_actividades` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `dt_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_reg_atenciones`
--

CREATE TABLE `t_reg_atenciones` (
  `id` int(11) NOT NULL,
  `id_hoja_especialista` int(11) NOT NULL,
  `id_sexo` int(11) NOT NULL,
  `num_cedula` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `nombre_empresa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_patronal` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tipo_empresa` int(11) NOT NULL,
  `id_actividad_economica` int(11) NOT NULL,
  `id_tamano_empresa` int(11) NOT NULL,
  `id_tipo_asegurado` int(11) NOT NULL,
  `id_tipo_atencion` int(11) NOT NULL,
  `id_tipo_consulta` int(11) NOT NULL,
  `id_corregimiento` int(11) NOT NULL,
  `incapacidad` int(11) NOT NULL,
  `dias_incapacidad` int(11) DEFAULT NULL,
  `id_referencia` int(11) NOT NULL,
  `json_diagnosticos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `json_referencias` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `id_alta_laboral` int(11) NOT NULL,
  `dt_registro` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_reg_atenciones`
--

INSERT INTO `t_reg_atenciones` (`id`, `id_hoja_especialista`, `id_sexo`, `num_cedula`, `edad`, `nombre_empresa`, `num_patronal`, `id_tipo_empresa`, `id_actividad_economica`, `id_tamano_empresa`, `id_tipo_asegurado`, `id_tipo_atencion`, `id_tipo_consulta`, `id_corregimiento`, `incapacidad`, `dias_incapacidad`, `id_referencia`, `json_diagnosticos`, `json_referencias`, `id_alta_laboral`, `dt_registro`, `id_usuario`, `estado`) VALUES
(1, 2, 1, '1234567', 34, 'Empresa bruja 1', 'ABC-123', 1, 6, 3, 1, 1, 4, 661, 1, 3, 3, '[{\"diagnostico\":\"Diagnostico 1\",\"codigo\":\"CODD1\"},{\"diagnostico\":\"Diagnostico 12\",\"codigo\":\"CODD12\"}]', '[{\"especialidad\":\"Servicio 1\",\"codigo\":\"SRV1\"},{\"especialidad\":\"Servicio 5\",\"codigo\":\"SRV5\"}]', 1, '2022-07-06', 1, 1),
(2, 2, 1, '2-725-927', 32, 'Don Andres', '123-456', 1, 1, 1, 1, 1, 4, 672, 1, 1, 2, '[{\"diagnostico\":\"Diagnostico 1\",\"codigo\":\"cod_dia_1\"},{\"diagnostico\":\"Diagnostico 2\",\"codigo\":\"cod_dia_2\"}]', '[{\"especialidad\":\"Especialidad 1\",\"codigo\":\"esp1\"},{\"especialidad\":\"Especialidad 2\",\"codigo\":\"esp2\"}]', 1, '2022-07-06', 1, 1),
(3, 2, 1, '2-725-927', 32, 'Don Andres', '123-456', 1, 1, 1, 1, 1, 4, 672, 1, 1, 2, '[{\"diagnostico\":\"Diagnostico 1\",\"codigo\":\"cod_dia_1\"},{\"diagnostico\":\"Diagnostico 2\",\"codigo\":\"cod_dia_2\"}]', '[{\"especialidad\":\"Especialidad 1\",\"codigo\":\"esp1\"},{\"especialidad\":\"Especialidad 2\",\"codigo\":\"esp2\"}]', 1, '2022-07-06', 1, 1),
(4, 2, 1, '1234', 5634, 'qsdgsd', 'aDADas', 1, 2, 1, 5, 3, 9, 1025, 1, 2, 1, '[{\"diagnostico\":\"zxcvxcz\",\"codigo\":\"erwer\"}]', '[{\"especialidad\":\"zxczx\",\"codigo\":\"vcbcvx\"}]', 1, '2022-07-06', 1, 1),
(5, 2, 1, '1234567', 34, 'Empresa bruja 1', '1234567', 3, 6, 3, 5, 3, 10, 1083, 1, 2, 1, '[{\"diagnostico\":\"hadkjas\",\"codigo\":\"COD1\"}]', '[{\"especialidad\":\"adsfsgfdg\",\"codigo\":\"sdfgjhj\"}]', 1, '2022-07-06', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_servicios`
--

CREATE TABLE `t_servicios` (
  `id` int(11) NOT NULL,
  `desctipcion` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_servicios`
--

INSERT INTO `t_servicios` (`id`, `desctipcion`, `estado`) VALUES
(1, 'Agricultura, Silvicultura, Caza y P', 1),
(2, 'Explotación de Minas y Canteras', 1),
(3, 'Industrias Manufactureras', 1),
(4, 'Construcción', 1),
(5, 'Electricidad, Gas, Agua y Servicios', 1),
(6, 'Comercio', 1),
(7, 'Transporte, Almacén y Comunicacione', 1),
(8, 'Servicios', 1),
(9, 'Odontologia', 1),
(10, 'Trabajo Social', 1),
(11, 'Quimico', 1),
(12, 'Tecnico', 1),
(13, 'Inspector', 1),
(14, 'Higienista', 1),
(15, 'Ingenieros', 1),
(16, 'Ergonomos', 1),
(17, 'Educadores', 1),
(18, 'Sociologos', 1),
(19, 'Administrativas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tamano_empresa`
--

CREATE TABLE `t_tamano_empresa` (
  `id` int(11) NOT NULL,
  `tamano_empresa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_tamano_empresa`
--

INSERT INTO `t_tamano_empresa` (`id`, `tamano_empresa`) VALUES
(4, 'Grande'),
(3, 'Mediana'),
(1, 'Micro'),
(2, 'Pequeña');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tipo_actividad`
--

CREATE TABLE `t_tipo_actividad` (
  `id` int(11) NOT NULL,
  `tipo_actividad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_tipo_actividad`
--

INSERT INTO `t_tipo_actividad` (`id`, `tipo_actividad`) VALUES
(1, 'Actividades Promocionales'),
(2, 'Actividades Preventivas'),
(3, 'Actividades Técnico Adminsitrativa'),
(4, 'Actividades Técnicas de Intervención');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tipo_asegurado`
--

CREATE TABLE `t_tipo_asegurado` (
  `id` int(11) NOT NULL,
  `tipo_asegurado` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_tipo_asegurado`
--

INSERT INTO `t_tipo_asegurado` (`id`, `tipo_asegurado`) VALUES
(1, 'Asegurado Directo'),
(5, 'Jubilados por ley Especial'),
(4, 'Pensionado por Invalidez'),
(3, 'Pensionado por Riesgo'),
(2, 'Pensionado por Vejez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tipo_atencion`
--

CREATE TABLE `t_tipo_atencion` (
  `id` int(11) NOT NULL,
  `tipo_atencion` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_tipo_atencion`
--

INSERT INTO `t_tipo_atencion` (`id`, `tipo_atencion`) VALUES
(1, 'Primera Vez'),
(3, 'Recaida'),
(2, 'Reconsulta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tipo_consulta`
--

CREATE TABLE `t_tipo_consulta` (
  `id` int(11) NOT NULL,
  `tipo_consulta` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_tipo_consulta`
--

INSERT INTO `t_tipo_consulta` (`id`, `tipo_consulta`) VALUES
(6, 'Accidente de Trabajo'),
(7, 'Accidente de Trayecto'),
(11, 'Analista de Puesto'),
(4, 'Control de Salud'),
(8, 'Enfermedad Profesional'),
(5, 'Enfermedades crónicas y degenerativas'),
(1, 'Morbilidad Común'),
(12, 'Otros'),
(9, 'Peritaje'),
(10, 'Preliminarista'),
(2, 'Riesgo Profesional'),
(3, 'Vigilancia de la Salud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tipo_empresa`
--

CREATE TABLE `t_tipo_empresa` (
  `id` int(11) NOT NULL,
  `tipo_empresa` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_tipo_empresa`
--

INSERT INTO `t_tipo_empresa` (`id`, `tipo_empresa`) VALUES
(4, 'ACP'),
(3, 'Caja de Seguro Social'),
(1, 'Privada'),
(2, 'Publica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tipo_referencias`
--

CREATE TABLE `t_tipo_referencias` (
  `id` int(11) NOT NULL,
  `tipo_referencia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_tipo_referencias`
--

INSERT INTO `t_tipo_referencias` (`id`, `tipo_referencia`) VALUES
(3, 'CONTRAREFERIDO'),
(1, 'NO REFERIDO'),
(2, 'REFERIDO'),
(4, 'REFERIDO A CMC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tipo_usuario`
--

CREATE TABLE `t_tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo_usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_tipo_usuario`
--

INSERT INTO `t_tipo_usuario` (`id`, `tipo_usuario`) VALUES
(1, 'Administrador de Sistema'),
(2, 'Captador de Datos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_unidades`
--

CREATE TABLE `t_unidades` (
  `id` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `desc_unidad_alterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_unidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `20latitud` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitud` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_unidades`
--

INSERT INTO `t_unidades` (`id`, `id_provincia`, `desc_unidad_alterno`, `desc_unidad`, `20latitud`, `longitud`, `estado`, `tipo`) VALUES
(1, 8, 'Centro Especializado de Toxicología', 'Centro Especializado de Toxicología', '8.956295', '-79.541686', 1, 'salud'),
(2, 8, 'Policlínica Especializada Presidente Remón', 'Policlínica Especializada de Calle 17', '8.956546', '-79.541530', 1, 'salud'),
(3, 8, 'Policlínica Especializada Manuel Ferrer Valdez', 'Policlínica Especializada de Calidonia', '8.962381', '-79.539256', 1, 'salud'),
(4, 8, 'Complejo Hospitalario Metropolitano Dr. Arnulfo Arias Madrid', 'Hospital general', '8.980846', '-79.535691', 1, 'salud'),
(5, 8, 'Complejo Hospitalario Metropolitano Dr. Arnulfo Arias Madrid', 'Consulta Externa Especializada', '8.980662', '-79.534698', 1, 'salud'),
(6, 8, 'Policlínica Especializada Dr. Carlos N. Brin', 'Policlínica Especializada de San Francisco', '8.997185', '-79.511221', 1, 'salud'),
(7, 8, 'Policlinica Especializada Don Alejandro de la Guardia', 'Policlinica Especializada de Bethania', '9.021664', '-79.525864', 1, 'salud'),
(8, 8, 'ULAPS de San Cristobal', 'ULAPS de San Cristobal', '9.028056', '-79.492178', 1, 'salud'),
(9, 8, 'Policlínica Especializada Dr. Manuel María Valdez', 'Policlínica de San Miguelito', '9.037875', '-79.495753', 1, 'salud'),
(10, 8, 'ULAPS Máximo Herrera', 'ULAPS del Hipodromo', '9.036982', '-79.467214', 1, 'salud'),
(11, 8, 'Policlínica Especializada Dr. J.J. Vallarino', 'Policlínica Especializada de Juan Díaz', '9.055207', '-79.434789', 1, 'salud'),
(12, 8, 'CAPPS de Plaza Tocumen', 'CAPPS de Plaza Tocumen', '9.060664', '-79.422784', 1, 'salud'),
(13, 8, 'CAPPS de Los Nogales', 'CAPPS de Los Nogales', '9.077122', '-79.411916', 1, 'salud'),
(14, 8, 'CAPPS de Pedregal', 'CAPPS de Pedregal', '9.063430', '-79.431989', 1, 'salud'),
(15, 8, 'CAPPS de Torrijos Carter', 'CAPPS de Torrijos Carter', '9.077475', '-79.491826', 1, 'salud'),
(16, 8, 'Policlínica Especializada Dr. Generoso Guardia', 'Policlínica de Santa Librada', '9.072028', '-79.505415', 1, 'salud'),
(17, 8, 'ULAPS Dr. Edilberto Culiolis', 'ULAPS de Las Cumbres', '9.079699', '-79.527307', 1, 'salud'),
(18, 8, 'Hospital Dra. Susana Jones Cano', 'Hospital San Judas Tadeo', '9.038630', '-79.482013', 1, 'salud'),
(19, 8, 'Hospital de Especialidades Pediátricas Omar Torrijos Herrera', 'Hospital de Especialidades Pediátricas', '9.000910', '-79.517411', 1, 'salud'),
(20, 8, 'Ciudad de la Salud', 'Ciudad de la Salud', '9.023860', '-79.578578', 1, 'salud'),
(21, 8, 'Hospital Docente de la 24 de diciembre', 'Hospital Docente de la 24 de diciembre', '9.094374', '-79.392794', 1, 'salud'),
(22, 9, 'Policlínica Especializada Dr. Blas Gomes Chetro', 'Policlínica Especializada de Arraijan', '8.592787', '-79.656036', 1, 'salud'),
(23, 9, 'ULAPS de Vista Alegre', 'ULAPS de Vista Alegre', '8.925285', '-79.698860', 1, 'salud'),
(24, 9, 'ULAPS del Tecal', 'ULAPS del Tecal', '8.909990', '-79.712397', 1, 'salud'),
(25, 9, 'Policlínica Especializada Dr. Santiago Barraza', 'Policlínica Especializada de La Chorrera', '8.890007', '-79.760640', 1, 'salud'),
(26, 9, 'ULAPS de Barrio Guadalupe', 'ULAPS de Barrio Guadalupe', '8.862604', '-79.810232', 1, 'salud'),
(27, 9, 'CAPPS de Capira', 'CAPPS de Capira', '8.754608', '-79.878158', 1, 'salud'),
(28, 9, 'ULAPS de San José', 'ULAPS de San José', '8.533564', '-79.925354', 1, 'salud'),
(29, 9, 'Policlínica Dr. Juan Vega Mendez', 'Policlínica de San Carlos', '8.473547', '-79.956835', 1, 'salud'),
(30, 8, 'Hospital Regional de Chepo', 'Hospital Regional de Chepo', '9.174872', '-79.089850', 1, 'salud'),
(31, 8, 'ULAPS de Cañitas', 'ULAPS de Cañitas', '9.221563', '-78.894512', 1, 'salud'),
(32, 4, 'Hospital Dr. Dionisio Arrocha', 'Hospital de Puerto Armuelles', '8.276555', '-82.860893', 1, 'salud'),
(33, 4, 'CAPPS Finca Corredor', 'CAPPS Finca Corredor', '8.345289', '-82.874400', 1, 'salud'),
(34, 4, 'CAPPS Finca Malagueto', 'CAPPS Finca Malagueto', '8.349109', '-82.820322', 1, 'salud'),
(35, 4, 'CAPPS Finca Lechoza', 'CAPPS Finca Lechoza', '8.375309', '-82.832410', 1, 'salud'),
(36, 4, 'CAPPS Finca Jobito', 'CAPPS Finca Jobito', '8.379999', '-82.854439', 1, 'salud'),
(37, 4, 'CAPPS Finca Blanco', 'CAPPS Finca Blanco', '8.383006', '-82.874720', 1, 'salud'),
(38, 4, 'CAPPS Finca Zapatero', 'CAPPS Finca Zapatero', '8.396097', '-82.890150', 1, 'salud'),
(39, 4, 'CAPPS Finca Burica', 'CAPPS Finca Burica', '8.392211', '-82.912283', 1, 'salud'),
(40, 4, 'CAPPS Finca Zapote', 'CAPPS Finca Zapote', '8.404397', '-82.863363', 1, 'salud'),
(41, 4, 'CAPPS Finca Balsa', 'CAPPS Finca Balsa', '8.427575', '-82.895812', 1, 'salud'),
(42, 4, 'Policlínica de Divalá', 'Policlínica de Divalá', '8.411242', '-82.712972', 1, 'salud'),
(43, 4, 'Policlínica Dr. Pablo Espinosa Batista', 'Policlínica de Bugaba', '8.520514', '-82.637823', 1, 'salud'),
(44, 4, 'Hospital Regional Dr. Rafael Hernandez', 'Hospital Regional de David', '8.431493', '-82.452748', 1, 'salud'),
(45, 4, 'Policlínica Especializada Dr. Gustavo A. Ros', 'Policlínica Especializada de David', '8.433395', '-82.428562', 1, 'salud'),
(46, 4, 'ULAPS de Nuevo Vedado', 'ULAPS de Nuevo Vedado', '8.431888', '-82.429216', 1, 'salud'),
(47, 4, 'CAPPS de Volcán', 'CAPPS de Volcán', '8.778117', '-82.641671', 1, 'salud'),
(48, 4, 'Policlínica Especializada Dr. Ernesto Perez Balladares', 'Policlínica Especializada de Boquete', '8.776508', '-82.431286', 1, 'salud'),
(49, 4, 'ULAPS de Dolega', 'ULAPS de Dolega', '8.558765', '-82.412054', 1, 'salud'),
(50, 1, 'Policlínica de Guabito', 'Policlínica de Guabito', '9.495775', '-82.608514', 1, 'salud'),
(51, 1, 'ULAPS de Las Tablas', 'ULAPS de Las Tablas', '9.546773', '-82.738769', 1, 'salud'),
(52, 1, 'Hospital de Changuinola', 'Hospital de Changuinola', '9.447852', '-82.516477', 1, 'salud'),
(53, 1, 'Hospital de Almirante', 'Hospital de Almirante', '9.289311', '-82.399085', 1, 'salud'),
(54, 1, 'Hospital de Chiriquí Grande', 'Hospital de Chiriquí Grande', '8.928263', '-82.181695', 1, 'salud'),
(55, 10, 'CAPPS de Zapotillo', 'CAPPS de Zapotillo', '8.001887', '-81.516979', 1, 'salud'),
(56, 10, 'Hospital Dr. Ezequiel Abadía', 'Hospital Dr. Ezequiel Abadía', '8.015025', '-81.317563', 1, 'salud'),
(57, 10, 'Policlínica Especializada Dr. Horacio Díaz Gomez', 'Policlínica Especializada Dr. Horacio Díaz Gomez', '8.107998', '-80.980555', 1, 'salud'),
(58, 10, 'Cordinación Administrativa de Veraguas', 'Cordinación Administrativa de Veraguas', '8.098175', '-80.980619', 1, 'salud'),
(59, 6, 'Almacén de Medicamentos de Divisa', 'Almacén de Medicamentos de Divisa', '8.130609', '-80.687178', 1, 'salud'),
(60, 6, 'CAPPS de Santa María', 'CAPPS de Santa María', '8.113626', '-80.667611', 1, 'salud'),
(61, 6, 'CAPPS de Ocú', 'CAPPS de Ocú', '7.947714', '-80.778331', 1, 'salud'),
(62, 6, 'CAPPS de Pesé', 'CAPPS de Pesé', '7.909140', '-80.611832', 1, 'salud'),
(63, 6, 'Hospital Dr. Nelson Collado', 'Almacén de Medicamentos de Divisa', '7.975208', '-80.420794', 1, 'salud'),
(64, 6, 'Policlínica Especializada Dr. Roberto Ramirez de Diego', 'Policlínica Especializada de Chitré', '7.958060', '-80.427901', 1, 'salud'),
(65, 7, 'Policlínica Especializada San Juan de Dios', 'Policlínica de Los Santos', '7.940372', '-80.412065', 1, 'salud'),
(66, 7, 'ULAPS de Guararé', 'ULAPS de Guararé', '7.819143', '-80.279732', 1, 'salud'),
(67, 7, 'Policlinica Especializada Dr. Miguel Cardenas Barahona', 'Policlinica Especializada de Las Tablas', '7.786239', '-80.270240', 1, 'salud'),
(68, 7, 'ULAPS de Tonosí', 'ULAPS de Tonosí', '7.407809', '-80.441519', 1, 'salud'),
(69, 2, 'Hospital Regional Dr. Rafael Esteves', 'Hospital Regional de Aguadulce', '8.243572', '-80.557526', 1, 'salud'),
(70, 2, 'Policlínica Especializada Dr.Manuel de Jesús Rojas', 'Policlínica de Aguadulce', '8.246106', '-80.542002', 1, 'salud'),
(71, 2, 'Policlínica San Juan de Dios', 'Policlínica de Nata', '8.341971', '-80.521693', 1, 'salud'),
(72, 2, 'Policlínica Especializada Dr. Manuel Paulino Ocaña', 'Policlínica de Penonomé', '8.513703', '-80.352371', 1, 'salud'),
(73, 2, 'CAPPS de La Pintada', 'CAPPS de La Pintada', '8.596820', '-80.447600', 1, 'salud'),
(74, 3, 'Policlínica de Nuevo San Juan', 'Policlínica de Nuevo San Juan', '9.249507', '-79.655121', 1, 'salud'),
(75, 3, 'Policlínica Especializada de Sabanitas', 'Policlínica Especializada de Sabanitas', '9.347494', '-79.807591', 1, 'salud'),
(76, 3, 'Policlínica Especializada Dr. Hugo Spadafora', 'Policlínica Especializada Colón o Coco Solo', '9.351078', '-79.859294', 1, 'salud'),
(77, 3, 'Complejo Hospitalario Dr. Manuel Amador Guerrero', 'Complejo Hospitalario Dr. Manuel Amador Guerrero', '9.357499', '-79.893307', 1, 'salud'),
(78, 8, 'Hospital Hogar de La Esperanza', 'Hospital Hogar de La Esperanza', '8.888837', '-79.626889', 1, 'salud'),
(79, 7, 'CAPPS Pedasí', 'CAPPS Pedasí', '7.537359', '-80.026088', 1, 'salud'),
(80, 7, 'CAPPS Guararé', 'CAPPS Guararé', '7.823039', '-80.279930', 1, 'salud'),
(81, 7, 'CAPPS Macaracas', 'CAPPS Macaracas', '7.735053', '-80.551288', 1, 'salud'),
(82, 6, 'CAPPS de Los Pozos', 'CAPPS de Los Pozos', '7.792491', '-80.644640', 1, 'salud'),
(83, 4, 'CAPPS del Barú', 'CAPPS del Barú', '8.317671', '-82.863965', 1, 'salud'),
(84, 3, 'ULAPS Portobelo', 'ULAPS Portobelo', '9.553455', '-79.652300', 1, 'salud'),
(85, 8, 'Nuevo', 'Nuevo Centro', '89.011234', '-9.235687', 1, 'agencia'),
(86, 8, 'Salud', 'DENSYPS', '9.007397', '-79.565707', 1, 'salud'),
(87, 8, 'Atencion al Asegurado', 'Call Center', '9.007397', '-79.565707', 1, 'salud'),
(88, 8, 'Agencia Administrativa de Plaza Concordia', 'Agencia Administrativa de Plaza Concordia', '8.984580', '-79.525976', 1, 'agencia'),
(89, 8, 'Agencia Administrativa de San Francisco', 'Agencia Administrativa de San Francisco', '8.992347', '-79.500552', 1, 'agencia'),
(90, 8, 'Agencia Administrativa de El Dorado', 'Agencia Administrativa de El Dorado', '9.005873', '-79.532646', 1, 'agencia'),
(91, 8, 'Edificio Bolivar', 'Edificio Bolivar', '9.014969', '-79.517224', 1, 'admin'),
(92, 8, 'Agencia Administrativa de Parque Lefevre', 'Agencia Administrativa de Parque Lefevre', '9.026844', '-79.482884', 1, 'agencia'),
(93, 8, 'Agencia Administrativa de Los Pueblos', 'Agencia Administrativa de Los Pueblos', '9.045565', '-79.451209', 1, 'agencia'),
(94, 8, 'Agencia Administrativa de La Dona', 'Agencia Administrativa de La Dona', '9.104835', '-79.371114', 1, 'agencia'),
(95, 8, 'Agencia Administrativa de San Miguelito', 'Agencia Administrativa de San Miguelito', '9.055152', '-79.508025', 1, 'agencia'),
(96, 8, 'Edificio Administrativo Clayton 520', 'Edificio Administrativo Clayton 520', '9.006418', '-79.566572', 1, 'admin'),
(97, 8, 'Edificio Administrativo Clayton 519', 'Edificio Administrativo Clayton 519', '9.007080', '-79.565751', 1, 'admin'),
(98, 9, 'Agencia Administrativa de Arraijan', 'Agencia Administrativa de Arraijan', '8.926199', '-79.708613', 1, 'agencia'),
(99, 9, 'Cordinacion Administrativa de Panama Oeste', 'Cordinacion Administrativa de Panama Oeste', '8.882959', '-79.777304', 1, 'admin'),
(100, 9, 'Agencia Administrativa de San Carlos', 'Agencia Administrativa de San Carlos', '8.473174', '-79.957933', 1, 'agencia'),
(101, 8, 'Agencia Administrativa de Chepo', 'Agencia Administrativa de Chepo', '9.173834', '-79.091033', 1, 'agencia'),
(102, 4, 'Agencia Administrativa de Puerto Armuelles', 'Agencia Administrativa de Puerto Armuelles', '8.283872', '-82.857416', 1, 'agencia'),
(103, 4, 'Agencia Administrativa de Bugaba', 'Agencia Administrativa de Bugaba', '8.517100', '-82.613715', 1, 'agencia'),
(104, 4, 'Agencia Administrativa de David', 'Agencia Administrativa de David', '8.430045', '-82.454027', 1, 'agencia'),
(105, 4, 'Agencia Administrativa de Volcan', 'Agencia Administrativa de Volcan', '8.778298', '-82.641857', 1, 'agencia'),
(106, 4, 'Cordinacion Administrativa de Chiriqui', 'Cordinacion Administrativa de Chiriqui', '8.433757', '-82.461216', 1, 'admin'),
(107, 4, 'Agencia Administrativa de Boquete', 'Agencia Administrativa de Boquete', '8.777793', '-82.432848', 1, 'agencia'),
(108, 1, 'Agencia Administrativa de Changuinola', 'Agencia Administrativa de Changuinola', '9.448125', '-82.519889', 1, 'agencia'),
(109, 1, 'Agencia Administrativa de Bocas del Toro', 'Agencia Administrativa de Bocas del Toro', '9.339249', '-82.242242', 1, 'agencia'),
(110, 10, 'Agencia Administrativa de Sona', 'Agencia Administrativa de Sona', '8.008671', '-81.320907', 1, 'agencia'),
(111, 10, 'Agencia Administrativa de Santiago', 'Agencia Administrativa de Santiago', '8.097244', '-80.976404', 1, 'agencia'),
(112, 6, 'Cordinacion Administrativa de Herrera', 'Cordinacion Administrativa de Herrera', '7.957818', '-80.427740', 1, 'admin'),
(113, 6, 'Cordinacion Administrativa de Agencias Area Central', 'Cordinacion Administrativa de Agencias Area Central', '7.968913', '-80.438580', 1, 'admin'),
(114, 6, 'Agencia Administrativa de Chitre', 'Agencia Administrativa de Chitre', '7.968702', '-80.438442', 1, 'agencia'),
(115, 7, 'Agencia Administrativa de Las Tablas', 'Agencia Administrativa de Las Tablas', '7.771029', '-80.276023', 1, 'agencia'),
(116, 7, 'Cordinacion Administrativa de Los Santos', 'Cordinacion Administrativa de Los Santos', '7.771020', '-80.275854', 1, 'admin'),
(117, 2, 'Cordinacion Administrativa de Cocle', 'Cordinacion Administrativa de Cocle', '8.250000', '-80.538379', 1, 'admin'),
(118, 2, 'Agencia Administrativa de Aguadulce', 'Agencia Administrativa de Aguadulce', '8.249959', '-80.538952', 1, 'agencia'),
(119, 2, 'Agencia Administrativa de Nata', 'Agencia Administrativa de Nata', '8.333346', '-80.521523', 1, 'agencia'),
(120, 2, 'Agencia Administrativa de Penonome', 'Agencia Administrativa de Penonome', '8.516250', '-80.354802', 1, 'agencia'),
(121, 3, 'Cordinacion Administrativa de Colon', 'Cordinacion Administrativa de Colon', '9.351436', '-79.858820', 1, 'admin'),
(122, 3, 'Agencia Administrativa de Colon', 'Agencia Administrativa de Colon', '9.337927', '-79.883646', 1, 'agencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clave` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creador` int(11) NOT NULL,
  `creacion_dt` datetime NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id`, `id_unidad`, `id_tipo_usuario`, `correo`, `clave`, `nombre1`, `apellido1`, `creador`, `creacion_dt`, `estado`) VALUES
(1, 97, 1, 'admin@css.gob.pa', 'anNpeUJLbXNQUE5sb0g4ZzNBOVRXdz09Ojpb1XkSOlNAZlQaxqa3S9f5', 'Administrador', 'General', 1, '2022-06-27 11:58:47', 1),
(19, 97, 2, 'ferncastillo@css.gob.pa', 'UHIyWCsvN0x3T1h2OGp5dWd2U3Bjdz09Ojq4XGdoAZujX5EQtAzVn90q', 'Fernando', 'Castillo', 1, '2022-07-06 11:02:31', 1),
(21, 97, 1, 'etroesh@css.gob.pa', 'TkV2b0FwL1pXMEtjNGF3RHV1bDR6QT09OjoQFeg6/rPyunSNw3f78XNV', 'Eugenio', 'Troesh', 1, '2022-07-06 11:04:52', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_actividades`
--
ALTER TABLE `t_actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_act_tactividad` (`tipo_actividad`);

--
-- Indices de la tabla `t_act_economica`
--
ALTER TABLE `t_act_economica`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `actividad_economica` (`actividad_economica`);

--
-- Indices de la tabla `t_alta_laboral`
--
ALTER TABLE `t_alta_laboral`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alta_laboral` (`alta_laboral`);

--
-- Indices de la tabla `t_control_usuario`
--
ALTER TABLE `t_control_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cu_usuario` (`id_usuario`);

--
-- Indices de la tabla `t_corregimientos`
--
ALTER TABLE `t_corregimientos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cod_correg` (`cod_correg`),
  ADD KEY `fk_pro_distrito` (`id_distrito`);

--
-- Indices de la tabla `t_distritos`
--
ALTER TABLE `t_distritos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cod_dist` (`cod_dist`),
  ADD KEY `fk_dis_provincia` (`id_provincia`);

--
-- Indices de la tabla `t_hoja_especialista`
--
ALTER TABLE `t_hoja_especialista`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_he_unidad` (`id_unidad`),
  ADD KEY `fk_he_servicio` (`id_servicio`),
  ADD KEY `fk_he_ucreador` (`id_usuario`);

--
-- Indices de la tabla `t_provincias`
--
ALTER TABLE `t_provincias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cod_prov` (`cod_prov`);

--
-- Indices de la tabla `t_ref_empresas`
--
ALTER TABLE `t_ref_empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ref_empresa` (`ref_empresa`);

--
-- Indices de la tabla `t_reg_actividades`
--
ALTER TABLE `t_reg_actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rega_unidad` (`id_unidad`),
  ADD KEY `fk_rega_aeconomica` (`id_actividad_economica`),
  ADD KEY `fk_rega_correg` (`id_corregimiento`),
  ADD KEY `fk_rega_servicio` (`id_servicio`),
  ADD KEY `fk_rega_ucreador` (`id_usuario`),
  ADD KEY `fk_rega_referencia` (`id_referencia`);

--
-- Indices de la tabla `t_reg_atenciones`
--
ALTER TABLE `t_reg_atenciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rat_hoja` (`id_hoja_especialista`),
  ADD KEY `fk_rat_corregimiento` (`id_corregimiento`),
  ADD KEY `fk_rat_tamanoe` (`id_tamano_empresa`),
  ADD KEY `fk_rat_tipoaseg` (`id_tipo_asegurado`),
  ADD KEY `fk_rat_tipoaten` (`id_tipo_atencion`),
  ADD KEY `fk_rat_consulta` (`id_tipo_consulta`),
  ADD KEY `fk_rat_empresa` (`id_tipo_empresa`),
  ADD KEY `fk_rat_` (`id_usuario`),
  ADD KEY `fk_rat_referencias` (`id_referencia`),
  ADD KEY `fk_rat_altalab` (`id_alta_laboral`),
  ADD KEY `fk_rat_actividad_economica` (`id_actividad_economica`);

--
-- Indices de la tabla `t_servicios`
--
ALTER TABLE `t_servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_tamano_empresa`
--
ALTER TABLE `t_tamano_empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tamano_empresa` (`tamano_empresa`);

--
-- Indices de la tabla `t_tipo_actividad`
--
ALTER TABLE `t_tipo_actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_tipo_asegurado`
--
ALTER TABLE `t_tipo_asegurado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_asegurado` (`tipo_asegurado`);

--
-- Indices de la tabla `t_tipo_atencion`
--
ALTER TABLE `t_tipo_atencion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_atencion` (`tipo_atencion`);

--
-- Indices de la tabla `t_tipo_consulta`
--
ALTER TABLE `t_tipo_consulta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_consulta` (`tipo_consulta`);

--
-- Indices de la tabla `t_tipo_empresa`
--
ALTER TABLE `t_tipo_empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_empresa` (`tipo_empresa`);

--
-- Indices de la tabla `t_tipo_referencias`
--
ALTER TABLE `t_tipo_referencias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_referencia` (`tipo_referencia`);

--
-- Indices de la tabla `t_tipo_usuario`
--
ALTER TABLE `t_tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_unidades`
--
ALTER TABLE `t_unidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_u_provincia` (`id_provincia`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `fk_u_tipo_usuario` (`id_tipo_usuario`),
  ADD KEY `fk_u_unidad` (`id_unidad`),
  ADD KEY `fk_u_creador` (`creador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_actividades`
--
ALTER TABLE `t_actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `t_act_economica`
--
ALTER TABLE `t_act_economica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `t_alta_laboral`
--
ALTER TABLE `t_alta_laboral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_control_usuario`
--
ALTER TABLE `t_control_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_corregimientos`
--
ALTER TABLE `t_corregimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1263;

--
-- AUTO_INCREMENT de la tabla `t_distritos`
--
ALTER TABLE `t_distritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `t_hoja_especialista`
--
ALTER TABLE `t_hoja_especialista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_provincias`
--
ALTER TABLE `t_provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `t_ref_empresas`
--
ALTER TABLE `t_ref_empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_reg_actividades`
--
ALTER TABLE `t_reg_actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_reg_atenciones`
--
ALTER TABLE `t_reg_atenciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `t_servicios`
--
ALTER TABLE `t_servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `t_tamano_empresa`
--
ALTER TABLE `t_tamano_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_tipo_actividad`
--
ALTER TABLE `t_tipo_actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_tipo_asegurado`
--
ALTER TABLE `t_tipo_asegurado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `t_tipo_atencion`
--
ALTER TABLE `t_tipo_atencion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_tipo_consulta`
--
ALTER TABLE `t_tipo_consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `t_tipo_empresa`
--
ALTER TABLE `t_tipo_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_tipo_referencias`
--
ALTER TABLE `t_tipo_referencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_tipo_usuario`
--
ALTER TABLE `t_tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_unidades`
--
ALTER TABLE `t_unidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_actividades`
--
ALTER TABLE `t_actividades`
  ADD CONSTRAINT `fk_act_tactividad` FOREIGN KEY (`tipo_actividad`) REFERENCES `t_tipo_actividad` (`id`);

--
-- Filtros para la tabla `t_control_usuario`
--
ALTER TABLE `t_control_usuario`
  ADD CONSTRAINT `fk_cu_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id`);

--
-- Filtros para la tabla `t_corregimientos`
--
ALTER TABLE `t_corregimientos`
  ADD CONSTRAINT `fk_pro_distrito` FOREIGN KEY (`id_distrito`) REFERENCES `t_distritos` (`id`);

--
-- Filtros para la tabla `t_distritos`
--
ALTER TABLE `t_distritos`
  ADD CONSTRAINT `fk_dis_provincia` FOREIGN KEY (`id_provincia`) REFERENCES `t_provincias` (`id`);

--
-- Filtros para la tabla `t_hoja_especialista`
--
ALTER TABLE `t_hoja_especialista`
  ADD CONSTRAINT `fk_he_servicio` FOREIGN KEY (`id_servicio`) REFERENCES `t_servicios` (`id`),
  ADD CONSTRAINT `fk_he_ucreador` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id`),
  ADD CONSTRAINT `fk_he_unidad` FOREIGN KEY (`id_unidad`) REFERENCES `t_unidades` (`id`);

--
-- Filtros para la tabla `t_reg_actividades`
--
ALTER TABLE `t_reg_actividades`
  ADD CONSTRAINT `fk_rega_aeconomica` FOREIGN KEY (`id_actividad_economica`) REFERENCES `t_act_economica` (`id`),
  ADD CONSTRAINT `fk_rega_correg` FOREIGN KEY (`id_corregimiento`) REFERENCES `t_corregimientos` (`id`),
  ADD CONSTRAINT `fk_rega_referencia` FOREIGN KEY (`id_referencia`) REFERENCES `t_ref_empresas` (`id`),
  ADD CONSTRAINT `fk_rega_servicio` FOREIGN KEY (`id_servicio`) REFERENCES `t_servicios` (`id`),
  ADD CONSTRAINT `fk_rega_ucreador` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id`),
  ADD CONSTRAINT `fk_rega_unidad` FOREIGN KEY (`id_unidad`) REFERENCES `t_unidades` (`id`);

--
-- Filtros para la tabla `t_reg_atenciones`
--
ALTER TABLE `t_reg_atenciones`
  ADD CONSTRAINT `fk_rat_` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id`),
  ADD CONSTRAINT `fk_rat_actividad_economica` FOREIGN KEY (`id_actividad_economica`) REFERENCES `t_act_economica` (`id`),
  ADD CONSTRAINT `fk_rat_altalab` FOREIGN KEY (`id_alta_laboral`) REFERENCES `t_alta_laboral` (`id`),
  ADD CONSTRAINT `fk_rat_consulta` FOREIGN KEY (`id_tipo_consulta`) REFERENCES `t_tipo_consulta` (`id`),
  ADD CONSTRAINT `fk_rat_corregimiento` FOREIGN KEY (`id_corregimiento`) REFERENCES `t_corregimientos` (`id`),
  ADD CONSTRAINT `fk_rat_empresa` FOREIGN KEY (`id_tipo_empresa`) REFERENCES `t_tipo_empresa` (`id`),
  ADD CONSTRAINT `fk_rat_hoja` FOREIGN KEY (`id_hoja_especialista`) REFERENCES `t_hoja_especialista` (`id`),
  ADD CONSTRAINT `fk_rat_referencias` FOREIGN KEY (`id_referencia`) REFERENCES `t_tipo_referencias` (`id`),
  ADD CONSTRAINT `fk_rat_tamanoe` FOREIGN KEY (`id_tamano_empresa`) REFERENCES `t_tamano_empresa` (`id`),
  ADD CONSTRAINT `fk_rat_tipoaseg` FOREIGN KEY (`id_tipo_asegurado`) REFERENCES `t_tipo_asegurado` (`id`),
  ADD CONSTRAINT `fk_rat_tipoaten` FOREIGN KEY (`id_tipo_atencion`) REFERENCES `t_tipo_atencion` (`id`);

--
-- Filtros para la tabla `t_unidades`
--
ALTER TABLE `t_unidades`
  ADD CONSTRAINT `fk_u_provincia` FOREIGN KEY (`id_provincia`) REFERENCES `t_provincias` (`id`);

--
-- Filtros para la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD CONSTRAINT `fk_u_creador` FOREIGN KEY (`creador`) REFERENCES `t_usuarios` (`id`),
  ADD CONSTRAINT `fk_u_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `t_tipo_usuario` (`id`),
  ADD CONSTRAINT `fk_u_unidad` FOREIGN KEY (`id_unidad`) REFERENCES `t_unidades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
