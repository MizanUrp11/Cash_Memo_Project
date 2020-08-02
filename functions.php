<?php

if ( isset( $_POST['submit'] ) ) {
    $MAC = exec( 'getmac' );
    $MAC = strtok( $MAC, ' ' );
    echo "MAC address of client is: " . $MAC . "<br>";
    $IP = $_SERVER['REMOTE_ADDR'];
    echo "MAC address of client is: " . $IP;
    // var_dump($_SERVER);
    // echo 'Submitted';
}