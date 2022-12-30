<?php
include("../config/config.php");

if(isset($_POST['themthongbao'])) {

} else{
    $idthongbao = $_GET['id_thongbao'];
    $sql_xoa = "DELETE FROM thongbao WHERE id_thongbao = '".$idthongbao."' ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../index.php?action=thongbao&query=them');
}
?>