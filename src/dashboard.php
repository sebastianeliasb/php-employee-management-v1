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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@300&display=swap" rel="stylesheet">

    <title>Employee list</title>
</head>

<body>
    <header>
        <?php
        require_once("../assets/html/header.html");
        //Table title init
        echo "</header>";

        echo "<h4 class='title-header'>Dashboard Employee</h4>
        <div class='table-wrapper'>
        <form id='new-employee-form'>
            <table class='fl-table info-row'>
                <thead>
                    <tr>
                        <th class='employee-info'>NAME</th>
                        <th class='employee-info'>LAST NAME</th>
                        <th class='employee-info'>AGE</th>
                        <th class='employee-info'>EMAIL</th>
                        <th class='employee-info'>PHONE NUMBER</th>
                        <th class='new-employee'>+</th>
                    </tr>
                </thead>
                </form>
            <tbody>";

        //Table title end

        $filepath = '../resources/employees.json';
        $json_string = file_get_contents($filepath);
        $json = json_decode($json_string, true);


        array_walk(
            $json,
            function ($employee_data) {
                // print_r($employee_data);
                $id = $employee_data["id"];
                $name =  $employee_data["name"]; // Access Array data
                $lastName = $employee_data["lastName"];
                $age = $employee_data["age"];
                $email =  $employee_data["email"];
                $phoneNumber = $employee_data["phoneNumber"];
                $id = $employee_data["id"];


                echo "<tr class=row-employee-data>";
                echo " <td data-id='$id' class='toForm'>" . $name . "</td>";
                echo " <td data-id='$id' class='toForm'>" . $lastName . "</td>";
                echo " <td data-id='$id' class='toForm'>" . $age . "</td>";
                echo " <td data-id='$id' class='toForm'>" . $email . "</td>";
                echo " <td data-id='$id' class='toForm'>" . $phoneNumber . "</td>";
                echo "<td><a href='#' id='delete-button' class='btn btn-am btn-outline-danger delete-employee' data-id='<?= $id ?>'>Delete</a></td>"; //Later i will insert trash icon.
                echo "</tr>";
            }
        );

        echo   "</tbody>
            </table>
            </div>";
        ?>
        <script>
            $(".delete-employee").click(function() {

                var row_id = $(this).data('id');
                console.log(row_id)
                $(this).closest('.row-employee-data').remove();

                $.ajax({
                    type: "POST",
                    url: "../src/library/employeeController.php",
                    data: {
                        row_id: row_id
                    },
                    dataType: "html",
                    async: true,
                    success: function(data) {
                        alert("all ok");
                    },
                    error: function() {
                        alert("data not found");
                    }
                });


            });
        </script>


</body>
<script src="../assets/js/index.js"></script>

</html>