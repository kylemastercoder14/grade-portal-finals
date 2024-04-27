<?php
include ('includes/includes.php');

$control = new Control();

$model = new Model();

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
?>