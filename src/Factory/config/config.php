<?php
$mysqli = new mysqli("localhost","root","","my_db",'3307');

// Check connection
if ($mysqli -> connect_errno) {
  echo "Lỗi kết nối MySQL " . $mysqli -> connect_error;
  exit();
}
?>