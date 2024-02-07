-- Respaldando la base de datos 'hcpms'
-- Fecha: 2024-02-07 14:35:12

--
-- Estructura de la tabla 'admin'
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'admin'
--

INSERT INTO admin VALUES('2','admin','admin','Administrator','trador');
INSERT INTO admin VALUES('3','doc','doc','Doc Patroclio','Gladiador');
INSERT INTO admin VALUES('5','probando2','probando2','probando2','probando2');
INSERT INTO admin VALUES('6','osman.alvarez','osman','Osman','Alvarez');

--
-- Estructura de la tabla 'auditoria'
--

CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) DEFAULT NULL,
  `accion` varchar(50) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Datos de la tabla 'auditoria'
--

INSERT INTO auditoria VALUES('11','admin','login a plataforma','2024-01-25 06:00:54');
INSERT INTO auditoria VALUES('12','admin','Salio de la plataforma','2024-01-25 06:01:01');
INSERT INTO auditoria VALUES('13','admin','login a plataforma','2024-01-25 06:03:51');
INSERT INTO auditoria VALUES('14','admin','agrego un usuario','2024-01-25 06:04:36');
INSERT INTO auditoria VALUES('15','admin','Edito a un usuario administrador','2024-01-25 06:39:29');
INSERT INTO auditoria VALUES('16','admin','Ha realizado un respaldo','2024-01-25 06:46:36');
INSERT INTO auditoria VALUES('20','admin','Ha realizado un respaldo de la Base de Datos','2024-01-25 07:03:14');
INSERT INTO auditoria VALUES('21','admin','Ha salido de la pagina','2024-01-25 07:07:40');
INSERT INTO auditoria VALUES('22','admin','Ha ingresado a la pagina','2024-01-25 12:18:15');
INSERT INTO auditoria VALUES('23','admin','Ha agregado un usuario médico','2024-01-25 12:21:57');
INSERT INTO auditoria VALUES('24','admin','Ha editado un usuario médico','2024-01-25 12:22:15');
INSERT INTO auditoria VALUES('25','admin','Ha agregado un usuario administrador','2024-01-25 12:28:31');
INSERT INTO auditoria VALUES('26','admin','Ha editado un usuario administrador','2024-01-25 12:28:48');
INSERT INTO auditoria VALUES('27','admin','Ha editado un usuario médico','2024-01-25 13:14:56');
INSERT INTO auditoria VALUES('28','admin','Ha salido de la pagina','2024-01-25 13:16:21');
INSERT INTO auditoria VALUES('29','admin','Ha ingresado a la pagina','2024-01-25 15:57:11');
INSERT INTO auditoria VALUES('30','admin','Ha editado un usuario administrador','2024-01-25 15:57:25');
INSERT INTO auditoria VALUES('31','admin','Ha agregado un usuario médico','2024-01-25 15:58:21');
INSERT INTO auditoria VALUES('32','admin','Ha realizado un respaldo de la Base de Datos','2024-01-25 15:58:39');
INSERT INTO auditoria VALUES('33','admin','Ha salido de la pagina','2024-01-25 15:58:50');
INSERT INTO auditoria VALUES('34','admin','Ha ingresado a la pagina','2024-01-25 17:18:01');
INSERT INTO auditoria VALUES('35','admin','Ha agregado un usuario administrador','2024-01-25 17:20:52');
INSERT INTO auditoria VALUES('36','admin','Ha realizado un respaldo de la Base de Datos','2024-01-25 17:21:15');
INSERT INTO auditoria VALUES('37','admin','Ha realizado un respaldo de la Base de Datos','2024-01-25 17:21:27');
INSERT INTO auditoria VALUES('38','admin','Ha realizado un respaldo de la Base de Datos','2024-01-25 17:21:32');
INSERT INTO auditoria VALUES('39','admin','Ha agregado un usuario médico','2024-01-25 17:27:38');
INSERT INTO auditoria VALUES('40','admin','Ha salido de la pagina','2024-01-25 17:30:01');
INSERT INTO auditoria VALUES('41','osman.alvarez','Ha ingresado a la pagina','2024-01-25 17:30:09');
INSERT INTO auditoria VALUES('42','admin','Ha ingresado a la pagina','2024-02-07 06:31:21');
INSERT INTO auditoria VALUES('43','admin','Ha ingresado a la pagina','2024-02-07 12:38:35');
INSERT INTO auditoria VALUES('44','admin','Ha realizado un respaldo de la Base de Datos','2024-02-07 12:42:56');
INSERT INTO auditoria VALUES('45','admin','Ha salido de la pagina','2024-02-07 12:45:01');
INSERT INTO auditoria VALUES('46','admin','Ha ingresado a la pagina','2024-02-07 14:32:07');
INSERT INTO auditoria VALUES('47','admin','Ha realizado un respaldo de la Base de Datos','2024-02-07 14:34:45');

--
-- Estructura de la tabla 'cita'
--

