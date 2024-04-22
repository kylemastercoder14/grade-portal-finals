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
            echo "<script>alert('EXISTING DATA!!!')</script>";
        } else {
            $this->insertSample($data, $currentPage);
        }
    }

    // call sa action
    public function callInsertProgram($data, $currentPage)
    {
        $this->insertProgram($data, $currentPage);
    }

    protected function readProgram()
    {
        $sql = "SELECT * FROM program_tbl";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute([]);
        $data = $stmt->fetchAll();

        return $data;
    }

    public function getAllProgram()
    {
        return $this->readProgram();
    }

    protected function insertSample($data, $currentPage)
{
    // function para sa cipher encryption
    $cipherTexts = $this->encryptor($data);
    $columns = implode(', ', array_keys($data));
    $placeholders = implode(', ', array_fill(0, count($data), '?'));

    $tableName = $currentPage . '_tbl';

    $sql = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";

    // Assuming $db is your database connection object
    $stmt = $this->db()->prepare($sql);
    $stmt->execute($cipherTexts);
}

protected function encryptor($data)
{
    $shift = 14;
    $cipherTexts = [];

    foreach ($data as $item) {
        $cipherText = "";
        for ($i = 0; $i < strlen($item); $i++) {
            $char = $item[$i];
            // Check if character is a letter
            if (ctype_alpha($char)) {
                $isUpperCase = ctype_upper($char);
                $offset = $isUpperCase ? ord('A') : ord('a');
                $cipherChar = chr(($shift + ord($char) - $offset) % 26 + $offset);
                $cipherText .= $cipherChar;
            } else {
                // For non-alphabetic characters, just keep them unchanged
                $cipherText .= $char;
            }
        }
        $cipherTexts[] = $cipherText;
    }

    return $cipherTexts;
}

protected function decryptor(){
    
}

}
