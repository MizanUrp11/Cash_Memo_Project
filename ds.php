<?php
session_start();
ob_start();
if(isset($_GET['ds'])){

    // remove all session variables
    session_unset();
    
    // destroy the session
    session_destroy();
    
    // echo 'hello';
    header("Location: result.php");
}
?>