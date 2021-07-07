<?php

if(isset($_POST['name'])) {
    
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];

    // Contains Original Json file
    $oldJson = file_get_contents('../../resources/employees.json');
    
    // Converts original Json file into Array
    $decodedoldJson = json_decode($oldJson);
     $id = count($decodedoldJson)+1;

    // Contains new array of data
    $newJson = array($_POST);

    $mergedArray = array_merge($decodedoldJson,$newJson);

    $encodedJson = json_encode($mergedArray);
    
    file_put_contents("../../resources/employees.json",$encodedJson);
    
     if(!$encodedJson) {
         die("Query Failed.");
     } 
     echo "Employee Added Successfully";
}