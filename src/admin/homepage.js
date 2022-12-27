var fm = new FormData();
fm.append("a"," ");
var text = "";
display.addEventListener('click', jsonToTable);

function jsonToTable() {
    document.getElementById('display').disabled=true;
    fetch('control.php', {
        method: 'post',
        body: fm
    }).then((response) => response.json())
        .then((data) => {
            // console.log(data[0]);
            // console.log(data[0].passwords);
            for (var i=0; i<data.length; i++) {
                text+= "<tr><td>" + data[i].username + "</td><td>" + data[i].passwords + "</td></tr>";
            }
            
            document.getElementById('bod').innerHTML = text;
        });
}