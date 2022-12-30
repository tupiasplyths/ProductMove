<?php
    $sql_sua_sp = "SELECT * FROM sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
    $query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);
?>
<p> Sửa danh mục sản phẩm </p>
<span id="errMsg" class="error"></span>
<table border="1" width= "50%" style="border-collapse:collapse">
<form method="POST" action="modules/xulysp.php?idsanpham=<?php echo $_GET['idsanpham']?>">
    <?php
    while ($dong = mysqli_fetch_array($query_sua_sp)) {
    ?>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" value="<?php echo $dong['tensanpham'] ?>" name="tensanpham" onfocus="empty(this)" onblur="checkEmpty(this)"></td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" value="<?php echo $dong['masp'] ?>" name="masp" onfocus="empty(this)" onblur="checkEmpty(this)"></td>
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td><input type="text" value="<?php echo $dong['trangthai'] ?>" name="trangthai" onfocus="empty(this)" onblur="checkEmpty(this)"></td>
        </tr>
        <tr>
            <td>Cơ sở sản xuất</td>
            <td><input type="text" value="<?php echo $dong['Cososanxuat'] ?>" name="Cososanxuat" onfocus="empty(this)"></td>
        </tr>
        <tr>
            <td>Đại lý phân phối</td>
            <td><input type="text" value="<?php echo $dong['Dailyphanphoi'] ?>" name="Dailyphanphoi" onfocus="empty(this)"></td>
        </tr>
        <tr>
            <td>Trung tâm bảo hành</td>
            <td><input type="text" value="<?php echo $dong['Trungtambaohanh'] ?>" name="Trungtambaohanh" onfocus="empty(this)" onblur="checkEmpty(this)"></td>
        </tr>
        <tr>
            <td>Ngày sản xuất</td>
            <td><input type="text" value="<?php echo $dong['Ngaysanxuat'] ?>" name="Ngaysanxuat" id="ManuDate_edit" onfocus="empty(this)" onblur="checkDate(this)"></td>
        </tr>
        <tr>
            <td>Thời hạn bảo hành</td>
            <td><input type="text" value="<?php echo $dong['Thoihanbaohanh'] ?>" name="Thoihanbaohanh" id="WarrDate_edit" onfocus="empty(this)" onblur="checkDate(this)"></td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="iddm">
                    <?php
                    $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id ASC";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                        if ($row_danhmuc['id'] == $row['id']) {
                    ?>
                    <option selected value="<?php echo $row_danhmuc['id'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                    <?php
                        } else {
                    ?>
                     <option value="<?php echo $row_danhmuc['id'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
        </tr>
    <?php
    }
    ?>
    </form>
</table>
<script>
    var ManuEd = document.getElementById('ManuDate_edit');
    var WarrEd = document.getElementById('WarrDate_edit');
    var err = document.getElementById('errMsg');
    function checkValue(str, max) {
    if (str.charAt(0) !== '0' || str == '00') {
        var num = parseInt(str);
        if (isNaN(num) || num <= 0 || num > max) num = 1;
        str = num > parseInt(max.toString().charAt(0)) 
            && num.toString().length == 1 ? '0' + num : num.toString();
        };
        return str;
    };
    WarrEd.addEventListener('blur', function(e) {
        var ori = WarrEd.value;
        var newdate = ori.split('-').reverse().join('-');
        WarrEd.value = newdate;
    });
    ManuEd.addEventListener('blur', function(e) {
        var ori = ManuEd.value;
        var newdate = ori.split('-').reverse().join('-');
        ManuEd.value = newdate;
    })
    ManuEd.addEventListener('input', function(e) {
        this.type = 'text';
        var input = this.value;
        if (/\D\/$/.test(input)) input = input.substr(0, input.length - 3);
        var values = input.split('-').map(function(v) {
            return v.replace(/\D/g, '')
        });
        if (values[0]) values[0] = checkValue(values[0], 31);
        if (values[1]) values[1] = checkValue(values[1], 12);
        var output = values.map(function(v, i) {
            return v.length == 2 && i < 2 ? v + '-' : v;
        });
        this.value = output.join('').substr(0, 10);
    });
    WarrEd.addEventListener('input', function(e) {
        this.type = 'text';
        var input = this.value;
        if (/\D\/$/.test(input)) input = input.substr(0, input.length - 3);
        var values = input.split('-').map(function(v) {
            return v.replace(/\D/g, '')
        });
        if (values[0]) values[0] = checkValue(values[0], 31);
        if (values[1]) values[1] = checkValue(values[1], 12 );
        var output = values.map(function(v, i) {
            return v.length == 2 && i < 2 ? v + '-' : v;
        });
        this.value = output.join('').substr(0, 10);
    });
    // clear field upon focus
    function empty(inp) {
        inp.value = '';
    }
    function isEmpty(str) {
        return !str.trim().length;
    }
    function checkEmpty(inp) {
        if (isEmpty(inp.value)) {
            inp.focus();
            err.innerHTML = 'Please fill that field';
        } else {
            err.innerHTML = '';
        }
    }
    function checkDate(inp) {
        if (!inp.value || inp.value.length < 10) {
            inp.focus();
            err.innerHTML = 'Please fill that field';
        } else {
            err.innerHTML = '';
        }
    }
</script>