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

        $result = $conn->prepare('SELECT username, passwords FROM users WHERE username=?');
        $result->bind_param("s", $this->username);
        $result->execute();
        $result->bind_result($col1,$col2);
        $result->fetch();

        $is_valid_profile = (password_verify($this->password, $col2)) ? 'You are logged in!' : 'Your username or   password is incorrect!';
        echo $is_valid_profile;   
        if ($is_valid_profile == 'You are logged in!'){
            header("refresh:5; url=homepage.html");
        } else {
            header("refresh:5; url=index.html");
        }
    }
    
}