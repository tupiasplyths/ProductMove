var fm = new FormData();
fm.append("a"," ");
var text = "";
display.addEventListener('click', jsonToTable);

function jsonToTable() {
    // document.getElementById('display').disabled=true;
    fetch('control.php', {
        method: 'post',
        body: fm
    }).then((response) => response.json())
        .then((data) => {
            for (var i=0; i<data.length; i++) {
                text+= "<tr><td>" + i
                    + "</td><td>" + data[i].tensanpham 
                    + "</td><td>" + data[i].masp 
                    + "</td><td>" + data[i].tendanhmuc 
                    + "</td><td>" + data[i].trangthai
                    + "</td><td>" + data[i].Cososanxuat  
                    + "</td><td>" + data[i].Dailyphanphoi
                    + "</td><td>" + data[i].Trungtambaohanh  
                    + "</td><td>" + data[i].Ngaysanxuat  
                    + "</td><td>" + data[i].Thoihanbaohanh  
                    + "</td><td>" + 
                    "<a href='modules/xulysp.php?idsanpham=" + data[i].id_sanpham + "'>Xóa </a> |"
                    + "<a href='?action=quanlysanpham&query=sua&idsanpham=" + data[i].id_sanpham + "'>Sửa </a>"
                     
                    + "</td></tr>";
            }
            
            document.getElementById('bod').innerHTML = text;
            text = "";
        });
}