<?php
// function defination
function RemoveEven($numbers){
    $result = array_filter($numbers, function($num){
        return $num % 2 == 0 ? false : true;
    });

    print_r($result);
}

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// function call

RemoveEven($numbers);


?>