CREATE TABLE `cita` (
  `com_id` int(50) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) NOT NULL,
  `cita` varchar(255) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `paciente_no` varchar(50) NOT NULL,
  `section` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'cita'
--

INSERT INTO cita VALUES('44','01/26/2024','25/01/2024','Dolor de cabeza y rodilla','13','datos_historias','Done');
INSERT INTO cita VALUES('45','02/07/2024','06/02/2024','dolor de garganta','26','datos_historias','Done');
INSERT INTO cita VALUES('46','02/07/2024','ss','ss','26','datos_historias','Pending');
INSERT INTO cita VALUES('47','02/07/2024','dd','dd','26','datos_historias','Pending');
INSERT INTO cita VALUES('48','02/07/2024','dd','dd','26','datos_historias','Done');
INSERT INTO cita VALUES('49','02/07/2024','hoy','quiero ver prueba','26','datos_historias','Pending');
INSERT INTO cita VALUES('50','02/07/2024','ahoritita','motico de la consu','13','datos_historias','Pending');
INSERT INTO cita VALUES('51','02/07/2024','2024-03-07','gripe','120','datos_historias','Pending');
INSERT INTO cita VALUES('52','02/07/2024','2024-02-08','Tos seca','5','datos_historias','Pending');
INSERT INTO cita VALUES('53','02/07/2024','2024-02-07','123','13','datos_historias','Pending');

--
-- Estructura de la tabla 'datos_historias'
--

