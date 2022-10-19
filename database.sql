CREATE TABLE `patientLogin` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `guid` varchar(36) NOT NULL,
  `patient_forename` varchar(255) default NULL,
  `patient_surname` varchar(255) default NULL,
  `patient_email` varchar(255) default NULL,
  `patient_password` varchar(255),
  `patient_id` varchar(255),
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `patientLogin` (`guid`,`patient_forename`,`patient_surname`,`patient_email`,`patient_password`,`patient_id`) VALUES ("BE33CC95-7E66-519F-8FE8-16A9CCD1B180","admin","domain","admin@imlcare.org","password","EXAMPLE DATA ONLY");
