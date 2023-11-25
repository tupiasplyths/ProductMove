<?php
// check if the user is logged in
include_once('control.php');
    if (!isset($_SESSION['valid']) || !$_SESSION['valid']) {
        echo "access denied";
        header('refresh:2, url = index.html');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Product Move</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container2">
        <h1 class="welcomeMsg">Welcome to BigCorp</h1>
        
        <form action="control.php" method="post" id="logout">
            <input type="submit" value="Log out" name="logout_button" class="logout"/>
        </form>
    </div>

    <script src="homepage.js"></script>
</body>
</html>