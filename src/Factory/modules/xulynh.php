<?php
include("../config/config.php");

$tensanpham= $_POST['tensanpham'];
$masp = $_POST['masp'];
$cososanxuat = $_POST['Cososanxuat'];
$ngaysanxuat = $_POST['Ngaysanxuat'];
$thoihanbaohanh = $_POST['Thoihanbaohanh'];
$danhmuc = $_POST['iddm'];

if(isset($_POST['nhapsanpham'])) {
    $sql_them = "INSERT INTO sanpham(tensanpham,masp,trangthai,Cososanxuat,Dailyphanphoi,Trungtambaohanh,Ngaysanxuat,Thoihanbaohanh,id_danhmuc) 
    VALUE(' " . $tensanpham . "' , ' " . $masp . "', ' Mới sản xuất' , ' " . $cososanxuat . "', ' None' ,
    ' None',' " . $ngaysanxuat . "' 
    , ' " . $thoihanbaohanh. "', ' " . $danhmuc. "')";
    mysqli_query($mysqli, $sql_them);
    header('Location:../index.php?action=nhaphang&query=them');
} 