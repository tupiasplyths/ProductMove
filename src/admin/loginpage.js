var err = document.getElementById('reminder');
var submit = document.getElementById('login');


login.addEventListener('click', userLogin);
document.getElementById("login_password").onkeyup = function(e) {
    if (e.key == 'Enter') {
        userLogin();
    }
}

function checkEmpty(inp) {
    if (!inp.value) {
        // inp.focus();
        err.innerHTML = 'That field cannot be empty';
        submit.disabled = true;
    } else {
        err.innerHTML = '';
        submit.disabled = false;
    }
}


function userLogin() {
    var form = new FormData(document.getElementById('login_form'));
    // console.log('pressed');
    fetch('control.php', {
        method: 'post',
        body: form
    }).then((response) => response.json())
        .then((data) => {   
            // console.log(data);
            err.innerHTML = data.message;
            if (data.message == 'You are logged in!') {
                window.setTimeout(function () {
                    window.location.href = "index.php"; 
                }, 2000);
            }
        }).catch((error) => {
                console.log(error);
            }
        )    
}