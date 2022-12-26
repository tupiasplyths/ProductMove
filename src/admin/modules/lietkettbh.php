<?php
global $tentrungtam;
    if(isset($_POST['timtrungtam'])) {
    $tentrungtam = $_POST['tentrungtam'];
    }
    $sql_lietkesp = "SELECT * FROM sanpham, danhmuc WHERE sanpham.id_danhmuc = danhmuc.id AND sanpham.Trungtambaohanh LIKE '%" .$tentrungtam. "%' ORDER BY id_sanpham ASC";
    $query_lietkesp = mysqli_query($mysqli, $sql_lietkesp);
?>

<h3> Thống kê theo trung tâm bảo hành </h3>

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
  </tr>
    <?php
        }
    ?>
</table>