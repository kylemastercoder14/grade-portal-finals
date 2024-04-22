<?php

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
            echo "<script>alert('EXISTING DATA!!!')</script>";
        } else {
            $this->insert($data, $currentPage);
        }
    }
    // call sa action
    public function callInsertProgram($data, $currentPage){
        $this->insertProgram($data, $currentPage);
    }
    protected function readProgram(){
        $sql = "SELECT * FROM program_tbl WHERE is_archive = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([0]); // 0 is NOT  archive
        $data = $stmt->fetchAll();

        return $data;
    }
    public function getAllProgram(){
        return $this->readProgram();
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

            header('Location: programs.php');
            
        }else{
            echo "error" . $data['program_name'],$data['program_code'],$data['program_id'];
        }
    }
    public function callArchiveProgram($data, $currentPage){
        $this->archiveProgram($data, $currentPage);
    }
    protected function archiveProgram($data, $currentPage){
        $tableName = $currentPage . '_tbl';
        $sql = "UPDATE $tableName SET `is_archive` = ? WHERE `program_id` = ?";
        $stmt = $this->db()->prepare($sql);
        $success = $stmt->execute([1, $data['program_id']]); // 1 is archived, 0 is NOT

        header('Location: programs.php');
    }
}
