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

        // get hashed password and bind to variable
        // use prepare to avoid SQL injection
        $result = $conn->prepare('SELECT passwords FROM users WHERE username=?');
        $result->bind_param("s", $this->username);
        $result->execute();
        $result->bind_result($rs);
        $result->fetch();

        // confirm password matches hashed password
        $is_valid_profile = (password_verify($this->password, $rs)) ? 'You are logged in!' : 'Your username or   password is incorrect!';
        echo $is_valid_profile;   

        // redirect
        if ($is_valid_profile == 'You are logged in!'){
            header("refresh:5; url=homepage.html");
        } else {
            header("refresh:5; url=index.html");
        }
    }
    
}