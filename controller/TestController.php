<?php

require_once 'model/TestModel.php';

class TestController {

    public $testModel = NULL;

    public function __construct() {
        $this->testModel = new TestModel();
    }

    /* This function is to check for all requests & to perform different Fetch/Add/edit/delete operations */
    public function manageAllRequests() {  
        $param = isset($_GET['param']) ? $_GET['param'] : NULL;
        $id = isset($_GET['id']) ? $_GET['id'] : NULL;
        try {
            if (empty($param)) {
                $this->listAll();
            } elseif ($param == 'add') {     
                $this->add();
            } elseif ($param == 'edit') {
                $this->edit($id);
            } elseif ($param == 'delete') {
                $this->delete($id);
            } else {
                throw new Exception("Invalid arguments");
            }
        } catch (Exception $e) {
            echo 'Error Message: ' . $e->getMessage();
        }
    }

    /*  This function is to fetch all the records */
    public function listAll() {      
            $messages = $this->testModel->getAllRecords(); 
            include 'view/listAll.php';
    }

    /*  This function is to add new records */
    public function add() {
        $message_title = '';
        $message_description = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $message_title = isset($_POST['message_title']) ? $_POST['message_title'] : NULL;
                $message_description = isset($_POST['message_description']) ? $_POST['message_description'] : NULL;
                if (!empty($message_title) && !empty($message_description)) {
                    $this->testModel->addDetails($message_title, $message_description); 
                    header('Location: index.php');
                    return;
                } else {
                    throw new Exception("No value found to insert data");
                }
            } catch (Exception $e) {
                echo 'Error Message: ' . $e->getMessage();
            }
        }
        include 'view/create.php';
    }

     /*  This function is to edit the existing records */
     public function edit($id) {         
        $messages = $this->testModel->getDetails($id); /* Fetch the record to edit  */
        $message_title = '';
        $message_description = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') { /* Update here once submitted */
            try {
                $message_title = isset($_POST['message_title']) ? $_POST['message_title'] : NULL;
                $message_description = isset($_POST['message_description']) ? $_POST['message_description'] : NULL;
                if (!empty($message_title) && !empty($message_description)) {
                    $this->testModel->editDetails($message_title, $message_description, $id);  /* Update the record */
                    header('Location: index.php');
                    return;
                } else {
                    throw new Exception("Value cannot be empty");
                }
            } catch (Exception $e) {
                echo 'Error Message: ' . $e->getMessage();
            }
        }
        include 'view/edit.php';  /* Display existing records in edit page */
    }

    /*  This function is to delete the records */
    public function delete($id) {
        $messages = $this->testModel->getDetails($id); /* Fetch the record before deleting */
        try {
            if (!empty($id)|| !empty($messages)) {
                $this->testModel->deleteDetails($id);
                header('Location: index.php');
                return;
            } else {
                throw new Exception("Record cannot be deleted");
            }
        } catch (Exception $e) {
            echo 'Error Message: ' . $e->getMessage();
        }
    }

}

?>
