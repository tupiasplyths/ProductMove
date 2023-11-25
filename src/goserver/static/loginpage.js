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
    var rawform = new FormData(document.getElementById('login_form'));
    // var form  = JSON.stringify($('#login_form').serializeObject());
    var form = JSON.stringify(Object.fromEntries(rawform));
    // console.log(form);
    fetch('/login', {
        method: 'post',
        body: form,
        headers : {
            'Content-Type': 'application/json'
        }
    }).then((response) => response.json())
        .then((data) => {   
            // console.log(data);
            err.innerHTML = data.Message;
            if (data.message == 'You are logged in!') {
                window.setTimeout(function () {
                    window.location.href = "index.html"; 
                }, 2000);
            }
        }).catch((error) => {
                console.log(error);
            }
        )    
}