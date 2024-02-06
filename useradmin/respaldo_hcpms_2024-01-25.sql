-- Respaldando la base de datos 'hcpms'
-- Fecha: 2024-01-25 17:21:32

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Estructura de la tabla 'complaints'
--

CREATE TABLE `complaints` (
  `com_id` int(50) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) NOT NULL,
  `complaints` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `paciente_no` varchar(50) NOT NULL,
  `section` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'complaints'
--

INSERT INTO complaints VALUES('13','01/21/2024','20/01/2024','dolor de cabeza','112','Rehabilitation','Pending');
INSERT INTO complaints VALUES('14','01/21/2024','20/01/2024','dolor de cabeza','112','Rehabilitation','Pending');
INSERT INTO complaints VALUES('15','01/21/2024','20/01/2024','dolor de cabeza','112','Rehabilitation','Pending');
INSERT INTO complaints VALUES('16','01/23/2024','22/01/2024','Dolor de cabeza','9','Rehabilitation','Done');
INSERT INTO complaints VALUES('17','01/23/2024','22/01/2024','ninguna','15','Rehabilitation','Pending');
INSERT INTO complaints VALUES('18','01/23/2024','22/01/2024','movi','112','Rehabilitation','Pending');
INSERT INTO complaints VALUES('19','01/23/2024','df','dfd','112','Rehabilitation','Pending');
INSERT INTO complaints VALUES('20','01/24/2024','23/01/2024','Dolor estomacal','1005','Rehabilitation','Pending');
INSERT INTO complaints VALUES('21','01/24/2024','23/01/2024','Dolor estomacal','1005','Rehabilitation','Pending');
INSERT INTO complaints VALUES('22','01/24/2024','23/011/2022','ni','1005','Rehabilitation','Pending');
INSERT INTO complaints VALUES('23','01/24/2024','23/011/2022','ni','1005','Rehabilitation','Pending');
INSERT INTO complaints VALUES('24','01/24/2024','23/011/2022','ni','1005','Rehabilitation','Pending');
INSERT INTO complaints VALUES('25','01/24/2024','10','10','1005','Rehabilitation','Pending');
INSERT INTO complaints VALUES('29','01/24/2024','23/01/2024','otro motivo','9','Rehabilitation','Pending');
INSERT INTO complaints VALUES('30','01/24/2024','23/01/2024','motivo3','9','Rehabilitation','Done');
INSERT INTO complaints VALUES('31','01/25/2024','24/01/2024','estornudos','21','Rehabilitation','Done');
INSERT INTO complaints VALUES('32','01/25/2024','24/01/2024','Mareos','12','Rehabilitation','Done');
INSERT INTO complaints VALUES('33','01/25/2024','24/01/2024','Estreñimiento','8','Rehabilitation','Done');
INSERT INTO complaints VALUES('34','01/25/2024','24/01/2024','Estreñimiento','8','Rehabilitation','Done');
INSERT INTO complaints VALUES('35','01/25/2024','','','8','Rehabilitation','Pending');
INSERT INTO complaints VALUES('38','01/25/2024','','','8','Rehabilitation','Done');
INSERT INTO complaints VALUES('39','01/25/2024','24/01/2024','mareo y vomito','8','Rehabilitation','Pending');
INSERT INTO complaints VALUES('40','01/25/2024','24/01/2024','mareo y vomito','8','Rehabilitation','Pending');
INSERT INTO complaints VALUES('41','01/25/2024','23/01/2024','Dolor estomacal','7','Rehabilitation','Done');
INSERT INTO complaints VALUES('42','01/25/2024','25/01/2024','Dolor','7','Rehabilitation','Done');
INSERT INTO complaints VALUES('43','01/25/2024','25/01/2024','gripon','5','Rehabilitation','Done');

--
-- Estructura de la tabla 'datos_historias'
--

CREATE TABLE `datos_historias` (
  `rehab_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `idmedico` varchar(20) NOT NULL,
  PRIMARY KEY (`rehab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `gender` varchar(10) NOT NULL,
  `idmedico` varchar(12) NOT NULL,
  PRIMARY KEY (`paciente_no`),
  UNIQUE KEY `paciente_no` (`paciente_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'paciente'
--

INSERT INTO paciente VALUES('1','V','16945845','Johnny','Deper','1986-02-25','37','Barrio Union','Divorciado','Masculino','15148hdffd23');
INSERT INTO paciente VALUES('10','V','19191900','George','Washington','02/22/2001','22','a','Casado(a)','Masculino','565d14ssd');
INSERT INTO paciente VALUES('11','V','11212121','Salami','Napoles','08/08/2012','12','as12','Casado(a)','Femenino','565d14ssd');
INSERT INTO paciente VALUES('12','V','25252014','Margarita','Jozic','2000-11-09','23','carr','Soltero(a)','Femenino','15148hdffd23');
INSERT INTO paciente VALUES('13','V','6254152','Hauser','Quando','2001-10-18','22','carrera 29','Soltero(a)','Masculino','565d14ssd');
INSERT INTO paciente VALUES('16','V','16241253','Fran','Sinatra','2000-01-24','24','24','Casado(a)','Masculino','333777a');
INSERT INTO paciente VALUES('2','V','4598253','Elon','Musk','06/28/1971','52','Barquisimeto','Casado(a)','Masculino','13235562');
INSERT INTO paciente VALUES('21','V','5624587','Juan Diego','Vega','2000-04-19','23','Carrera 23 entre 10 y 11','Casado(a)','Masculino','15148hdffd23');
INSERT INTO paciente VALUES('3','V','14125514','Marie','Curie','02/16/1988','35','Varsovia, Polonia','Casado(a)','Femenino','13235562');
INSERT INTO paciente VALUES('4','V','16525235','Juancho','Perez','10/18/2001','22','republica dominicana','Casado(a)','Masculino','25262402');
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'user'
--

INSERT INTO user VALUES('14','antonio','antonio','Antonio','Banderas','Medic','Psiquiatra','15148hdffd23','18456321');
INSERT INTO user VALUES('20','javier','javier','Javier','Milei','Medic','Traumatologo','158234s56d9asc12','13235562');
INSERT INTO user VALUES('22','agustin','agustin','Agustin','Laje','Medic','Neurocirujano','565d14ssd','10236541');
INSERT INTO user VALUES('25','astro','astro','Astro','Build','Medic','Podologo','333777a','15263254');
INSERT INTO user VALUES('27','jacinto','jacinto','Jacinto','Convit','Medic','Investigador y cient','123456jc','5421542');
INSERT INTO user VALUES('28','lutero','lutero','lutero','lu','Medic','oftalmologo','889910a','15425541');

