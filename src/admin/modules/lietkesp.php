<?php
    $sql_lietkesp = "SELECT * FROM sanpham, danhmuc WHERE sanpham.id_danhmuc = danhmuc.id ORDER BY id_sanpham ASC";
    
    $query_lietkesp = mysqli_query($mysqli, $sql_lietkesp);
?>
<link rel="stylesheet" href="../css/table.css">
<h3> Liệt kê danh mục sản phẩm </h3>

<table border="1" width= "80%" style="border-collapse:collapse">
<thead>
  <tr>
      <th>Id</th>
      <th class="sortable">Tên sản phẩm<span class="arr"></span></th>
      <th>Mã sản phẩm</th>
      <th class="sortable">Danh mục<span class="arr"></span></th>
      <th class="sortable">Trạng thái<span class="arr"></span></th>
      <th>Cơ sở sản xuất</th>
      <th>Đại lý phân phối</th>
      <th>Trung tâm bảo hành</th>
      <th class="sortable">Ngày sản xuất<span class="arr"></span></th>
      <th class="sortable">Thời hạn bảo hành<span class="arr"></span></th>
      <th>Thao tác</th>
    </tr>
</thead>  
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

<script>
  const getCellValue = (tr, idx) =>
    tr.children[idx].innerText || tr.children[idx].textContent;
  

  var comparer = function(idx, asc) { 
      return function(a, b) {
          return function(v1, v2) {
              return (v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2)) 
                  ? v1 - v2 : v1.toString().localeCompare(v2);
          }(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));
      }
  };
  var count = 0;
  document.querySelectorAll('th.sortable').forEach(th => th.addEventListener('click', (() => {                      
      const table = th.closest('table');                
      const tbody = table.querySelector('tbody');
      Array.from(tbody.querySelectorAll('tr'))
          .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
          .forEach(tr => tbody.appendChild(tr));              
      
      if (count%2!=0) {
          editArrow();
          th.classList.remove('asc');
          th.classList.add('dsc');
          
      } else {
          editArrow();
          th.classList.remove('dsc');
          th.classList.add('asc');
      }
      count++;
      
  })));

  function editArrow() {
      document.querySelectorAll('th.sortable').forEach(th => {
          th.classList.remove('asc');
          th.classList.remove('dsc');
      });
  }
  
</script>