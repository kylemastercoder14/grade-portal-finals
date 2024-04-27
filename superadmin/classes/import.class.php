<?php include('includes/includes.php');

class Import
{
    public $message;
 
    public function __construct($messagekeme = null)
    {
        $this->message = $messagekeme;
    }

    public function statusMessage() {
        return $this->message;
    }
}
?>