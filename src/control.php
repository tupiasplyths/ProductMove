<?php
include_once('extDB.php');
include_once('login.php');
include_once('signup.php');

session_start();
class Control {
    public function exec() {
        $ext = new Extract();
        // $ext->toTable();
        
        header('Content-Type: application/json');
        echo $ext->toJSON();
    }
    public function login() {
        echo 'logging in...';
        $log = new Login($_POST['login_username'], $_POST['login_password']);
        $log->checkPassword();
    }

    public function signup() {
        $sig = new Signup($_POST['SU_username'], $_POST['password']);
        $sig->modifyDB();
        header("refresh:4; url=index.html");
    }

    public function logout()
    {
        echo 'you are logged out';
        unset($_SESSION["username"]);
        unset($_SESSION["valid"]);
        header('refresh:3; url=index.html');
    }
}
$ctrl = new Control();

if (isset($_POST['a'])) {
    $ctrl->exec();
}
if (isset($_POST['SU_username'])) {
    $ctrl->signup();
}
if (isset($_POST['login'])) {
    $ctrl->login();
}
if (isset($_POST['logout_button'])) {
    $ctrl->logout();
}