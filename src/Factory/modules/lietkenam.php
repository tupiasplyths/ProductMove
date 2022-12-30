<?php
include("../config/config.php");
?>
<?php
    global $sql_lietkesp;
    $sql_lietkesp = "SELECT Year(Ngaysanxuat) as year, COUNT(*) as Quantity
    FROM sanpham 
    WHERE trangthai LIKE '%sản xuất%'
    GROUP BY year
    ORDER BY year ASC";
    $query_lietkesp = mysqli_query($mysqli, $sql_lietkesp);
?>

<h3>Thống kê theo năm</h3>

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
    <td><?php echo $row['year'] ?></td>
    <td><?php echo $row['Quantity'] ?></td>
   
  </tr>
    <?php
        }
    ?>
</table>
<input type="submit" name="back" value="Back" onclick="history.back()"> 
