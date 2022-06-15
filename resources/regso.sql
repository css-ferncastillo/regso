CREATE DATABASE IF NOT EXISTS `encuesta_sso`;

USE `encuesta_sso`;

CREATE TABLE IF NOT EXISTS `t_usuarios` { 
    id INT PRIMARY KEY AUTOINCREMENT,
    id_unidad INT NOT NULL, -- depende de t_unidades
    id_tipo_usuario INT NOT NULL, -- depende de t_tipo_usuario
    correo VARCHAR(100) UNIQUE NOT NULL,
    clave VARCHAR(200) NOT NULL,
    nombre1 varchar(50),
    apellido1 varchar(50),
    creacion_dt DATETIME NOT NULL,
    creador VARCHAR(10) NOT NULL,
    creacion_dt DATETIME NOT NULL,
    estado INT NOT NULL -- 0=inactivo, 1=activo
}

CREATE TABLE IF NOT EXISTS `t_control_usuario` {
    id INT PRIMARY KEY AUTOINCREMENT,
    id_usuario INT NOT NULL, -- depende de t_usuarios
    ultimo_acceso DATETIME NOT NULL,
    ip_acceso VARCHAR(20) NOT NULL,
    ultimo_update DATETIME NOT NULL,
    actualizado_por VARCHAR(10) NOT NULL,
}

CREATE TABLE IF NOT EXISTS `t_tipo_usuario`{
    id INT PRIMARY KEY AUTOINCREMENT,
    tipo_usuario VARCHAR(50) NOT NULL
}

CREATE TABLE IF NOT EXISTS `t_unidades`{
    id INT PRIMARY KEY AUTOINCREMENT,
    id_provincia INT NOT NULL, -- depende de t_provincias
    desc_unidad_alterno VARCHAR(255) NOT NULL,
    desc_unidad VARCHAR(255) NOT NULL,
    latitud VARCHAR(10,6) NOT NULL,
    longitud VARCHAR(10,6) NOT NULL,
    estado INT NOT NULL, -- 0=inactivo, 1=activo
    tipo VARCHAR(10) NOT NULL -- 0=unidad, 1=centro de salud
}

CREATE TABLE IF NOT EXISTS `t_provincias`{
    cod_prov SMALLINT(6) UNIQUE,
    desc_prov VARCHAR(255) NOT NULL,
    estado INT NOT NULL, -- 0=inactivo, 1=activo
}

CREATE TABLE IF NOT EXISTS `t_distritos`{
    cod_dist SMALLINT(6) UNIQUE,
    cod_prov SMALLINT(6) NOT NULL, -- depende de t_provincias
    desc_dist VARCHAR(75) NOT NULL
}

CREATE TABLE IF NOT EXISTS `t_corregimientos`{
    cod_correg SMALLINT(6) UNIQUE,
    cod_dist SMALLINT(6) NOT NULL, -- depende de t_distritos
    desc_correg VARCHAR(75) NOT NULL
}

CREATE TABLE IF NOT EXISTS `t_servicios`{
    id INT PRIMARY KEY AUTOINCREMENT,
    desctipcion varchar(35) NOT NULL,
    estado INT NOT NULL -- 0=inactivo, 1=activo
}


CREATE TABLE IF NOT EXISTS `t_actividades`{
    id INT PRIMARY KEY AUTOINCREMENT,
    tipo_actividad INT NOT NULL,
    descripcion VARCHAR(120) NOT NULL,
    estado INT NOT NULL -- 0=inactivo, 1=activo
}

CREATE TABLE IF NOT EXISTS `t_tipo_actividad`{
    id INT PRIMARY KEY AUTOINCREMENT,
    tipo_actividad VARCHAR(50) NOT NULL,
}

CREATE TABLE IF NOT EXISTS `t_servicios`{
    id INT PRIMARY KEY AUTOINCREMENT,
    descripcion VARCHAR(120) NOT NULL,
    estado INT NOT NULL -- 0=inactivo, 1=activo
}


CREATE TABLE IF NOT EXISTS `t_reg_actividades`{
    id INT PRIMARY KEY AUTOINCREMENT,
    id_unidad INT NOT NULL, -- depende de t_unidades => OK
    id_servicio INT NOT NULL, -- depende de t_servicios => OK
    dt_visita DATETIME NOT NULL,
    htrabajadas INT NOT NULL,
    nombre_profecional VARCHAR(75) NOT NULL,
    nombre_empresa VARCHAR(100) NOT NULL,
    num_patronal VARCHAR(40) NOT NULL,
    id_actividad_economica INT NOT NULL, -- depende de t_actividades => NO
    id_referencia INT NOT NULL, -- depende de t_referencias => NO
    num_empleados INT NOT NULL,
    num_hombres INT NOT NULL,
    num_mujeres INT NOT NULL,
    num_beneficiados INT NOT NULL,
    id_corregimiento INT NOT NULL, -- depende de t_corregimientos => OK
    json_actividades longtext NOT NULL,
    id_usuario INT NOT NULL, -- depende de t_usuarios => OK
    dt_creacion DATETIME NOT NULL
}
CREATE TABLE IF NOT EXISTS `t_hoja_especialista`{
    id INT PRIMARY KEY AUTOINCREMENT,
    id_unidad INT NOT NULL, -- depende de t_unidades => OK
    id_servicio INT NOT NULL, -- depende de t_servicios => OK
    dt_atencion DATETIME NOT NULL,
    nombre_profecional VARCHAR(75) NOT NULL,
    lugar_atencion INT NOT NULL,
    h_contratadas INT NOT NULL,
    h_trabajadas INT NOT NULL,
    h_administrativas INT NOT NULL,
    num_vacaciones INT NOT NULL,
    num_incapacidad INT NOT NULL,
    num_fortuitas INT NOT NULL,
    carga_laboral INT NOT NULL,
    cupo_utilizado INT NOT NULL,
    cupo_disponible INT NOT NULL,
    cupo_ausente INT NOT NULL,
    cupo_no_solicitado INT NOT NULL,
    dt_creacion DATETIME NOT NULL,
    id_usuario INT NOT NULL, -- depende de t_usuarios => OK
    estado INT NOT NULL -- 0=inactivo, 1=activo

}
CREATE TABLE IF NOT EXISTS `t_atenciones_especialista`{
    id INT PRIMARY KEY AUTOINCREMENT,
    id_hoja_especialista INT NOT NULL, -- depende de t_hoja_especialista => OK
    id_sexo INT NOT NULL, -- 1=masculino, 2=femenino
    num_cedula VARCHAR(15) NOT NULL,
    edad INT NOT NULL,
    nombre_empresa VARCHAR(100) NOT NULL,
    num_patronal VARCHAR(40) NOT NULL,
    id_tipo_empresa INT NOT NULL, -- depende de t_tipo_empresa => NO
    id_tamano_empresa INT NOT NULL, -- depende de t_tamano_empresa => NO
    id_tipo_asegurado INT NOT NULL, -- depende de t_tipo_asegurado => NO
    id_tipo_atencion INT NOT NULL, -- depende de t_tipo_atencion => NO
    id_tipo_consulta INT NOT NULL, -- depende de t_tipo_consulta => NO
    id_corregimiento INT NOT NULL, -- depende de t_corregimientos => OK
    
}
