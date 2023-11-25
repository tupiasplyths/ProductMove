// adding reminder
document.getElementById("SU_username").focus();	
document.getElementById("SU_username").onblur = function(e) {
    if (!document.getElementById("SU_username").value) {
        document.getElementById("reminder").innerHTML = "Please fill in your username.";
    } else document.getElementById("reminder").innerHTML = "Everything's fine";
}

document.getElementById("cpassword").onblur = function(e) {
    if (this.value) {
        if (!checkPass()) {
            document.getElementById("reminder").innerHTML = "Passwords do not match!";
        } else {
            document.getElementById("reminder").innerHTML = "Everything's fine";
        }
    }
}

// Passwords comparing
function checkPass() {
    if (document.getElementById("password").value  != document.getElementById("cpassword").value) return false;
    else return true;				
}

// jump to the next field by pressing enter
document.getElementById("SU_username").onkeyup = function(e) {
    jump(e, this, 'password');
};
document.getElementById("password").onkeyup = function(e) {
    jump(e, this, 'cpassword');
};

document.getElementById("cpassword").onkeyup = function(e) {
    // if (window.event) e = window.event;
    if (e.key == 'Enter') {
        accept();
    }
}
function jump(e, self, next) {
    // if (window.event) e = window.event;
    if (e.keyCode == 13) {
        document.getElementById(next).focus();
    }
}
// TODO: Add username validation: no space allowed or prohitbit spaces 

send.addEventListener("click", accept);
// confirm form
function accept() {
    if (!document.getElementById("password").value) {
        document.getElementById("password").focus();
        document.getElementById("reminder").innerHTML = "Please enter your password";
    } else if (!document.getElementById("cpassword").value) {
        document.getElementById("cpassword").focus();
        document.getElementById("reminder").innerHTML = "Please re-enter your password";
    } 
    if (document.getElementById("reminder").innerHTML =="Everything's fine") {
        // document.getElementById("signup_form").submit();
        userSignup();
    }
}

function userSignup() {
    console.log("accepted");
    var rawform = new FormData(document.getElementById("signup_form"));
    var form = JSON.stringify(Object.fromEntries(rawform));
    // console.log(form)
    fetch('/signup', {
        method: 'post',
        body: form,
        headers: {
            'Content-Type': 'application/json'
        }
    }).then((response) => response.json())
        .then((data) => {   
            console.log(data);
            document.getElementById("reminder").innerHTML = data.Message;
            window.setTimeout(function () {
                window.location.href = "login.html"; 
            }, 2000);
        }).catch((error) => {
                console.log(error);
            }
        )    
}