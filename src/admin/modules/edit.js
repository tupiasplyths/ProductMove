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