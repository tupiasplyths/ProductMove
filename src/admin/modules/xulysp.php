<?php
include("../config/config.php");

$tensanpham= $_POST['tensanpham'];
$masp = $_POST['masp'];
$trangthai= $_POST['trangthai'];
$cososanxuat = $_POST['Cososanxuat'];
$dailyphanphoi = $_POST['Dailyphanphoi'];
$trungtambaohanh = $_POST['Trungtambaohanh'];
$ngaysanxuat = $_POST['Ngaysanxuat'];
$thoihanbaohanh = $_POST['Thoihanbaohanh'];
$danhmuc = $_POST['iddm'];

if(isset($_POST['themsanpham'])) {
    $sql_them = "INSERT INTO sanpham(tensanpham,masp,trangthai,Cososanxuat,Dailyphanphoi,Trungtambaohanh,Ngaysanxuat,Thoihanbaohanh,id_danhmuc) 
    VALUE(' " . $tensanpham . "' , ' " . $masp . "', ' " . $trangthai . "' , ' " . $cososanxuat . "', ' " . $dailyphanphoi . "' ,
    ' " . $trungtambaohanh . "',' " . $ngaysanxuat . "' 
    , ' " . $thoihanbaohanh. "', ' " . $danhmuc. "')";
    mysqli_query($mysqli, $sql_them);
    header('Location:../index.php?action=quanlysanpham&id=1&query=them');
} elseif(isset($_POST['suasanpham'])) {
    $sql_update = "UPDATE sanpham SET tensanpham='".$tensanpham."'
    , masp='".$masp."' 
    , trangthai='".$trangthai."'
    , Cososanxuat='".$cososanxuat."'
    , Dailyphanphoi='".$dailyphanphoi."'
    , Trungtambaohanh='".$trungtambaohanh."'
    , Ngaysanxuat='".$ngaysanxuat."'
    , Thoihanbaohanh='".$thoihanbaohanh."'
    , id_danhmuc = '".$danhmuc."'
    WHERE id_sanpham = '$_GET[idsanpham]'";
    mysqli_query($mysqli, $sql_update);
    header('Location:../index.php?action=quanlysanpham&id=1&query=them');
} 
else{
    $id = $_GET['idsanpham'];
    $sql_xoa = "DELETE FROM sanpham WHERE id_sanpham = '".$id."' ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../index.php?action=quanlysanpham&id=1&query=them');
}
    


?>