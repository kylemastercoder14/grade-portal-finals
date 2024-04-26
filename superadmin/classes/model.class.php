<?php

session_start();

class Model extends Dbconfig
{

    protected function read()
    {
        $sql = "SELECT * FROM student_tbl";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }
    protected function readById($id)
    {
        $sql = "SELECT * FROM student_tbl WHERE student_id = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch a single row as an associative array

        return $data;
    }
    public function getById($id)
    {
        return $this->readById($id);
    }
    // pang-protekta ng insert query kasama ang sanitation
    protected function insertProgram($data, $currentPage)
    {
        $program_name = $data['program_name'];
        $program_code = $data['program_code'];
        $sql = "SELECT * FROM program_tbl WHERE program_name = ? OR program_code = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$program_name, $program_code]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION['message'] = "Progam already exist!";
            $_SESSION['status'] = "#bb2124";
            header("Location: programs.php");
        } else {
            $this->insert($data, $currentPage);
            $_SESSION['message'] = "Program inserted successfully!";
            $_SESSION['status'] = "#22bb33";
            header("Location: programs.php");
        }
    }
    // call sa action
    public function callInsertProgram($data, $currentPage)
    {
        $this->insertProgram($data, $currentPage);
    }

    // pang-protekta ng insert query kasama ang sanitation
    protected function insertSection($data, $currentPage)
    {
        $section_name = $data['section_name'];
        $sql = "SELECT * FROM section_tbl WHERE section_name = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$section_name]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION['message'] = "Section already exist!";
            $_SESSION['status'] = "#bb2124";
            header("Location: sections.php");
        } else {
            $this->insert($data, $currentPage);
            $_SESSION['message'] = "Section inserted successfully!";
            $_SESSION['status'] = "#22bb33";
            header("Location: sections.php");
        }
    }
    public function callInsertSection($data, $currentPage)
    {
        $this->insertSection($data, $currentPage);
    }

    // pang-protekta ng insert query kasama ang sanitation
    protected function insertSubject($data, $currentPage)
    {
        $course_name = $data['course_name'];
        $sql = "SELECT * FROM course_tbl WHERE course_name = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$course_name]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION['message'] = "Course already exist!";
            $_SESSION['status'] = "#bb2124";
            header("Location: subjects.php");
        } else {
            $this->insert($data, $currentPage);
            $_SESSION['message'] = "Course inserted successfully!";
            $_SESSION['status'] = "#22bb33";
            header("Location: subjects.php");
        }
    }

    public function callInsertSubject($data, $currentPage)
    {
        $this->insertSubject($data, $currentPage);
    }

    protected function insertStudent($data, $currentPage)
    {
        $student_id = $data['student_id'];
        $sql = "SELECT * FROM student_tbl WHERE student_id = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$student_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION['message'] = "Student already exist!";
            $_SESSION['status'] = "#bb2124";
            header("Location: students.php");
        } else {
            $this->insert($data, $currentPage);
            $_SESSION['message'] = "Student inserted successfully!";
            $_SESSION['status'] = "#22bb33";
            header("Location: students.php");
        }
    }
    public function callInsertStudent($data, $currentPage)
    {
        $this->insertStudent($data, $currentPage);
    }
    protected function insertAdvisor($data, $currentPage)
    {
        $advisor_id = $data['advisor_id'];
        $sql = "SELECT * FROM advisor_tbl WHERE advisor_id = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$advisor_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION['message'] = "Instructor already exist!";
            $_SESSION['status'] = "#bb2124";
            header("Location: faculties.php");
        } else {
            $this->insert($data, $currentPage);
            $_SESSION['message'] = "Instructor inserted successfully!";
            $_SESSION['status'] = "#22bb33";
            header("Location: faculties.php");
        }
    }
    public function callInsertAdvisor($data, $currentPage)
    {
        $this->insertAdvisor($data, $currentPage);
    }
    protected function readProgram($condition)
    {
        $sql = "SELECT * FROM program_tbl WHERE is_archive = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$condition]); // 0 is NOT  archive
        $data = $stmt->fetchAll();

        return $data;
    }
    public function getAllProgram($condition)
    {
        return $this->readProgram($condition);
    }

    protected function readSection($condition)
    {
        $sql = "SELECT * FROM section_tbl WHERE is_archive = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$condition]); // 0 is NOT  archive
        $data = $stmt->fetchAll();

        return $data;
    }
    public function getAllSection($condition)
    {
        return $this->readSection($condition);
    }
    protected function readSubject($condition)
    {
        $sql = "SELECT * FROM course_tbl WHERE is_archive = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$condition]); // 0 is NOT  archive
        $data = $stmt->fetchAll();

        return $data;
    }
    public function getAllSubject($condition)
    {
        return $this->readSubject($condition);
    }
    protected function readGradingCriteria($condition)
    {
        $sql = "SELECT * FROM gradingsystem_tbl INNER JOIN program_tbl ON gradingsystem_tbl.program_id = program_tbl.program_id WHERE gradingsystem_tbl.is_archive = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$condition]); // 0 is NOT  archive
        $data = $stmt->fetchAll();

        return $data;
    }
    public function getAllGradingCriteria($condition)
    {
        return $this->readGradingCriteria($condition);
    }
    protected function readStudent($condition)
    {
        $sql = "SELECT 
                student_tbl.*,
                program_tbl.program_code,
                section_tbl.section_name
            FROM student_tbl
            LEFT JOIN program_tbl ON student_tbl.program_id = program_tbl.program_id
            LEFT JOIN section_tbl ON student_tbl.section_id = section_tbl.section_id
            WHERE student_tbl.is_archive = ?
            ";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$condition]); // 0 is NOT archive
        $data = $stmt->fetchAll();

        return $data;
    }
    public function getAllStudent($condition)
    {
        return $this->readStudent($condition);
    }
    protected function readAdvisor($condition)
    {
        $sql = "SELECT *
        FROM advisor_tbl
        INNER JOIN program_tbl ON advisor_tbl.program_id = program_tbl.program_id
        WHERE advisor_tbl.is_archive = ?
        ";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$condition]); // 0 is NOT  archive
        $data = $stmt->fetchAll();

        return $data;
    }
    public function getAllAdvisor($condition)
    {
        return $this->readAdvisor($condition);
    }
    protected function insert($data, $currentPage)
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));

        $tableName = $currentPage . '_tbl';

        $sql = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";

        $stmt = $this->db()->prepare($sql);

        // Bind values to placeholders
        $i = 1;
        foreach ($data as $value) {
            $stmt->bindValue($i++, $value);
        }

        $stmt->execute();

        return;
    }
    public function callEditProgram($data, $currentPage)
    {
        $this->editProgram($data, $currentPage);
    }
    protected function editProgram($data, $currentPage)
    {
        $tableName = $currentPage . '_tbl';
        $sql1 = "SELECT * FROM $tableName WHERE program_id = ?";
        $stmt = $this->db()->prepare($sql1);
        $stmt->execute([$data['program_id']]);
        $result = $stmt->fetch();

        if ($result) {
            $sql2 = "UPDATE $tableName SET `program_name`= ? ,`program_code`= ? WHERE program_id = ?";
            $stmt = $this->db()->prepare($sql2);
            $stmt->execute([$data['program_name'], $data['program_code'], $data['program_id']]);

            $_SESSION['message'] = "Program updated successfully!";
            $_SESSION['status'] = "#22bb33";
            header("Location: programs.php");
        } else {
            $_SESSION['message'] = "Error updating program!";
            $_SESSION['status'] = "#bb2124";
            header("Location: programs.php");
        }
    }
    public function callArchiveProgram($data, $currentPage)
    {
        $this->archiveProgram($data, $currentPage);
    }
    protected function unarchiveProgram($program_id, $currentPage)
    {
        $tableName = $currentPage . '_tbl';
        $sql = "UPDATE $tableName SET `is_archive` = ? WHERE `program_id` = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([0, $program_id]); // 1 is archived, 0 is NOT

        $_SESSION['message'] = "Program retrieved successfully!";
        $_SESSION['status'] = "#22bb33";
        header('Location: programs.php');
    }
    public function callUnarchiveProgram($program_id, $currentPage)
    {
        $this->unarchiveProgram($program_id, $currentPage);
    }
    protected function archiveProgram($data, $currentPage)
    {
        $tableName = $currentPage . '_tbl';
        $sql = "UPDATE $tableName SET `is_archive` = ? WHERE `program_id` = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([1, $data['program_id']]); // 1 is archived, 0 is NOT

        $_SESSION['message'] = "Program archived successfully!";
        $_SESSION['status'] = "#22bb33";
        header('Location: programs.php');
    }
    protected function readSectionById($id)
    {
        $sql = "SELECT * FROM section_tbl WHERE section_id = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch a single row as an associative array

        return $data;
    }
    public function callReadSectionById($id)
    {
        return $this->readSectionById($id);
    }
    protected function filterSectionByProgram($program_id, $year_level)
    {

        $sql = "SELECT * FROM section_tbl WHERE program_id = ? AND year_level = ? ORDER BY section_name ASC";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$program_id, $year_level]);

        $sections = $stmt->fetchAll();

        if ($sections) {
            echo '<option value=""></option>';
            // Output options for section dropdown
            foreach ($sections as $section) {
                echo "<option value='" . $section['section_id'] . "'>" . $section['section_name'] . "</option>";
            }
        } else {
            echo "<option value=''>No sections found</option>";
        }
    }
    protected function callFilterSectionByProgram()
    {
        if (isset($_GET['program_id'], $_GET['year_level'])) {
            $program_id = $_GET['program_id'];
            $year_level = $_GET['year_level'];
            $this->filterSectionByProgram($program_id, $year_level);
        } else {
            // Handle case where program_id is not provided
            echo "<option value=''>Select a program and year level first</option>";
        }
    }
    public function callHelperFilter()
    {
        $this->callFilterSectionByProgram();
    }
    protected function filterAllSectionByProgram($advisor_id)
    {
        $sql = "SELECT * FROM advisor_tbl WHERE advisor_id = ? ORDER BY advisor_id ASC";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$advisor_id]);

        $advisor = $stmt->fetch();

        if ($advisor) {
            $program_id = $advisor['program_id'];
            $sql2 = "SELECT * FROM section_tbl WHERE program_id = ? ORDER BY section_name ASC";
            $stmt2 = $this->db()->prepare($sql2);
            $stmt2->execute([$program_id]);

            $sections = $stmt2->fetchAll();

            // Start building the select dropdown options
            $options = "";
            foreach ($sections as $section) {
                // Append each option to the $options variable
                $options .= "<option value='" . $section['section_id'] . "'>" . $section['section_name'] . "</option>";
            }

            // Now, echo the select dropdown with the options
            if (!empty($options)) {
                echo "<select id='multiple-select' multiple name='course_ids' placeholder='Select Course Name' data-search='true'>";
                echo $options;
                echo "</select>";
            } else {
                echo "<select id='multiple-select' multiple name='course_ids' placeholder='Select Course Name' data-search='true'>";
                echo "<option value=''>No sections found</option>";
                echo "</select>";
            }
        } else {
            echo "<select id='multiple-select' multiple name='course_ids' placeholder='Select Course Name' data-search='true'>";
            echo "<option value=''>No advisor found</option>";
            echo "</select>";
        }
    }
    protected function callFilterAllSectionByProgram()
    {
        if (isset($_GET['advisor_id'])) {
            $advisor_id = $_GET['advisor_id'];
            $this->filterAllSectionByProgram($advisor_id);
        }
    }
    public function callAllHelperFilter()
    {
        $this->callFilterAllSectionByProgram();
    }
    protected function filterStudents($program_id = null, $year_level = null, $section_id = null)
    {
        if ($section_id == null) {
            $sql = "SELECT 
            student_tbl.*,
            program_tbl.program_code,
            section_tbl.section_name
            FROM student_tbl
            LEFT JOIN program_tbl ON student_tbl.program_id = program_tbl.program_id
            LEFT JOIN section_tbl ON student_tbl.section_id = section_tbl.section_id
            WHERE student_tbl.program_id = ? AND student_tbl.year_level = ? ORDER BY student_id ASC";
            $stmt = $this->db()->prepare($sql);
            $stmt->execute([$program_id, $year_level]);
            $result = $stmt->fetchAll();

            // Check if any rows were returned
            if ($result) {
                return $result;
            } else {
                // Handle case where no rows were returned
                return []; // Return an empty array
            }
        } else {
            $sql = "SELECT 
        student_tbl.*,
        program_tbl.program_code,
        section_tbl.section_name
        FROM student_tbl
        LEFT JOIN program_tbl ON student_tbl.program_id = program_tbl.program_id
        LEFT JOIN section_tbl ON student_tbl.section_id = section_tbl.section_id
        WHERE student_tbl.program_id = ? AND student_tbl.year_level = ? AND student_tbl.section_id = ? ORDER BY student_id ASC";
            $stmt = $this->db()->prepare($sql);
            $stmt->execute([$program_id, $year_level, $section_id]);
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll();
                // Check if any rows were returned
                if ($result) {
                    return $result;
                } else {
                    $_SESSION['message'] = "No student found in this filter!";
                    $_SESSION['status'] = "#bb2124";
                }
            } else {
                $_SESSION['message'] = "No student found in this filter!";
                $_SESSION['status'] = "#bb2124";
            }
        }
    }
    public function callFilterStudents($program_id, $year_level, $section_id)
    {
        return $this->filterStudents($program_id, $year_level, $section_id);
    }
    protected function assignStudentSection($section_id, $year_level, $program_id, $studentIds)
    {
        // Ensure $studentIds is a string
        if (is_array($studentIds)) {
            $studentIds = implode(",", $studentIds);
        }

        // Proceed with the rest of the function
        $studentIdsArray = explode(",", $studentIds);
        $sql = "UPDATE student_tbl SET section_id = ?, year_level = ?, program_id = ? WHERE student_id = ?";
        $stmt = $this->db()->prepare($sql);

        foreach ($studentIdsArray as $studentId) {
            $stmt->execute([$section_id, $year_level, $program_id, $studentId]);
        }

        $_SESSION['message'] = "Student's section updated successfully!";
        $_SESSION['status'] = "#22bb33";
        header('Location: class-list.php');
    }
    public function callAssignStudentSection($section_id, $year_level, $program_id, $studentIds)
    {
        $this->assignStudentSection($section_id, $year_level, $program_id, $studentIds);
    }
    protected function assignCourseTeacher($advisor_id, $course_ids)
    {
        $courseIdsArray = explode(",", $course_ids);

        // Check if $course_ids is an array
        if (is_array($courseIdsArray)) {
            // Use placeholders in the SQL query to prevent SQL injection
            $sqlSelect = "SELECT * FROM subject_taught_tbl WHERE advisor_id = ? AND course_id = ?";
            $sqlInsert = "INSERT INTO subject_taught_tbl (advisor_id, course_id) VALUES (?, ?)";

            // Prepare the select and insert statements
            $stmtSelect = $this->db()->prepare($sqlSelect);
            $stmtInsert = $this->db()->prepare($sqlInsert);

            foreach ($courseIdsArray as $courseId) {
                // Execute the select query for each courseId
                $stmtSelect->execute([$advisor_id, $courseId]);

                // Fetch the result for each execution
                $result = $stmtSelect->fetch(PDO::FETCH_ASSOC);

                // Check if a result is found
                if (!$result) {
                    // If no data exists, insert the course_id
                    $stmtInsert->execute([$advisor_id, $courseId]);
                    // Set success message
                    $_SESSION['message'] = "Course instructor assigned successfully!";
                    $_SESSION['status'] = "#22bb33";
                } else {
                    // Set success message
                    $_SESSION['message'] = "Course instructor already assigned!";
                    $_SESSION['status'] = "#bb2124";
                }
            }
        }

        // Redirect to subject-taught.php after processing all courses
        header("Location: subject-taught.php");
    }
    public function callAssignCourseTeacher($advisor_id, $course_ids)
    {
        $this->assignCourseTeacher($advisor_id, $course_ids);
    }
    protected function assignAdvisor($advisor_id, $section_ids)
    {
        $sectionIdsArray = explode(",", $section_ids);

        // Check if $section_ids is an array
        if (is_array($sectionIdsArray)) {
            // Use placeholders in the SQL query to prevent SQL injection
            $sqlSelect = "SELECT * FROM advises_tbl WHERE advisor_id = ? AND section_id = ?";
            $sqlInsert = "INSERT INTO advises_tbl (advisor_id, section_id) VALUES (?, ?)";

            // Prepare the select and insert statements
            $stmtSelect = $this->db()->prepare($sqlSelect);
            $stmtInsert = $this->db()->prepare($sqlInsert);

            foreach ($sectionIdsArray as $sectionId) {
                // Execute the select query for each sectionId
                $stmtSelect->execute([$advisor_id, $sectionId]);

                // Fetch the result for each execution
                $result = $stmtSelect->fetch(PDO::FETCH_ASSOC);

                // Check if a result is found
                if (!$result) {
                    // If no data exists, insert the sectionId
                    $stmtInsert->execute([$advisor_id, $sectionId]);
                    // Set success message
                    $_SESSION['message'] = "Section adviser assigned successfully!";
                    $_SESSION['status'] = "#22bb33";
                } else {
                    // Set success message
                    $_SESSION['message'] = "Section adviser already assigned!";
                    $_SESSION['status'] = "#bb2124";
                }
            }
        }

        // Redirect to subject-taught.php after processing all courses
        header("Location: assign-adviser.php");
    }
    public function callAssignAdvisor($advisor_id, $section_ids)
    {
        $this->assignAdvisor($advisor_id, $section_ids);
    }
    protected function readSubjectTaught($condition)
    {
        $sql = "SELECT * FROM subject_taught_tbl INNER JOIN advisor_tbl ON subject_taught_tbl.advisor_id = advisor_tbl.advisor_id INNER JOIN course_tbl ON subject_taught_tbl.course_id = course_tbl.course_id WHERE subject_taught_tbl.is_archive = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$condition]); // 0 is NOT  archive
        $data = $stmt->fetchAll();

        return $data;
    }
    public function getAllSubjectTaught($condition)
    {
        return $this->readSubjectTaught($condition);
    }
    protected function readAssignAdviser($condition)
    {
        $sql = "SELECT * FROM advises_tbl INNER JOIN advisor_tbl ON advises_tbl.advisor_id = advisor_tbl.advisor_id INNER JOIN section_tbl ON advises_tbl.section_id = section_tbl.section_id WHERE advises_tbl.is_archive = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$condition]); // 0 is NOT  archive
        $data = $stmt->fetchAll();

        return $data;
    }
    public function getAllAssignAdviser($condition)
    {
        return $this->readAssignAdviser($condition);
    }
    protected function readAssignSubjectTeacher($condition)
    {
        $sql = "SELECT * FROM subject_course_tbl INNER JOIN advisor_tbl ON subject_course_tbl.advisor_id = advisor_tbl.advisor_id INNER JOIN section_tbl ON subject_course_tbl.section_id = section_tbl.section_id INNER JOIN course_tbl ON subject_course_tbl.course_id = course_tbl.course_id WHERE subject_course_tbl.is_archive = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$condition]); // 0 is NOT  archive
        $data = $stmt->fetchAll();

        return $data;
    }
    public function getAllAssignSubjectTeacher($condition)
    {
        return $this->readAssignSubjectTeacher($condition);
    }
    protected function readSemester($condition)
    {
        $sql = "SELECT * FROM semester_tbl WHERE is_archive = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$condition]); // 0 is NOT  archive
        $data = $stmt->fetchAll();

        return $data;
    }
    public function getAllSemester($condition)
    {
        return $this->readSemester($condition);
    }
    protected function filterTeacherByCourse($course_id)
    {

        $sql = "SELECT * FROM subject_taught_tbl INNER JOIN advisor_tbl ON subject_taught_tbl.advisor_id = advisor_tbl.advisor_id WHERE course_id = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$course_id]);

        $advisors = $stmt->fetchAll();

        if ($advisors) {
            // Output options for advisor dropdown
            foreach ($advisors as $advisor) {
                $fullname = $advisor['firstname'] . " " . $advisor['middlename'] . " " . $advisor['lastname'] . " " . $advisor['suffix'] . ", " . $advisor['title'];
                echo "<option value='" . $advisor['advisor_id'] . "'>" . $fullname . "</option>";
            }
        } else {
            echo "<option value=''>No instructor found</option>";
        }
    }
    protected function callFilterTeacherByCourse()
    {
        if (isset($_GET['course_id'])) {
            $course_id = $_GET['course_id'];
            $this->filterTeacherByCourse($course_id);
        } else {
            // Handle case where program_id is not provided
            echo "<option value=''>Select instructor first</option>";
        }
    }
    public function callHelperFilterTeacherCourse()
    {
        $this->callFilterTeacherByCourse();
    }
    protected function insertSubjectTaughtSection($advisor_id, $section_ids, $course_id)
    {
        $sectionIdsArray = explode(",", $section_ids);

        // Check if $course_ids is an array
        if (is_array($sectionIdsArray)) {
            // Use placeholders in the SQL query to prevent SQL injection
            $sqlSelect = "SELECT * FROM subject_course_tbl WHERE advisor_id = ? AND section_id = ? AND course_id = ?";
            $sqlInsert = "INSERT INTO subject_course_tbl (advisor_id, section_id, course_id) VALUES (?,?,?)";

            // Prepare the select and insert statements
            $stmtSelect = $this->db()->prepare($sqlSelect);
            $stmtInsert = $this->db()->prepare($sqlInsert);

            foreach ($sectionIdsArray as $sectionId) {
                // Execute the select query for each courseId
                $stmtSelect->execute([$advisor_id, $sectionId, $course_id]);

                // Fetch the result for each execution
                $result = $stmtSelect->fetch(PDO::FETCH_ASSOC);

                // Check if a result is found
                if (!$result) {
                    // If no data exists, insert the course_id
                    $stmtInsert->execute([$advisor_id, $sectionId, $course_id]);
                    // Set success message
                    $_SESSION['message'] = "Course instructor assigned to section successfully!";
                    $_SESSION['status'] = "#22bb33";
                } else {
                    // Set success message
                    $_SESSION['message'] = "Course instructor already assigned!";
                    $_SESSION['status'] = "#bb2124";
                }
            }
        }

        // Redirect to assign-subject-teacher.php after processing all courses
        header("Location: assign-subject-teacher.php");
    }
    public function callInsertSubjectTaughtSection($advisor_id, $section_id, $section_ids)
    {
        $this->insertSubjectTaughtSection($advisor_id, $section_id, $section_ids);
    }
    protected function insertGradingCriteria($data, $current_page)
    {
        $program_id = $data['program_id'];
        $year_level = $data['year_level'];
        $sql = "SELECT * FROM gradingsystem_tbl WHERE program_id = ? AND year_level = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$program_id, $year_level]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION['message'] = "Grading criteria already exist! Update it rather.";
            $_SESSION['status'] = "#bb2124";
            header("Location: grading-criteria.php");
        } else {
            $this->insert($data, $current_page);
            $_SESSION['message'] = "Grading criteria inserted successfully!";
            $_SESSION['status'] = "#22bb33";
            header("Location: grading-criteria.php");
        }
    }
    public function callInsertGradingCriteria($data, $current_page)
    {
        $this->insertGradingCriteria($data, $current_page);
    }
    protected function insertSemester($data, $current_page)
    {
        $semester_name = $data['semester_name'];
        $year = $data['year'];
        $sql = "SELECT * FROM semester_tbl WHERE semester_name = ? AND year = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$semester_name, $year]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION['message'] = "Semester on this academic year is already exist!";
            $_SESSION['status'] = "#bb2124";
            header("Location: semester.php");
        } else {
            $this->insert($data, $current_page);
            $_SESSION['message'] = "Semester on this academic year inserted successfully.";
            $_SESSION['status'] = "#22bb33";
            header("Location: semester.php");
        }
    }
    public function callInsertSemester($data, $current_page)
    {
        $this->insertSemester($data, $current_page);
    }
}
