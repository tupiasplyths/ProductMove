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
        
    }

    public function signup() {
        echo "bruh" . "<br>";
        $sig = new Signup($_POST['SU_username'], $_POST['password']);
        $sig->modifyDB();
    }
}
$ctrl = new Control();
if (isset($_POST['print'])) {
    $ctrl->exec();
}
if (isset($_POST['SU_username'])) {
    $ctrl->signup();
}

