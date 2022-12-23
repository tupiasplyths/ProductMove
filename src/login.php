<?php
class Login {
    private $username;
    private $password;
    public function __construct($u, $p)
    {
        $this->username = $u;
        $this->password = $p;
    }

    public function checkPassword(){
        // Connect to database
        $servername = "localhost";
        $DBusername = "root";
        $DBpassword = "";
        $dbname = "test";
        $conn = new mysqli($servername, $DBusername, $DBpassword, $dbname, "3307");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // checking username and password in database
        $result = $conn->prepare('SELECT username, passwords FROM users WHERE username=? AND passwords=?');
        // bind_param("type1type2", $data1, $data2)
        $result->bind_param("ss", $this->username, $this->password);
        $result->execute();
        $result->bind_result($col1,$col2);
        $result->fetch();
        $is_valid_profile = ($col1!=null) ? 'You are logged in!' : 'Your username or   password is incorrect!';
        echo $is_valid_profile;   
        header( "refresh:5; url=homepage.html" );      
    }
    
}