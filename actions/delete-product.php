<?php
include '../classes/Product.php';

// Create an object
$product = new Product;

// Call the method
$product->delete($_POST);
?>