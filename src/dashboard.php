<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->

<?php
session_start();

header("Access-Control-Allow-Origin: *");


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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

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


                echo "<tr>";
                echo " <td data-id='$id' class='toForm' >" . $name . "</td>";
                echo " <td data-id='$id' class='toForm' >" . $lastName . "</td>";
                echo " <td data-id='$id' class='toForm' >" . $age . "</td>";
                echo " <td data-id='$id' class='toForm' >" . $email . "</td>";
                echo " <td data-id='$id' class='toForm' >" . $phoneNumber . "</td>";
                echo " <td data-id='$id'>";
                echo "<i class='far fa-edit modifyList' data-id='$id'></i>";
                echo "<a href='#' id='delete-button' class='delete-employee ml-3 danger-link' data-id='$id'><i class='far fa-trash-alt'></i></a>"; //Later i will insert trash icon.
                echo "</td></tr>";
            }
        );

        echo   "</tbody>
            </table>
            </div>";
        ?>
        <script>
            $(".delete-employee").click(function(e) {

                var row_id = $(e.target).data('id');
                console.log(row_id)
                $(e.target).closest('.row-employee-data').remove();

                $.ajax({
                    type: "DELETE",
                    url: "../src/library/employeeController.php?row_id=" + row_id,
                    async: true,
                    success: function(data) {
                        alert("all ok");
                        console.table(data);
                    },
                    error: function() {
                        alert("data not found");
                    }
                });


            });
        </script>
        <footer>
            <?php
            require_once("../assets/html/footer.html");
            //Table title init
            echo "</footer>";
            ?>

</body>
<script src="../assets/js/index.js"></script>

</html>