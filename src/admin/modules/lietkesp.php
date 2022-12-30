<?php
    $sql_lietkesp = "SELECT * FROM sanpham, danhmuc  ORDER BY id_sanpham ASC";
    //WHERE sanpham.id_danhmuc = danhmuc.id
    $query_lietkesp = mysqli_query($mysqli, $sql_lietkesp);
?>

<h3> Liệt kê danh mục sản phẩm </h3>

<table border="1" width= "80%" style="border-collapse:collapse">
  <tr>
    <th>Id</th>
    <th>Tên sản phẩm</th>
    <th>Mã sản phẩm</th>
    <th>Danh mục</th>
    <th>Trạng thái</th>
    <th>Cơ sở sản xuất</th>
    <th>Đại lý phân phối</th>
    <th>Trung tâm bảo hành</th>
    <th>Ngày sản xuất</th>
    <th>Thời hạn bảo hành</th>
    <th>Thao tác</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_lietkesp)) {
      $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><?php echo $row['masp'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td><?php echo $row['trangthai'] ?></td>
    <td><?php echo $row['Cososanxuat'] ?></td>
    <td><?php echo $row['Dailyphanphoi'] ?></td>
    <td><?php echo $row['Trungtambaohanh'] ?></td>
    <td><?php echo $row['Ngaysanxuat'] ?></td>
    <td><?php echo $row['Thoihanbaohanh'] ?></td>
    <td>
      <a href="modules/xulysp.php?idsanpham=<?php echo $row['id_sanpham']?>">Xóa </a> |
      <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham']?>">Sửa </a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>