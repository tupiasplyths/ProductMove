<?php
class Connect {
    public static function initConn()
    {
        // login to database
        $servername = "localhost";
        $DBusername = "root";
        $DBpassword = "";
        $dbname = "my_db";
        $conn = new mysqli($servername, $DBusername, $DBpassword, $dbname, "3307");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
    
}