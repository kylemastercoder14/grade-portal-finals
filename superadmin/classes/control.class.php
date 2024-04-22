<?php 
include ('includes/includes.php');

class Control {
    private $view;
    private $model;
    private $import;

    public function __construct($id = null , $page){
        
        $this->model = new Model();
        $data_arr = $this->model->getById($id);

        $this->view = new View($data_arr , $page);
        
    }

    public function dashboard()
    {
        $this->view->compose();
    }
}
?>
