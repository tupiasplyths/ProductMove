<?php
include("../config/config.php");
?>
<?php
    global $sql_lietkesp;
    $sql_lietkesp = "SELECT Quarter(Ngaysanxuat) as quarter, COUNT(*) as Quantity
    FROM sanpham 
    WHERE trangthai LIKE '%sản xuất%'
    GROUP BY quarter
    ORDER BY quarter ASC";
    $query_lietkesp = mysqli_query($mysqli, $sql_lietkesp);
?>

<h3>Thống kê theo quý</h3>

<table border="1" width= "80%" style="border-collapse:collapse">
  <tr>
    <th>Quý</th>
    <th>Số lượng sản phẩm</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_lietkesp)) {
      $i++;

  ?>
  <tr>
    <td><?php echo $row['quarter'] ?></td>
    <td><?php echo $row['Quantity'] ?></td>
   
  </tr>
    <?php
        }
    ?>
</table>
<input type="submit" name="back" value="Back" onclick="history.back()"> 
