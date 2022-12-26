<?php
include_once('connectDB.php');
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
        $conn = Connect::initConn();

        // get hashed password and bind to variable
        // use prepare to avoid SQL injection
        $result = $conn->prepare('SELECT passwords FROM users WHERE username=?');
        $result->bind_param("s", $this->username);
        $result->execute();
        $result->bind_result($hp); // hp: hashed password
        $result->fetch();

        // confirm password matches hashed password
        $is_valid_profile = (password_verify($this->password, $hp)) ? 'You are logged in!' : 'Your username or   password is incorrect!';
        echo $is_valid_profile;   

        // redirect
        if ($is_valid_profile == 'You are logged in!'){
            $_SESSION['username'] = $this->username;
            $_SESSION['valid'] = true;
            header("refresh:3; url=homepage.php");
        } else {
            header("refresh:3; url=index.html");
        }
    }
    
}