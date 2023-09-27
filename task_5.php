<?php

define("UpperCaseLetters", "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
define("LowerCaseLetters", "abcdefghijklmnopqrstuvwxyz");
define("NumberLetters", "0123456789");
define("SpeciaCharecters", "!@#$%^&*()_+");


function getLowerCaseIndex($passWordLength, $uppercasePos)
{
    $pos = rand(0,$passWordLength-1);

    if($pos != $uppercasePos){
        return $pos;
    }
    getLowerCaseIndex($passWordLength, $uppercasePos);
}


function getNumberIndex($passWordLength, $uppercasePos, $lowercasePos)
{
    $pos = rand(0,$passWordLength-1);

    if($pos != $uppercasePos && $pos != $lowercasePos ){
        return $pos;
    }
    getNumberIndex($passWordLength, $uppercasePos, $lowercasePos);
}

function getSpecialCharecterIndex($passWordLength, $uppercasePos, $lowercasePos, $numberPos)
{
    $pos = rand(0,$passWordLength-1);

    if($pos != $uppercasePos && $pos != $lowercasePos  && $pos != $numberPos ){
        return $pos;
    }
    getSpecialCharecterIndex($passWordLength, $uppercasePos, $lowercasePos, $numberPos);
}




function generatePassword($length){
    // parametere validation

    if($length<4){
        return "Password Length must be greater than 4";
    }

    $AllCharecters = UpperCaseLetters + LowerCaseLetters + NumberLetters + SpeciaCharecters; 
    $password = "";
    for($i=0; $i<$length; $i++){
        $index = rand(0, strlen($AllCharecters)-1);
        $password .= UpperCaseLetters[$index];
    }    
    
    // force fully insert a Uppercase
    $PasswordRandomIndex = rand(0,$length);
    $UpperCaseRandomIndex = rand(0,UpperCaseLetters);
    $password[$PasswordRandomIndex] = UpperCaseLetters[$UpperCaseRandomIndex];

    // force fully insert a LowerCase
    $PasswordRandomIndex = getLowerCaseIndex($length, $UpperCaseRandomIndex);
    $LowerCaseIndex = rand(0,LowerCaseLetters);
    $password[$PasswordRandomIndex] = LowerCaseLetters[$LowerCaseIndex];

    // force fully insert a Number
    $PasswordRandomIndex = getNumberIndex($length, $UpperCaseRandomIndex, $LowerCaseIndex);
    $NumberRandomIndex = rand(0,NumberLetters);
    $password[$PasswordRandomIndex] = NumberLetters[$NumberRandomIndex];

    // force fully insert a Special Charecter
    $PasswordRandomIndex = getSpecialCharecterIndex($length, $UpperCaseRandomIndex, $LowerCaseIndex, $NumberRandomIndex);
    $SpeciaCharectersIndex = rand(0,SpeciaCharecters);
    $password[$PasswordRandomIndex] = SpeciaCharecters[$SpeciaCharectersIndex];

    
    return $password;

}

echo generatePassword(5);


?>