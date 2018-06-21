<?php

require_once 'config/DBConnection.php';

class TestModel {   

    public $conn = NULL;

    public function __construct() {
        $this->conn = new DBConnection();
    }

    public function getAllRecords() {  /* This function is to fetch all existing records */
        try {
            $con = $this->conn->Open();
            $sql = "SELECT * FROM messages";
            $stmt = $con->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage();
        }
    }

    public function addDetails($message_title, $message_description) { /* This function is to insert new record */
        try {
            $con = $this->conn->Open();
            $stmt = $con->prepare("INSERT INTO messages (message_title, message_description)
                        VALUES(:mtitle, :mdesc)");

            $res = $stmt->execute(array(
                "mtitle" => $message_title,
                "mdesc" => $message_description
            ));
        } catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage();
            die();
        }
    }

    public function editDetails($message_title, $message_description, $id) { /* This function is to update existing record */
        try {
            $con = $this->conn->Open();

            $stmt = $con->prepare("UPDATE messages SET message_title=?,message_description=? WHERE id=?");
            $res = $stmt->execute(array($message_title, $message_description, $id));
        } catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage();
            die();
        }
    }

    public function getDetails($id) {  /* This function is to get details based on record id */
        try {
            $con = $this->conn->Open();

            $stmt = $con->prepare("SELECT * FROM messages where id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (empty($results)) {
                throw new Exception("No results found");
            } else {
                return $results;
            }
        } catch (Exception $e) {
            echo 'Error Message: ' . $e->getMessage();
            die();
        }
    }

    public function deleteDetails($id) { /* This function is to delete the records  */
        try {
            $con = $this->conn->Open();
            $sql = "DELETE FROM messages WHERE id = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute(array($id));
        } catch (PDOException $e) {
            echo 'Error Message: ' . $e->getMessage();
            die();
        }
    }

}

?>
