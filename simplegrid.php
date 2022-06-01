<?php



function isDiagonal($width, $tile) {
    $row = intdiv(($tile - 1), $width);       // intdev() returns the integer quotient of the division of dividend by divisor
    $col = fmod(($tile - 1), $width);         // fmod() returns the remainder of the division 
    if ($row != $col) {
        return "";
    }
    return "1 <br/>";
}

function isEdge($width, $height, $tile) {
    $row = intdiv(($tile - 1), $width);       // intdev() returns the integer quotient of the division of dividend by divisor
    $col = fmod(($tile - 1), $width);         // fmod() returns the remainder of the division 
    if ($row != 0 && $row != $height - 1 && $col != 0 && $col != $width - 1) {
        return "";
    }
    if ($tile < 1 || $tile > $width * $height){
        return "";
    }
    return "1 <br/>";
}


echo "-- Test isDiagonal(width, tile) function -- <br/>";

echo "isDiagonal(7, 1): you got " . isDiagonal(7,1) . " : expected 1 <br/>";            // expected 1
echo "isDiagonal(7, 25): you got " . isDiagonal(7,25) . " : expected 1 <br/>";          // expected 1
echo "isDiagonal(7, 41): you got " . isDiagonal(7,41) . " : expected 1 <br/>";          // expected 1
echo "isDiagonal(7, 42): you got " . isDiagonal(7,42) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(7, 24): you got " . isDiagonal(7,24) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(7, 26): you got " . isDiagonal(7,26) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(7, 48): you got " . isDiagonal(7,26) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(7, 50): you got " . isDiagonal(7,50) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(7, 0): you got " . isDiagonal(7,0) . " : expected \"\" <br/>";          // expected ""

echo "<br/><br/>-- Test isDiagonal(width, tile) function -- <br/>";

echo "isDiagonal(3, 1): you got " . isDiagonal(3,1) . " : expected 1 <br/>";          // expected 1
echo "isDiagonal(3, 2): you got " . isDiagonal(3,2) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(3, 3): you got " . isDiagonal(3,3) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(3, 4): you got " . isDiagonal(3,4) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(3, 5): you got " . isDiagonal(3,5) . " : expected 1 <br/>";          // expected 1
echo "isDiagonal(3, 6): you got " . isDiagonal(3,6) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(3, 8): you got " . isDiagonal(3,8) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(3, 9): you got " . isDiagonal(3,9) . " : expected 1 <br/>";          // expected 1



echo "<br/><br/>-- Test isEdge(width, height, tile) function -- <br/>";

echo "isEdge(7, 8, 1): you got " . isEdge(7, 8, 1) . " : expected 1 <br/>";            // expected 1
echo "isEdge(7, 8, 5): you got " . isEdge(7, 8, 5) . " : expected 1 <br/>";            // expected 1
echo "isEdge(7, 8, 43): you got " . isEdge(7, 8, 43) . " : expected 1 <br/>";          // expected 1
echo "isEdge(7, 8, 50): you got " . isEdge(7, 8, 50) . " : expected 1 <br/>";          // expected 1
echo "isEdge(7, 8, 28): you got " . isEdge(7, 8, 28) . " : expected 1 <br/>";          // expected 1
echo "isEdge(7, 8, 56): you got " . isEdge(7, 8, 56) . " : expected 1 <br/>";          // expected 1
echo "isEdge(7, 8, 13): you got " . isEdge(7, 8, 13) . " : expected \"\" <br/>";       // expected ""
echo "isEdge(7, 8, 25): you got " . isEdge(7, 8, 25) . " : expected \"\" <br/>";       // expected ""
echo "isEdge(7, 8, 44): you got " . isEdge(7, 8, 44) . " : expected \"\" <br/>";       // expected ""
echo "isEdge(7, 8, 57): you got " . isEdge(7, 8, 57) . " : expected \"\" <br/>";       // expected ""
echo "isEdge(7, 8, 0): you got " . isEdge(7, 8, 0) . " : expected \"\" <br/>";         // expected ""


echo "<br/><br/>-- Test isEdge(width, height, tile) function -- <br/>";

echo "isEdge(3, 3, 1): you got " . isEdge(3, 3, 1) . " : expected 1 <br/>";            // expected 1
echo "isEdge(3, 3, 2): you got " . isEdge(3, 3, 2) . " : expected 1 <br/>";            // expected 1
echo "isEdge(3, 3, 3): you got " . isEdge(3, 3, 3) . " : expected 1 <br/>";            // expected 1
echo "isEdge(3, 3, 4): you got " . isEdge(3, 3, 4) . " : expected 1 <br/>";            // expected 1
echo "isEdge(3, 3, 5): you got " . isEdge(3, 3, 5) . " : expected \"\" <br/>";         // expected ""
echo "isEdge(3, 3, 6): you got " . isEdge(3, 3, 6) . " : expected 1 <br/>";            // expected 1
echo "isEdge(3, 3, 8): you got " . isEdge(3, 3, 8) . " : expected 1 <br/>";            // expected 1
echo "isEdge(3, 3, 9): you got " . isEdge(3, 3, 9) . " : expected 1 <br/>";            // expected 1
?> 