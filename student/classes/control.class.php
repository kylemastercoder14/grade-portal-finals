<?php 
include ('includes/includes.php');

class Control {
    private $view;
    private $model;
    private $import;
   

    public function __construct($id = null , $page = null){
        $this->model = new Model();
        $data_arr = $this->model->getById($id);

        $sessionKicker = $this->model->sessionKicker($id);
        
        $this->view = new View(
            $data_arr, 
            $page, 
            
        );

    }

    public function dashboard()
    {
        $this->view->dashboardContent();
    }

    public function advising()
    {
        $this->view->advisingContent();
    }

    public function grades()
    {
        $this->view->gradesContent();
    }

    public function signin()
    {
        $this->view->signinContent();
    }

    public function coursesEnrolled()
    {
        $this->view->courseEnrolledContent();
    }
}
?>