<h3>Thêm danh mục sản phẩm </h3>
<span id="errMsg" class="error"></span>
<table border="1" width= "50%" style="border-collapse:collapse">
    <form method="POST" action="modules/xuly.php">
        <tr>
            <th>Điền danh mục sản phẩm</th>
        </tr>
        <tr>
            <td>Tên danh mục</td>
            <td><input type="text" name="tendanhmuc" id="cate" onblur="checkEmpty(this)"></td>
        </tr>
        <tr>
            <td>Thứ tự</td>
            <td><input type="text" name="thutu" id="num" onblur="checkEmpty(this)"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themdanhmuc" value="Thêm danh mục sản phẩm"></td>
        </tr>
    </form>
</table>

<script>
    var err = document.getElementById('errMsg');
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
</script>