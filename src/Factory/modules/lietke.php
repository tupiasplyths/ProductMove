<?php
include("../config/config.php");
?>
<?php
    global $sql_lietkesp;
    $sql_lietkesp = "SELECT Month(Ngaysanxuat) as Month, COUNT(*) as Quantity
    FROM sanpham 
    WHERE trangthai LIKE '%sản xuất%'
    GROUP BY Month
    ORDER BY Month ASC";
    $query_lietkesp = mysqli_query($mysqli, $sql_lietkesp);
?>

<h3>Thống kê theo tháng</h3>

<table border="1" width= "80%" style="border-collapse:collapse">
  <tr>
    <th>Tháng</th>
    <th>Số lượng sản phẩm</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_lietkesp)) {
      $i++;

  ?>
  <tr>
    <td><?php echo $row['Month'] ?></td>
    <td><?php echo $row['Quantity'] ?></td>
   
  </tr>
    <?php
        }
    ?>
</table>
<input type="submit" name="back" value="Back" onclick="history.back()"> 
