<?php

require_once './employeeManager.php';

$data = json_decode(file_get_contents('../../resources/employees.json'), true);

if ($data != null && isset($_POST['submitEmployee'])) {

    $newData = getFormData($data);
    updateEmployee($newData, $data);
}

if ($data != null && isset($_POST['newEmployee'])) {

    $newData = getFormData($data);
    addEmployee($newData, $data);
}




/* switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $result;
        print_r($data);
        break;

    case "POST":
        $result;
}
 */