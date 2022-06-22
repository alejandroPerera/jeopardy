var error_days = [];
var sum = 0;
function validate(){
    sum = 0;
    error_days = [];
    var week1 = ['mon1', 'tue1', 'wed1', 'thu1', 'fri1'];
    var week2 = ['mon2', 'tue2', 'wed2', 'thu2', 'fri2'];
    var week_1 = document.getElementById('week1');
    var week_2 = document.getElementById('week2');
    var con = document.getElementById('conclusion');
    week1.forEach(clear_error);
    week2.forEach(clear_error);
    week1.forEach(check_input);
    week2.forEach(check_input);
    console.log(error_days.length);
    if ( error_days.length > 0){
        error_days.forEach(display_error_msg)
    }
    else{
        // console.log()
        week1.forEach(total);
        console.log(sum);
        let week1_avg = sum / 5;
        // console.log(week1_avg);
        week_1.innerText = "First week: average temperature is " + week1_avg; 
        sum = 0;
        week2.forEach(total);
        let week2_avg = sum / 5;
        week_2.innerText = "Second week: average temperature is " + week2_avg; 
        if (week1_avg < week2_avg){
            con.innerText = "The second week\'s average temperature is higher";
        }
        else if (week1_avg > week2_avg){
            con.innerText = "The first week\'s average temperature is higher";
        }
        else{
            con.innerText = "Both weeks have the same average temperature";
        }
        
    }
}

function total(tmp){
    var val = document.getElementById(tmp);
    sum += Number(val.value);
}

function check_input(tmp){
    var val = document.getElementById(tmp);
    if (!isNaN(val.value) && val.value != ''){
        return;
    }
    else{
        error_days.push(tmp);
        return;
    }
}

function display_error_msg(tmp){
    var val = document.getElementById((tmp+"_msg"));
    val.innerText = "Please enter a valide temperature number";
    return;
}
function clear_error(tmp){
    var val = document.getElementById((tmp+"_msg"));
    val.innerText = "";
    return;
}

