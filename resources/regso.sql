-- CONNECTION: url=jdbc:mysql://localhost:3306/
CREATE DATABASE IF NOT EXISTS encuestas_sso;
USE encuestas_sso;

CREATE TABLE IF NOT EXISTS t_usuarios ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_unidad INT NOT NULL, -- depende de t_unidades
    id_tipo_usuario INT NOT NULL, -- depende de t_tipo_usuario
    correo VARCHAR(100) UNIQUE NOT NULL,
    clave VARCHAR(200) NOT NULL,
    nombre1 varchar(50),
    apellido1 varchar(50),
    creador VARCHAR(10) NOT NULL,
    creacion_dt DATETIME NOT NULL,
    estado INT NOT NULL -- 0=inactivo, 1=activo
);

CREATE TABLE IF NOT EXISTS t_control_usuario (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL, -- depende de t_usuarios
    ultimo_acceso DATETIME NOT NULL,
    ip_acceso VARCHAR(20) NOT NULL,
    ultimo_update DATETIME NOT NULL,
    actualizado_por VARCHAR(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS t_tipo_usuario(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    tipo_usuario VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS t_unidades(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_provincia INT NOT NULL, -- depende de t_provincias
    desc_unidad_alterno VARCHAR(255) NOT NULL,
    desc_unidad VARCHAR(255) NOT NULL,
    20latitud VARCHAR(20) NOT NULL,
    longitud VARCHAR(20) NOT NULL,
    estado INT NOT NULL, -- 0=inactivo, 1=activo
    tipo VARCHAR(10) NOT NULL -- 0=unidad, 1=centro de salud
);

CREATE TABLE IF NOT EXISTS t_provincias(
   id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cod_prov SMALLINT(6) UNIQUE,
    desc_prov VARCHAR(255) NOT NULL,
    estado INT NOT NULL -- 0=inactivo, 1=activo
);

CREATE TABLE IF NOT EXISTS t_distritos(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cod_dist SMALLINT(6) UNIQUE,
    id_provincia INT NOT NULL, -- depende de t_provincias
    desc_dist VARCHAR(75) NOT NULL
);

CREATE TABLE IF NOT EXISTS t_corregimientos(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cod_correg SMALLINT(6) UNIQUE,
    id_distrito INT NOT NULL, -- depende de t_distritos
    desc_correg VARCHAR(75) NOT NULL
);

CREATE TABLE IF NOT EXISTS t_servicios(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    desctipcion varchar(35) NOT NULL,
    estado INT NOT NULL -- 0=inactivo, 1=activo
);

CREATE TABLE IF NOT EXISTS t_actividades(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    tipo_actividad INT NOT NULL,
    descripcion VARCHAR(120) NOT NULL,
    estado INT NOT NULL -- 0=inactivo, 1=activo
);

CREATE TABLE IF NOT EXISTS t_tipo_actividad(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    tipo_actividad VARCHAR(50) NOT NULL
);


CREATE TABLE IF NOT EXISTS t_reg_actividades(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_unidad INT NOT NULL, -- depende de t_unidades => OK
    id_servicio INT NOT NULL, -- depende de t_servicios => OK
    dt_visita DATETIME NOT NULL,
    htrabajadas INT NOT NULL,
    nombre_profecional VARCHAR(75) NOT NULL,
    nombre_empresa VARCHAR(100) NOT NULL,
    num_patronal VARCHAR(40) NOT NULL,
    id_actividad_economica INT NOT NULL, -- depende de t_act_economica => OK
    id_referencia INT NOT NULL, -- depende de t_tipo_referencias => NO
    num_empleados INT NOT NULL,
    num_hombres INT NOT NULL,
    num_mujeres INT NOT NULL,
    num_beneficiados INT NOT NULL,
    id_corregimiento INT NOT NULL, -- depende de t_corregimientos => OK
    json_actividades longtext NOT NULL,
    id_usuario INT NOT NULL, -- depende de t_usuarios => OK
    dt_creacion DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS t_ref_empresas(
   id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   ref_empresa VARCHAR(35) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS t_act_economica(
   id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   actividad_economica VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS t_hoja_especialista(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
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

);
CREATE TABLE IF NOT EXISTS t_reg_atenciones(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_hoja_especialista INT NOT NULL, -- depende de t_hoja_especialista => OK
    id_sexo INT NOT NULL, -- 1=masculino, 2=femenino
    num_cedula VARCHAR(15) NOT NULL,
    edad INT NOT NULL,
    nombre_empresa VARCHAR(100) NOT NULL,
    num_patronal VARCHAR(40) NOT NULL,
    id_tipo_empresa INT NOT NULL, -- depende de t_tipo_empresa => OK
    id_tamano_empresa INT NOT NULL, -- depende de t_tamano_empresa => OK
    id_tipo_asegurado INT NOT NULL, -- depende de t_tipo_asegurado => OK
    id_tipo_atencion INT NOT NULL, -- depende de t_tipo_atencion => OK
    id_tipo_consulta INT NOT NULL, -- depende de t_tipo_consulta => OK
    id_corregimiento INT NOT NULL, -- depende de t_corregimientos => OK
    incapacidad INT NOT NULL, -- 1 para si, 0 para no
    dias_incapacidad INT,
    referencia INT NOT NULL, -- depende de t_tipo_referencias
    descripcion_ref1 VARCHAR(30),
    codigo_ref1 VARCHAR(32),
    descripcion_ref2 VARCHAR(30),
    codigo_ref2 VARCHAR(32),
    descripcion_ref3 VARCHAR(30),
    codigo_ref3 VARCHAR(32),
    descripcion_esp1 VARCHAR(30),
    codigo_esp1 VARCHAR(32),
    descripcion_esp2 VARCHAR(30),
    codigo_esp2 VARCHAR(32),
    descripcion_esp3 VARCHAR(30),
    codigo_esp3 VARCHAR(32),
    alta_laboral INT NOT NULL, -- depende de t_alta_laboral
    dt_registro DATE NOT NULL,
    id_usuario INT NOT NULL,
    estado INT NOT NULL
);

CREATE TABLE IF NOT EXISTS t_alta_laboral(
   id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   alta_laboral VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS t_tipo_referencias(
   id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   tipo_referencia VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS t_tipo_empresa(
   id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   tipo_empresa VARCHAR(75) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS t_tipo_asegurado(
   id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   tipo_asegurado VARCHAR(75) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS t_tamano_empresa(
   id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   tamano_empresa VARCHAR(30) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS t_tipo_atencion(
   id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   tipo_atencion VARCHAR(75) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS t_tipo_consulta(
   id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   tipo_consulta VARCHAR(75) UNIQUE NOT NULL
);
