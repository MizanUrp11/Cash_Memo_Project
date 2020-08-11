<?php include "header.php";?>
<?php

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


<div class="container">
  <div class="row">
    <form method="POST" action="index.php">
      <div class="form-group">
        <label for="userName">Email address</label>
        <input type="text" class="form-control" id="userName" name="userName">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">I accept terms and condition</label>
      </div>
      <button type="submit" class="btn btn-primary" name="login">Login</button>
      <button type="submit" class="btn btn-warning" name="adduser">Add User</button>
    </form>
  </div>
</div>
<?php include "footer.php";?>