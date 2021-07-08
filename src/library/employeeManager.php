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
            'id' => (isset($_GET['id']) ? $_GET['id'] : count($data) + 1),
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


function deleteEmployee(string $id)
{
    // EINAR
    echo $_POST[row_id];
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


function getEmployee(string $id)
{
    // TODO implement it
}


function removeAvatar($id)
{
    // TODO implement it
}

/* function getQueryStringParameters(): array
{
    // TODO implement it
}
} */

/* function getNextIdentifier(array $employeesCollection): int
{
    // TODO implement it
}
 */