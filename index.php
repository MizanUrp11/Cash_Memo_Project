<?php
session_start();
ob_start();
if(isset($_SESSION['logged_username'])){
  header("Location: result.php");
}
    include "functions.php";

    $connection = new Connection;

    if ( isset( $_POST['adduser'] ) ) {
        $userName = $_POST['userName'];
        $password = md5( $_POST['password'] );

        $connection->insertUser( $userName, $password );
        echo "user added";
    }

    if ( isset( $_POST['login'] ) ) {
        $userName = $_POST['userName'];
        $password = md5( $_POST['password'] );
        $array    = array(
            ':userName' => $userName,
            ':password' => $password
        );
        $result = $connection->getUsers( "SELECT * FROM users WHERE userName='$userName' AND password='$password'", $array );
        if(count($result)){
          $_SESSION['logged_username'] = $userName;
          header("Location: result.php");
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <link
      rel="stylesheet"
      type="text/css"
      href="css/bootstrap.min.css"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="css/font-awesome.min.css"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="css/material-design-iconic-font.min.css"
    />

    <link rel="stylesheet" type="text/css" href="css/animate/animate.css" />

    <link
      rel="stylesheet"
      type="text/css"
      href="css/hamburgers.min.css"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="css/animsition.min.css"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="css/select2.min.css"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="css/daterangepicker.css"
    />

    <link rel="stylesheet" type="text/css" href="css/util.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
  </head>
  <body>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <form class="login100-form validate-form" method="POST" action="index.php">
            <span class="login100-form-title p-b-26">
              YASIN VS
            </span>
            <span class="login100-form-title p-b-48">
<i class="zmdi zmdi-font"></i>
</span>
            <div
              class="wrap-input100 validate-input"
              
            >
              <input class="input100" type="text" name="userName" />
              <span class="focus-input100" data-placeholder="Username"></span>
            </div>
            <div
              class="wrap-input100 validate-input"
              data-validate="Enter password"
            >
              <input class="input100" type="password" name="password" />
              <span class="focus-input100" data-placeholder="Password"></span>
            </div>
            <div class="container-login100-form-btn">
              <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <!-- <input type="button" name="login" class="login100-form-btn"> -->
                <button name="login" class="login100-form-btn">login</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div id="dropDownSelect1"></div>

    <script
      src="js/jquery-3.2.1.min.js"
    ></script>

    <script
      src="js/animsition.min.js"
    ></script>

    <script
      src="js/popper.js"
    ></script>
    <script
      src="js/bootstrap.min.js"
    ></script>

    <script
      src="js/select2.min.js"
    ></script>

    <script
      src="js/moment.min.js"
    ></script>
    <script
      src="js/daterangepicker.js"
    ></script>

    <script
      src="js/countdowntime.js"
    ></script>

    <script
      src="js/main.js"
      
    ></script>

    
  
    <script
      src="js/rocket-loader.min.js"
    ></script>
  </body>
</html>
