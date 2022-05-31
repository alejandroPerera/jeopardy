function check() {
    var username = document.getElementById("username");
    var passwrod = document.getElementById("pwd");
    var pwd_msg = document.getElementById("pwd-msg");
    if (username === "tony" && passwrod != "tony"){
        pwd_msg.textContent = "Wrong password";
    }
    if (username === "alex" && passwrod != "alex"){
        pwd_msg.textContent = "Wrong password";
    }
}

function checkusername() {
    var username = document.getElementById("username").value;
    var user_msg = document.getElementById("user-msg");
    if (username != "tony" && username != "alex"){
        user_msg.textContent = "Wrong username";
    }
}