<?php
//function defination
function modifyMyString($text){
    $text = strtolower($text);
    echo str_replace("brown","red",$text);
}

$text = "The quick brown fox jumps over the lazy dog.";
//funciton call
modifyMyString($text);

?>