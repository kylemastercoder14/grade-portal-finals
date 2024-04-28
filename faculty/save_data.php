    <?php
    require_once 'includes/includes.php';

    $control = new Control();
    $db = new Dbconfig();

    if (isset($_POST['submit_all_grades'])) {
        $course_id = $_GET['course_id'];
        $student_ids = $_POST['student_id'];
        $grading_system_id = $_POST['grading_system_id'];
        $student_quizzes = $_POST['quiz'];
        $student_assignments = $_POST['assignment'];
        $student_seatworks = $_POST['seatwork'];
        $student_examinations = $_POST['examination'];
        $student_others = $_POST['other'];


        for ($i = 0; $i < count($student_quizzes); $i++) {
            $student_id = $student_ids[$i];
            $quiz = $student_quizzes[$i];
            $assignment = $student_assignments[$i];
            $seatwork = $student_seatworks[$i];
            $examination = $student_examinations[$i];
            $other = $student_others[$i];

            // Compute grade based on the grading system and student scores
            $grade = $control->callComputeGrades($grading_system_id, $seatwork, $quiz, $assignment, $examination, $other);

            // Perform an SQL query to insert data into your database
            $sql = "INSERT INTO enrollment_tbl (student_id, course_id, grading_system_id, grade) VALUES ('$student_id', '$course_id', '$grading_system_id', '$grade')";
            $db->db()->query($sql);
        }
        header("Location: advisory.php");
        exit;
    } else if (isset($_POST['submit_grade'])) {

        $course_id = $_GET['course_id'];
        $student_id = $_POST['student_id'];
        $grading_system_id = $_POST['grading_system_id'];
        $student_quiz = $_POST['quiz'];
        $student_assignment = $_POST['assignment'];
        $student_seatwork = $_POST['seatwork'];
        $student_examination = $_POST['examination'];
        $student_other = $_POST['other'];

        $grade = $control->callComputeGrades($grading_system_id, $student_seatwork[0], $student_quiz[0], $student_assignment[0], $student_examination[0], $student_other[0]);
        $sql = "INSERT INTO enrollment_tbl (student_id, course_id, grading_system_id, grade) VALUES ('$student_id[0]', '$course_id', '$grading_system_id', '$grade')";
        $db->db()->query($sql);
        header("Location: advisory.php");
        exit;
    }


    ?>
