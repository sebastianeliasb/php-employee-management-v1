<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
    // TODO implement it
}


function deleteEmployee(string $id)
{
    // TODO implement it
}


function updateEmployee($updateEmployee)
{
    $data = json_decode(file_get_contents('../../resources/employees.json'), true);
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
} */

/* function getNextIdentifier(array $employeesCollection): int
{
// TODO implement it
}
 */