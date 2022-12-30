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
  <tbody id="bod"></tbody>

<button id="display" name="btn">
  Display Table
</button>
<script src="homepage.js"></script>
<script src="modules/sort.js"></script>