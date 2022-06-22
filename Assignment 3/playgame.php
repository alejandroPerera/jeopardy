<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jeopardy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <link href="./styles/main.css" rel="stylesheet" type="text/css">
    <!-- <script src="../../../../Assignment 3/javascript/point_check.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        /* CSS */
        .button-50 {
        appearance: button;
        background-color: #000;
        background-image: none;
        border: 1px solid #000;
        border-radius: 4px;
        box-shadow: #fff 4px 4px 0 0,#000 4px 4px 0 1px;
        box-sizing: border-box;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        font-family: ITCAvantGardeStd-Bk,Arial,sans-serif;
        font-size: 14px;
        font-weight: 400;
        line-height: 20px;
        margin: 0 5px 10px 0;
        overflow: visible;
        padding: 12px 40px;
        text-transform: none;
        touch-action: manipulation;
        user-select: none;
        -webkit-user-select: none;
        vertical-align: middle;
        white-space: nowrap;
        width: 15vw;
        height: 15vh;
        text-align: center;
        line-height: 13vh;
        transition-duration: 1.5s;
        transition-timing-function: ease;
        }

        .button-50:focus {
        text-decoration: none;
        }

        .button-50:hover {
        text-decoration: none;
        }

        .button-50:active {
        box-shadow: rgba(0, 0, 0, .125) 0 3px 5px inset;
        outline: 0;
        }

        .button-50:not([disabled]):active {
        box-shadow: #fff 2px 2px 0 0, #000 2px 2px 0 1px;
        transform: translate(2px, 2px);
        }

        @media (min-width: 768px) {
        .button-50 {
            padding: 12px 50px;
        }
        }
        </style>
