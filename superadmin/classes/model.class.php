<?php 

class Model extends Dbconfig{

    protected function read()
    {
        $sql = "SELECT * FROM student_tbl";
        $stmt= $this->db()->prepare($sql);
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
}
?>
