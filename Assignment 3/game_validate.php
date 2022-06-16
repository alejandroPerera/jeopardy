<?php
require_once "db_connection.php";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // echo strlen($_POST['category_1']);
        if(strlen($_POST['point_1']) > 0 && strlen($_POST['point_2']) > 0 && strlen($_POST['point_3']) > 0 && strlen($_POST['point_4']) > 0 && strlen($_POST['point_5']) > 0
         && strlen($_POST['category_1']) > 0 && strlen($_POST['category_2']) > 0 && strlen($_POST['category_3']) > 0 && strlen($_POST['category_4']) > 0 && strlen($_POST['category_5']) > 0
         && strlen($_POST['question_1']) > 0 && strlen($_POST['question_2']) > 0 && strlen($_POST['question_3']) > 0 && strlen($_POST['question_4']) > 0 && strlen($_POST['question_5']) > 0
         && strlen($_POST['question_6']) > 0 && strlen($_POST['question_7']) > 0 && strlen($_POST['question_8']) > 0 && strlen($_POST['question_9']) > 0 && strlen($_POST['question_10']) > 0
         && strlen($_POST['question_11']) > 0 && strlen($_POST['question_12']) > 0 && strlen($_POST['question_13']) > 0 && strlen($_POST['question_14']) > 0 && strlen($_POST['question_15']) > 0
         && strlen($_POST['question_16']) > 0 && strlen($_POST['question_17']) > 0 && strlen($_POST['question_18']) > 0 && strlen($_POST['question_19']) > 0 && strlen($_POST['question_20']) > 0
         && strlen($_POST['question_21']) > 0 && strlen($_POST['question_22']) > 0 && strlen($_POST['question_23']) > 0 && strlen($_POST['question_24']) > 0 && strlen($_POST['question_25']) > 0            
        ){ //isset, !empty 
            // echo "success";
            $usertitle_input = $_COOKIE['title'];
            $userauthor_input = $_COOKIE['author'];
            echo $usertitle_input;
            echo $userauthor_input;
            for ($i = 1; $i <= 25; $i++){
                if ($i % 5 == 1){
                    $point = $_POST['point_1'];
                }
                else if ($i % 5 == 2){
                    $point = $_POST['point_2'];
                }
                else if ($i % 5 == 3){
                    $point = $_POST['point_3'];
                }
                else if ($i % 5 == 4){
                    $point = $_POST['point_4'];
                }
                else if ($i % 5 == 0){
                    $point = $_POST['point_5'];
                }
                if ($i / 5 <= 1){
                    $category = $_POST['category_1'];
                }
                else if ($i / 5 <= 2){
                    $category = $_POST['category_2'];
                }
                else if ($i / 5 <= 3){
                    $category = $_POST['category_3'];
                }
                else if ($i / 5 <= 4){
                    $category = $_POST['category_4'];
                }
                else if ($i / 5 <= 5){
                    $category = $_POST['category_5'];
                }
                echo $point;
                $question = $_POST[get_question_box($i)];
                echo "question:";
                $txt = "INSERT INTO `jeopardy_game_questions` (`title`, `author`, `question`, `points`, `category`) 
                VALUES ('$usertitle_input', '$userauthor_input', '$question', '$point', '$category');\n";
                // echo $txt;
                $db->query($txt);
            }    
            header('Location: index.php'); 
        }
        ?> 
        <script>
            let text;
            if (confirm("We want to save the unfinished jeopardy game?") == true) {
                text = "You pressed OK!";
                <?php echo "haha"?>
            } else {
            text = "You canceled!";
            }
        </script>
<?php
        //header('Location: index.php');
    }
?>