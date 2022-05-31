function check_point() {
    var point_1 = document.getElementsById("point_1");
    console.log("haha")
    console.log(point_1)
    var point_2 = document.getElementsByName("point 2");
    var point_3 = document.getElementsByName("point 3");
    var point_4 = document.getElementsByName("point 4");
    var point_5 = document.getElementsByName("point 5");
    console.log(point_1)
    if (point_1.value < 0){
        point_1.textContent = "Invalid points";
    }
}