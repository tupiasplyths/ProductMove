<?php
class Signup {
    private $SU_username;
    private $SU_password;

    public function __construct($u, $p) {
        $this->SU_username = $u;
        $this->SU_password = $p;
    }
    public function modifyDB()
    {
        // Connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";
        $conn = new mysqli($servername, $username, $password, $dbname, "3307");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "INSERT INTO users SET username ='" . $this->SU_username 
                . "', passwords ='" . $this->SU_password . "'";
        if($conn->query($sql)==TRUE) {
            echo "success";
        } else {
            echo "failed";
        }
        $conn->close();
    }
}

