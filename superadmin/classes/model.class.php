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

    protected function readStudent($condition)
    {
        $sql = "SELECT *
        FROM student_tbl
        INNER JOIN program_tbl ON student_tbl.program_id = program_tbl.program_id
        INNER JOIN section_tbl ON student_tbl.section_id = section_tbl.section_id
        WHERE student_tbl.is_archive = ?
        ";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$condition]); // 0 is NOT  archive
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
}
