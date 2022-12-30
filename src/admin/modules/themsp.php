<h3>Thêm sản phẩm </h3>
<span id="errMsg" class="error"></span>
<table border="1" width= "50%" style="border-collapse:collapse">
    <form method="POST" action="modules/xulysp.php" name="themsanpham" id="addForm">
        <tr>
            <th>Điền danh mục sản phẩm</th>
        </tr>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="tensanpham" id="prodName" onblur="checkEmpty(this)"> </td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" name="masp" id="prodCode" onblur="checkEmpty(this)"></td>
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td><input type="text" name="trangthai" id="status" onblur="checkEmpty(this)"></td>
        </tr>
        <tr>
            <td>Cơ sở sản xuất</td>
            <td><input type="text" name="Cososanxuat" id="Factory"></td>
        </tr>
        <tr>
            <td>Đại lý phân phối</td>
            <td><input type="text" name="Dailyphanphoi" id="Distrib"></td>
        </tr>
        <tr>
            <td>Trung tâm bảo hành</td>
            <td><input type="text" name="Trungtambaohanh" id="WarrCen"></td>
        </tr>
        <tr>
            <td>Ngày sản xuất</td>
            <td><input type="text" name="Ngaysanxuat" placeholder="dd-mm-yyyy" class="date" id="ManuDate" onblur="checkDate(this)"></td>
        </tr>
        <tr>
            <td>Thời hạn bảo hành</td>
            <td><input type="text" name="Thoihanbaohanh" placeholder="dd-mm-yyyy" class="date" id="WarrDate" onblur="checkDate(this)"></td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="iddm">
                    <?php
                    $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id ASC";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                    <option value="<?php echo $row_danhmuc['id']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
        </tr>
    </form>

</table>
<script src="modules/addProd.js"></script>