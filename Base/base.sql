-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2024 a las 04:54:27
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
(17, 'Prueba', 'Prueba de materia imparte el profesor', 27, '2024-11-21');

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
  `promedio_unidad` decimal(5,2) DEFAULT NULL,
  `promedio_final` decimal(5,2) DEFAULT NULL,
  `fk_tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `fk_materia`, `unidad_1`, `unidad_2`, `unidad_3`, `promedio_unidad`, `promedio_final`, `fk_tipo_usuario`) VALUES
(1, 27, 9.00, 8.00, 5.00, NULL, NULL, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `id_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `codes`
--

INSERT INTO `codes` (`id`, `code`, `id_user`) VALUES
(13, 'xz3rYhb0W8j0NhFHxb4Mqn2NZR7j73P75wonOpxF7N1WVlVTyZ1xrYtJMol6Bfh1w7fOkADIoY7p39zbzvLhGVqo0B3hMERyvBsD', 1),
(14, 'NzqtFAcMA2nfoobb3z2CArgva9XVjaDUTNGoxa6OvAqifH2LntDqygTE5tlF6A1SLmYWAuRaHE6Q99CIAJWHIBWoKbbe1fWekRnK', 1),
(15, 'gxsYAhZ96dwcKaSjUWWS4iFOk0nYwHI8fAi7Joj66ckoHTTnClFf8Ncrk2pwvHGADsFUGKJAU7cBP4mMCpxs69ynST59gacqApId', 1),
(16, 'KUDXBfxUVbz85HmbaGByuEJbAqzlMdg1qr6W2iYYuAU0pwPa2OnrpbjFnZWvZHJMRUAcvkvZ0hDnh7IdyfIiU0uknYZnPmBIa2ua', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `id` int(11) NOT NULL,
  `monto` int(4) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `fecha_don` varchar(100) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `donaciones`
--

INSERT INTO `donaciones` (`id`, `monto`, `motivo`, `fecha_don`, `fk_usuario`) VALUES
(16, 10, 'to help students', '24/10/2024', NULL),
(17, 5, 'for help students', '25/10/2024', NULL),
(18, 15, 'for help students', '25/10/2024', NULL),
(19, 15, 'For help students', '26/10/2024', NULL),
(20, 15, 'For help students', '26/10/2024', NULL),
(21, 15, 'for help students', '26/10/2024', NULL),
(22, 15, 'for help students', '26/10/2024', NULL),
(23, 15, 'for help students', '26/10/2024', NULL),
(24, 15, 'for help students', '26/10/2024', NULL),
(25, 15, 'For help students', '29/10/2024', NULL),
(26, 15, 'yhngbfv', '29/10/2024', NULL),
(27, 15, 'for helps students', '29/10/2024', NULL),
(28, 10, 'for help students', '29/10/2024', 32),
(29, 15, 'for help students', '07/11/2024', 32),
(30, 10, 'for help students', '11/11/2024', 32),
(31, 5, 'help students', '11/11/2024', 32),
(32, 15, 'dkcjiowdc', '12/11/2024', 32),
(33, 15, 'hgbgn', '12/11/2024', 32),
(35, 15, 'asdghjkljhfdasghjklj', '12/11/2024', 32),
(36, 10, 'Donacion para beneficio de la escuela', '14/11/2024', 32),
(37, 10, 'Para las buenas personas', '14/11/2024', 32);

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
(1, '1', 34),
(2, '3', 35),
(3, '2', 36),
(4, '2', 37),
(5, '1', 38),
(6, '1', 39);

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
(1, '', 34),
(2, 'A', 35),
(3, '', 36),
(4, '', 37),
(5, 'A', 38),
(6, 'A', 39);

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
  `unidad` varchar(50) DEFAULT NULL,
  `mtimparte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `nombre_materia`, `objetivos`, `unidad`, `mtimparte`) VALUES
(18, 'Estructura de Datos', 'To understand and implement fundamental data structures, such as arrays, linked lists, stacks, queues, trees, and graphs, for efficient data management and problem-solving in computer programming.', '1', 0),
(19, 'Estructura de Computadoras', 'To explore the fundamental principles of computer architecture, including the design and functionality of processors, memory systems, and input/output devices, to understand how hardware components interact to execute software efficiently.', '1', 0),
(20, 'Legislación y Derecho Informático ', 'To examine the legal frameworks and regulations governing information technology, focusing on data protection, intellectual property, cybersecurity, and the ethical implications of technology in society.', '1', 0),
(21, 'Matemáticas Discretas ', 'To develop a strong foundation in discrete mathematical structures, including logic, set theory, combinatorics, graph theory, and algorithms, essential for solving complex problems in computer science and related fields.', '1', 0),
(22, 'Metodologías Agiles', 'To understand and apply Agile principles and frameworks, such as Scrum and Kanban, for efficient project management, promoting flexibility, collaboration, and continuous improvement in software development processes.', '1', 0),
(23, 'Bases de Datos', 'To understand the principles of database design, implementation, and management, including relational models, SQL, and normalization, to efficiently store, retrieve, and manipulate data in various applications.', '1', 0),
(26, 'Pruebas', 'Idk', '1', 27),
(27, 'Pruebas2', 'Listado de materia que imparte el profesor', '1', 34);

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
(6, 'Free uniforms', '2024-10-31', '<p><strong>The Importance of Free School Uniforms</strong><br>The implementation of free school uniform programs in educational institutions is a strategy that has gained recognition for its multiple benefits. These programs not only seek to improve the image of schools, but also have a significant impact on the school community and the well-being of students.</p>\r\n<p>Reduction of Discrimination and Bullying: One of the main advantages of free school uniforms is the reduction of discrimination and bullying among students. By eliminating differences in dress, social comparisons and pressure to follow fashion trends are minimized, which can contribute to a more inclusive and harmonious school environment.</p>\r\n<p><strong>2. Focus on Learning: </strong>With uniforms, students can concentrate more on their education than on what they are wearing. This fosters an environment where learning is the priority, and students can feel more comfortable and confident attending classes, which can result in better academic performance.</p>\r\n<p>Translated with DeepL.com (free version)</p>', ''),
(7, 'Real estate improvements', '2024-11-01', '<p>Donors and Real Estate Improvements in Schools<br>Improvements to school infrastructure are essential to providing a safe and stimulating learning environment. However, many institutions face financial challenges that limit their ability to make these improvements. This is where donors come into play.</p>\r\n<p>Importance of Investment: Donors, whether individuals, companies or foundations, play a crucial role in improving school real estate. Your financial support allows schools to make necessary renovations, such as updating classrooms, improving sports facilities and creating outdoor spaces.</p>\r\n<p>Creating Inclusive Spaces: Donations allow schools to adapt their facilities to be more inclusive. This may include the creation of access ramps, adapted bathrooms, and classrooms designed to serve students with different needs. These improvements not only benefit current students, but also attract new families to the school community.</p>', 'inmobiliario.webp'),
(8, 'Free books in schools', '2024-11-01', '<p>Free Books in Schools<br>Providing free books in schools is one of the most effective strategies to promote educational equity, support learning, and stimulate a love of reading. This initiative helps create equal opportunities for all students, regardless of their economic background, by reducing barriers to accessing essential study materials.</p>\r\n<p> Promoting Equal Opportunity: When schools offer free books, all students have access to the same materials, which helps reduce academic disparities between those of different socioeconomic levels. This ensures that no student is left behind simply because they cannot afford books.</p>\r\n<p> Fostering a Love of Reading: Free access to books can inspire students to read more, expanding their knowledge and skills. Reading is essential for the development of critical thinking, creativity and empathy. Having free books makes the reading habit accessible to everyone and encourages young people to explore different genres, topics and cultures.</p>', 'libros.jpg'),
(11, 'Benito Juarez scholarship program', '2024-11-07', '<p>The Benito Ju&aacute;rez scholarship program is an initiative of the Mexican government that seeks to support basic, high school and higher education students in situations of economic vulnerability. These scholarships are intended to promote the permanence and educational development of young people, helping them cover some of the expenses involved in education.</p>\r\n<p>Recently, scholarships from this program were awarded to students at one school, benefiting a considerable group of students who meet the eligibility criteria. This support represents economic relief for families, since it allows students to have the necessary resources to continue their studies and reduce the chances of dropping out of school.</p>\r\n<p>The delivery of the scholarships at this school is part of the administration efforts to strengthen education in communities with high rates of educational backwardness and support the comprehensive development of young people. Through these types of programs, the government seeks to ensure that education is accessible and equitable for all students in the country.</p>', 'beca.png');

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
  `edad` int(11) DEFAULT NULL,
  `tipo_usuario` varchar(50) DEFAULT NULL,
  `fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `password`, `genero`, `edad`, `tipo_usuario`, `fecha_nac`) VALUES
