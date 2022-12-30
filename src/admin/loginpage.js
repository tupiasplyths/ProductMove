var err = document.getElementById('reminder');

function checkEmpty(inp) {
    if (!inp.value) {
        inp.focus();
        err.innerHTML = 'That field cannot be empty';
    } else {
        err.innerHTML = '';
    }
}