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
        // echo 'logging in...';
        $log = new Login($_POST['login_username'], $_POST['login_password']);

        header('Content-Type: application/json');
        echo $log->checkPassword();
    }

    public function signup() {
        $sig = new Signup($_POST['SU_username'], $_POST['password']);
        $sig->modifyDB();
        // header("refresh:4; url=login.html");
        $message = array("body"=>"Sign up successfully");

        header('Content-Type: application/json');
        echo json_encode($message);
    }

    public function logout()
    {
        unset($_SESSION["username"]);
        unset($_SESSION["valid"]);
        header('location:login.html');
    }
}
$ctrl = new Control();

if (isset($_POST['a'])) {
    $ctrl->exec();
}
if (isset($_POST['SU_username'])) {
    $ctrl->signup();
}
if (isset($_POST['login_username'])) {
    $ctrl->login();
}
if (isset($_POST['logout_button'])) {
    $ctrl->logout();
}