(1, 'Rafael', 'rvuelvas@ucol.mx', '14122005', 'Mujer', 21, 'Administrator', '2005-12-14'),
(12, 'Luis', 'lalaniz@ucol.mx', '123456', 'Hombre', 24, 'Student', '0000-00-00'),
(27, 'Samiis', 'hguzman2@ucol.mx', '123456', 'Mujer', 21, 'Teacher', '0000-00-00'),
(30, 'Jesus', 'jrivera@ucol.mx', '123456', 'Hombre', 24, 'Cordinator', '0000-00-00'),
(32, 'Samiiis', 'hguzman3@ucol.mx', '12345', 'Mujer', 21, 'Donor', '0000-00-00'),
(34, 'Maestro', 'jrivera2@ucol.mx', '12345', 'Hombre', 22, 'Teacher', '0000-00-00'),
(35, 'Juanito', 'juanito@gmail.com', '12345', 'Hombre', 18, 'Student', '0000-00-00'),
(36, 'adff', 'hguzman4@ucol.mx', '123456', 'Hombre', 74, 'Teacher', '0000-00-00'),
(37, 'adff', 'hguzman4@ucol.mx', '123456', 'Hombre', 74, 'Teacher', '0000-00-00'),
(38, 'Pruebas', 'pruebas@ucol.m', '123456', 'Hombre', 65, 'Student', '0000-00-00'),
(39, 'junitos', 'juanito1@ucol.mx', '123456', 'Hombre', 85, 'Student', '0000-00-00');

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
-- Indices de la tabla `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo_usuario` (`fk_usuario`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `reporte_gastos`
--
ALTER TABLE `reporte_gastos`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  ADD CONSTRAINT `donaciones_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`);

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
