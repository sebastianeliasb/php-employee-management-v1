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
    <link rel="stylesheet" href="../assets/css/main.css">

    <title>Employee list</title>
</head>

<body>
    <header>
        <?php
        require_once("../assets/html/header.html");
        ?>

    </header>

    <h4>Employee</h4>

    <form action="" id="employeeForm" class="p-5">
        <div class="d-flex mt-3">
            <label for="name" class="mr-2 employeeLabels">Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
            <label for="lastName" class="mx-2 employeeLabels">Last Name</label>
            <input type="text" id="lastName" name="lastName" class="form-control" required>
        </div>

        <div class="d-flex mt-3">
            <label for="email" class="mr-2 employeeLabels">e-Mail Address</label>
            <input type="text" id="email" name="email" class="form-control" required>
            <label for="gender" class="mx-2 employeeLabels">Gender</label>
            <select id="gender" name="gender" class="form-control">
                <option>Female</option>
                <option>Male</option>
                <option>No-binary</option>
                <option>Trans</option>
                <option>Androgynous</option>
                <option>Gender queer</option>
                <option>Other</option>
            </select>
        </div>

        <div class="d-flex mt-3">
            <label for="city" class="mr-2 employeeLabels">City</label>
            <input type="text" id="city" name="city" class="form-control" required>
            <label for="streetAddress" class="mx-2 employeeLabels">Street Address</label>
            <input type="text" id="streetAddress" name="streetAddress" class="form-control" required>
        </div>

        <div class="d-flex mt-3">
            <label for="state" class="mr-2 employeeLabels">State</label>
            <input type="text" id="state" name="state" class="form-control" required>
            <label for="age" class="mx-2 employeeLabels">Age</label>
            <input type="number" id="age" name="age" class="form-control" required>
        </div>

        <div class="d-flex mt-3">
            <label for="zip" class="mr-2 employeeLabels">Postal Code</label>
            <input type="text" id="zip" name="zip" class="form-control" required>
            <label for="phone" class="mx-2 employeeLabels">Phone Number</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>

        <input type="submit" class="btn btn-primary mt-5" value="SUBMIT">
        <button class="btn btn-secondary mt-5">RETURN</button>
    </form>

</body>

</html>