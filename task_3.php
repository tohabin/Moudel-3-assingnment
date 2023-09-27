<?php
// function defination
function SortMyArray($grades){
    rsort($grades);
    print_r($grades);
}


$grades = [85, 92, 78, 88, 95];
//function call
SortMyArray($grades);

?>