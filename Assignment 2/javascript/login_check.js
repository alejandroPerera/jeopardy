function check() {
    var username = document.getElementById("username");
    var passwrod = document.getElementById("pwd");
    var pwd_msg = document.getElementById("pwd-msg");
    alert("12");
    //console.log(passwrod.value)
    if (username.value === "tony" && passwrod.value != "tony"){
        pwd_msg.textContent = "Wrong password";
    }
    if (username.value === "alex" && passwrod.value != "alex"){
        pwd_msg.textContent = "Wrong password";
    }
}

function checkusername() {
    alert("12")
    var username = document.getElementById("username").value;
    var user_msg = document.getElementById("user-msg");
    if (username != "tony" && username != "alex"){
        user_msg.textContent = "Wrong username";
    }
}