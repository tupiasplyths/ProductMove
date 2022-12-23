<?php
include_once('extDB.php');
include_once('login.php');
include_once('signup.php');
class Control {
    public function exec() {
        $ext = new Extract();
        $ext->toTable();
    }
    public function login() {
        echo 'logging in...';
        $log = new Login($_POST['login_username'], $_POST['login_password']);
        $log->checkPassword();
    }

    public function signup() {
        $sig = new Signup($_POST['SU_username'], $_POST['password']);
        $sig->modifyDB();
        header("refresh:5; url=index.html");
    }
}
$ctrl = new Control();
if (isset($_POST['print'])) {
    $ctrl->exec();
}
if (isset($_POST['SU_username'])) {
    $ctrl->signup();
}
if (isset($_POST['login']) ) {
    $ctrl->login();
}

// && $_POST['login_username']