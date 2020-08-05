<?php
session_start();
ob_start();
include "functions.php";

//$_SESSION['products'] = [];

$products_from_ajax = $_GET['products'];
$products_exploded = explode( ',', $products_from_ajax );

$_SESSION['products'] = array_unique(array_merge($products_exploded,$_SESSION['products']));


// $_SESSION['products'] = $products_exploded;
// array_push($_SESSION['products'],$products_exploded);
