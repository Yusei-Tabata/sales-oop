<?php
session_start();

require '../classes/Product.php';

$id = $_GET['id'];

$product_obj       = new Product;
$product           = $product_obj->getProduct($_GET['id']); 
// $user = ['first_name' => 'john'  ....  'photo' => NULL]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        h1{
            font-size: 70px;
        }
    </style>
    <title>Buy Product</title>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3"><i class="fa-solid fa-house"></i></h1>
            </a>
            <span class="navbar-text">Welcome <?= $_SESSION['full_name'] ?></span>
            <form action="../actions/logout.php" method="POST" class="d-flex ms-2">
                <button type="submit" class="text-danger bg-transparent border-0">
                    <span class="me-2">Logout</span>
                    <i class="fa-solid fa-user-xmark h3"></i>
                </button>
            </form>
        </div>
    </nav>

<div style="height: 100vh;">
        <div class="h-100 d-flex justify-content-center align-items-center">
            <div class=" w-50 mx-auto">
                <div class="header bg-white border-0 my-5 ">
                    <h1 class="text-center text-success bg-light" style="font-size: 85px;"><i class="fa-solid fa-cash-register"></i>Buy Product</h1>
                </div>
                <div class="w-75 mx-auto">
                    <form action="../actions/buy-product.php" method="POST">
                        
                        <div class="mb-3">
                            <label for="product_name" class="form-label fw-bold text-secondary">Product name</label>
                            <input type="hidden" name="product_name" id="product_name" value="<?= $product['product_name'] ?>">
                            <h1 name="product_name" id="product_name" class="fw-bold"><?= $product['product_name'] ?></h1>
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <label for="price" class="form-label fw-bold text-secondary">Price</label>
                                <input type="hidden" name="price" id="price" value="<?= $product['price'] ?>">
                                <h1 name="price" id="price" class="fw-bold">$ <?= $product['price'] ?></h1>
                            </div>
                            <div class="col">
                                <label for="quantity" class="form-label fw-bold text-secondary">Stocks of left</label>
                                <input type="hidden" name="quantity" id="quantity" value="<?= $product['quantity'] ?>">
                                <h1 name="quantity" id="quantity" class="fw-bold"><?= $product['quantity'] ?></h1>
                            </div>
                        </div>
                        <div class="row mb-5">
                                <label for="buy_quantity" class="form-label fw-bold text-secondary">Buy Quantity</label>
                                <input type="number" name="buy_quantity" id="buy_quantity" class="fw-bold h1 w-75 mx-auto">
                        </div>
                            <input type="hidden" name="product_id" value="<?= $id ?>">
                            <button type="submit" class="btn btn-success text-light w-100">Pay</button>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>