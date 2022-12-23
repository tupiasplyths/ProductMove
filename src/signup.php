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
        $sec_pwd = password_hash($this->SU_password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users SET username ='" . $this->SU_username 
                . "', passwords ='" . $sec_pwd . "'";
        if($conn->query($sql)==TRUE) {
            echo "success, passwords:" . $this->SU_password . "hashed password:" . $sec_pwd;
        } else {
            echo "failed";
        }
        $conn->close();
    }
}

