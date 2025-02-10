<?php
include '../classes/Product.php';

// Create an object
$user = new Product;

// Call the method
$user->store($_POST);
?>