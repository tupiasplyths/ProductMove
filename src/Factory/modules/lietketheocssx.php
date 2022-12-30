<?php
include("../config/config.php");
?>
<?php
    global $sql_lietkesp;
    $sql_lietkesp = "SELECT Cososanxuat as CSSX, COUNT(*) as Quantity
    FROM sanpham 
    WHERE trangthai LIKE '%Lỗi%'
    GROUP BY CSSX
    ORDER BY CSSX ASC;";
    $query_lietkesp = mysqli_query($mysqli, $sql_lietkesp);
?>

<h3> Thống kê sản phẩm lỗi theo cơ sở sản xuất </h3>

<table border="1" width= "80%" style="border-collapse:collapse">
  <tr>
    <th>Cơ sở sản xuất</th>
    <th>Số lượng sản phẩm</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_lietkesp)) {
      $i++;

  ?>
  <tr>
    <td><?php echo $row['CSSX']?></td>
    <td><?php echo $row['Quantity'] ?></td>
   
  </tr>
    <?php
        }
    ?>
</table>
<input type="submit" name="back" value="Back" onclick="history.back()"> 
