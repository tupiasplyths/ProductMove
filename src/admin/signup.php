<?php
include_once('connectDB.php');
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
        $conn = Connect::initConn();

        // hashing password
        $sec_pwd = password_hash($this->SU_password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users SET username ='" . $this->SU_username 
                . "', passwords ='" . $sec_pwd . "'";

        // run the query
        if($conn->query($sql)==TRUE) {
            echo "success";
        } else {
            echo "failed";
        }
        //close the connection
        $conn->close();
    }
}
