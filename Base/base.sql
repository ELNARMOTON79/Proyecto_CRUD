-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2024 a las 21:14:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(11) NOT NULL,
  `nombre_actividad` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fk_materia` int(11) DEFAULT NULL,
  `fecha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `nombre_actividad`, `descripcion`, `fk_materia`, `fecha`) VALUES
(18, 'Programacion', 'xdw', 20, '2024-10-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `matricula_admin` int(11) NOT NULL,
  `contrasena_admin` text NOT NULL,
  `nombre_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`matricula_admin`, `contrasena_admin`, `nombre_admin`) VALUES
(2018001, 'Víctor123', 'Víctor Manuel'),
(2018002, 'Francisco123', 'Francisco'),
(2018003, 'Jorge123', 'Jorge'),
(2018004, 'Julio123', 'Julio'),
(2018005, 'César123', 'César');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `nom_alum` text NOT NULL,
  `apelli_alum` text NOT NULL,
  `grupo_alum` text NOT NULL,
  `matricula_alum` int(11) NOT NULL,
  `contrasena_alum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`nom_alum`, `apelli_alum`, `grupo_alum`, `matricula_alum`, `contrasena_alum`) VALUES
('Hugo', 'Martinez Urzua ', 'B', 2020001, 'Hugo123'),
('Oscar ', 'Ramirez ', 'B', 2020002, 'Oscar123'),
('Alexis', 'Ixta', 'B', 2020003, 'Alexis123'),
('Diego', 'Cruz', 'B', 2020004, 'Diego123'),
('Mario', 'Garcia ', 'B', 2020005, 'Mario123'),
('Maria', 'Diaz', 'B', 2020006, 'Maria123'),
('Carlos', 'Perez', 'B', 2020007, 'Carlos123'),
('Joel', 'Rodriguez', 'B', 2020008, 'Joel123'),
('Luis', 'Flores', 'B', 2020009, 'Luis123'),
('Edgar', 'Morales', 'B', 2020010, 'Edgar123'),
('Sofía', 'Jimenez', 'A', 2020011, 'Sofía123'),
('Santiago', 'Torres', 'A', 2020012, 'Santiago123'),
('Sebastián', 'Jimenez', 'A', 2020013, 'Sebastián123'),
('Matías', 'Reyes', 'A', 2020014, 'Matías123'),
('Diego', 'Ruiz', 'A', 2020015, 'Diego123'),
('Daniel', 'Mendoza', 'A', 2020016, 'Daniel123'),
('Alexander', 'Aguilar', 'A', 2020017, 'Alexander123'),
('Victoria', 'Moreno', 'A', 2020018, 'Victoria123'),
('Camila', 'Alvarez', 'A', 2020019, 'Camila123'),
('Ximena', 'Romero', 'A', 2020020, 'Ximena123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `fk_materia` int(11) DEFAULT NULL,
  `unidad_1` decimal(5,2) DEFAULT NULL,
  `unidad_2` decimal(5,2) DEFAULT NULL,
  `unidad_3` decimal(5,2) DEFAULT NULL,
  `promedio_final` decimal(5,2) DEFAULT NULL,
  `fk_tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_general`
--

CREATE TABLE `calificacion_general` (
  `matricula_alum` int(11) NOT NULL,
  `nombre_alum` text NOT NULL,
  `materia` text NOT NULL,
  `matricula_profe` int(11) NOT NULL,
  `nombre_profe` text NOT NULL,
  `calificacion_general` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo`
--

CREATE TABLE `codigo` (
  `id` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `codigo`
--

INSERT INTO `codigo` (`id`, `codigo`, `id_user`) VALUES
(1, '2Meq82xIoxmRzUpPdkrKxN6UZZRi4O5PT10yemDuN2IVqPWPA2DRTYMnDIqDfsskCmJSh6a6rJa1CVyxi7byybf0LfWURmougnYP', 0),
(2, 'RIiOFi53dFAkytVPqtcFAuU6tdEDUiFfXVucbEoUv9l8VvWgBUbPi4kW1HTG5Uc7WZ1XVAlAfAvDrXUeH5BLD2hZUb0tsYZqst4G', 0),
(3, 'Ezd88o4Ja269a7ivDnXAaS7A9PiusxdOeJQPqQk26pS1X5BNIrBp3C3rCpAwHDpKa1onJcAOCRIFyL6y66bhjGSsXx2cNpy7iTWm', 0),
(4, 'fnWedNyAEmlIA2aSyS1LMLxHyhHTisNk6mWNgIhmi10ytPLujMikotgA4CIBTAtFyXLypf6wMm5bBHSSe6HdnszmnPZdf8YsDV27', 0),
(5, 'QPGak2x4CicBaTSInMrSUMT7dx5Cc6hka0Vo40zRQrPWE7QsCbO3mwcnvLhO6b9iYIKzqK6lgU1FlGulVqNZnUVqWPdmBqeABxxk', 0),
(6, 'lvYVQvt1NmPODF14SbUHzDsgzfO7T5R9MqH7j7MiCWp0bGYakD50DVOzZ4d9Y7zCNyiMLAcnuUNJEWBo91zyI8Gk9YAjRjeDy7NI', 0),
(7, 'Oo4fc1SDFO5m4PXHJrdzrLNEZraqISqRKk4zolXCsdEQ4vP1sSIE4bKejmIxWnGX8L2NhKkcIpFtd3DfJm2txadYDU77ddr4aYjC', 0),
(8, 'vCnbtCKxznMW1cZLjAJN6KMqTAWUj3CVtBiNW3BuOgzbwH0Co1x8R0kgX40yis9NfffQYxjt40srLCkf9I8ggt9lwTHBGKRdSp9H', 0),
(9, 'IfbbEmLQvpGMenV9csHm5t7ghtZA4jtkvhLNeQcmejmjaGI6UcJQ1ptJr858xRoVe3XgVEvrwCkVaOWel42v0NOgMGmy30UEUkhO', 0),
(10, 'NNreO8UySMw627nHnowkyFujZHmqWbFDWZc6ndccZ2bMAJJfOtCrt6139x5Nw9eSQKiubEFH4LkLcSbmSsWQsBd48yeAOGQBPWDX', 0),
(11, 'oo5B3y2Sgmiz9yQV8z6cdQ6Q0Nfr4Lw6QVyMB8sdPIjhaHNCWn8YrxovLCQvcX6vyllBXn4ZeBqCrFnoWLPtg5fLEyOLN2TalCPi', 0),
(12, 'i3YC1hUCjvwHxld1uY39qX0uCB3D7vTRFztEoo8LcJEvZ8nfaEqQQhKekiY0u5G8tufKXZ7jbJMmgRlf9FjtF02rsCgMlA8IcUHJ', 1),
(13, 'UgbW6gCX1luxvlJFeIIPSJRkSXRJI01sugE35c31L0Y7z9LvIduv3K00TYzHo8X2KLmQ8ruNkhOdkLXOC3VWTeRG3Zgr6AFviiHw', 1),
(14, 'JQtSAsd0tOBVjy9rgBVyE7rwLDqXGNBoiooLEDEzVyM56OySVIarFcmAA8ROWixp5FBEffW3tLNHxN1F0DdGWe2OHiUeDTiCMQhw', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `id` int(11) NOT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `fecha_don` varchar(100) DEFAULT NULL,
  `fk_tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id` int(11) NOT NULL,
  `grado` varchar(50) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id`, `grado`, `fk_usuario`) VALUES
(13, '2', 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `grupo` varchar(50) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `grupo`, `fk_usuario`) VALUES
(1, 'A', 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `fk_materia` int(11) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id` int(11) NOT NULL,
  `nombre_materia` varchar(100) DEFAULT NULL,
  `objetivos` text DEFAULT NULL,
  `actividades` text DEFAULT NULL,
  `unidad` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `nombre_materia`, `objetivos`, `actividades`, `unidad`) VALUES
(19, 'Estructura de Computadora', 'To explore the fundamental principles of computer architecture, including the design and functionality of processors, memory systems, and input/output devices, to understand how hardware components interact to execute software efficiently.', NULL, 1),
(20, 'Legislación y Derecho Informático ', 'To examine the legal frameworks and regulations governing information technology, focusing on data protection, intellectual property, cybersecurity, and the ethical implications of technology in society.', NULL, 1),
(21, 'Matemáticas Discretas ', 'To develop a strong foundation in discrete mathematical structures, including logic, set theory, combinatorics, graph theory, and algorithms, essential for solving complex problems in computer science and related fields.', NULL, 1),
(22, 'Metodologías Agiles', 'To understand and apply Agile principles and frameworks, such as Scrum and Kanban, for efficient project management, promoting flexibility, collaboration, and continuous improvement in software development processes.', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_gastos`
--

CREATE TABLE `reporte_gastos` (
  `id` int(2) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `fecha_publi` date NOT NULL,
  `reporte` longtext NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reporte_gastos`
--

INSERT INTO `reporte_gastos` (`id`, `titulo`, `fecha_publi`, `reporte`, `image`) VALUES
(6, 'Free uniform', '2024-10-31', '<h3>The Importance of Free School Uniforms</h3>\r\n<p>The implementation of free school uniform programs in educational institutions is a strategy that has gained recognition for its multiple benefits. These programs not only seek to improve the image of schools, but also have a significant impact on the school community and the well-being of students.</p>\r\n<p><strong>Reduction of Discrimination and Bullying:</strong> One of the main advantages of free school uniforms is the reduction of discrimination and bullying among students. By eliminating differences in dress, social comparisons and pressure to follow fashion trends are minimized, which can contribute to a more inclusive and harmonious school environment.</p>\r\n<p><strong>2.</strong> <strong>Focus on Learning:</strong> With uniforms, students can concentrate more on their education than on what they are wearing. This fosters an environment where learning is the priority, and students can feel more comfortable and confident attending classes, which can result in better academic performance.</p>', 'free uniforme.jpg'),
(7, 'Real estate improvements', '2024-11-01', '<p>Donors and Real Estate Improvements in Schools<br>Improvements to school infrastructure are essential to providing a safe and stimulating learning environment. However, many institutions face financial challenges that limit their ability to make these improvements. This is where donors come into play.</p>\r\n<p>Importance of Investment: Donors, whether individuals, companies or foundations, play a crucial role in improving school real estate. Your financial support allows schools to make necessary renovations, such as updating classrooms, improving sports facilities and creating outdoor spaces.</p>\r\n<p>Creating Inclusive Spaces: Donations allow schools to adapt their facilities to be more inclusive. This may include the creation of access ramps, adapted bathrooms, and classrooms designed to serve students with different needs. These improvements not only benefit current students, but also attract new families to the school community.</p>', 'inmobiliario.webp'),
(8, 'Free books in schools', '2024-11-01', '<p>Free Books in Schools<br>Providing free books in schools is one of the most effective strategies to promote educational equity, support learning, and stimulate a love of reading. This initiative helps create equal opportunities for all students, regardless of their economic background, by reducing barriers to accessing essential study materials.</p>\r\n<p>1. Promoting Equal Opportunity: When schools offer free books, all students have access to the same materials, which helps reduce academic disparities between those of different socioeconomic levels. This ensures that no student is left behind simply because they cannot afford books.</p>\r\n<p>2. Fostering a Love of Reading: Free access to books can inspire students to read more, expanding their knowledge and skills. Reading is essential for the development of critical thinking, creativity and empathy. Having free books makes the reading habit accessible to everyone and encourages young people to explore different genres, topics and cultures.</p>', 'libros.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `password` varchar(10) NOT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `edad` int(2) DEFAULT NULL,
  `tipo_usuario` varchar(50) DEFAULT NULL,
  `fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `password`, `genero`, `edad`, `tipo_usuario`, `fecha_nac`) VALUES
(1, 'alexandeo', 'rvuelvas@ucol.mx', '14122005', 'Mujer', 21, 'Administrator', '2005-12-14'),
(27, 'Samiis', 'hguzman2@ucol.mx', '123456', 'Mujer', 21, 'Teacher', '0000-00-00'),
(28, 'Gerardo', 'ggera@ucol.mx', '123456', 'Hombre', 24, 'Donor', '0000-00-00'),
(33, 'Juan', 'juan@gmail.com', '123456', 'Hombre', 19, 'Teacher', '0000-00-00'),
(35, 'Victor', 'vvuelvas@ucol.mx', '123456', 'Hombre', 20, 'Student', '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_materia` (`fk_materia`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_materia` (`fk_materia`),
  ADD KEY `fk_nombre_usuario` (`fk_tipo_usuario`);

--
-- Indices de la tabla `codigo`
--
ALTER TABLE `codigo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo_usuario` (`fk_tipo_usuario`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo_usuario` (`fk_usuario`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo_usuario` (`fk_usuario`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_materia` (`fk_materia`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte_gastos`
--
ALTER TABLE `reporte_gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `codigo`
--
ALTER TABLE `codigo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `reporte_gastos`
--
ALTER TABLE `reporte_gastos`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`fk_materia`) REFERENCES `programas` (`id`);

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`fk_materia`) REFERENCES `programas` (`id`),
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`fk_tipo_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `donaciones_ibfk_1` FOREIGN KEY (`fk_tipo_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `grado`
--
ALTER TABLE `grado`
  ADD CONSTRAINT `grado_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`fk_materia`) REFERENCES `programas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
