<?php 
include ('includes/includes.php');

class Control {
    private $view;
    private $model;
    private $import;
    public $data_arr;

    public function __construct($id = null , $page = null){
        $this->model = new Model();
        $data_arr = $this->model->getById($id);

        //assign adviser view
        $assignAdviserUnarchiveArr = $this->model->getAllAssignAdviser(0, $id);
        $assignAdviserArchiveArr = $this->model->getAllAssignAdviser(1, $id);

        $classListUnarchiveArr = null; 
        $classListArchiveArr = null;
        // class list view
        if(isset($_GET['section_id'])) {
            $section_id = $_GET['section_id'];
            $classListUnarchiveArr = $this->model->getAllClassList(0, $section_id);
            $classListArchiveArr = $this->model->getAllClassList(1, $section_id);
            
        };
        

        $gradeCriteriaUnarchiveArr = null;
        $gradeCriteriaArchiveArr = null;
        if(isset($_GET['program_id'], $_GET['year_level'])) {
            $program_id = $_GET['program_id'];
            $year_level = $_GET['year_level'];
            $gradeCriteriaUnarchiveArr = $this->model->gradeCriteria($program_id, $year_level, 0);
            $gradeCriteriaArchiveArr = $this->model->gradeCriteria($program_id, $year_level, 1);

            
        }    
            
        
        $this->view = new View(
            $page,
            $data_arr,
            $assignAdviserUnarchiveArr ,
            $assignAdviserArchiveArr ,
            $classListUnarchiveArr,
            $classListArchiveArr ,
            $gradeCriteriaUnarchiveArr,
            $gradeCriteriaArchiveArr,
        );

    }

    public function dashboard()
    {
        $this->view->dashboardContent();
    }

    public function advisor()
    {
        $this->view->advisorContent();
    }

    public function advises()
    {
        $this->view->advisesContent();
    }

    public function callComputeGrades($grading_system_id, $seatwork, $quizzes, $assignment, $examination, $others){
        return $this->model->computeGrade($grading_system_id, $seatwork, $quizzes, $assignment, $examination, $others);
    }
}
?>