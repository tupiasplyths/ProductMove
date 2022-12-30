<?php
include("../config/config.php");

$tensanpham= $_POST['tensanpham'];
$masp = $_POST['masp'];
$dailyphanphoi = $_POST['Dailyphanphoi'];
$sql_cososanxuat = "SELECT Cososanxuat FROM sanpham WHERE masp LIKE '%".$masp."%'";

if(isset($_POST['suasanpham'])) {
    $sql_update = "UPDATE sanpham SET
      trangthai='Đưa về đại lý'
    , Dailyphanphoi='".$dailyphanphoi."'
    WHERE masp LIKE '%".$masp."%'";
    mysqli_query($mysqli, $sql_update);
    $sql_them = "INSERT INTO thongbao(id_gui,id_nhan,id_sanpham,noidung) 
    VALUE(' " . $sql_cososanxuat . "' , ' " . $dailyphanphoi . "', ' " . $masp . "' , 'Xuất hàng')";
    mysqli_query($mysqli, $sql_them);
    header('Location:../index.php?action=xuathang&query=them');
} 
 

?>