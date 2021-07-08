<!-- TODO Employee view -->

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
    <link rel="stylesheet" href="../assets/css/employee.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@300&display=swap" rel="stylesheet">

    <title>Employee list</title>
</head>

<body>
    <header>
        <?php
        require_once("../assets/html/header.html");

        if (isset($_GET['id'])) {
            $data = json_decode(file_get_contents('../resources/employees.json'), true);
            foreach ($data as $emp) {
                if ($emp['id'] == $_GET['id']) {
                    $employee = $emp;
                    break;
                }
            }
        }

        ?>

    </header>

    <h4 class='title-header'>Employee ( <?php  (isset($employee['name']) ?  print ($employee['name'] . " " . $employee['lastName']) : ""); ?>)</h4>
   

    <form method="post" action="./library/employeeController.php<?php (isset($employee) ? print("?id=" . $_GET['id']) : ""); ?>" id="employeeForm" class="p-5">
        <div class="d-flex mt-3">
            <label for="name" class="mr-2 employeeLabels">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php (isset($employee) ? print($employee['name']) : print('')); ?>" required>
            <label for="lastName" class="mx-2 employeeLabels">Last Name</label>
            <input type="text" id="lastName" name="lastName" class="form-control" value="<?php (isset($employee) ? print($employee['lastName']) : print('')); ?>" required>
        </div>

        <div class="d-flex mt-3">
            <label for="email" class="mr-2 employeeLabels">Email Address</label>
            <input type="text" id="email" name="email" class="form-control" value="<?php (isset($employee) ? print($employee['email']) : print('')); ?>" required>
            <label for="gender" class="mx-2 employeeLabels">Gender</label>
            <select id="gender" name="gender" class="form-control" required>
                <option value="woman" <?php (isset($employee) && $employee['gender'] == "woman" ? print("selected") : print('')); ?>>Female</option>
                <option value="man" <?php (isset($employee) && $employee['gender'] == "man" ? print("selected") : print('')) ?>>Male</option>
                <option value="No-binary" <?php (isset($employee) && $employee['gender'] == "No-binary" ? print("selected") : print('')) ?>>No-binary</option>
                <option value="Trans" <?php (isset($employee) && $employee['gender'] == "Trans" ? print("selected") : print('')) ?>>Trans</option>
                <option value="Androgynous" <?php (isset($employee) && $employee['gender'] == "Androgynous" ? print("selected") : print('')) ?>>Androgynous</option>
                <option value="Gender queer" <?php (isset($employee) && $employee['gender'] == "Gender queer" ? print("selected") : print('')) ?>>Gender queer</option>
                <option value="Other" <?php (isset($employee) && $employee['gender'] == "Other" ? print("selected") : print('')) ?>>Other</option>
            </select>
        </div>

        <div class="d-flex mt-3">
            <label for="city" class="mr-2 employeeLabels">City</label>
            <input type="text" id="city" name="city" class="form-control" value="<?php (isset($employee) ? print($employee['city']) : print('')); ?>" required>
            <label for="streetAddress" class="mx-2 employeeLabels">Street Address</label>
            <input type="text" id="streetAddress" name="streetAddress" class="form-control" value="<?php (isset($employee) ? print($employee['streetAddress']) : print('')); ?>" required>
        </div>

        <div class="d-flex mt-3">
            <label for="state" class="mr-2 employeeLabels">State</label>
            <input type="text" id="state" name="state" class="form-control" value="<?php (isset($employee) ? print($employee['state']) : print('')); ?>" required>
            <label for="age" class="mx-2 employeeLabels">Age</label>
            <input type="number" id="age" name="age" class="form-control" value="<?php (isset($employee) ? print($employee['age']) : print('')); ?>" required>
        </div>

        <div class="d-flex mt-3">
            <label for="zip" class="mr-2 employeeLabels">Postal Code</label>
            <input type="text" id="zip" name="zip" class="form-control" value="<?php (isset($employee) ? print($employee['postalCode']) : print('')); ?>" required>
            <label for="phone" class="mx-2 employeeLabels">Phone Number</label>
            <input type="text" id="phone" name="phone" class="form-control" value="<?php (isset($employee) ? print($employee['phoneNumber']) : print('')); ?>" required>
        </div>
        
            <input type="submit" class="btn btn-primary mt-5" value="SUBMIT" id="submitEmployee" name="<?php (isset($_GET['id']) ? print('submitEmployee') : print('newEmployee')) ?>">
            <button type="button" class="btn btn-secondary mt-5" id="returnEmployees">RETURN</button>
        
    </form>

    <script src="../assets/js/index.js"></script>
    <?php
    require_once("../assets/html/footer.html");
        //Table title init
        echo "</footer>";
        ?>
</body>

</html>