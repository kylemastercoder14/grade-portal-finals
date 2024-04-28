<?php
require_once 'includes/includes.php';

$db = new Dbconfig();

if (isset($_GET['advisor_id'])) {

    $advisor_id = $_GET['advisor_id'];
    $sql = "SELECT * FROM advisor_tbl WHERE advisor_id = ? ORDER BY advisor_id ASC";
    $stmt = $db->db()->prepare($sql);
    $stmt->execute([$advisor_id]);

    $advisor = $stmt->fetch();

    if ($advisor) {
        $program_id = $advisor['program_id'];
        $sql2 = "SELECT * FROM section_tbl WHERE program_id = ? ORDER BY section_name ASC";
        $stmt2 = $db->db()->prepare($sql2);
        $stmt2->execute([$program_id]);

        $sections = $stmt2->fetchAll();

        // Start building the select dropdown options
        $options = "";
        foreach ($sections as $section) {
            // Append each option to the $options variable
            $options .= "<option value='" . $section['section_id'] . "'>" . $section['section_name'] . "</option>";
        }

        // Now, echo the select dropdown with the options
        if (!empty($options)) {
            echo "<select id='multiple-select' multiple name='course_ids' placeholder='Select Course Name' data-search='true'>";
            echo $options;
            echo "</select>";
        } else {
            echo "<select id='multiple-select' multiple name='course_ids' placeholder='Select Course Name' data-search='true'>";
            echo "<option value=''>No sections found</option>";
            echo "</select>";
        }
    } else {
        echo "<select id='multiple-select' multiple name='course_ids' placeholder='Select Course Name' data-search='true'>";
        echo "<option value=''>No advisor found</option>";
        echo "</select>";
    }
}
