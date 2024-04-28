<?php

require_once 'includes/includes.php';
$db = new Dbconfig();

if (isset($_GET['program_id'], $_GET['year_level'])) {
    $program_id = $_GET['program_id'];
    $year_level = $_GET['year_level'];
    $sql = "SELECT * FROM section_tbl WHERE program_id = ? AND year_level = ? ORDER BY section_name ASC";
    $stmt = $db->db()->prepare($sql);
    $stmt->execute([$program_id, $year_level]);

    $sections = $stmt->fetchAll();

    if ($sections) {
        echo '<option value=""></option>';
        // Output options for section dropdown
        foreach ($sections as $section) {
            echo "<option value='" . $section['section_id'] . "'>" . $section['section_name'] . "</option>";
        }
    } else {
        echo "<option value=''>No sections found</option>";
    }
};
