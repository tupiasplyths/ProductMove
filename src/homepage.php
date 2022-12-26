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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <img src="/assets/lol.gif" alt="rickrolledlol">
        <!-- <form action="control.php" method="post">
            <input type="submit" name="print" id="print" value="Get Table">
        </form> -->
        <table id="tabe">
            <thead>
                <tr>
                    <td>Username</td>
                    <td>Password</td>
                </tr>
            </thead>
            <tbody id="bod"></tbody>
        </table>
        <button id="display" name="btn">
            Display Table
        </button>
        <form action="control.php" method="post" id="logout">
            <input type="submit" value="Log out" name="logout_button"/>
        </form>
    </div>

    <script src="homepage.js"></script>
</body>
</html>