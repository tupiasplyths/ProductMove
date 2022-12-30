var Manu = document.getElementById('ManuDate');
var Warr = document.getElementById('WarrDate');
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

// auto add '-' as user types
Warr.addEventListener('input', function(e) {
    this.type = 'text';
    var input = this.value;
    if (/\D\/$/.test(input)) input = input.substr(0, input.length - 3);
    var values = input.split('-').map(function(v) {
    return v.replace(/\D/g, '')
    });
    if (values[0]) values[0] = checkValue(values[0], 12);
    if (values[1]) values[1] = checkValue(values[1], 31);
    var output = values.map(function(v, i) {
    return v.length == 2 && i < 2 ? v + '-' : v;
    });
    this.value = output.join('').substr(0, 10);
});

Manu.addEventListener('input', function(e) {
    this.type = 'text';
    var input = this.value;
    if (/\D\/$/.test(input)) input = input.substr(0, input.length - 3);
    var values = input.split('-').map(function(v) {
    return v.replace(/\D/g, '')
    });
    if (values[0]) values[0] = checkValue(values[0], 12);
    if (values[1]) values[1] = checkValue(values[1], 31);
    var output = values.map(function(v, i) {
    return v.length == 2 && i < 2 ? v + '-' : v;
    });
    this.value = output.join('').substr(0, 10);
});




// convert dd-mm-yyyy format to yyyy-mm-dd format
Manu.addEventListener('blur', function(e) {
    var ori = Manu.value;
    var newdate = ori.split('-').reverse().join('-');
    Manu.value = newdate;
});
Warr.addEventListener('blur', function(e) {
    var ori = Warr.value;
    var newdate = ori.split('-').reverse().join('-');
    Warr.value = newdate;
});

// jump to next field on pressing enter
function jump(e, self, next) {
    if (window.event) e = window.event;
    if (e.keyCode == 13) {
        document.getElementById(next).focus();
    }
}

document.getElementById("prodName").onkeyup = function(e) {
    jump(e, this, 'prodCode');
};
document.getElementById("prodCode").onkeyup = function(e) {
    jump(e, this, 'status');
};
document.getElementById("status").onkeyup = function(e) {
    jump(e, this, 'Factory');
};
document.getElementById("Factory").onkeyup = function(e) {
    jump(e, this, 'Distrib');
};
document.getElementById("Distrib").onkeyup = function(e) {
    jump(e, this, 'WarrCen');
};
document.getElementById("WarrCen").onkeyup = function(e) {
    jump(e, this, 'ManuDate');
};
document.getElementById("ManuDate").onkeyup = function(e) {
    jump(e, this, 'WarrDate');
};
function checkEmpty(inp) {
    if (!inp.value) {
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