<?php 
include ('includes/includes.php');

class Control {
    private $view;
    private $model;
    private $import;

    public function __construct($id = null , $page = null){
        $this->model = new Model();
        $data_arr = $this->model->getById($id);
        
        // program view
        $programUnarchiveArr = $this->model->getAllProgram(0);
        $programArchiveArr = $this->model->getAllProgram(1);

        //section view
        $sectionUnarchiveArr = $this->model->getAllSection(0);
        $sectionArchiveArr = $this->model->getAllSection(1);

        // subject view

        $this->view = new View(
            $data_arr, 
            $page, 
            $programUnarchiveArr,
            $programArchiveArr,
            $sectionUnarchiveArr,
            $sectionArchiveArr
            
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
}
?>