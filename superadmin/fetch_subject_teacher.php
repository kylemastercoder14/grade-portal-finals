<?php
require_once 'includes/includes.php';

$db = new Dbconfig();

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    $sql = "SELECT * FROM subject_taught_tbl INNER JOIN advisor_tbl ON subject_taught_tbl.advisor_id = advisor_tbl.advisor_id WHERE course_id = ?";
    $stmt = $db->db()->prepare($sql);
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
