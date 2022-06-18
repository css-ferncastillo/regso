-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2022 at 03:25 PM
-- Server version: 10.8.3-MariaDB
-- PHP Version: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `encuestas_sso`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_actividades`
--

CREATE TABLE `t_actividades` (
  `id` int(11) NOT NULL,
  `tipo_actividad` int(11) NOT NULL,
  `descripcion` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_act_economica`
--

CREATE TABLE `t_act_economica` (
  `id` int(11) NOT NULL,
  `actividad_economica` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_alta_laboral`
--

CREATE TABLE `t_alta_laboral` (
  `id` int(11) NOT NULL,
  `alta_laboral` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_control_usuario`
--

CREATE TABLE `t_control_usuario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `ultimo_acceso` datetime NOT NULL,
  `ip_acceso` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ultimo_update` datetime NOT NULL,
  `actualizado_por` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_corregimientos`
--

CREATE TABLE `t_corregimientos` (
  `id` int(11) NOT NULL,
  `cod_correg` smallint(6) DEFAULT NULL,
  `id_distrito` int(11) NOT NULL,
  `desc_correg` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_distritos`
--

CREATE TABLE `t_distritos` (
  `id` int(11) NOT NULL,
  `cod_dist` smallint(6) DEFAULT NULL,
  `id_provincia` int(11) NOT NULL,
  `desc_dist` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_hoja_especialista`
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

-- --------------------------------------------------------

--
-- Table structure for table `t_provincias`
--

CREATE TABLE `t_provincias` (
  `id` int(11) NOT NULL,
  `cod_prov` smallint(6) DEFAULT NULL,
  `desc_prov` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_ref_empresas`
--

CREATE TABLE `t_ref_empresas` (
  `id` int(11) NOT NULL,
  `ref_empresa` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_reg_actividades`
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
-- Table structure for table `t_reg_atenciones`
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
  `id_tamano_empresa` int(11) NOT NULL,
  `id_tipo_asegurado` int(11) NOT NULL,
  `id_tipo_atencion` int(11) NOT NULL,
  `id_tipo_consulta` int(11) NOT NULL,
  `id_corregimiento` int(11) NOT NULL,
  `incapacidad` int(11) NOT NULL,
  `dias_incapacidad` int(11) DEFAULT NULL,
  `id_referencia` int(11) NOT NULL,
  `descripcion_ref1` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_ref1` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion_ref2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_ref2` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion_ref3` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_ref3` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion_esp1` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_esp1` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion_esp2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_esp2` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion_esp3` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_esp3` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_alta_laboral` int(11) NOT NULL,
  `dt_registro` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_servicios`
--

CREATE TABLE `t_servicios` (
  `id` int(11) NOT NULL,
  `desctipcion` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_tamano_empresa`
--

CREATE TABLE `t_tamano_empresa` (
  `id` int(11) NOT NULL,
  `tamano_empresa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_tipo_actividad`
--

CREATE TABLE `t_tipo_actividad` (
  `id` int(11) NOT NULL,
  `tipo_actividad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_tipo_asegurado`
--

CREATE TABLE `t_tipo_asegurado` (
  `id` int(11) NOT NULL,
  `tipo_asegurado` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_tipo_atencion`
--

CREATE TABLE `t_tipo_atencion` (
  `id` int(11) NOT NULL,
  `tipo_atencion` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_tipo_consulta`
--

CREATE TABLE `t_tipo_consulta` (
  `id` int(11) NOT NULL,
  `tipo_consulta` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_tipo_empresa`
--

CREATE TABLE `t_tipo_empresa` (
  `id` int(11) NOT NULL,
  `tipo_empresa` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_tipo_referencias`
--

CREATE TABLE `t_tipo_referencias` (
  `id` int(11) NOT NULL,
  `tipo_referencia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_tipo_usuario`
--

CREATE TABLE `t_tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo_usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_unidades`
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

-- --------------------------------------------------------

--
-- Table structure for table `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clave` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creador` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creacion_dt` datetime NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_actividades`
--
ALTER TABLE `t_actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_act_tactividad` (`tipo_actividad`);

--
-- Indexes for table `t_act_economica`
--
ALTER TABLE `t_act_economica`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `actividad_economica` (`actividad_economica`);

--
-- Indexes for table `t_alta_laboral`
--
ALTER TABLE `t_alta_laboral`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alta_laboral` (`alta_laboral`);

--
-- Indexes for table `t_control_usuario`
--
ALTER TABLE `t_control_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cu_usuario` (`id_usuario`);

--
-- Indexes for table `t_corregimientos`
--
ALTER TABLE `t_corregimientos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cod_correg` (`cod_correg`),
  ADD KEY `fk_pro_distrito` (`id_distrito`);

--
-- Indexes for table `t_distritos`
--
ALTER TABLE `t_distritos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cod_dist` (`cod_dist`),
  ADD KEY `fk_dis_provincia` (`id_provincia`);

--
-- Indexes for table `t_hoja_especialista`
--
ALTER TABLE `t_hoja_especialista`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_he_unidad` (`id_unidad`),
  ADD KEY `fk_he_servicio` (`id_servicio`),
  ADD KEY `fk_he_ucreador` (`id_usuario`);

--
-- Indexes for table `t_provincias`
--
ALTER TABLE `t_provincias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cod_prov` (`cod_prov`);

--
-- Indexes for table `t_ref_empresas`
--
ALTER TABLE `t_ref_empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ref_empresa` (`ref_empresa`);

--
-- Indexes for table `t_reg_actividades`
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
-- Indexes for table `t_reg_atenciones`
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
  ADD KEY `fk_rat_altalab` (`id_alta_laboral`);

--
-- Indexes for table `t_servicios`
--
ALTER TABLE `t_servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_tamano_empresa`
--
ALTER TABLE `t_tamano_empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tamano_empresa` (`tamano_empresa`);

--
-- Indexes for table `t_tipo_actividad`
--
ALTER TABLE `t_tipo_actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_tipo_asegurado`
--
ALTER TABLE `t_tipo_asegurado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_asegurado` (`tipo_asegurado`);

--
-- Indexes for table `t_tipo_atencion`
--
ALTER TABLE `t_tipo_atencion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_atencion` (`tipo_atencion`);

--
-- Indexes for table `t_tipo_consulta`
--
ALTER TABLE `t_tipo_consulta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_consulta` (`tipo_consulta`);

--
-- Indexes for table `t_tipo_empresa`
--
ALTER TABLE `t_tipo_empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_empresa` (`tipo_empresa`);

--
-- Indexes for table `t_tipo_referencias`
--
ALTER TABLE `t_tipo_referencias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_referencia` (`tipo_referencia`);

--
-- Indexes for table `t_tipo_usuario`
--
ALTER TABLE `t_tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_unidades`
--
ALTER TABLE `t_unidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_u_provincia` (`id_provincia`);

--
-- Indexes for table `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `fk_u_tipo_usuario` (`id_tipo_usuario`),
  ADD KEY `fk_u_unidad` (`id_unidad`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_actividades`
--
ALTER TABLE `t_actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_act_economica`
--
ALTER TABLE `t_act_economica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_alta_laboral`
--
ALTER TABLE `t_alta_laboral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_control_usuario`
--
ALTER TABLE `t_control_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_corregimientos`
--
ALTER TABLE `t_corregimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_distritos`
--
ALTER TABLE `t_distritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_hoja_especialista`
--
ALTER TABLE `t_hoja_especialista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_provincias`
--
ALTER TABLE `t_provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_ref_empresas`
--
ALTER TABLE `t_ref_empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_reg_actividades`
--
ALTER TABLE `t_reg_actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_reg_atenciones`
--
ALTER TABLE `t_reg_atenciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_servicios`
--
ALTER TABLE `t_servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_tamano_empresa`
--
ALTER TABLE `t_tamano_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_tipo_actividad`
--
ALTER TABLE `t_tipo_actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_tipo_asegurado`
--
ALTER TABLE `t_tipo_asegurado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_tipo_atencion`
--
ALTER TABLE `t_tipo_atencion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_tipo_consulta`
--
ALTER TABLE `t_tipo_consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_tipo_empresa`
--
ALTER TABLE `t_tipo_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_tipo_referencias`
--
ALTER TABLE `t_tipo_referencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_tipo_usuario`
--
ALTER TABLE `t_tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_unidades`
--
ALTER TABLE `t_unidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_actividades`
--
ALTER TABLE `t_actividades`
  ADD CONSTRAINT `fk_act_tactividad` FOREIGN KEY (`tipo_actividad`) REFERENCES `t_tipo_actividad` (`id`);

--
-- Constraints for table `t_control_usuario`
--
ALTER TABLE `t_control_usuario`
  ADD CONSTRAINT `fk_cu_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id`);

--
-- Constraints for table `t_corregimientos`
--
ALTER TABLE `t_corregimientos`
  ADD CONSTRAINT `fk_pro_distrito` FOREIGN KEY (`id_distrito`) REFERENCES `t_distritos` (`id`);

--
-- Constraints for table `t_distritos`
--
ALTER TABLE `t_distritos`
  ADD CONSTRAINT `fk_dis_provincia` FOREIGN KEY (`id_provincia`) REFERENCES `t_provincias` (`id`);

--
-- Constraints for table `t_hoja_especialista`
--
ALTER TABLE `t_hoja_especialista`
  ADD CONSTRAINT `fk_he_servicio` FOREIGN KEY (`id_servicio`) REFERENCES `t_servicios` (`id`),
  ADD CONSTRAINT `fk_he_ucreador` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id`),
  ADD CONSTRAINT `fk_he_unidad` FOREIGN KEY (`id_unidad`) REFERENCES `t_unidades` (`id`);

--
-- Constraints for table `t_reg_actividades`
--
ALTER TABLE `t_reg_actividades`
  ADD CONSTRAINT `fk_rega_aeconomica` FOREIGN KEY (`id_actividad_economica`) REFERENCES `t_act_economica` (`id`),
  ADD CONSTRAINT `fk_rega_correg` FOREIGN KEY (`id_corregimiento`) REFERENCES `t_corregimientos` (`id`),
  ADD CONSTRAINT `fk_rega_referencia` FOREIGN KEY (`id_referencia`) REFERENCES `t_ref_empresas` (`id`),
  ADD CONSTRAINT `fk_rega_servicio` FOREIGN KEY (`id_servicio`) REFERENCES `t_servicios` (`id`),
  ADD CONSTRAINT `fk_rega_ucreador` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id`),
  ADD CONSTRAINT `fk_rega_unidad` FOREIGN KEY (`id_unidad`) REFERENCES `t_unidades` (`id`);

--
-- Constraints for table `t_reg_atenciones`
--
ALTER TABLE `t_reg_atenciones`
  ADD CONSTRAINT `fk_rat_` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id`),
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
-- Constraints for table `t_unidades`
--
ALTER TABLE `t_unidades`
  ADD CONSTRAINT `fk_u_provincia` FOREIGN KEY (`id_provincia`) REFERENCES `t_provincias` (`id`);

--
-- Constraints for table `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD CONSTRAINT `fk_u_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `t_tipo_usuario` (`id`),
  ADD CONSTRAINT `fk_u_unidad` FOREIGN KEY (`id_unidad`) REFERENCES `t_unidades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