</head>
<body>
<?php include 'navbar.php'?>

    <script>
        function resize(test){
            var block = 0;
            if (test.style.height == "80vh"){
                let number = 0;
                test.style.height = "15vh";
                test.style.width = "15vw";
                for (i = 1; i < 26; i++){
                    if (document.getElementById("question_" + i) === test){
                        block = Math.floor((i-1) / 5) + 1;
                        number = i;
                        continue;
                    }
                    else{
                        document.getElementById("question_" + i + "_col").style.display = 'inline-block';
                    }
                }
                for (i = 1; i < 6; i++){
                    if (i === block){
                        continue;
                    }
                    else{
                        document.getElementById("question_block_" + i).style.display = 'inline-block';
                    }
                }
                let old_text = '';
                let point_tmp = number % 5;
                console.log(number);
                console.log(point_tmp);
                if (point_tmp == 0){
                    point_tmp = 5;
                }
                let decodedCookie = decodeURIComponent(document.cookie);
                let ca = decodedCookie.split(';');
                for(let i = 0; i <ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    let k = c.split("=");
                    if (k[0] == "category" + block){
                        old_text += k[1];
                        break;
                    }
                }
                old_text += " ";
                for(let i = 0; i <ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    let k = c.split("=");
                    if (k[0] == "points" + point_tmp){
                        old_text += k[1];
                        break;
                    }
                }
                test.innerText = old_text;
            }
            else{
                let number = 0;
                test.style.height = "80vh";
                test.style.width = "80vw";
                for (i = 1; i < 26; i++){
                    if (document.getElementById("question_" + i) === test){
                        // test.style.value = 
                        block = Math.floor((i-1) / 5) + 1;
                        number = i;
                        continue;
                    }
                    else{
                        document.getElementById("question_" + i + "_col").style.display = 'none';
                    }
                }
                for (i = 1; i < 6; i++){
                    if (i === block){
                        continue;
                    }
                    else{
                        document.getElementById("question_block_" + i).style.display = 'none';
                    }
                }
                let decodedCookie = decodeURIComponent(document.cookie);
                let ca = decodedCookie.split(';');
                for(let i = 0; i <ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    let k = c.split("=");
                    if (k[0] == "question" + number){
                        test.innerText = k[1];
                    }
                }
            }
        }
        
    </script>
    
    <form>
        <div class="container">
            <div class="container" id="question_block_1">
                <div class="row">
                    <div class="col-md" id="question_1_col">
                        <!-- HTML !-->
                        <input type='hidden' id="question_1_q" value=false>
                        <button class="button-50" id="question_1" type="button" onClick = "resize(document.getElementById('question_1'))"><?php echo $_COOKIE['category1'] . " " . $_COOKIE['points1']?></button>
                    </div>
                    <div class="col-md " id="question_2_col">
                        <input type='hidden' id="question_2_q" value=false>
                        <button class="button-50" id="question_2" type="button" onClick = "resize(document.getElementById('question_2'))"><?php echo $_COOKIE['category1'] . " " . $_COOKIE['points2']?></button>
                        <!-- <input type="text" name="question_2" value="" placeholder="category 1 200 points" /> -->
                    </div>
                    <div class="col-md " id="question_3_col">
                        <input type='hidden' id="question_3_q" value=false>
                        <button class="button-50" id="question_3" type="button" onClick = "resize(document.getElementById('question_3'))"><?php echo $_COOKIE['category1'] . " " . $_COOKIE['points3']?></button>
                        <!-- <input type="text" name="question_3" value="" placeholder="category 1 300 points" /> -->
                    </div>
                    <div class="col-md " id="question_4_col">
                        <input type='hidden' id="question_4_q" value=false>
                        <button class="button-50" id="question_4" type="button" onClick = "resize(document.getElementById('question_4'))"><?php echo $_COOKIE['category1'] . " " . $_COOKIE['points4']?></button>
                        <!-- <input type="text" name="question_4" value="" placeholder="category 1 400 points" /> -->
                    </div>
                    <div class="col-md " id="question_5_col">
                        <input type='hidden' id="question_5_q" value=false>
                        <button class="button-50" id="question_5" type="button" onClick = "resize(document.getElementById('question_5'))"><?php echo $_COOKIE['category1'] . " " . $_COOKIE['points5']?></button>
                        <!-- <input type="text" name="question_5" value="" placeholder="category 1 500 points" /> -->
                    </div>
                </div>
            </div>
            <div class="container" id="question_block_2">
                <div class="row">
                    <div class="col-md" id="question_6_col">
                        <!-- HTML !-->
                        <input type='hidden' id="question_6_q" value=false>
                        <button class="button-50" id="question_6" type="button" onClick = "resize(document.getElementById('question_61'))"><?php echo $_COOKIE['category2'] . " " . $_COOKIE['points1']?></button>
                    </div>
                    <div class="col-md " id="question_7_col">
                        <input type='hidden' id="question_7_q" value=false>
                        <button class="button-50" id="question_7" type="button" onClick = "resize(document.getElementById('question_7'))"><?php echo $_COOKIE['category2'] . " " . $_COOKIE['points2']?></button>
                        <!-- <input type="text" name="question_2" value="" placeholder="category 1 200 points" /> -->
                    </div>
                    <div class="col-md " id="question_8_col">
                        <input type='hidden' id="question_8_q" value=false>
                        <button class="button-50" id="question_8" type="button" onClick = "resize(document.getElementById('question_8'))"><?php echo $_COOKIE['category2'] . " " . $_COOKIE['points3']?></button>
                        <!-- <input type="text" name="question_3" value="" placeholder="category 1 300 points" /> -->
                    </div>
                    <div class="col-md " id="question_9_col">
                        <input type='hidden' id="question_9_q" value=false>
                        <button class="button-50" id="question_9" type="button" onClick = "resize(document.getElementById('question_9'))"><?php echo $_COOKIE['category2'] . " " . $_COOKIE['points4']?></button>
                        <!-- <input type="text" name="question_4" value="" placeholder="category 1 400 points" /> -->
                    </div>
                    <div class="col-md " id="question_10_col">
                        <input type='hidden' id="question_10_q" value=false>
                        <button class="button-50" id="question_10" type="button" onClick = "resize(document.getElementById('question_10'))"><?php echo $_COOKIE['category2'] . " " . $_COOKIE['points5']?></button>
                        <!-- <input type="text" name="question_5" value="" placeholder="category 1 500 points" /> -->
                    </div>
                </div>
            </div>
            <div class="container" id="question_block_3">
                <div class="row">
                    <div class="col-md" id="question_11_col">
                        <!-- HTML !-->
                        <input type='hidden' id="question_11_q" value=false>
                        <button class="button-50" id="question_11" type="button" onClick = "resize(document.getElementById('question_11'))"><?php echo $_COOKIE['category3'] . " " . $_COOKIE['points1']?></button>
                    </div>
                    <div class="col-md " id="question_12_col">
                        <input type='hidden' id="question_12_q" value=false>
                        <button class="button-50" id="question_12" type="button" onClick = "resize(document.getElementById('question_12'))"><?php echo $_COOKIE['category3'] . " " . $_COOKIE['points2']?></button>
                        <!-- <input type="text" name="question_2" value="" placeholder="category 1 200 points" /> -->
                    </div>
                    <div class="col-md " id="question_13_col">
                        <input type='hidden' id="question_13_q" value=false>
                        <button class="button-50" id="question_13" type="button" onClick = "resize(document.getElementById('question_13'))"><?php echo $_COOKIE['category3'] . " " . $_COOKIE['points3']?></button>
                        <!-- <input type="text" name="question_3" value="" placeholder="category 1 300 points" /> -->
                    </div>
                    <div class="col-md " id="question_14_col">
                        <input type='hidden' id="question_14_q" value=false>
                        <button class="button-50" id="question_14" type="button" onClick = "resize(document.getElementById('question_14'))"><?php echo $_COOKIE['category3'] . " " . $_COOKIE['points4']?></button>
                        <!-- <input type="text" name="question_4" value="" placeholder="category 1 400 points" /> -->
                    </div>
                    <div class="col-md " id="question_15_col">
                        <input type='hidden' id="question_15_q" value=false>
                        <button class="button-50" id="question_15" type="button" onClick = "resize(document.getElementById('question_15'))"><?php echo $_COOKIE['category3'] . " " . $_COOKIE['points5']?></button>
                        <!-- <input type="text" name="question_5" value="" placeholder="category 1 500 points" /> -->
                    </div>
                </div>
            </div>
            <div class="container" id="question_block_4">
                <div class="row">
                    <div class="col-md" id="question_16_col">
                        <!-- HTML !-->
                        <input type='hidden' id="question_16_q" value=false>
                        <button class="button-50" id="question_16" type="button" onClick = "resize(document.getElementById('question_16'))"><?php echo $_COOKIE['category4'] . " " . $_COOKIE['points1']?></button>
                    </div>
                    <div class="col-md " id="question_17_col">
                        <input type='hidden' id="question_17_q" value=false>
                        <button class="button-50" id="question_17" type="button" onClick = "resize(document.getElementById('question_17'))"><?php echo $_COOKIE['category4'] . " " . $_COOKIE['points2']?></button>
                        <!-- <input type="text" name="question_2" value="" placeholder="category 1 200 points" /> -->
                    </div>
                    <div class="col-md " id="question_18_col">
                        <input type='hidden' id="question_18_q" value=false>
                        <button class="button-50" id="question_18" type="button" onClick = "resize(document.getElementById('question_18'))"><?php echo $_COOKIE['category4'] . " " . $_COOKIE['points3']?></button>
                        <!-- <input type="text" name="question_3" value="" placeholder="category 1 300 points" /> -->
                    </div>
                    <div class="col-md " id="question_19_col">
                        <input type='hidden' id="question_19_q" value=false>
                        <button class="button-50" id="question_19" type="button" onClick = "resize(document.getElementById('question_19'))"><?php echo $_COOKIE['category4'] . " " . $_COOKIE['points4']?></button>
                        <!-- <input type="text" name="question_4" value="" placeholder="category 1 400 points" /> -->
                    </div>
                    <div class="col-md " id="question_20_col">
                        <input type='hidden' id="question_20_q" value=false>
                        <button class="button-50" id="question_20" type="button" onClick = "resize(document.getElementById('question_20'))"><?php echo $_COOKIE['category4'] . " " . $_COOKIE['points5']?></button>
                        <!-- <input type="text" name="question_5" value="" placeholder="category 1 500 points" /> -->
                    </div>
                </div>
            </div>
            <div class="container" id="question_block_5">
                <div class="row">
                    <div class="col-md" id="question_21_col">
                        <!-- HTML !-->
                        <input type='hidden' id="question_21_q" value=false>
                        <button class="button-50" id="question_21" type="button" onClick = "resize(document.getElementById('question_21'))"><?php echo $_COOKIE['category5'] . " " . $_COOKIE['points1']?></button>
                    </div>
                    <div class="col-md " id="question_22_col">
                        <input type='hidden' id="question_22_q" value=false>
                        <button class="button-50" id="question_22" type="button" onClick = "resize(document.getElementById('question_22'))"><?php echo $_COOKIE['category5'] . " " . $_COOKIE['points2']?></button>
                        <!-- <input type="text" name="question_2" value="" placeholder="category 1 200 points" /> -->
                    </div>
                    <div class="col-md " id="question_23_col">
                        <input type='hidden' id="question_23_q" value=false>
                        <button class="button-50" id="question_23" type="button" onClick = "resize(document.getElementById('question_23'))"><?php echo $_COOKIE['category5'] . " " . $_COOKIE['points3']?></button>
                        <!-- <input type="text" name="question_3" value="" placeholder="category 1 300 points" /> -->
                    </div>
                    <div class="col-md " id="question_24_col">
                        <input type='hidden' id="question_24_q" value=false>
                        <button class="button-50" id="question_24" type="button" onClick = "resize(document.getElementById('question_24'))"><?php echo $_COOKIE['category5'] . " " . $_COOKIE['points4']?></button>
                        <!-- <input type="text" name="question_4" value="" placeholder="category 1 400 points" /> -->
                    </div>
                    <div class="col-md " id="question_25_col">
                        <input type='hidden' id="question_25_q" value=false>
                        <button class="button-50" id="question_25" type="button" onClick = "resize(document.getElementById('question_25'))"><?php echo $_COOKIE['category5'] . " " . $_COOKIE['points5']?></button>
                        <!-- <input type="text" name="question_5" value="" placeholder="category 1 500 points" /> -->
                    </div>
                </div>
            </div>



        </div>
    </form>
    

</body>