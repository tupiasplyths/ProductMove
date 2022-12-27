<?php
// check if the user is logged in
include_once('control.php');
    if (!isset($_SESSION['valid']) || !$_SESSION['valid']) {
        echo "You are not logged in";
        header('refresh:2, url = login.html');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="StyleSheet" type="text/css" href="css/style.css"/>
</head>
<body>

    <?php  
     include("config/config.php");
     include("pages/header.php");
     include("pages/main.php");
     ?>

</body>
</html>