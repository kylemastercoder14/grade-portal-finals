<?php
include ('includes/includes.php');

$control = new Control();

if(isset($_POST['asd'])){
    $dataToUpdate = array(
        'column1' => 'updated_value1',
        'column2' => 'updated_value2',
        // Add more columns as needed
    );
    
    $currentPage = 'your_table_name';
    $id = 123; // ID of the row to be updated
    
    $updateResult = $this->update($dataToUpdate, $currentPage, $id);
}
// else if(isset($_POST['submit_grade'])){
//     $course_id = $_GET['course_id'];

//     $student_id = $_POST['student_id'];
//     $grading_system_id = $_POST['grading_system_id'];
//     $seatwork = $_POST['seatwork'];
//     $quizzes = $_POST['quizzes'];
//     $assignment = $_POST['assignment'];
//     $examination = $_POST['examination'];
//     $others = isset($_POST['others']) ? $_POST['others'] : null;

//     $control->callInsertGrade($student_id,$grading_system_id,$course_id,$seatwork,$quizzes,$assignment,$examination,$others);
// }

?>