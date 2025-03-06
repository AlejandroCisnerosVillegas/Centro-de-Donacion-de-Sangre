-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2025 a las 03:34:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `general`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_05_admin_info`
--

CREATE TABLE `project_05_admin_info` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `project_05_admin_info`
--

INSERT INTO `project_05_admin_info` (`admin_id`, `admin_name`, `admin_username`, `admin_password`) VALUES
(1, 'Alejandro', 'Alejandro', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_05_blood`
--

CREATE TABLE `project_05_blood` (
  `blood_id` int(11) NOT NULL,
  `blood_group` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `project_05_blood`
--

INSERT INTO `project_05_blood` (`blood_id`, `blood_group`) VALUES
(1, 'B+'),
(2, 'B-'),
(3, 'A+'),
(4, 'O+'),
(5, 'O-'),
(6, 'A-'),
(7, 'AB+'),
(8, 'AB-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_05_contact_info`
--

CREATE TABLE `project_05_contact_info` (
  `contact_id` int(11) NOT NULL,
  `contact_address` varchar(100) NOT NULL,
  `contact_mail` varchar(50) NOT NULL,
  `contact_phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `project_05_contact_info`
--

INSERT INTO `project_05_contact_info` (`contact_id`, `contact_address`, `contact_mail`, `contact_phone`) VALUES
(1, 'Ciudad de México, México', '+52 55 2900 2158', 'alex220496.acv@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_05_contact_query`
--

CREATE TABLE `project_05_contact_query` (
  `query_id` int(11) NOT NULL,
  `query_name` varchar(100) NOT NULL,
  `query_mail` varchar(120) NOT NULL,
  `query_number` char(11) NOT NULL,
  `query_message` longtext NOT NULL,
  `query_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `query_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `project_05_contact_query`
--

INSERT INTO `project_05_contact_query` (`query_id`, `query_name`, `query_mail`, `query_number`, `query_message`, `query_date`, `query_status`) VALUES
(10, 'María García', '555-123-4567', 'maria.garci', 'Tengo algunas dudas sobre el proceso de donación de sangre. ¿Podrían proporcionarme más información?', '2024-04-26 20:48:55', 1),
(11, 'Juan Martínez', '555-987-6543', 'juan.martin', 'Quisiera saber si hay algún requisito especial para donar sangre. Gracias.', '2024-04-26 20:48:57', 1),
(12, 'Alejandra López', '555-567-8901', 'alejandra.l', 'Estoy interesada en donar sangre, ¿puedo programar una cita para hacerlo?', '2024-04-26 20:49:00', 1),
(13, 'Carlos Rodríguez', '555-234-5678', 'carlos.rodr', ' ¿Hay algún riesgo al donar sangre? Me gustaría saber más al respecto.', '2024-04-26 20:49:02', 1),
(14, 'Laura Pérez', '555-876-5432', 'laura.perez', 'Quiero saber si puedo donar sangre si tengo alguna condición médica. ¿Es posible?', '2024-04-26 20:46:28', NULL),
(15, 'Roberto Hernández', '555-345-6789', 'roberto.her', 'Me gustaría saber cuál es el proceso para donar sangre y si requiere alguna ', '2024-04-26 20:46:52', NULL),
(16, 'Ana Torres', '555-678-9012', 'ana.torres@', '¿Hay algún tipo de restricción para donar sangre? Me gustaría recibir más información al respecto.', '2024-04-26 20:47:23', NULL),
(17, 'Eduardo Gómez', '555-456-7890', 'eduardo.gom', '¿Cuánto tiempo dura el proceso de donación de sangre? Me gustaría programar una cita.', '2024-04-26 20:47:43', NULL),
(18, 'Claudia Sánchez', '555-789-0123', 'claudia.san', '¿Hay algún efecto secundario después de donar sangre? Estoy interesada en contribuir.', '2024-04-26 20:48:10', NULL),
(19, 'Francisco Vázquez', '555-901-2345', 'francisco.v', 'Quisiera saber si hay alguna precaución especial que deba tomar antes de donar sangre. Gracias.', '2024-04-26 20:48:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_05_donor_details`
--

CREATE TABLE `project_05_donor_details` (
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(50) NOT NULL,
  `donor_number` varchar(10) NOT NULL,
  `donor_mail` varchar(50) DEFAULT NULL,
  `donor_age` int(60) NOT NULL,
  `donor_gender` varchar(10) NOT NULL,
  `donor_blood` varchar(10) NOT NULL,
  `donor_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `project_05_donor_details`
--

INSERT INTO `project_05_donor_details` (`donor_id`, `donor_name`, `donor_number`, `donor_mail`, `donor_age`, `donor_gender`, `donor_blood`, `donor_address`) VALUES
(1, 'María García Pérez', '5512345678', 'mariagperez@example.com', 28, 'Femenino', '1', 'Calle 10 de Mayo #123, Colonia Juárez, Ciudad de México'),
(2, 'Juan López Hernández', '5567890123', 'juanlhernandez@example.com', 35, 'Masculino', '2', 'Calle Libertad #456, Colonia Roma, Ciudad de México'),
(3, 'Laura Martínez Rodríguez', '5590123456', 'lauramrodriguez@example.com', 42, 'Femenino', '3', 'Calle Reforma #789, Colonia Condesa, Ciudad de México'),
(4, 'José Hernández García', '5543210987', 'josehgarcia@example.com', 30, 'Masculino', '4', 'Calle Insurgentes #234, Colonia Narvarte, Ciudad de México'),
(5, 'Ana Torres Sánchez', '5589012345', 'anatorres@example.com', 25, 'Femenino', '5', 'Calle Álvaro Obregón #567, Colonia Doctores, Ciudad de México'),
(6, 'Carlos Rodríguez Gómez', '5523456789', 'carlosrgomez@example.com', 33, 'Masculino', '6', 'Calle Hidalgo #890, Colonia Centro, Ciudad de México'),
(7, 'Sofía Pérez López', '5578901234', 'sofiapl@example.com', 9, 'Femenino', '7', 'Calle Reforma #1234, Colonia Cuauhtémoc, Ciudad de México'),
(8, 'Eduardo Gutiérrez Martínez', '5556789012', 'eduardogm@example.com', 40, 'Masculino', '8', 'Calle Revolución #345, Colonia Del Valle, Ciudad de México'),
(9, 'Diana García Torres', '5501234567', 'dianagt@example.com', 27, 'Femenino', '1', 'Calle Sonora #678, Colonia Roma Sur, Ciudad de México'),
(10, 'Alejandro Sánchez Pérez', '5534567890', 'alejandrosanchez@example.com', 31, 'Masculino', '2', 'Calle Mérida #901, Colonia Narvarte, Ciudad de México');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_05_pages`
--

CREATE TABLE `project_05_pages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_type` varchar(50) DEFAULT NULL,
  `page_data` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `project_05_pages`
--

INSERT INTO `project_05_pages` (`page_id`, `page_name`, `page_type`, `page_data`) VALUES
(2, '¿Por qué convertirse en donante?', 'donor', '<p style=\"color: #000; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">La sangre es el regalo más preciado que alguien puede dar a otra persona: el regalo de la vida. La decisión de donar tu sangre puede salvar una vida, o incluso varias si tu sangre se separa en sus componentes —glóbulos rojos, plaquetas y plasma— los cuales pueden ser utilizados individualmente para pacientes con condiciones específicas. La sangre segura salva vidas y mejora la salud. Las transfusiones de sangre son necesarias para: <ul><li>Mujeres con complicaciones del embarazo, como embarazos ectópicos y hemorragias antes, durante o después del parto.</li><li>Niños con anemia grave, frecuentemente como resultado de malaria o desnutrición.</li><li>Personas con traumas graves luego de desastres naturales o provocados por el hombre.</li><li>Muchos procedimientos médicos y quirúrgicos complejos y pacientes con cáncer.</li></ul> Además, se necesita para transfusiones regulares en personas con condiciones como talasemia y enfermedad de células falciformes, y se utiliza para fabricar productos como factores de coagulación para personas con hemofilia. Existe una necesidad constante de suministro regular de sangre porque la sangre solo se puede almacenar por un tiempo limitado antes de su uso. Se necesitan donaciones regulares de sangre por parte de un número suficiente de personas sanas para garantizar que la sangre segura esté disponible siempre que y donde sea necesaria.</p>\r\n'),
(3, 'Sobre Nosotros', 'aboutus', '<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify; background-color: rgb(255, 255, 255);\">El banco de sangre es un lugar donde se almacenan las bolsas de sangre recolectadas en eventos de donación de sangre. El término \"banco de sangre\" se refiere a una división de un laboratorio hospitalario donde se lleva a cabo el almacenamiento de productos sanguíneos y donde se realizan pruebas adecuadas para reducir el riesgo de eventos relacionados con la transfusión. El proceso de manejo de la bolsa de sangre recibida de los eventos de donación de sangre requiere una gestión adecuada y sistemática. La bolsa de sangre debe manipularse con cuidado y tratarse minuciosamente, ya que está relacionada con la vida de alguien. Se propone el desarrollo de un Sistema de Gestión de Banco de Sangre y Donaciones (BBDMS) basado en la web para proporcionar una funcionalidad de gestión al banco de sangre con el fin de manejar la bolsa de sangre y registrar a las personas que desean donar sangre y quienes la necesitan.</span>                    '),
(4, 'La Necesidad de Sangre', 'needforblood', '<p style=\"color: #000; font-family: \'Open Sans\', Arial, sans-serif; text-align: left;\">Existen muchas razones por las cuales los pacientes necesitan sangre. Un malentendido común sobre el uso de la sangre es que las víctimas de accidentes son los pacientes que más sangre utilizan. En realidad, las personas que más sangre necesitan incluyen a aquellas: <ol> <li>Sometidas a tratamientos contra el cáncer.</li> <li>Sometidas a cirugías ortopédicas.</li> <li>Sometidas a cirugías cardiovasculares.</li> <li>Sometidas a tratamientos para trastornos sanguíneos hereditarios.</li> </ol> </p>\r\n'),
(5, 'Consejos sobre la sangre', 'bloodtips', '<p style=\"color: #000; font-family: \'Open Sans\', Arial, sans-serif; text-align: left;\"><ol><li>Debes estar en buena salud.</li><li>Hidrátate y come una comida saludable antes de tu donación.</li><li>Nunca eres demasiado viejo para donar sangre.</li><li>Descansa y relájate.</li><li>No olvides tu refrigerio GRATIS después de la donación.</li></ol></p>'),
(6, '¿A quién podrías ayudar?', 'whoyouhelp', '<p style=\"color: #000; font-family: \'Open Sans\', Arial, sans-serif; text-align: left;\">Cada 2 segundos, alguien en el mundo necesita sangre. Donar sangre puede ayudar a: <ol> <li>Personas que atraviesan desastres o situaciones de emergencia.</li> <li>Personas que pierden sangre durante cirugías importantes.</li> <li>Personas que han perdido sangre debido a una hemorragia gastrointestinal.</li> <li>Mujeres que tienen complicaciones graves durante el embarazo o el parto.</li> <li>Personas con cáncer o anemia severa a veces causada por talasemia o enfermedad de células falciformes.</li> </ol> </p>'),
(7, 'Grupos sanguíneos', 'bloodgroups', '<p style=\"color: #000; font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">\r\nEl grupo sanguíneo de cualquier ser humano generalmente caerá en uno de los siguientes grupos:\r\n<ul>\r\n  <li>A positivo o A negativo</li>\r\n  <li>B positivo o B negativo</li>\r\n  <li>O positivo o O negativo</li>\r\n  <li>AB positivo o AB negativo</li>\r\n</ul>\r\nTu grupo sanguíneo es determinado por los genes que heredas de tus padres. Una dieta saludable ayuda a asegurar una donación de sangre exitosa ¡y también te hace sentir mejor!\r\n</p>'),
(8, 'Donantes y receptores universales', 'universal', '<p style=\"color: #000; font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">\r\nEl tipo de sangre más común es O, seguido por el tipo A.\r\nLos individuos de tipo O a menudo son llamados \"donantes universales\" ya que su sangre puede ser transfundida a personas con cualquier tipo de sangre. Aquellos con sangre tipo AB son llamados \"receptores universales\" porque pueden recibir sangre de cualquier tipo.\r\nPara transfusiones de emergencia, la sangre tipo O negativo es la variedad de sangre que tiene el riesgo más bajo de causar reacciones graves en la mayoría de las personas que la reciben. Debido a esto, a veces se le llama el tipo de donante de sangre universal.\r\n</p>\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_05_query_stat`
--

CREATE TABLE `project_05_query_stat` (
  `id` int(11) NOT NULL,
  `query_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `project_05_query_stat`
--

INSERT INTO `project_05_query_stat` (`id`, `query_type`) VALUES
(1, 'Read'),
(2, 'Pending');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `project_05_admin_info`
--
ALTER TABLE `project_05_admin_info`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indices de la tabla `project_05_blood`
--
ALTER TABLE `project_05_blood`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indices de la tabla `project_05_contact_info`
--
ALTER TABLE `project_05_contact_info`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indices de la tabla `project_05_contact_query`
--
ALTER TABLE `project_05_contact_query`
  ADD PRIMARY KEY (`query_id`);

--
-- Indices de la tabla `project_05_donor_details`
--
ALTER TABLE `project_05_donor_details`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indices de la tabla `project_05_pages`
--
ALTER TABLE `project_05_pages`
  ADD UNIQUE KEY `page_id` (`page_id`),
  ADD UNIQUE KEY `page_type` (`page_type`);

--
-- Indices de la tabla `project_05_query_stat`
--
ALTER TABLE `project_05_query_stat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `project_05_admin_info`
--
ALTER TABLE `project_05_admin_info`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `project_05_blood`
--
ALTER TABLE `project_05_blood`
  MODIFY `blood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `project_05_contact_info`
--
ALTER TABLE `project_05_contact_info`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `project_05_contact_query`
--
ALTER TABLE `project_05_contact_query`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `project_05_donor_details`
--
ALTER TABLE `project_05_donor_details`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `project_05_pages`
--
ALTER TABLE `project_05_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
