<?php

class Dbconfig {

    private $hostname = "localhost"; // Change to your local server hostname
    private $dbusername = "root"; // Change to your local server database username
    private $dbpw = ""; // Change to your local server database password
    private $dbname = "grade_portal_db"; // Change to your local server database name

    // private $hostname = "fdb1031.biz.nf";
    // private $dbusername = "4410191_cienyl";
    // private $dbpw = "Bakitpaba*29";
    // private $dbname = "4410191_cienyl";

    public function db() {
        $dsn = 'mysql:host=' . $this->hostname . ';dbname=' . $this->dbname; 
        try {
            $pdo = new PDO($dsn, $this->dbusername, $this->dbpw);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            // Handle connection error gracefully
            echo 'Connection failed: ' . $e->getMessage();
            return null;
        }
    }
}  
?>