<?php

session_start();

class Model extends Dbconfig
{

    protected function read(){
        $sql = "SELECT * FROM student_tbl";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }
    protected function readById($id){
        $sql = "SELECT * FROM student_tbl WHERE student_id = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch a single row as an associative array

        return $data;
    }
    public function getById($id){
        return $this->readById($id);
    }
    // pang-protekta ng insert query kasama ang sanitation
    protected function insertProgram($data, $currentPage){
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
    public function callInsertProgram($data, $currentPage){
        $this->insertProgram($data, $currentPage);
    }
    protected function readProgram($condition){
        $sql = "SELECT * FROM program_tbl WHERE is_archive = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$condition]); // 0 is NOT  archive
        $data = $stmt->fetchAll();

        return $data;
    }
    
    public function getAllProgram($condition){
        return $this->readProgram($condition);
    }

    protected function insert($data, $currentPage){
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

    public function callEditProgram($data, $currentPage){
        $this->editProgram($data, $currentPage);
    }

    protected function editProgram($data, $currentPage){
        $tableName = $currentPage . '_tbl';
        $sql1 = "SELECT * FROM $tableName WHERE program_id = ?";
        $stmt = $this->db()->prepare($sql1);
        $stmt->execute([$data['program_id']]);
        $result = $stmt->fetch();

        if($result){
            $sql2 = "UPDATE $tableName SET `program_name`= ? ,`program_code`= ? WHERE program_id = ?";
            $stmt = $this->db()->prepare($sql2);
            $stmt->execute([$data['program_name'],$data['program_code'],$data['program_id']]);

            $_SESSION['message'] = "Program updated successfully!";
            $_SESSION['status'] = "#22bb33";
            header("Location: programs.php");
            
        }else{
            $_SESSION['message'] = "Error updating program!";
            $_SESSION['status'] = "#bb2124";
            header("Location: programs.php");
        }
    }
    public function callArchiveProgram($data, $currentPage){
        $this->archiveProgram($data, $currentPage);
    }
    protected function unarchiveProgram($program_id, $currentPage){
        $tableName = $currentPage . '_tbl';
        $sql = "UPDATE $tableName SET `is_archive` = ? WHERE `program_id` = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([0, $program_id]); // 1 is archived, 0 is NOT

        $_SESSION['message'] = "Program retrieved successfully!";
        $_SESSION['status'] = "#22bb33";
        header('Location: programs.php');
    }
    
    public function callUnarchiveProgram($program_id,$currentPage) {
        $this->unarchiveProgram($program_id, $currentPage);
    }
    protected function archiveProgram($data, $currentPage){
        $tableName = $currentPage . '_tbl';
        $sql = "UPDATE $tableName SET `is_archive` = ? WHERE `program_id` = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([1, $data['program_id']]); // 1 is archived, 0 is NOT

        $_SESSION['message'] = "Program archived successfully!";
        $_SESSION['status'] = "#22bb33";
        header('Location: programs.php');
    }
}
