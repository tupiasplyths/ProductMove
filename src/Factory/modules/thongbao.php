<?php
    $sql_thongbao = "SELECT id_thongbao, noidung, id_gui, id_sanpham FROM thongbao ORDER BY id_thongbao ASC";
    $query_thongbao = mysqli_query($mysqli, $sql_thongbao);
?>

<h3> Thông báo </h3>

<table border="1" width= "80%" style="border-collapse:collapse">
  <tr>
    <th>Id</th>
    <th>Nội dung thông báo</th>
    <th>Mã nơi gửi</th>
    <th>Sản phẩm</th>
    <th>Thao tác</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_thongbao)) {
      $i++;

  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['noidung'] ?></td>
    <td><?php echo $row['id_gui'] ?></td>
    <td><?php echo $row['id_sanpham'] ?></td>
    <td>
        <a href="modules/xulytb.php?id_thongbao=<?php echo $row['id_thongbao']?>">Xóa</a>
    </td>
  </tr>
    <?php
        }
    ?>
</table>