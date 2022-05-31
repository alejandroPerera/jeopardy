function check_point() {
    var point_1 = document.getElementById("point_1");
    var point_2 = document.getElementById("point_2");
    var point_3 = document.getElementById("point_3");
    var point_4 = document.getElementById("point_4");
    var point_5 = document.getElementById("point_5");
    if (point_1.value < 0){
        point_1.value = "Invalid points";
        return false;
    }
    if (point_2.value < 0){
        point_2.value = "Invalid points";
        return false;
    }
    if (point_3.value < 0){
        point_3.value = "Invalid points";
        return false;
    }
    if (point_4.value < 0){
        point_4.value = "Invalid points";
        return false;
    }
    if (point_5.value < 0){
        point_5.value = "Invalid points";
        return false;
    }
    return true;
}