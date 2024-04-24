<?php

class Dbconfig
{

    private $hostname = "localhost"; // Change to your local server hostname
    private $dbusername = "root"; // Change to your local server database username
    private $dbpw = ""; // Change to your local server database password
    private $dbname = "grade_portal_db"; // Change to your local server database name
    private $backupDir = "";

    // private $hostname = "fdb1031.biz.nf";
    // private $dbusername = "4410191_cienyl";
    // private $dbpw = "Bakitpaba*29";
    // private $dbname = "4410191_cienyl";

    public function db()
    {
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

    public function backupDatabase()
    {
        try {
            $filename = 'backup_' . date("Y-m-d-H-i-s") . '.sql'; // Backup filename with timestamp
            $filePath = $this->backupDir . $filename;

            // Get all table names in the database
            $tables = array();
            $stmt = $this->db()->query("SHOW TABLES");
            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                $tables[] = $row[0];
            }

            // Export each table's structure and data to the backup file
            $handle = fopen($filePath, 'w');
            foreach ($tables as $table) {
                $stmt = $this->db()->prepare("SHOW CREATE TABLE $table");
                $stmt->execute();
                $tableData = $stmt->fetch(PDO::FETCH_NUM);
                fwrite($handle, "-- Table structure for table `$table`" . PHP_EOL);
                fwrite($handle, $tableData[1] . ";" . PHP_EOL);

                $stmt = $this->db()->prepare("SELECT * FROM $table");
                $stmt->execute();
                $rowCount = $stmt->rowCount();
                if ($rowCount > 0) {
                    fwrite($handle, "-- Dumping data for table `$table`" . PHP_EOL);
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $rowValues = array_map(function ($value) {
                            return "'" . addslashes($value) . "'";
                        }, $row);
                        $rowValuesString = implode(', ', $rowValues);
                        fwrite($handle, "INSERT INTO `$table` VALUES ($rowValuesString);" . PHP_EOL);
                    }
                }
                fwrite($handle, PHP_EOL);
            }
            fclose($handle);

            // Check if backup file was created and has content
            if (file_exists($filePath) && filesize($filePath) > 0) {
                return $filename; // Return filename
            } else {
                throw new Exception("Backup failed or produced an empty file.");
            }
        } catch (Exception $e) {
            // Handle backup error
            echo 'Backup failed: ' . $e->getMessage();
            return false;
        }
    }
}
