function check() {
    var username = document.getElementById("username");
    var passwrod = document.getElementById("pwd");
    var pwd_msg = document.getElementById("pwd-msg");
    if (username.value === "tony" && passwrod.value != "tony"){
        pwd_msg.textContent = "Wrong password";
        return false;
    }
    if (username.value === "alex" && passwrod.value != "alex"){
        pwd_msg.textContent = "Wrong password";
        return false;
    }
    return true;
}

var checkusername = () => {                                      //arrow function
    var username = document.getElementById("username").value;
    var user_msg = document.getElementById("user-msg");
    if (username != "tony" && username != "alex"){
        user_msg.textContent = "Wrong username";
        return false;
    }
    user_msg.textContent = "";
    return true;
};

// function checkusername() {
//     var username = document.getElementById("username").value;
//     var user_msg = document.getElementById("user-msg");
//     if (username != "tony" && username != "alex"){
//         user_msg.textContent = "Wrong username";
//         return false;
//     }
//     user_msg.textContent = "";
//     return true;
// }