<!-- TODO Application entry point. Login view -->

 <?php
    session_start();


        ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Document</title>
</head>

<body>
  
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="./assets/img/assembler.png" id="icon" alt="User Icon" />
            </div>

            <!-- Login Form -->
            <form method="POST" action="./src/library/loginController.php">
                <input type="text" value="" id="login" class="fadeIn second" name="email" placeholder="Email">
                <input type="password" value="" id="password" class="fadeIn third" name="pass" placeholder="Password" required>
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>
            <!-- <div class="infoLogin">
                <?php
                if(isset($_SESSION["loginError"])) $infoLogin = $_SESSION["loginError"];
                echo $infoLogin;
                 ?>
            </div> -->
            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>
</body>

</html>