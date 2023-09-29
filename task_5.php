<?php

define("UpperCaseLetters", "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
define("LowerCaseLetters", "abcdefghijklmnopqrstuvwxyz");
define("NumberLetters", "0123456789");
define("SpeciaCharecters", "!@#$%^&*()_+");



function getLowerCaseIndex(int $passWordLength, int $uppercasePos): int
{
    $pos = rand(0, $passWordLength);

    if ($pos !== $uppercasePos) {
        return $pos;
    } else {
        return getLowerCaseIndex($passWordLength, $uppercasePos);
    }
}


function getNumberIndex(int $passWordLength, int $uppercasePos, int $lowercasePos): int
{
    $pos = rand(0, $passWordLength);

    if ($pos !== $uppercasePos && $pos !== $lowercasePos) {
        return $pos;
    } else {
        return getNumberIndex($passWordLength, $uppercasePos, $lowercasePos);
    }
}


function getSpecialCharecterIndex(int $passWordLength, int $uppercasePos, int $lowercasePos, int $numberPos): int
{
    $pos = rand(0, $passWordLength);

    if ($pos !== $uppercasePos && $pos !== $lowercasePos && $pos !== $numberPos) {
        return $pos;
    } else {
        return getSpecialCharecterIndex($passWordLength, $uppercasePos, $lowercasePos, $numberPos);
    }
}




function generatePassword(int $length){
    // parametere validation

    if($length<4){
        return "Password Length must be greater than 4";
    }

    $AllCharecters = UpperCaseLetters.LowerCaseLetters.NumberLetters.SpeciaCharecters; 
    $password = "";
    for($i=0; $i<$length; $i++){
        $index = rand(0, strlen($AllCharecters)-1);
        $password .= $AllCharecters[$index];
    }    
    
    // force fully insert a Uppercase
    $PasswordUpperCaseIndex = rand(0,$length-1);
    $UpperCaseRandomIndex = rand(0,strlen(UpperCaseLetters)-1);
    $password[$PasswordUpperCaseIndex] = UpperCaseLetters[$UpperCaseRandomIndex];

    // force fully insert a LowerCase
    $PasswordLowerCaseIndex = getLowerCaseIndex($length-1, $PasswordUpperCaseIndex);
    $LowerCaseIndex = rand(0,strlen(LowerCaseLetters)-1);
    $password[$PasswordLowerCaseIndex] = LowerCaseLetters[$LowerCaseIndex];

    // force fully insert a Number
    $PasswordNumberIndex = getNumberIndex($length-1, $PasswordUpperCaseIndex, $PasswordLowerCaseIndex);
    $NumberRandomIndex = rand(0,strlen(NumberLetters)-1);
    $password[$PasswordNumberIndex] = NumberLetters[$NumberRandomIndex];

    // force fully insert a Special Charecter
    $PasswordRandomIndex = getSpecialCharecterIndex($length-1, $PasswordUpperCaseIndex, $PasswordLowerCaseIndex, $PasswordNumberIndex);
    $SpeciaCharectersIndex = rand(0,strlen(SpeciaCharecters)-1);
    $password[$PasswordRandomIndex] = SpeciaCharecters[$SpeciaCharectersIndex];

    
    return $password;

}

//echo generatePassword(4);
echo generatePassword(12);


?>