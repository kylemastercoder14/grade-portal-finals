-- Table structure for table `admin_tbl`
CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- Dumping data for table `admin_tbl`
INSERT INTO `admin_tbl` VALUES ('1', 'ftgzhczmrziddxn', 'orjadqzocmzzadqzjizocmzz');

-- Table structure for table `advises_tbl`
CREATE TABLE `advises_tbl` (
  `advises_id` int(255) NOT NULL AUTO_INCREMENT,
  `advisor_id` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  `is_archive` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`advises_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- Dumping data for table `advises_tbl`
INSERT INTO `advises_tbl` VALUES ('1', 'KLD-23-75890', 'KLD-IICS-283480269-20241376210857', '0');
INSERT INTO `advises_tbl` VALUES ('2', 'KLD-23-75890', 'KLD-IICS-283480269-2024403192329', '0');
INSERT INTO `advises_tbl` VALUES ('4', 'KLD-21-454544', '', '0');

-- Table structure for table `advisor_tbl`
CREATE TABLE `advisor_tbl` (
  `advisor_id` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `birthdate` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `kld_email` varchar(255) NOT NULL,
  `program_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `is_archive` tinyint(4) NOT NULL DEFAULT 0,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`advisor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- Dumping data for table `advisor_tbl`
INSERT INTO `advisor_tbl` VALUES ('KLD-21-454544', 'MIT, LPT, MIEE', 'Program Chair', 'Rodel', '', 'Antang', '', '2005-04-05', '30', 'Male', 'Single', '+63 353 453 4534', 'Batangas', 'Calatagan', 'Lucsuhin', 'B123 L5 Emerald St.', '4114', 'rantang@kld.edu.ph', 'KLD-IICS-283480269', 'KLD-21-454544', '', '0', '2024-04-29 13:32:00');
INSERT INTO `advisor_tbl` VALUES ('KLD-23-52903', 'LPT', 'Professor III', 'Allen', 'Pusod', 'Ong', '', '1980-04-08', '47', 'Male', 'Single', '+63 324 234 2342', 'Cavite', 'City of Dasmariñas', 'Santa Maria', 'B123 L5 Emerald St.', '4114', 'apong@kld.edu.ph', 'KLD-IICS-283480269', 'KLD-23-52903', '', '0', '2024-04-29 10:49:15');
INSERT INTO `advisor_tbl` VALUES ('KLD-23-75890', 'LPT, MIEE', 'Professor III', 'Cesar', 'Escobar', 'Galingana', '', '1977-04-13', '47', 'Male', 'Single', '+63 943 953 4758', 'Batangas', 'Nasugbu', 'Malapad Na Bato', 'B123 L5 Emerald St.', '4114', 'cegalingana@kld.edu.ph', 'KLD-IICS-283480269', 'KLD-23-75890', '', '0', '2024-04-24 16:51:57');
INSERT INTO `advisor_tbl` VALUES ('KLD-23-86434', 'LPT', 'Professor IV', 'Con Marvin', '', 'Serrano', '', '2024-04-26', '47', 'Male', 'Single', '+63 675 676 57', 'Cavite', 'Mataasnakahoy', 'San Sebastian', 'sgfsg', '4114', 'cmserrano@kld.edu.ph', 'KLD-IOPE-1887072785', 'KLD-23-86434', '', '0', '2024-04-26 11:25:07');

-- Table structure for table `course_tbl`
CREATE TABLE `course_tbl` (
  `course_id` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_unit` int(255) NOT NULL,
  `pre_requisite` varchar(255) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_archive` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- Dumping data for table `course_tbl`
INSERT INTO `course_tbl` VALUES ('KLD-GEC9100-580103182', 'Filipino 1', 'GEC9100', '2', '', '2024-04-24 14:41:09', '0');
INSERT INTO `course_tbl` VALUES ('KLD-GEC9200-2035335448', 'Filipino 2', 'GEC9200', '2', 'Filipino 1', '2024-04-24 14:49:25', '0');
INSERT INTO `course_tbl` VALUES ('KLD-PCIS2315-1811510861', 'Internet of Things Lecture', 'PCIS2315', '1', '', '2024-04-29 10:47:35', '0');
INSERT INTO `course_tbl` VALUES ('KLD-PCIS2315L-477646413', 'Internet of Things Lab', 'PCIS2315L', '3', '', '2024-04-29 13:27:45', '0');
INSERT INTO `course_tbl` VALUES ('KLD-PCIS2901-1156383614', 'Evaluation of Business Performance', 'PCIS2901', '3', '', '2024-04-28 21:21:47', '0');
INSERT INTO `course_tbl` VALUES ('KLD-PCIS3213-1418964901', 'Quantitative Methods', 'PCIS3213', '3', '', '2024-04-24 14:41:09', '0');
INSERT INTO `course_tbl` VALUES ('KLD-PCIS3222-1271014603', 'IS Technopreneurship', 'PCIS3222', '3', '', '2024-04-24 14:46:16', '0');
INSERT INTO `course_tbl` VALUES ('KLD-PCIS4509-1078918444', 'IT Outsourcing and Offshoring', 'PCIS4509', '3', '', '2024-04-28 23:27:43', '0');

-- Table structure for table `enrollment_sem_tbl`
CREATE TABLE `enrollment_sem_tbl` (
  `enrollment_sem_id` int(255) NOT NULL,
  `enrollment_id` int(255) NOT NULL,
  `semester_id` int(255) NOT NULL,
  PRIMARY KEY (`enrollment_sem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table `enrollment_tbl`
CREATE TABLE `enrollment_tbl` (
  `enrollment_id` int(255) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `grading_system_id` int(255) NOT NULL,
  `grade` float NOT NULL,
  PRIMARY KEY (`enrollment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- Dumping data for table `enrollment_tbl`
INSERT INTO `enrollment_tbl` VALUES ('6', 'KLD-21-000209', 'KLD-GEC9100-580103182', '1', '94.6');
INSERT INTO `enrollment_tbl` VALUES ('7', 'KLD-21-000209', 'KLD-PCIS3222-1271014603', '1', '93.5');
INSERT INTO `enrollment_tbl` VALUES ('8', 'KLD-21-000209', 'KLD-PCIS2901-1156383614', '1', '92.8');
INSERT INTO `enrollment_tbl` VALUES ('9', 'KLD-21-000209', 'KLD-PCIS2315-1811510861', '1', '95.1');

-- Table structure for table `grading_system_tbl`
CREATE TABLE `grading_system_tbl` (
  `grading_system_id` int(255) NOT NULL AUTO_INCREMENT,
  `year_level` varchar(255) NOT NULL,
  `program_id` varchar(255) NOT NULL,
  `seatwork` int(255) NOT NULL,
  `quizzes` int(255) NOT NULL,
  `assignment` int(255) NOT NULL,
  `examination` int(255) NOT NULL,
  `others` int(255) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_archive` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`grading_system_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- Dumping data for table `grading_system_tbl`
INSERT INTO `grading_system_tbl` VALUES ('1', '3rd Year', 'KLD-IICS-283480269', '30', '20', '10', '40', '0', '2024-04-26 18:18:21', '0');
INSERT INTO `grading_system_tbl` VALUES ('2', '2nd Year', 'KLD-IICS-283480269', '20', '20', '10', '50', '0', '2024-04-28 21:26:12', '0');
INSERT INTO `grading_system_tbl` VALUES ('3', '1st year', 'KLD-IICS-283480269', '20', '20', '10', '50', '0', '2024-04-29 13:38:20', '0');

-- Table structure for table `program_tbl`
CREATE TABLE `program_tbl` (
  `program_id` varchar(255) NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `program_code` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_archive` tinyint(4) NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- Dumping data for table `program_tbl`
INSERT INTO `program_tbl` VALUES ('KLD-IAS-321888753', 'Institute Of Applied Sciences', 'IAS', '2024-04-24 16:43:57', '0');
INSERT INTO `program_tbl` VALUES ('KLD-IICS-283480269', 'Institute of Information and Computing Sciences', 'IICS', '2024-04-23 10:32:46', '0');
INSERT INTO `program_tbl` VALUES ('KLD-IOC-1358667012', 'Institute of Cybersecurity UPDATED', 'IOCU', '2024-04-29 13:25:06', '0');
INSERT INTO `program_tbl` VALUES ('KLD-IOE-1651651007', 'Institute of Engineering', 'IOE', '2024-04-23 13:36:56', '0');
INSERT INTO `program_tbl` VALUES ('KLD-IOM-880832296', 'Institute of Midwifery', 'IOM', '2024-04-23 12:07:22', '0');
INSERT INTO `program_tbl` VALUES ('KLD-ION-947916721', 'Institute of Nursing', 'ION', '2024-04-23 12:20:13', '0');
INSERT INTO `program_tbl` VALUES ('KLD-IOPE-1887072785', 'Institute of Human and Potential Development', 'IHPD', '2024-04-23 15:31:38', '0');
INSERT INTO `program_tbl` VALUES ('KLD-ISACEC-1037804064', 'Institute Of Student Affairs, Character Education And Citizenship', 'ISACEC', '2024-04-24 16:44:08', '0');

-- Table structure for table `section_tbl`
CREATE TABLE `section_tbl` (
  `section_id` varchar(255) NOT NULL,
  `year_level` varchar(255) NOT NULL,
  `program_id` varchar(255) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_archive` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- Dumping data for table `section_tbl`
INSERT INTO `section_tbl` VALUES ('KLD-IICS-283480269-20241056270542', '3rd Year', 'KLD-IICS-283480269', 'IICS304', '2024-04-24 16:06:47', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IICS-283480269-20241376210857', '3rd Year', 'KLD-IICS-283480269', 'IICS305', '2024-04-24 15:19:29', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IICS-283480269-20241864450327', '4th Year', 'KLD-IICS-283480269', 'IICS405', '2024-04-25 14:54:21', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IICS-283480269-20242077508738', '4th Year', 'KLD-IICS-283480269', 'IICS401', '2024-04-29 13:26:44', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IICS-283480269-20242103153527', '3rd Year', 'KLD-IICS-283480269', 'IICS303', '2024-04-24 15:17:51', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IICS-283480269-20242143048710', '3rd Year', 'KLD-IICS-283480269', 'IICS301', '2024-04-24 16:07:01', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IICS-283480269-2024277228016', '2nd Year', 'KLD-IICS-283480269', 'IICS211', '2024-04-28 21:18:23', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IICS-283480269-2024289654387', '1st year', 'KLD-IICS-283480269', 'IICS101', '2024-04-24 16:13:21', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IICS-283480269-2024403192329', '3rd Year', 'KLD-IICS-283480269', 'IICS302', '2024-04-24 16:07:10', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IOE-1651651007-20241735502265', '1st year', 'KLD-IOE-1651651007', 'IOE101', '2024-04-24 15:18:42', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IOPE-1887072785-20241265462343', '3rd Year', 'KLD-IOPE-1887072785', 'IHPD305', '2024-04-24 15:22:29', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IOPE-1887072785-20241423527731', '3rd Year', 'KLD-IOPE-1887072785', 'IHPD309', '2024-04-25 15:37:56', '0');

-- Table structure for table `semester_tbl`
CREATE TABLE `semester_tbl` (
  `semester_id` int(255) NOT NULL AUTO_INCREMENT,
  `semester_name` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_archive` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`semester_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- Dumping data for table `semester_tbl`
INSERT INTO `semester_tbl` VALUES ('1', '2nd Semester', '2023 - 2024', '2024-04-27 06:55:29', '0');
INSERT INTO `semester_tbl` VALUES ('2', '1st Semester', '2024 - 2025', '2024-04-28 21:24:57', '0');
INSERT INTO `semester_tbl` VALUES ('3', '1st Semester', '2023 - 2024', '2024-04-28 21:25:36', '0');
INSERT INTO `semester_tbl` VALUES ('4', '2nd Semester', '2024 - 2025', '2024-04-29 13:36:35', '0');

-- Table structure for table `student_tbl`
CREATE TABLE `student_tbl` (
  `student_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `birthdate` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `kld_email` varchar(255) NOT NULL,
  `year_level` varchar(255) DEFAULT NULL,
  `program_id` varchar(255) DEFAULT NULL,
  `section_id` varchar(255) DEFAULT NULL,
  `elementary` varchar(255) NOT NULL,
  `highschool` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `is_archive` tinyint(4) NOT NULL DEFAULT 0,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- Dumping data for table `student_tbl`
INSERT INTO `student_tbl` VALUES ('KLD-21-000209', 'Kyle Andre', 'David', 'Lim', '', '2000-01-14', '24', 'Male', 'Single', '+63 915 247 9693', 'Cavite', 'City of Dasmariñas', 'Santa Lucia', 'B111 L4 Ruby Street', '4114', 'kadlim@kld.edu.ph', '4th Year', 'KLD-IICS-283480269', 'KLD-IICS-283480269-20241864450327', 'Dasmarinas II Central School', 'Dasmarinas Integrated High School', 'KLD-21-000209', '', '0', '2024-04-24 16:36:06');
INSERT INTO `student_tbl` VALUES ('KLD-21-000226', 'Mherwen Wiel', 'Calumba', 'Romero', '', '2000-04-10', '24', 'Male', 'Single', '+63 912 376 9544', 'Cavite', 'City of Dasmariñas', 'San Luis I', 'B98 L100 Emerald St.', '4114', 'mwcromero@kld.edu.ph', '4th Year', 'KLD-IICS-283480269', 'KLD-IICS-283480269-20241864450327', 'Dasmarinas II Central School', 'Dasmarinas East National High School', 'KLD-21-000226', '', '0', '2024-04-27 03:11:21');
INSERT INTO `student_tbl` VALUES ('KLD-21-000398', 'Erwin', 'Josue', 'Petil', '', '1998-08-24', '26', 'Male', 'Single', '+63 755 990 8944', 'Cavite', 'City of Dasmariñas', 'Salawag', 'B24 L56 Sunflower St. Golden City Subdivision', '4114', 'ejpetil@kld.edu.ph', '3rd Year', 'KLD-IOPE-1887072785', 'KLD-IOPE-1887072785-20241265462343', 'Salawag Elementary School', 'Congressional High School', 'KLD-21-000398', '', '0', '2024-04-27 03:16:05');
INSERT INTO `student_tbl` VALUES ('KLD-24-89722', 'Juan', 'Pusod', 'Dela Cruz', '', '2000-04-11', '24', 'Male', 'Single', '+63 932 343 4343', 'Cavite', 'City of Dasmariñas', 'San Dionisio', 'B89 L56 Ruby St.', '4114', 'jpdelacruz@kld.edu.ph', '1st Year', 'KLD-IICS-283480269', '', 'Dasmarinas II Central School', 'Dasmarinas Integrated High School', 'KLD-24-89722', '', '0', '2024-04-29 13:30:13');

-- Table structure for table `subject_course_tbl`
CREATE TABLE `subject_course_tbl` (
  `subject_course_id` int(255) NOT NULL AUTO_INCREMENT,
  `advisor_id` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `is_archive` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`subject_course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- Dumping data for table `subject_course_tbl`
INSERT INTO `subject_course_tbl` VALUES ('2', 'KLD-23-86434', 'KLD-IICS-283480269-20241376210857', 'KLD-PCIS3222-1271014603', '0');
INSERT INTO `subject_course_tbl` VALUES ('3', 'KLD-23-86434', 'KLD-IICS-283480269-20242103153527', 'KLD-PCIS3222-1271014603', '0');
INSERT INTO `subject_course_tbl` VALUES ('4', 'KLD-23-75890', 'KLD-IICS-283480269-20241376210857', 'KLD-GEC9100-580103182', '0');
INSERT INTO `subject_course_tbl` VALUES ('5', 'KLD-23-86434', 'KLD-IICS-283480269-20241376210857', 'KLD-PCIS2901-1156383614', '0');
INSERT INTO `subject_course_tbl` VALUES ('6', 'KLD-23-52903', 'KLD-IICS-283480269-20241376210857', 'KLD-PCIS2315-1811510861', '0');
INSERT INTO `subject_course_tbl` VALUES ('7', 'KLD-21-454544', 'KLD-IICS-283480269-20241376210857', 'KLD-PCIS3213-1418964901', '0');
INSERT INTO `subject_course_tbl` VALUES ('8', 'KLD-21-454544', 'KLD-IOPE-1887072785-20241265462343', 'KLD-PCIS3213-1418964901', '0');
INSERT INTO `subject_course_tbl` VALUES ('9', 'KLD-21-454544', 'KLD-IICS-283480269-20242103153527', 'KLD-PCIS3213-1418964901', '0');
INSERT INTO `subject_course_tbl` VALUES ('10', 'KLD-21-454544', 'KLD-IOE-1651651007-20241735502265', 'KLD-PCIS3213-1418964901', '0');

-- Table structure for table `subject_taught_tbl`
CREATE TABLE `subject_taught_tbl` (
  `subject_taught_id` int(255) NOT NULL AUTO_INCREMENT,
  `advisor_id` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_archive` tinyint(4) NOT NULL,
  PRIMARY KEY (`subject_taught_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- Dumping data for table `subject_taught_tbl`
INSERT INTO `subject_taught_tbl` VALUES ('1', 'KLD-23-75890', 'KLD-PCIS4509-1078918444', '2024-04-28 23:31:03', '0');
INSERT INTO `subject_taught_tbl` VALUES ('2', 'KLD-23-86434', 'KLD-PCIS2901-1156383614', '2024-04-28 23:31:57', '0');
INSERT INTO `subject_taught_tbl` VALUES ('3', 'KLD-23-86434', 'KLD-PCIS3222-1271014603', '2024-04-28 23:31:57', '0');
INSERT INTO `subject_taught_tbl` VALUES ('4', 'KLD-23-52903', 'KLD-PCIS2315-1811510861', '2024-04-29 10:49:29', '0');
INSERT INTO `subject_taught_tbl` VALUES ('5', 'KLD-21-454544', 'KLD-PCIS3213-1418964901', '2024-04-29 13:32:40', '0');

