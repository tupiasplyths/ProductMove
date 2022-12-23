<?php
class Extract {
    public function toTable()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        
        $conn = new mysqli($servername, $username, $password, $dbname, "3307");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "<link rel='stylesheet' href='style.css'>";
        $sql = "SELECT username, passwords FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>Username</th><th>Pass</th></tr>";
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["username"] . "</td><td>" . $row["passwords"] . "</td></tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }
}