<?php

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
        $sql = "SELECT * FROM student_tbl INNER JOIN program_tbl ON student_tbl.program_id = program_tbl.program_id WHERE student_id = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
    public function getById($id)
    {
        return $this->readById($id);
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

    protected function signin($student_id, $password)
    {
        $sql = "SELECT * FROM student_tbl WHERE student_id = ? AND password = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$student_id, $password]);
        $result = $stmt->fetch();

        if ($result) {
            session_start();
            $_SESSION['id'] = $result['student_id'];
            header("Location: index.php");
        } else {
            header("Location: signin.php");
        }
    }

    public function callSignin($student_id, $password)
    {
        $this->signin($student_id, $password);
    }

    // session kicker
    public function sessionKicker($sessionId) {
        if(!isset($sessionId)) {
            header("Location: signin.php");
        }
    }

    protected function gradesById($id)
    {
        $sql = "SELECT * FROM enrollment_tbl INNER JOIN student_tbl ON enrollment_tbl.student_id = student_tbl.student_id INNER JOIN course_tbl ON enrollment_tbl.course_id = course_tbl.course_id WHERE enrollment_tbl.student_id = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();

        return $data;
    }
    public function getGradesById($id)
    {
        return $this->gradesById($id);
    }
}
