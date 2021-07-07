<?php

require_once './employeeManager.php';

$data = json_decode(file_get_contents('../../resources/employees.json'), true);

if ($data != null && isset($_POST['submitEmployee'])) {
    $newData =
        [
            'id' => $_GET['id'],
            'name' => $_POST['name'],
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

    updateEmployee($newData);
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