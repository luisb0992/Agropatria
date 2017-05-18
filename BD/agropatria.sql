-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2017 a las 22:55:24
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agropatria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'DTTO. CAPITAL', NULL, NULL),
(2, 'ANZOATEGUI', NULL, NULL),
(3, 'APURE', NULL, NULL),
(4, 'ARAGUA', NULL, NULL),
(5, 'BARINAS', NULL, NULL),
(6, 'BOLIVAR', NULL, NULL),
(7, 'CARABOBO', NULL, NULL),
(8, 'COJEDES', NULL, NULL),
(9, 'FALCON', NULL, NULL),
(10, 'GUARICO', NULL, NULL),
(11, 'LARA', NULL, NULL),
(12, 'MERIDA', NULL, NULL),
(13, 'MIRANDA', NULL, NULL),
(14, 'MONAGAS', NULL, NULL),
(15, 'NUEVA ESPARTA', NULL, NULL),
(16, 'PORTUGUESA', NULL, NULL),
(17, 'SUCRE', NULL, NULL),
(18, 'TACHIRA', NULL, NULL),
(19, 'TRUJILLO', NULL, NULL),
(20, 'YARACUY', NULL, NULL),
(21, 'ZULIA', NULL, NULL),
(22, 'AMAZONAS', NULL, NULL),
(23, 'DELTA AMACURO', NULL, NULL),
(24, 'VARGAS', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SIN MATERIAL', NULL, NULL),
(2, 'PLASTICO', NULL, NULL),
(3, 'METAL', NULL, NULL),
(4, 'HIERRO', NULL, NULL),
(5, 'ALUMINIO', NULL, NULL),
(6, 'GOMA', NULL, NULL),
(7, 'FORMICA', NULL, NULL),
(8, 'TELA', NULL, NULL),
(9, 'VIDRIO', NULL, NULL),
(10, 'CUERO', NULL, NULL),
(11, 'SEMI-CUERO', NULL, NULL),
(12, 'MADERA', NULL, NULL),
(13, 'ACERO', NULL, NULL),
(14, 'FIBRA', NULL, NULL),
(15, 'LATON', NULL, NULL),
(16, 'CERAMICA', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_04_11_024049_create_table_material', 1),
(2, '2017_04_11_031439_create_table_tipo', 1),
(3, '2017_04_11_204434_create_table_perfil', 1),
(4, '2017_04_11_205048_create_table_ubicacion', 1),
(5, '2017_04_11_205050_create_users_table', 1),
(6, '2017_04_11_212249_create_table_estado', 1),
(7, '2017_04_11_233036_create_table_product', 1),
(8, '2017_04_11_234023_create_table_reporte', 1),
(9, '2017_05_18_171557_create_pedidos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ubicacion_id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRADOR', NULL, NULL),
(2, 'USUARIO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `etiqueta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL,
  `ubicacion_id` int(10) UNSIGNED NOT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL,
  `marca` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'MAQUINARIA, MUEBLES Y EQUIPOS DE OFICINA', NULL, NULL),
(2, 'MOBILIARIO Y ENSERES DE ALOJAMIENTO', NULL, NULL),
(3, 'MAQUINARIA, EQUIPO DE CONSTRUCCION, INDUSTRIA Y TALLER', NULL, NULL),
(4, 'INDUSTRIA Y TALLER', NULL, NULL),
(5, 'EQUIPOS DE TELECOMUNICACIONES', NULL, NULL),
(6, 'EQUIPOS DE COMPUTACION', NULL, NULL),
(7, 'EQUIPOS CIENTIFICOS Y DE ENSEÑANZA', NULL, NULL),
(8, 'EQUIPOS MEDICOS Y VETERINARIOS', NULL, NULL),
(9, 'EQUIPOS DE TRANSPORTE', NULL, NULL),
(10, 'EQUIPO DE CONSTRUCCION', NULL, NULL),
(11, 'EQUIPOS DE OFICINA', NULL, NULL),
(12, 'EDIFICIOS, TERRENOS E INSTALACIONES', NULL, NULL),
(13, 'ARMAMENTO Y EQIUPO DE DEFENZA', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--

CREATE TABLE `ubicaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ubicaciones`
--

INSERT INTO `ubicaciones` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SOLDADURA', NULL, NULL),
(2, 'GALVANIZADO', NULL, NULL),
(3, 'TROQUELADO', NULL, NULL),
(4, 'ENSAMBLAJE', NULL, NULL),
(5, 'PINTURA', NULL, NULL),
(6, 'POLIETILENO', NULL, NULL),
(7, 'ALAMBRE PUA', NULL, NULL),
(8, 'MANTENIMIENTO', NULL, NULL),
(9, 'G. ALMACEN Y DESPACHO', NULL, NULL),
(10, 'REPUESTOS Y SERVICIOS', NULL, NULL),
(11, 'GERENCIA DE TRANSPORTE', NULL, NULL),
(12, 'GERENCIA DE RECURSOS HUMANOS', NULL, NULL),
(13, 'PRESIDENCIA', NULL, NULL),
(14, 'GERENCIA DE PRODUCCION', NULL, NULL),
(15, 'SEGURIDAD FISICA', NULL, NULL),
(16, 'GERENCIA DE ADMINISTRACION', NULL, NULL),
(17, 'SISTEMAS', NULL, NULL),
(18, 'NOMINA EMPLEADOS', NULL, NULL),
(19, 'HCM', NULL, NULL),
(20, 'CONSULTORIA JURIDICA', NULL, NULL),
(21, 'ALMACEN I', NULL, NULL),
(22, 'ALMACEN II', NULL, NULL),
(23, 'ALMACEN III', NULL, NULL),
(24, 'ALMACEN IV', NULL, NULL),
(25, 'CENTRO DE ACOPIO (PALNTA ALTA)', NULL, NULL),
(26, 'COSTOS', NULL, NULL),
(27, 'CONTABILIDAD', NULL, NULL),
(28, 'COMPRAS', NULL, NULL),
(29, 'RECLUTAMIENTO Y SELECCION', NULL, NULL),
(30, 'SERVICIO MEDICO', NULL, NULL),
(31, 'BIENESTAR SOCIAL', NULL, NULL),
(32, 'REGISTRO Y CONTROL', NULL, NULL),
(33, 'SALA DE CONFERENCIAS', NULL, NULL),
(34, 'COMEDOR, ALMACEN Y DESPACHO', NULL, NULL),
(35, 'GERENCIA DE TRANSPORTE (SEDE CENTRAL)', NULL, NULL),
(36, 'DESPACHO PLANTA BAJA', NULL, NULL),
(37, 'CONTROL Y SEGUIMIENTO', NULL, NULL),
(38, 'PREDESPACHO', NULL, NULL),
(39, 'ANEXO ALMACEN I (PAPELERIA)', NULL, NULL),
(40, 'TALLER MECANICO (REPUESTOS)', NULL, NULL),
(41, 'NOMINA OBREROS', NULL, NULL),
(42, 'RECEPCION', NULL, NULL),
(43, 'COMEDOR EMPLEADOS', NULL, NULL),
(44, 'COMEDOR OBREROS', NULL, NULL),
(45, 'INSTALACIONES VERICA', NULL, NULL),
(46, 'SINDICATO', NULL, NULL),
(47, 'LABORATORIO', NULL, NULL),
(48, 'CONTROL DE PERDIDA (ALMACEN IV)', NULL, NULL),
(49, 'MAQUINA O.M.E', NULL, NULL),
(50, 'VIGILANCIA PRINCIPAL', NULL, NULL),
(51, 'VIGILANCIA GALPON CHINO', NULL, NULL),
(52, 'VIGILANCIA GALPON VI', NULL, NULL),
(53, 'VIGILANCIA VERICA CAGUA', NULL, NULL),
(54, 'VENTAS', NULL, NULL),
(55, 'GALPON CHINO', NULL, NULL),
(56, 'MONTACARGA', NULL, NULL),
(57, 'AREA DE GAS', NULL, NULL),
(58, 'GERENCIA DE TRANSPORTE/VEHICULOS', NULL, NULL),
(59, 'VENEZOLANA DE RIEGO', NULL, NULL),
(60, 'RRHH', NULL, NULL),
(61, 'INVENTARIO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `cedula` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ape` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechanac` date NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_estado_id_foreign` (`estado_id`),
  ADD KEY `productos_material_id_foreign` (`material_id`),
  ADD KEY `productos_tipo_id_foreign` (`tipo_id`),
  ADD KEY `productos_ubicacion_id_foreign` (`ubicacion_id`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reportes_user_id_index` (`user_id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_cedula_unique` (`cedula`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_perfil_id_foreign` (`perfil_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `productos_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materiales` (`id`),
  ADD CONSTRAINT `productos_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`),
  ADD CONSTRAINT `productos_ubicacion_id_foreign` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicaciones` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
