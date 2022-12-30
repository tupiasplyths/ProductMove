<form action="index.php?action=thongke&&query=them" method="POST">
<label for="fname">Thống kê theo:</label>
    <select name="thongkeloi" onchange="window.location.href=this.value;">
    <option ></option>
    <option value="modules/lietketheodsp.php">Dòng sản phẩm</option>
    <option value="modules/lietketheocssx.php">Cơ sở sản xuất</option>
    <option value="modules/lietketheodlpp.php">Đại lý phân phối</option>
    </select>
</form>

