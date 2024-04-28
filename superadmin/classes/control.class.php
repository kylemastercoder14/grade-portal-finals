<?php
include('includes/includes.php');

class Control
{
    private $view;
    private $model;
    private $import;


    public function __construct($id = null, $page = null)
    {
        $this->model = new Model();
        $data_arr = $this->model->getById($id);

        // program view
        $programUnarchiveArr = $this->model->getAllProgram(0);
        $programArchiveArr = $this->model->getAllProgram(1);

        //section view
        $sectionUnarchiveArr = $this->model->getAllSection(0);
        $sectionArchiveArr = $this->model->getAllSection(1);

        //subject view
        $subjectUnarchiveArr = $this->model->getAllSubject(0);
        $subjectArchiveArr = $this->model->getAllSubject(1);

        //student view
        $studentUnarchiveArr = $this->model->getAllStudent(0);
        $studentArchiveArr = $this->model->getAllStudent(1);

        //advisor view
        $advisorUnarchiveArr = $this->model->getAllAdvisor(0);
        $advisorArchiveArr = $this->model->getAllAdvisor(1);

        //subject taught view
        $subjecTaughtUnarchiveArr = $this->model->getAllSubjectTaught(0);
        $subjecTaughtArchiveArr = $this->model->getAllSubjectTaught(1);

        //grading criteria view
        $gradingCriteriaUnarchiveArr = $this->model->getAllGradingCriteria(0);
        $gradingCriteriaArchiveArr = $this->model->getAllGradingCriteria(1);

        //assign adviser view
        $assignAdviserUnarchiveArr = $this->model->getAllAssignAdviser(0);
        $assignAdviserArchiveArr = $this->model->getAllAssignAdviser(1);

        //assign adviser view
        $assignSubjectTeacherUnarchiveArr = $this->model->getAllAssignSubjectTeacher(0);
        $assignSubjectTeacherArchiveArr = $this->model->getAllAssignSubjectTeacher(1);

        //semester view
        $semesterUnarchiveArr = $this->model->getAllSemester(0);
        $semesterArchiveArr = $this->model->getAllSemester(1);

        $program_arr = null;
        $sessionKicker = $this->model->sessionKicker($id);


        if (isset($_GET['program_id'], $_GET['year_level'], $_GET['section_id'])) {
            $program_id = $_GET['program_id'];
            $year_level = $_GET['year_level'];
            $section_id = $_GET['section_id'];
            $program_arr = $this->model->callFilterStudents($program_id, $year_level, $section_id);
        }

        $this->view = new View(
            $data_arr,
            $page,
            $programUnarchiveArr,
            $programArchiveArr,
            $sectionUnarchiveArr,
            $sectionArchiveArr,
            $subjectUnarchiveArr,
            $subjectArchiveArr,
            $studentUnarchiveArr,
            $studentArchiveArr,
            $advisorUnarchiveArr,
            $advisorArchiveArr,
            $subjecTaughtUnarchiveArr,
            $subjecTaughtArchiveArr,
            $gradingCriteriaUnarchiveArr,
            $gradingCriteriaArchiveArr,
            $assignAdviserUnarchiveArr,
            $assignAdviserArchiveArr,
            $assignSubjectTeacherUnarchiveArr,
            $assignSubjectTeacherArchiveArr,
            $semesterUnarchiveArr,
            $semesterArchiveArr,
            $program_arr,
        );
    }

    public function dashboard()
    {
        $this->view->dashboardContent();
    }

    public function program()
    {
        $this->view->programsContent();
    }

    public function section()
    {
        $this->view->sectionContent();
    }

    public function subject()
    {
        $this->view->subjectContent();
    }

    public function student()
    {
        $this->view->studentContent();
    }

    public function teacher()
    {
        $this->view->teacherContent();
    }

    public function classList()
    {
        $this->view->classListContent();
    }

    public function subjectTaught()
    {
        $this->view->subjectTaughtContent();
    }

    public function advises()
    {
        $this->view->assignAdviserContent();
    }

    public function sectionSubjectTaught()
    {
        $this->view->sectionSubjectTaughtContent();
    }

    public function gradingSystem()
    {
        $this->view->gradingSystemContent();
    }

    public function semester()
    {
        $this->view->semesterContent();
    }

    public function signin()
    {
        $this->view->signinContent();
    }

    public function controlCallHelperFilterTeacherCourse()
    {
        $this->model->callHelperFilterTeacherCourse();
    }

    public function callStatusMessage($decode)
    {
       return $this->model->statusMessage($decode);
    }
}
