function disable_all_other(test){
    var question_1 = document.getElementById("question_1");
    var question_2 = document.getElementById("question_2");
    var question_3 = document.getElementById("question_3");
    var question_4 = document.getElementById("question_4");
    var question_5 = document.getElementById("question_5");
    var question_6 = document.getElementById("question_6");
    var question_7 = document.getElementById("question_7");
    var question_8 = document.getElementById("question_8");
    var question_9 = document.getElementById("question_9");
    var question_10 = document.getElementById("question_10");
    var question_11 = document.getElementById("question_11");
    var question_12 = document.getElementById("question_12");
    var question_13 = document.getElementById("question_13");
    var question_14 = document.getElementById("question_14");
    var question_15 = document.getElementById("question_15");
    var question_16 = document.getElementById("question_16");
    var question_17 = document.getElementById("question_17");
    var question_18 = document.getElementById("question_18");
    var question_19 = document.getElementById("question_19");
    var question_20 = document.getElementById("question_20");
    var question_21 = document.getElementById("question_21");
    var question_22 = document.getElementById("question_22");
    var question_23 = document.getElementById("question_23");
    var question_24 = document.getElementById("question_24");
    var question_25 = document.getElementById("question_25");
    var question_list = [question_1, question2, question_3, question_4, question_5,
                        question_6, question7, question_8, question_9, question_10,
                        question_11, question12, question_13, question_14, question_15,
                        question_16, question17, question_18, question_19, question_20,
                        question_21, question22, question_23, question_24, question_25,
                        ];
    var tmp = document.getElementById(test);
    var number = 0;
    for (i = 0; i < 25; i++){
        if (test === question_list[i]){
            number = i;
            break;
        }
    }
    for (i = 0; i < 25; i++){
        if (i === number){
            continue;
        }
        else{
            question_list[i].type = 'hidden';
        }
    }
}

console.log("hahah");
document.getElementById("question_1").addEventListener("click", disable_all_other('question_1'));