-- Respaldando la base de datos 'hcpms'
-- Fecha: 2024-01-25 03:44:02

--
-- Estructura de la tabla 'admin'
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `idmedico` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'admin'
--

INSERT INTO admin VALUES('2','admin','admin','Administrator','',NULL);
INSERT INTO admin VALUES('3','doct','doct','Doc Patroclio','Gladiador',NULL);

--
-- Estructura de la tabla 'birthing'
--

CREATE TABLE `birthing` (
  `birth_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `chief_complaint` varchar(100) NOT NULL,
  `history` varchar(100) NOT NULL,
  `lmp` varchar(15) NOT NULL,
  `edc` varchar(15) NOT NULL,
  `aog` varchar(15) NOT NULL,
  `G` varchar(15) NOT NULL,
  `P` varchar(15) NOT NULL,
  `1` varchar(15) NOT NULL,
  `2` varchar(15) NOT NULL,
  `3` varchar(15) NOT NULL,
  `4` varchar(15) NOT NULL,
  `bp1` varchar(15) NOT NULL,
  `bp2` varchar(15) NOT NULL,
  `pr` varchar(15) NOT NULL,
  `rr` varchar(15) NOT NULL,
  `T` varchar(15) NOT NULL,
  `head_neck` varchar(15) NOT NULL,
  `chest` varchar(15) NOT NULL,
  `heart` varchar(15) NOT NULL,
  `abdomen` varchar(15) NOT NULL,
  `fhb` varchar(15) NOT NULL,
  `loc` varchar(15) NOT NULL,
  `extremities` varchar(15) NOT NULL,
  `vulva` varchar(15) NOT NULL,
  `vagina` varchar(15) NOT NULL,
  `cervix` varchar(15) NOT NULL,
  `uterus` varchar(15) NOT NULL,
  `bow` varchar(15) NOT NULL,
  `presentation` varchar(15) NOT NULL,
  `vaginal_discharge` varchar(15) NOT NULL,
  `staff` varchar(30) NOT NULL,
  `paciente_no` varchar(4) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`birth_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'birthing'
--


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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'cita'
--

INSERT INTO cita VALUES('1','09/08/2018','Dolor Muela','caries','1111','Dental','Done');
INSERT INTO cita VALUES('2','01/05/2024','hola vino de nuevo.04/01/2024','Observaciones vista el 04/01/2024','1111','Dental','Pending');
INSERT INTO cita VALUES('3','01/05/2024','g','g','1111','Dental','Done');
INSERT INTO cita VALUES('4','01/05/2024','muelas','caries','1111','Dental','Done');
INSERT INTO cita VALUES('5','01/09/2024','5','5','5','Fecalysis','Done');
INSERT INTO cita VALUES('6','01/10/2024','otra','otra','1111','Dental','Done');
INSERT INTO cita VALUES('7','01/10/2024','otra2','otra2','1111','Dental','Pending');
INSERT INTO cita VALUES('8','01/13/2024','Vomito, Diarrea, Fiebre, Tos espectorante, etc...','Diagnostico','15','Fecalysis','Pending');
INSERT INTO cita VALUES('9','01/13/2024','fgdfg','fgdgf','15','Dental','Pending');
INSERT INTO cita VALUES('10','01/13/2024','fgdfgdf','fgdfg','15','Fecalysis','Pending');
INSERT INTO cita VALUES('11','01/13/2024','fgdfg','fgfdg','15','Fecalysis','Pending');
INSERT INTO cita VALUES('12','01/18/2024','ninguna','no lo vi','1111','Dental','Pending');
INSERT INTO cita VALUES('13','01/21/2024','20/01/2024','dolor de cabeza','112','datos_historias','Pending');
INSERT INTO cita VALUES('14','01/21/2024','20/01/2024','dolor de cabeza','112','datos_historias','Pending');
INSERT INTO cita VALUES('15','01/21/2024','20/01/2024','dolor de cabeza','112','datos_historias','Pending');
INSERT INTO cita VALUES('16','01/23/2024','22/01/2024','Dolor de cabeza','9','datos_historias','Done');
INSERT INTO cita VALUES('17','01/23/2024','22/01/2024','ninguna','15','datos_historias','Pending');
INSERT INTO cita VALUES('18','01/23/2024','22/01/2024','movi','112','datos_historias','Pending');
INSERT INTO cita VALUES('19','01/23/2024','df','dfd','112','datos_historias','Pending');
INSERT INTO cita VALUES('20','01/24/2024','23/01/2024','Dolor estomacal','1005','datos_historias','Pending');
INSERT INTO cita VALUES('21','01/24/2024','23/01/2024','Dolor estomacal','1005','datos_historias','Pending');
INSERT INTO cita VALUES('22','01/24/2024','23/011/2022','ni','1005','datos_historias','Pending');
INSERT INTO cita VALUES('23','01/24/2024','23/011/2022','ni','1005','datos_historias','Pending');
INSERT INTO cita VALUES('24','01/24/2024','23/011/2022','ni','1005','datos_historias','Pending');
INSERT INTO cita VALUES('25','01/24/2024','10','10','1005','datos_historias','Pending');
INSERT INTO cita VALUES('26','01/24/2024','10','10','1005','datos_historias','Pending');
INSERT INTO cita VALUES('27','01/24/2024','10','10','1005','datos_historias','Pending');
INSERT INTO cita VALUES('28','01/24/2024','10','10','1005','datos_historias','Pending');
INSERT INTO cita VALUES('29','01/24/2024','23/01/2024','otro motivo','9','datos_historias','Pending');
INSERT INTO cita VALUES('30','01/24/2024','23/01/2024','motivo3','9','datos_historias','Pending');
INSERT INTO cita VALUES('31','01/25/2024','24/01/2024','estornudos','21','datos_historias','Done');
INSERT INTO cita VALUES('32','01/25/2024','24/01/2024','Mareos','12','datos_historias','Pending');
INSERT INTO cita VALUES('33','01/25/2024','24/01/2024','Estreñimiento','8','datos_historias','Pending');
INSERT INTO cita VALUES('34','01/25/2024','24/01/2024','Estreñimiento','8','datos_historias','Done');
INSERT INTO cita VALUES('35','01/25/2024','','','8','datos_historias','Pending');
INSERT INTO cita VALUES('36','01/25/2024','','','8','datos_historias','Pending');
INSERT INTO cita VALUES('37','01/25/2024','','','8','datos_historias','Pending');
INSERT INTO cita VALUES('38','01/25/2024','','','8','datos_historias','Pending');
INSERT INTO cita VALUES('39','01/25/2024','24/01/2024','mareo y vomito','8','datos_historias','Pending');
INSERT INTO cita VALUES('40','01/25/2024','24/01/2024','mareo y vomito','8','datos_historias','Pending');

--
-- Estructura de la tabla 'dental'
--

CREATE TABLE `dental` (
  `dental_no` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `dentist` varchar(30) NOT NULL,
  `tooth` int(3) NOT NULL,
  `paciente_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`dental_no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'dental'
--

INSERT INTO dental VALUES('1','2018-09-08','Dr. Machete Lazada','10','1111','1','Sep','2018');
INSERT INTO dental VALUES('2','2024-01-05','Dr. Machete Lazada','5','1111','1','Jan','2024');
INSERT INTO dental VALUES('3','2024-01-09','Dr. Machete Lazada','11','1111','1','Jan','2024');
INSERT INTO dental VALUES('4','2024-01-11','Dr. Machete Lazada','1','1111','7','Jan','2024');

--
-- Estructura de la tabla 'fecalisys'
--

CREATE TABLE `fecalisys` (
  `fecalisys_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_of_request` date NOT NULL,
  `requested_by` varchar(30) NOT NULL,
  `color` varchar(15) NOT NULL,
  `consistency` varchar(15) NOT NULL,
  `pus_cells` varchar(15) NOT NULL,
  `RBC` varchar(15) NOT NULL,
  `fat_globules` varchar(15) NOT NULL,
  `occult_blood` varchar(15) NOT NULL,
  `others_chem` varchar(15) NOT NULL,
  `ova` varchar(15) NOT NULL,
  `larva` varchar(15) NOT NULL,
  `adult_forms` varchar(15) NOT NULL,
  `cyst` varchar(15) NOT NULL,
  `trophozoites` varchar(15) NOT NULL,
  `others_pro` varchar(15) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `date_reported` date NOT NULL,
  `pathologist` varchar(30) NOT NULL,
  `medical_technologist` varchar(30) NOT NULL,
  `paciente_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`fecalisys_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'fecalisys'
--

INSERT INTO fecalisys VALUES('1','2024-01-09','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','2024-01-09','5','5','5','2','Jan','2024');

--
-- Estructura de la tabla 'hematology'
--

CREATE TABLE `hematology` (
  `hem_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_requested` date NOT NULL,
  `requested_by` varchar(30) NOT NULL,
  `hemoglobin` varchar(15) NOT NULL,
  `hematocrit` varchar(15) NOT NULL,
  `RBC_count` varchar(15) NOT NULL,
  `WBC_count` varchar(15) NOT NULL,
  `platelet` varchar(15) NOT NULL,
  `bleeding_time` varchar(15) NOT NULL,
  `clotting_time` varchar(15) NOT NULL,
  `neutrophil` varchar(15) NOT NULL,
  `segmenters` varchar(15) NOT NULL,
  `stabs` varchar(15) NOT NULL,
  `lymphocytes` varchar(15) NOT NULL,
  `monocyte` varchar(15) NOT NULL,
  `eosinophil` varchar(15) NOT NULL,
  `basophil` varchar(15) NOT NULL,
  `total` varchar(15) NOT NULL,
  `ABO_group` varchar(15) NOT NULL,
  `Rh_group` varchar(15) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `pathologist` varchar(30) NOT NULL,
  `medical_technologist` varchar(30) NOT NULL,
  `paciente_no` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  PRIMARY KEY (`hem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'hematology'
--


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

INSERT INTO paciente VALUES('1','V','16945845','Johnny','Depp','06/09/1963','60','Kentucky, Estados Unidos','Soltero(a)','Masculino','15148hdffd23');
INSERT INTO paciente VALUES('10','V','19191900','George','Washington','02/22/2001','22','a','Casado(a)','Masculino','565d14ssd');
INSERT INTO paciente VALUES('11','V','11212121','Salami','Napoles','08/08/2012','12','as12','Casado(a)','Femenino','565d14ssd');
INSERT INTO paciente VALUES('12','V','25252014','Margarita','Jozic','2000-11-09','23','carr','Divorciado','Femenino','15148hdffd23');
INSERT INTO paciente VALUES('13','V','6254152','Hauser','Quando','2001-10-18','22','carrera 29','Soltero(a)','Masculino','565d14ssd');
INSERT INTO paciente VALUES('15','V','12142514','entendible','entendible','2000-10-18','24','entendible','Soltero(a)','Femenino','565d14ssd');
INSERT INTO paciente VALUES('16','V','16241253','Fran','Sinatra','2000-01-24','24','24','Casado(a)','Masculino','333777a');
INSERT INTO paciente VALUES('2','V','4598253','Elon','Musk','06/28/1971','52','Barquisimeto','Casado(a)','Masculino','13235562');
INSERT INTO paciente VALUES('21','V','5624587','Juan Diego','de la Vega','2000-04-19','23','23','Soltero(a)','Masculino','15148hdffd23');
INSERT INTO paciente VALUES('3','V','14125514','Marie','Curie','02/16/1988','35','Varsovia, Polonia','Casado(a)','Femenino','13235562');
INSERT INTO paciente VALUES('4','V','16525235','Juancho','Perez','10/18/2001','22','republica dominicana','Casado(a)','Masculino','25262402');
INSERT INTO paciente VALUES('5','V','12672747','Presto','Carlo','2002-02-22','20','s20','Casado(a)','Masculino','565d14ssd');
INSERT INTO paciente VALUES('6','V','28504401','Pelo','ncito','04/09/2009','15','12','Soltero(a)','Masculino','13235562');
INSERT INTO paciente VALUES('7','V','28204402','Esperanza','Sanchez','10/18/2001','22','carrera 29','Soltero(a)','Femenino','565d14ssd');
INSERT INTO paciente VALUES('8','V','11444222','Bob','Patricio','1998-04-08','25','sda','Casado(a)','Masculino','15148hdffd23');
INSERT INTO paciente VALUES('9','V','28204000','El coqui','Revete','02/01/1978','46','caracas','Soltero(a)','Masculino','15148hdffd23');

--
-- Estructura de la tabla 'maternity_patient'
--

CREATE TABLE `maternity_patient` (
  `patient_id` int(50) NOT NULL AUTO_INCREMENT,
  `case_no` varchar(20) NOT NULL,
  `nhts` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `philhealth` varchar(30) NOT NULL,
  `pat_firstname` varchar(30) NOT NULL,
  `pat_middlename` varchar(30) NOT NULL,
  `pat_lastname` varchar(30) NOT NULL,
  `age` int(10) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `date_of_birth` varchar(20) NOT NULL,
  `date_of_admission` varchar(20) NOT NULL,
  `time_of_admission` varchar(20) NOT NULL,
  `spouse_firstname` varchar(30) NOT NULL,
  `spouse_middlename` varchar(30) NOT NULL,
  `spouse_lastname` varchar(30) NOT NULL,
  `spouse_age` int(10) NOT NULL,
  `spouse_religion` varchar(30) NOT NULL,
  `spouse_occupation` varchar(30) NOT NULL,
  `G` varchar(20) NOT NULL,
  `T` varchar(20) NOT NULL,
  `A` varchar(20) NOT NULL,
  `L` varchar(20) NOT NULL,
  `lmp` varchar(20) NOT NULL,
  `edc` varchar(20) NOT NULL,
  `aog` varchar(20) NOT NULL,
  `fetal_position` varchar(20) NOT NULL,
  `fh` varchar(20) NOT NULL,
  `fhb` varchar(20) NOT NULL,
  `loc` varchar(20) NOT NULL,
  `admitting_diagnose` varchar(100) NOT NULL,
  `midwife` varchar(50) NOT NULL,
  `date_of_delivery` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `wt` varchar(10) NOT NULL,
  `baby_firstname` varchar(30) NOT NULL,
  `baby_middlename` varchar(30) NOT NULL,
  `baby_lastname` varchar(30) NOT NULL,
  `hepa` varchar(30) NOT NULL,
  `bcg` varchar(30) NOT NULL,
  `nbs` varchar(30) NOT NULL,
  `date_of_discharge` varchar(30) NOT NULL,
  `time_of_discharge` varchar(30) NOT NULL,
  `final_diagnosis` varchar(100) NOT NULL,
  `disposition_on_charge` varchar(50) NOT NULL,
  `paciente_no` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` int(5) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'maternity_patient'
--


--
-- Estructura de la tabla 'prenatal'
--

CREATE TABLE `prenatal` (
  `prenatal_no` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `chief_complaint` varchar(100) NOT NULL,
  `attending_physician` varchar(30) NOT NULL,
  `lmp` varchar(20) NOT NULL,
  `ga_by_lmp` varchar(20) NOT NULL,
  `edc_by_lmp` varchar(20) NOT NULL,
  `fhr` varchar(20) NOT NULL,
  `ga_by_sonar` varchar(20) NOT NULL,
  `edc_by_utz` varchar(20) NOT NULL,
  `pregnancy_age` varchar(20) NOT NULL,
  `biparietal_diameter` varchar(20) NOT NULL,
  `biparietal_eq` varchar(20) NOT NULL,
  `head_circumference` varchar(20) NOT NULL,
  `head_circumference_eq` varchar(20) NOT NULL,
  `abdominal_circumference` varchar(20) NOT NULL,
  `abdominal_circumference_eq` varchar(20) NOT NULL,
  `femoral_length` varchar(20) NOT NULL,
  `femoral_length_eq` varchar(20) NOT NULL,
  `crown_rump_length` varchar(20) NOT NULL,
  `crown_rump_length_eq` varchar(20) NOT NULL,
  `mean_gest_sac_diameter` varchar(20) NOT NULL,
  `mean_gest_sac_diameter_eq` varchar(20) NOT NULL,
  `average_fetal_weight` varchar(20) NOT NULL,
  `gestation` varchar(20) NOT NULL,
  `presentation_lie` varchar(20) NOT NULL,
  `amniotic_fluid` varchar(20) NOT NULL,
  `placenta_location` varchar(20) NOT NULL,
  `previa` varchar(20) NOT NULL,
  `placenta_grade` varchar(20) NOT NULL,
  `fetal_activity` varchar(20) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `radiologist` varchar(30) NOT NULL,
  `paciente_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`prenatal_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'prenatal'
--


--
-- Estructura de la tabla 'radiological'
--

CREATE TABLE `radiological` (
  `rad_id` int(11) NOT NULL AUTO_INCREMENT,
  `case_no` varchar(12) NOT NULL,
  `referred_by` varchar(30) NOT NULL,
  `clinical_impression` varchar(100) NOT NULL,
  `room_bed_no` varchar(11) NOT NULL,
  `type_of_examination` varchar(30) NOT NULL,
  `date_taken` date NOT NULL,
  `radiologist` varchar(30) NOT NULL,
  `paciente_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`rad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'radiological'
--


--
-- Estructura de la tabla 'datos_historias'
--

CREATE TABLE `datos_historias` (
  `atencion_no` int(11) NOT NULL AUTO_INCREMENT,
  `diagnosis` varchar(50) NOT NULL,
  `type_of_disability` varchar(50) NOT NULL,
  `subjective` varchar(100) NOT NULL,
  `objective` varchar(100) NOT NULL,
  `assessment` varchar(100) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `paciente_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`atencion_no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'datos_historias'
--

INSERT INTO datos_historias VALUES('1','f','f','f','f','f','f','01/23/2024','9','22','Jan','2024');
INSERT INTO datos_historias VALUES('2','gripe','Type of Disability','Subjectiveee','Objectiveee','Assessmentttttt','plannnn','01/25/2024','21','14','Jan','2024');
INSERT INTO datos_historias VALUES('3','','','MOTIVADO','Evaluacionado','Reporte Médicado','Recipado','01/25/2024','8','14','Jan','2024');

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
INSERT INTO secretaria VALUES('28','antonia','antonia','Antonia','Bandas','Secre','15148hdffd23','29658745');

--
-- Estructura de la tabla 'sputum'
--

CREATE TABLE `sputum` (
  `sputum_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_of_collection_unit` varchar(30) NOT NULL,
  `date_of_submission` date NOT NULL,
  `disease_classification` varchar(30) NOT NULL,
  `site` varchar(30) NOT NULL,
  `reason_for_examination` varchar(30) NOT NULL,
  `case_no` varchar(30) NOT NULL,
  `specimen1` varchar(30) NOT NULL,
  `specimen2` varchar(30) NOT NULL,
  `specimen3` varchar(30) NOT NULL,
  `date_of_collection1` date NOT NULL,
  `date_of_collection2` date NOT NULL,
  `date_of_collection3` date NOT NULL,
  `specimen_collector` varchar(30) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `lab_serial_no1` varchar(20) NOT NULL,
  `lab_serial_no2` varchar(20) NOT NULL,
  `lab_serial_no3` varchar(20) NOT NULL,
  `specimen_1` varchar(20) NOT NULL,
  `specimen_2` varchar(20) NOT NULL,
  `specimen_3` varchar(20) NOT NULL,
  `visual_appearance1` varchar(20) NOT NULL,
  `visual_appearance2` varchar(20) NOT NULL,
  `visual_appearance3` varchar(20) NOT NULL,
  `reading` varchar(20) NOT NULL,
  `date_of_examination` date NOT NULL,
  `examined_by` varchar(30) NOT NULL,
  `paciente_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`sputum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'sputum'
--


--
-- Estructura de la tabla 'urinalysis'
--

CREATE TABLE `urinalysis` (
  `urinalysis_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_of_request` varchar(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `transparency` varchar(15) NOT NULL,
  `specific_gravity` varchar(15) NOT NULL,
  `ph` varchar(15) NOT NULL,
  `sugar` varchar(15) NOT NULL,
  `protein` varchar(15) NOT NULL,
  `pregnancy_test` varchar(15) NOT NULL,
  `pus_cells` varchar(15) NOT NULL,
  `rbc` varchar(15) NOT NULL,
  `cast` varchar(15) NOT NULL,
  `urates` varchar(15) NOT NULL,
  `uric_acid` varchar(15) NOT NULL,
  `cal_ox` varchar(15) NOT NULL,
  `epith_cells` varchar(15) NOT NULL,
  `mucus_threads` varchar(15) NOT NULL,
  `others` varchar(15) NOT NULL,
  `pathologist` varchar(30) NOT NULL,
  `medical_technologist` varchar(30) NOT NULL,
  `paciente_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`urinalysis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'urinalysis'
--


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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Datos de la tabla 'user'
--

INSERT INTO user VALUES('14','antonio','antonio','Antonio','Banderas','Medic','Psiquiatra','15148hdffd23','18456321');
INSERT INTO user VALUES('15','medico','medico','medico','medico','Medic','oftalmologo','15','25555555');
INSERT INTO user VALUES('20','javier','javier','Javier','Milei','Medic','Traumatologo','158234s56d9asc12','13235562');
INSERT INTO user VALUES('22','agustin','agustin','Agustin','Laje','Medic','Neurocirujano','565d14ssd','10236541');
INSERT INTO user VALUES('23','jquery','admin','jquery','qqq','Medic','sss','1234','1234321');
INSERT INTO user VALUES('25','astro','astro','Astro','Build','Medic','Podologo','333777a','15263254');

