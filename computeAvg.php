<?php


function computeAvg($score_1, $score_2, $score_3, $score_4, $score_5, $score_6, $option) {
    $score_1 = $score_1 / 30 * 100;
    $score_5 = $score_5 / 50 * 100;
    $minimum = $score_1;
    if ($option) {
        foreach (array($score_2, $score_3, $score_4, $score_5, $score_6) as $item){
            if ($item < $minimum){
                $minimum = $item;
            }
        }
        // echo "$minimum";
        return ($score_1 + $score_2 + $score_3 + $score_4 + $score_5 + $score_6 - $minimum)/5;
    }
    else {
        echo $score_1 + $score_2 + $score_3 + $score_4 + $score_5 + $score_6;
        return ($score_1 + $score_2 + $score_3 + $score_4 + $score_5 + $score_6)/6;
    }
}

echo "computeAvg(15, 55, 55, 55, 25, 55, true) : you got " . computeAvg(15, 55, 55, 55, 25, 55, true) . " : expected 54 <br/>";      
echo "computeAvg(15, 55, 55, 55, 25, 55, false) : you got " . computeAvg(15, 55, 55, 55, 25, 55, false) . " : expected 53.33 <br/>";  
echo "computeAvg(15, 55, 55, 55, 27.5, 50, true) : you got " . computeAvg(15, 55, 55, 55, 27.5, 50, true) . " : expected 54 <br/>";    
echo "computeAvg(15, 55, 55, 55, 27.5, 50, false) : you got " . computeAvg(15, 55, 55, 55, 27.5, 50, false) . " : expected 53.33 <br/>"; 


?> 