CREATE TABLE `datos_historias` (
  `atencion_no` int(11) NOT NULL AUTO_INCREMENT,
  `temp` varchar(4) NOT NULL,
  `tension` varchar(5) NOT NULL,
  `wt` varchar(5) NOT NULL,
  `ht` varchar(5) NOT NULL,
  `sintomas` varchar(2000) NOT NULL,
  `evaluacion` varchar(2000) NOT NULL,
  `diagnostico` varchar(2000) NOT NULL,
  `reporte_med` varchar(2000) NOT NULL,
  `plan` varchar(2000) NOT NULL,
  `nota` varchar(2000) NOT NULL,
  `date` varchar(10) NOT NULL,
  `paciente_no` varchar(11) NOT NULL,
  `idmedico` varchar(30) NOT NULL,
  PRIMARY KEY (`atencion_no`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'datos_historias'
--

INSERT INTO datos_historias VALUES('6','38','130','60','150','Dolor','Dolor','Dolor','Dolor','Dolor','Dolor','25/01/2024','9','15148hdffd23');
INSERT INTO datos_historias VALUES('13','37','120','60','164','Tos','Tos','Tos','Tos','Tos','Tos','25/01/2024','8','15148hdffd23');
INSERT INTO datos_historias VALUES('14','37','120','65','150','cansancio','cansancio','cansancio','cansancio','cansancio','cansancio','25/01/2024','12','14');
INSERT INTO datos_historias VALUES('15','1','1','1','1','1','1','1','1','1','1','25/01/2024','8','14');
INSERT INTO datos_historias VALUES('16','1','1','1','1','1','1','1','1','1','1','25/01/2024','8','14');
INSERT INTO datos_historias VALUES('17','37','120','50','160','síntomas','evalua','gianostica','reporta','recipe','nota','25/01/2024','7','22');
INSERT INTO datos_historias VALUES('18','13','21','22','22','22','22','22','22','22','22','25/01/2024','7','22');
INSERT INTO datos_historias VALUES('19','37','120','45','150','prueba1','prueba1','prueba1','prueba1','prueba1','prueba1','25/01/2024','7','22');
INSERT INTO datos_historias VALUES('20','38','120','50','175','gripon','gripon','gripon','gripon','gripon','gripon','25/01/2024','5','565d14ssd');
INSERT INTO datos_historias VALUES('21','38','120','70','180','Dolor cabeza rodil','me tiene erojo','gripe','Sacar la sangre','Ibuprofeno 800g','ansiedad','26/01/2024','13','565d14ssd');
INSERT INTO datos_historias VALUES('22','37','125','60','170','garganta inflamada','amigdalas con pus','amigdalitis','ir al otorrino','-Amoxicicilina cada 12 horas
-Acetaminofen cada 8 horas','debe volver en una semana para revisión','07/02/2024','26','565d14ssd');
INSERT INTO datos_historias VALUES('23','18','120','120','120','dd','dd','dd','dd','dd','dd','07/02/2024','26','565d14ssd');

--
-- Estructura de la tabla 'paciente'
--

CREATE TABLE `paciente` (
  `paciente_no` varchar(4) NOT NULL,
  `nacionalidad` varchar(1) NOT NULL,
  `cedula` varchar(9) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `birthdate` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `address` varchar(30) NOT NULL,
  `civil_status` varchar(10) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `idmedico` varchar(12) NOT NULL,
  PRIMARY KEY (`paciente_no`),
  UNIQUE KEY `itr_no` (`paciente_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'paciente'
--

INSERT INTO paciente VALUES('1','V','16945845','Johnny','Deper','1986-02-25','37','Barrio Union','Divorciado','Masculino','15148hdffd23');
INSERT INTO paciente VALUES('10','V','19191900','Jorge','Flores','1998-04-07','25','Cabudare','Soltero(a)','Masculino','565d14ssd');
INSERT INTO paciente VALUES('11','V','11212121','Salami','Napoles','08/08/2012','12','as12','Casado(a)','Femenino','565d14ssd');
INSERT INTO paciente VALUES('12','V','25252014','Margarita','Jozic','2000-11-09','23','carr','Soltero(a)','Femenino','15148hdffd23');
INSERT INTO paciente VALUES('120','V','24563365','Pedro','Bustamante','2000-02-06','24','venezuela','Soltero(a)','Masculino','565d14ssd');
INSERT INTO paciente VALUES('13','V','6254152','Hauser','Quando','2001-10-18','22','carrera 29','Soltero(a)','Masculino','565d14ssd');
INSERT INTO paciente VALUES('16','V','16241253','Fran','Sinatra','2000-01-24','24','24','Casado(a)','Masculino','333777a');
INSERT INTO paciente VALUES('2','V','4598253','Elon','Musk','06/28/1971','52','Barquisimeto','Casado(a)','Masculino','13235562');
INSERT INTO paciente VALUES('21','V','5624587','Juan Diego','Vega','2000-04-19','23','Carrera 23 entre 10 y 11','Casado(a)','Masculino','15148hdffd23');
INSERT INTO paciente VALUES('26','V','26536635','Linda','Tayler','2001-01-18','23','carr 25','Casado(a)','Femenino','565d14ssd');
INSERT INTO paciente VALUES('3','V','14125514','Marie','Curie','02/16/1988','35','Varsovia, Polonia','Casado(a)','Femenino','13235562');
INSERT INTO paciente VALUES('4','V','16525235','Juancho','Perez','10/18/2001','22','republica dominicana','Casado(a)','Masculino','25262402');
INSERT INTO paciente VALUES('40','V','15245369','Jose','Rodriguez','1995-04-25','28','Av vargas con 27','Casado(a)','Masculino','123521485sde');
INSERT INTO paciente VALUES('5','V','12672747','Presto','Carlo','2002-02-22','20','s20','Casado(a)','Masculino','565d14ssd');
INSERT INTO paciente VALUES('6','V','28504401','Pelo','ncito','04/09/2009','15','12','Soltero(a)','Masculino','13235562');
INSERT INTO paciente VALUES('7','V','28204402','Esperanza','Sanchez','10/18/2001','22','carrera 29','Soltero(a)','Femenino','565d14ssd');
INSERT INTO paciente VALUES('8','V','11444222','Bobi','Marleny','1998-04-08','25','Carrera 10','Viudo(a)','Masculino','15148hdffd23');
INSERT INTO paciente VALUES('9','V','28204000','Yajaira','Revete','1974-07-12','49','caracas','Casado(a)','Femenino','15148hdffd23');

--
-- Estructura de la tabla 'secretaria'
--

CREATE TABLE `secretaria` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL,
  `idmedico` varchar(20) NOT NULL,
  `ci_secretaria` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'secretaria'
--

INSERT INTO secretaria VALUES('24','secre','secre','secre','secre','Secre','1234','111222');
INSERT INTO secretaria VALUES('25','agustiniana','agustiniana','Agustina','Hipona','Secre','565d14ssd','25262402');
INSERT INTO secretaria VALUES('26','petronila','petronila','Petronila','Piedra','Secre','565d14ssd','26524256');
INSERT INTO secretaria VALUES('27','secretaria','secretaria','Secretaria de Astro','Build','Secre','333777a','25698569');
INSERT INTO secretaria VALUES('28','antonias','antonias','Antonias','Bandas','Secre','15148hdffd23','29658745');

--
-- Estructura de la tabla 'user'
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL,
  `especialidad` varchar(20) NOT NULL,
  `idmedico` varchar(20) NOT NULL,
  `cimedico` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'user'
--

INSERT INTO user VALUES('14','antonio','antonio','Antonio','Banderas','Medic','Psiquiatra','15148hdffd23','18456321');
INSERT INTO user VALUES('20','javier','javier','Javier','Milei','Medic','Traumatologo','158234s56d9asc12','13235562');
INSERT INTO user VALUES('22','agustin','agustin','Agustin','Laje','Medic','Neurocirujano','565d14ssd','10236541');
INSERT INTO user VALUES('25','astro','astro','Astro','Build','Medic','Podologo','333777a','15263254');
INSERT INTO user VALUES('27','jacinto','jacinto','Jacinto','Convit','Medic','Investigador y cient','123456jc','5421542');
INSERT INTO user VALUES('28','lutero','lutero','lutero','lu','Medic','oftalmologo','889910a','15425541');
INSERT INTO user VALUES('29','juan','juan','Juan','Sosa','Medic','Cirujano','123521485sdef','5214263');

