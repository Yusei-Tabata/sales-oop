<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Add Product</title>
</head>
<body>

    <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
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
            <div class=" w-50 my-auto mx-auto">
                <div class="header bg-white border-0 my-5 ">
                    <h1 class="text-center text-info bg-light" style="font-size: 85px;"><i class="fa-solid fa-box"></i>Add Product</h1>
                </div>
                <div class="">
                    <form action="../actions/add-product.php" method="POST">
                        
                        <div class="mb-3">
                            <label for="product_name" class="form-label fw-bold">Product name</label>
                            <input type="text" name="product_name" id="product_name" class="form-control fw-bold" placeholder="Product Name" required>
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <label for="price" class="form-label fw-bold">Price</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary">$</span>
                                    <input type="price" name="price" id="price" class="form-control" placeholder="Price" step="0.01" required>
                                </div>
                            </div>
                            <div class="col">
                                <label for="quantity" class="form-label fw-bold">Quantiry</label>
                                <input type="quantity" name="quantity" id="quantity" class="form-control" placeholder="Quantity" required>
                            </div>
                        </div>

                            <button type="submit" class="btn btn-info text-light w-100">Add</button>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>