<?php

class Model extends Dbconfig
{
    // hari ng insert
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

    // hari ng update
    protected function update($data, $currentPage, $id)
    {
        // Generate SET clause for updating columns
        $setClause = '';
        foreach ($data as $column => $value) {
            $setClause .= "$column = ?, ";
        }
        $setClause = rtrim($setClause, ', ');

        // Construct SQL query
        $tableName = $currentPage . '_tbl';
        $dataId = $currentPage . "_id";
        $sql = "UPDATE $tableName SET $setClause WHERE $dataId = ?"; // Assuming you have an 'id' column

        $stmt = $this->db()->prepare($sql);

        // Bind values to placeholders
        $i = 1;
        foreach ($data as $value) {
            $stmt->bindValue($i++, $value);
        }
        $stmt->bindValue($i, $id);

        $stmt->execute();

        return;
    }

    // hari ng readbyid
    protected function readById($id)
    {
        try {
            
           
            $sql = "SELECT * FROM advisor_tbl WHERE advisor_id = ?";
            $stmt = $this->db()->prepare($sql);
            $stmt->execute([$id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data;
        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error, display a message)
            echo "Error: " . $e->getMessage();
            return false; // Return false to indicate failure
        }
    }


    public function getById($id)
    {
        return $this->readById($id);
    }

    protected function readAssignAdviser($condition, $id)
    {
        $sql = "SELECT * FROM advises_tbl INNER JOIN advisor_tbl ON advises_tbl.advisor_id = advisor_tbl.advisor_id INNER JOIN section_tbl ON advises_tbl.section_id = section_tbl.section_id WHERE advises_tbl.is_archive = ? AND advises_tbl.advisor_id = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$condition, $id]); // 0 is NOT  archive
        $data = $stmt->fetchAll();

        return $data;
    }
    public function getAllAssignAdviser($condition, $id)
    {
        return $this->readAssignAdviser($condition, $id);
    }

    protected function readClassList($condition, $section_id)
    {
        $sql = "SELECT * FROM student_tbl WHERE is_archive = ? AND section_id = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$condition, $section_id]);
        $data = $stmt->fetchAll();

        return $data;
    }

    public function gradeCriteria($program_id, $year_level, $condition) {
        $sql = "SELECT * FROM grading_system_tbl WHERE program_id = ? AND year_level = ? AND is_archive = ?";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([$program_id, $year_level, $condition]);
        $data = $stmt->fetch();
        return $data;
    }

    public function getAllClassList($condition, $section_id)
    {
        return $this->readClassList($condition, $section_id);
    }
}
