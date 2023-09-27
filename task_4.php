<?php

function get_grade_by_marks($marks)
{
    $ret = "";
    switch ($marks) {
        case $marks >= 80:
            $ret = "A+";
            break;

        case $marks >= 70:
            $ret = "A";
            break;

        case $marks >= 60:
            $ret = "A-";
            break;

        case $marks >= 50:
            $ret = "B";
            break;

        case $marks >= 40:
            $ret = "C";
            break;

        default:
            $ret = "F";
    }
    return $ret;
}


function calculate_result($grade){
    foreach($grade as $student)
    {
        
        $student["AVGMarks"] = ($student["Math"]+ $student["English"]+$student["Science"])/3;
        $student["Grade"] = get_grade_by_marks($student["AVGMarks"]);
        
        printf('Name=>%s AverageMarks=>%0.2f Grade=> %s ', $student["Name"], $student["AVGMarks"], $student["Grade"]);
        echo "\n";
    }    
}

// data
$grade = [
    array(
        "Name" => "Sakib",
        "Math" => 30,
        "English" => 70,
        "Science" => 80,
        "AVGMarks" => 0,
        "Grade" => "Not calculated"
    ),

    array(
        "Name" => "Tamim",
        "Math" => 80,
        "English" => 50,
        "Science" => 90,
        "AVGMarks" => 0,
        "Grade" => "Not calculated"
    ),
    array(
        "Name" => "Mustafiz",
        "Math" => 15,
        "English" => 10,
        "Science" => 40,
        "AVGMarks" => 0,
        "Grade" => "Not calculated"
    )
];
// function call
calculate_result($grade);