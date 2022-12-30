
<form action="index.php?action=thongke&&query=them" method="POST">
<label for="fname">Thống kê theo:</label>
    <select name="thongke" onchange="window.location.href=this.value;">
    <option ></option>
    <option value="modules/lietke.php">Tháng</option>
    <option value="modules/lietkequy.php">Quý</option>
    <option value="modules/lietkenam.php">Năm</option>
    </select>
</form>

