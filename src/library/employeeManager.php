<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function getFormData($data)
{
    $formData =
        [
            'id' => (isset($_GET['id']) ? $_GET['id'] : uniqid()),
            'name' => $_POST['formName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'gender' => $_POST['gender'],
            'city' => $_POST['city'],
            'streetAddress' => $_POST['streetAddress'],
            'state' => $_POST['state'],
            'age' => $_POST['age'],
            'postalCode' => $_POST['zip'],
            'phoneNumber' => $_POST['phone'],
        ];

    return $formData;
}

function addEmployee($newEmployee, $data)
{
    $mergedList = array_merge($data, array($newEmployee));
    $newList = json_encode($mergedList);

    if ($data != null) {
        $file = fopen('../../resources/employees.json', 'w');
        fwrite($file, $newList);
        fclose($file);
    }

    header("Location: ../dashboard.php");
}


function deleteEmployee($id)
{
    // Contains Original Json file
    $getDataJson = file_get_contents('../../resources/employees.json');

    // Converts original Json file into Array
    $arrayEmployee = json_decode($getDataJson);

    // Bring out data from the Array
    foreach ($arrayEmployee as $id_delete) {
        if ($id == $id_delete->id) {

            $indice = array_search($id_delete, $arrayEmployee);
            array_splice($arrayEmployee, $indice, 1, null);

            break;
        }
    }
    //read json file
    $jsontoDelete = json_encode($arrayEmployee);

    if ($arrayEmployee != null) {
        $file = fopen('../../resources/employees.json', 'w');
        fwrite($file, $jsontoDelete);
        fclose($file);
    }
}

function updateEmployee($updateEmployee, $data)
{
    foreach ($data as $emp) {
        if ($emp['id'] == $updateEmployee['id']) {
            $updatedEntry = array_merge($emp, $updateEmployee);
            $i = array_search($emp, $data);
            array_splice($data, $i, 1, array($updatedEntry));
            break;
        }
    }

    $jsonEmp = json_encode($data);

    if ($data != null) {
        $file = fopen('../../resources/employees.json', 'w');
        fwrite($file, $jsonEmp);
        fclose($file);
    }

    header("Location: ../dashboard.php");
}


function newListEmployee()
{
}
