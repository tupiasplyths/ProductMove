<?php
    $sql_lietke = "SELECT * FROM danhmuc ORDER BY thutu ASC";
    $query_lietke = mysqli_query($mysqli, $sql_lietke);
?>

<h3> Liệt kê danh mục sản phẩm </h3>

<table border="1" width= "80%" style="border-collapse:collapse">
  <tr>
    <th>Id</th>
    <th>Tên danh mục</th>
    <th>Thao tác</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_lietke)) {
      $i++;

  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td>
        <a href="modules/xuly.php?iddanhmuc=<?php echo $row['id']?>">Xóa </a> |<a href="?action=quanly&query=sua&iddanhmuc=<?php echo $row['id']?>">Sửa </a>
    </td>
  </tr>
    <?php
        }
    ?>
</table>