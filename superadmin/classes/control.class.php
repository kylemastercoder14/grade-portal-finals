<?php 
include ('includes/includes.php');

class Control {
    private $view;
    private $model;
    private $import;

    public function __construct($id = null , $page = null){
        $this->model = new Model();
        $data_arr = $this->model->getById($id);
        
        
        $programUnarchiveArr = $this->model->getAllProgram(0);
        $programArchiveArr = $this->model->getAllProgram(1);
        $this->view = new View($data_arr , $page, $programUnarchiveArr,$programArchiveArr );
    }

    public function dashboard()
    {
        $this->view->dashboardContent();
    }

    public function program()
    {
        $this->view->programsContent();
    }
    
    
}
?>