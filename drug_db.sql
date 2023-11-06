-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2023 a las 02:54:54
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `drug_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_inscripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `tipo_inscripcion`) VALUES
(1, 'Responsable Inscripto'),
(2, 'Monotributista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2013_10_25_205837_create_categorias_table', 1),
(18, '2013_10_26_173142_create_roles_table', 1),
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(24, '2023_10_25_221002_create_productos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rubro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subrubro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `producto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_costo` double(8,2) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iva` double(8,2) DEFAULT NULL,
  `ibb` double(8,2) DEFAULT NULL,
  `impuesto_provincia` double(8,2) DEFAULT NULL,
  `precio_venta` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `rubro`, `subrubro`, `producto`, `marca`, `stock`, `precio_costo`, `foto`, `iva`, `ibb`, `impuesto_provincia`, `precio_venta`, `created_at`, `updated_at`) VALUES
(1, 'Quimicos', 'Aspirables', 'Cocaina 1gr.', 'White Lotus', 12, 10000.00, '1699231217cocaina.jpg', 12100.00, 12402.50, 12774.58, 19161.86, '2023-11-06 03:40:17', '2023-11-06 04:10:43'),
(2, 'Orgánico', 'Consumibles', 'Cannabis 10gr.', 'Marley´s sun', 8, 4000.00, '1699231435cannabis.jpg', 4840.00, 10.00, 5109.83, 7664.74, '2023-11-06 03:43:55', '2023-11-06 03:43:55'),
(3, 'Quimicos', 'Consumibles', 'Hachis 1gr.', 'HACHU!!', 5, 3000.00, '1699233179hachis.png', 3630.00, 5.00, 3832.37, 5748.56, '2023-11-06 04:12:59', '2023-11-06 04:12:59'),
(4, 'Quimicos', 'Aspirables', 'Tussi 1gr.', 'PINKY', 3, 7500.00, '1699233255tussi.png', 9075.00, 3.00, 9580.93, 14371.40, '2023-11-06 04:14:15', '2023-11-06 04:14:15'),
(5, 'Quimicos', 'Consumibles', 'LSD 1gr.', 'LGTV', 19, 12000.00, '1699233367lsd.png', 14520.00, 20.00, 15329.49, 22994.24, '2023-11-06 04:16:07', '2023-11-06 04:16:07'),
(6, 'Psicodélicos', 'Consumibles', 'Peyote', 'Coyote', 15, 5400.00, '1699233466peyote.jpg', 6534.00, 15.00, 6898.27, 10347.41, '2023-11-06 04:17:46', '2023-11-06 04:17:46'),
(7, 'Farmacos', 'Aspirables', 'Ketamina 5gr.', 'Tiro al Blanco', 17, 3000.00, '1699233614ketamina.jpg', 3630.00, 17.00, 3832.37, 5748.56, '2023-11-06 04:20:14', '2023-11-06 04:20:14'),
(8, 'Farmacos', 'Consumibles', 'Fentanilo 0.5mg', 'Sleepy Head', 50, 7000.00, '1699233782fentanilo.jpg', 8470.00, 50.00, 8942.20, 13413.30, '2023-11-06 04:23:02', '2023-11-06 04:23:02'),
(9, 'Orgánico', 'Consumibles', 'Ayahuasca 10gr.', 'Tupac Amaru', 30, 5500.00, '1699233889ayahuasca.jpg', 6655.00, 30.00, 7026.02, 10539.02, '2023-11-06 04:24:49', '2023-11-06 04:24:49'),
(10, 'Quimicos', 'Inyectables', 'GHB 10ml.', 'GITHUB', 2, 50000.00, '1699234012ghb.jpg', 60500.00, 2.00, 63872.88, 95809.31, '2023-11-06 04:26:52', '2023-11-06 04:26:52'),
(11, 'Orgánico', 'Consumibles', 'Paquete Tabaco', 'KIEL', 50, 3000.00, '1699234130tabaco.jpg', 3630.00, 50.00, 3832.37, 5748.56, '2023-11-06 04:28:50', '2023-11-06 04:28:50'),
(12, 'Psicodélicos', 'Consumibles', 'Hongos 1gr.', 'Super Mario', 22, 6900.00, '1699234228hongos.jpg', 8349.00, 22.00, 8814.46, 13221.69, '2023-11-06 04:30:28', '2023-11-06 04:30:28'),
(13, 'Orgánico', 'Consumibles', 'Salvia Divinorum', 'Salvia', 1, 15000.00, '1699234329salvia.jpg', 18150.00, 1.00, 19161.86, 28742.79, '2023-11-06 04:32:09', '2023-11-06 04:32:09'),
(14, 'Orgánico', 'Consumibles', 'Oppio', 'OP', 5, 4590.00, '1699234405oppio.jpeg', 5553.90, 5.00, 5863.53, 8795.29, '2023-11-06 04:33:25', '2023-11-06 04:33:25'),
(15, 'Quimicos', 'Inyectables', 'Heroína', 'Super Man', 2, 9000.00, '1699234501heroina.jpg', 10890.00, 2.00, 11497.12, 17245.68, '2023-11-06 04:35:01', '2023-11-06 04:35:01'),
(16, 'Anabólicos', 'Inyectables', 'Trembolona', 'UTLab', 20, 25000.00, '1699234608trembolona.jpeg', 30250.00, 20.00, 31936.44, 47904.66, '2023-11-06 04:36:48', '2023-11-06 04:36:48'),
(17, 'Quimicos', 'Consumibles', 'Metanfetamína', 'Heisenberg', 8, 60000.00, '1699234817meta.jpg', 72600.00, 8.00, 76647.45, 114971.18, '2023-11-06 04:40:17', '2023-11-06 04:40:17'),
(18, 'Anabólicos', 'Consumibles', 'Prednisona 50mg.', 'CALOX', 30, 7690.00, '1699234904Prednisonapng.png', 9304.90, 30.00, 9823.65, 14735.47, '2023-11-06 04:41:44', '2023-11-06 04:41:44'),
(19, 'Anabólicos', 'Consumibles', 'Cortisol 20mg.', 'AMiX', 11, 12500.00, '1699234999cortisol.jpg', 15125.00, 11.00, 15968.22, 23952.33, '2023-11-06 04:43:19', '2023-11-06 04:43:19'),
(20, 'Anabólicos', 'Inyectables', 'Dexametasona 20ml.', 'Proagro', 10, 9900.00, '1699235128Dexametasona.png', 11979.00, 10.00, 12646.83, 18970.24, '2023-11-06 04:45:28', '2023-11-06 04:45:28'),
(21, 'Anabólicos', 'Inyectables', 'Nandrolona 25ml.', 'Reveex', 3, 7900.00, '1699235239Nandrol.png', 9559.00, 3.00, 10091.91, 15137.87, '2023-11-06 04:47:19', '2023-11-06 04:47:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `created_at`, `updated_at`) VALUES
(1, 'administrador', NULL, NULL),
(2, 'usuario', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `domicilio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_afip` bigint(20) UNSIGNED NOT NULL,
  `cuit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_iibb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inicio_actividad` date NOT NULL,
  `id_rol` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `razon_social`, `telefono`, `domicilio`, `id_afip`, `cuit`, `cod_iibb`, `inicio_actividad`, `id_rol`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Agustin Garcia', 'agustingarcia@gmail.com', NULL, 'DrugStore S.R.L', 2302599, 'Calle 1 N°420', 1, '20458889222', '11112', '2023-11-04', 1, '$2y$10$fiw53aOF13IAXsLQl60WxeK6/W9uI6RBR4bbe/O3bFNBcsy1L2pNG', NULL, '2023-11-06 03:39:27', '2023-11-06 03:39:27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_afip_foreign` (`id_afip`),
  ADD KEY `users_id_rol_foreign` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_afip_foreign` FOREIGN KEY (`id_afip`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_id_rol_foreign` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
