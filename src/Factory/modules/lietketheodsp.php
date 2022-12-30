<?php
include("../config/config.php");
?>
<?php
    global $sql_lietkesp;
    $sql_lietkesp = "SELECT id_danhmuc as Danhmuc, COUNT(*) as Quantity
    FROM sanpham 
    WHERE trangthai LIKE '%Lỗi%'
    GROUP BY Danhmuc
    ORDER BY Danhmuc ASC;";
    $query_lietkesp = mysqli_query($mysqli, $sql_lietkesp);
?>

<h3> Thống kê sản phẩm lỗi theo dòng sản phẩm </h3>

<table border="1" width= "80%" style="border-collapse:collapse">
  <tr>
    <th>Dòng sản phẩm</th>
    <th>Số lượng sản phẩm</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_lietkesp)) {
      $i++;

  ?>
  <tr>
    <td><?php
    if ($row['Danhmuc'] == '5') {
        echo 'Laptop DELL';}
    elseif ($row['Danhmuc'] == '6') {
        echo 'Laptop Asus';}
    elseif ($row['Danhmuc'] == '14') {
        echo 'Laptop Acer';}
    elseif ($row['Danhmuc'] == '15') {
        echo 'Macbook';}
    elseif ($row['Danhmuc'] == '16') {
        echo 'Laptop MicroSoft';}
    elseif ($row['Danhmuc'] == '17') {
         echo 'Laptop HP';}
    elseif ($row['Danhmuc'] == '18') {
        echo 'Laptop Lenovo';}
    elseif ($row['Danhmuc'] == '20') {
         echo 'Laptop Razer';}
     ?>
    </td>
    <td><?php echo $row['Quantity'] ?></td>
   
  </tr>
    <?php
        }
    ?>
</table>
<input type="submit" name="back" value="Back" onclick="history.back()"> 
