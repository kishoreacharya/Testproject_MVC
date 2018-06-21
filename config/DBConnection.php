<?php
class DBConnection {
    public $db = null;
    public function Open() {
        try {
            $dsn = "mysql:dbname=test_project; host=localhost";    /* Set Database name and host */
            $user = "root";                                         /* Set username */
            $password = "";                                             /* Set password */

            $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            );
            $this->db = new PDO($dsn, $user, $password, $options);
            $this->db->exec("SET CHARACTER SET utf8");
            return $this->db;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
    public function Close() {
        $this->db = null;
        return true;
    }
}

?>
