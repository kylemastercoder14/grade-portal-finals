-- Table structure for table `advises_tbl`
CREATE TABLE `advises_tbl` (
  `advises_id` int(255) NOT NULL AUTO_INCREMENT,
  `advisor_id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  PRIMARY KEY (`advises_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
INSERT INTO `advisor_tbl` VALUES ('KLD-23-75890', 'LPT, MIEE', 'Professor III', 'Cesar', 'Escobar', 'Galingana', 'Sr.', '1977-04-13', '47', 'Male', 'Single', '+63 943 953 4758', 'Batangas', 'Nasugbu', 'Malapad Na Bato', 'B123 L5 Emerald St.', '4114', 'cegalingana@kld.edu.ph', 'KLD-IICS-283480269', '', '', '0', '2024-04-24 16:51:57');

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
INSERT INTO `course_tbl` VALUES ('KLD-PCIS3213-1418964901', 'Quantitative Methods', 'PCIS3213', '3', '', '2024-04-24 14:41:09', '0');
INSERT INTO `course_tbl` VALUES ('KLD-PCIS3222-1271014603', 'IS Technopreneurship', 'PCIS3222', '3', '', '2024-04-24 14:46:16', '0');

-- Table structure for table `enrollment_sem_tbl`
CREATE TABLE `enrollment_sem_tbl` (
  `enrollment_sem_id` int(255) NOT NULL,
  `enrollment_id` int(255) NOT NULL,
  `semester_id` int(255) NOT NULL,
  PRIMARY KEY (`enrollment_sem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table `enrollment_tbl`
CREATE TABLE `enrollment_tbl` (
  `enrollment_id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `grade` int(255) NOT NULL,
  PRIMARY KEY (`enrollment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for table `gradingsystem_tbl`
CREATE TABLE `gradingsystem_tbl` (
  `grading_system_id` int(255) NOT NULL AUTO_INCREMENT,
  `year_level` varchar(255) NOT NULL,
  `grading_scheme` int(11) NOT NULL,
  PRIMARY KEY (`grading_system_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
INSERT INTO `section_tbl` VALUES ('KLD-IICS-283480269-20242103153527', '3rd Year', 'KLD-IICS-283480269', 'IICS303', '2024-04-24 15:17:51', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IICS-283480269-20242143048710', '3rd Year', 'KLD-IICS-283480269', 'IICS301', '2024-04-24 16:07:01', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IICS-283480269-2024289654387', '1st year', 'KLD-IICS-283480269', 'IICS101', '2024-04-24 16:13:21', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IICS-283480269-2024403192329', '3rd Year', 'KLD-IICS-283480269', 'IICS302', '2024-04-24 16:07:10', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IOE-1651651007-20241735502265', '1st year', 'KLD-IOE-1651651007', 'IOE101', '2024-04-24 15:18:42', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IOPE-1887072785-20241265462343', '3rd Year', 'KLD-IOPE-1887072785', 'IHPD305', '2024-04-24 15:22:29', '0');
INSERT INTO `section_tbl` VALUES ('KLD-IOPE-1887072785-20241423527731', '3rd Year', 'KLD-IOPE-1887072785', 'IHPD309', '2024-04-25 15:37:56', '0');

-- Table structure for table `semester_tbl`
CREATE TABLE `semester_tbl` (
  `semester_id` int(255) NOT NULL,
  `semester_name` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
INSERT INTO `student_tbl` VALUES ('dfgdfdgfh', 'fgdfgfh', 'dfdgdfg', 'fdhfgh', '', '2024-04-24', '24', 'Male', 'Single', '+63 HFG HFG HFGH', 'Cavite', 'Mendez', 'Asis II', 'sgdfgfh', 'fdgdfhgfh', 'sdfsdf342@kld.edu.ph', '1st Year', 'KLD-IICS-283480269', '', 'Dasmarinas II Central School', 'Dasmarinas Integrated High School', 'dfgdfdgfh', '', '0', '2024-04-24 18:06:33');
INSERT INTO `student_tbl` VALUES ('dggfh324234', 'sd', 'dasdasd', 'sdfsdf', '', '2024-04-02', '24', 'Male', 'Married', '+63 324 234 2342', 'Cavite', 'Noveleta', 'San Rafael III', 'ffdfgdfg', '133', 'sdfsdf342@kld.edu.ph', '1st Year', 'KLD-IICS-283480269', 'KLD-IICS-283480269-2024289654387', 'Dasmarinas II Central School', 'Dasmarinas Integrated High School', 'dggfh324234', '', '0', '2024-04-24 17:54:28');
INSERT INTO `student_tbl` VALUES ('hgkukhkgAS', 'hj,vnbnkhjk', 'vmkhjk', 'hkfjghj', '', '2024-04-28', '47', 'Male', 'Single', '+63 Y5U YTU FG', 'Cavite', 'Rosario', 'Silangan II', 'dhhg', 'fsdf', 'sdfsdf342@kld.edu.ph', '1st Year', 'KLD-IICS-283480269', '', 'Dasmarinas II Central School', 'Dasmarinas Integrated High School', 'hgkukhkgAS', '', '0', '2024-04-24 18:12:45');
INSERT INTO `student_tbl` VALUES ('hjghbxcv', 'vcmnb,b,', 'nm,nmbcvb', 'cvnvbmbnmbn', '', '2024-04-19', '47', 'Male', 'Single', '+63 GNG MGH ', 'Batangas', 'Malvar', 'San Pedro I', 'mj,hjv', 'cfsdf', 'fasd@kld.edu', '3rd Year', 'KLD-IOPE-1887072785', 'KLD-IOPE-1887072785-20241423527731', 'Dasmarinas II Central School', 'Dasmarinas Integrated High School', 'hjghbxcv', '', '0', '2024-04-24 18:11:19');
INSERT INTO `student_tbl` VALUES ('KLD-21-000209', 'Kyle Andre', 'David', 'Lim', '', '2000-01-14', '24', 'Male', 'Single', '+63 915 247 9693', 'Cavite', 'City of Dasmariñas', 'Santa Lucia', 'B111 L4 Ruby Street', '4114', 'kadlim@kld.edu.ph', '4th Year', 'KLD-IICS-283480269', 'KLD-IICS-283480269-20241864450327', 'Dasmarinas II Central School', 'Dasmarinas Integrated High School', 'KLD-21-000209', '', '0', '2024-04-24 16:36:06');
INSERT INTO `student_tbl` VALUES ('ykhjkkjlg', 'hnghhjk', 'fdgdhgfjgh', 'khjlklj', '', '2024-04-15', '24', 'Female', 'Single', '+63 FHG TYU YHF', 'Cavite', 'Silang', 'Lalaan II', 'sfgfghfgj', 'dghdf', 'gshdrh@kld.edu', '1st Year', 'KLD-IOM-880832296', '', 'Dasmarinas II Central School', 'Dasmarinas Integrated High School', 'ykhjkkjlg', '', '0', '2024-04-24 18:10:21');

