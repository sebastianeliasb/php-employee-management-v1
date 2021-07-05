<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->

<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../assets/css/main.css">

    <title>Employee list</title>
</head>

<body>
    <header>
        <?php
        require_once("../assets/html/header.html");
        //Table title init
        echo "</header>";

        echo "<h4>Dashboard Employee</h4>
        <div class='table-wrapper'>
            <table class='fl-table'>
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>LAST NAME</th>
                        <th>AGE</th>
                        <th>EMAIL</th>
                        <th>PHONE NUMBER</th>
                    </tr>
                </thead>
            <tbody>";

        //Table title end

        $filepath = '../resources/employees.json';
        $json_string = file_get_contents($filepath);
        $json = json_decode($json_string, true);


        array_walk(
            $json,
            function ($employee_data) {
                // print_r($employee_data);
                $name =  $employee_data["name"]; // Access Array data
                $lastName = $employee_data["lastName"];
                $age = $employee_data["age"];
                $email =  $employee_data["email"];
                $phoneNumber = $employee_data["phoneNumber"];

                echo "<tr>";
                echo " <td>" . $name . "</td>";
                echo " <td>" . $lastName . "</td>";
                echo " <td>" . $age . "</td>";
                echo " <td>" . $email . "</td>";
                echo " <td>" . $phoneNumber . "</td>";
                echo "</tr>";
            }
        );
        echo   "<tbody>
            </table>
            </div>";
        ?>

</body>

</html>