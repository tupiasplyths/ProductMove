<?php
class Extract {
    public function toTable()
    {
        $conn = Connect::initConn();
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

    public function toJSON() {
        $conn = Connect::initConn();
        // echo "<link rel='stylesheet' href='style.css'>";
        // $sql = "SELECT username, passwords FROM users";
        $sql = "SELECT * FROM sanpham, danhmuc WHERE sanpham.id_danhmuc = danhmuc.id ORDER BY id_sanpham ASC";
        $result = $conn->query($sql);

        //create an array
        $emparray = array();
        while($row =mysqli_fetch_assoc($result))
        {
            $emparray[] = $row;
        }        
        $conn->close();
        return json_encode($emparray);
        
    }
}