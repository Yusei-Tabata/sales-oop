<?php
session_start();

require '../classes/Product.php';

$product        = new Product;
$all_product    = $product->getAllproduct();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
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
    <main class="row justify-content-center gx-0">
        <div class="col-8">
            <div class="row my-5">
                <h1 class="ms-0 col-11">Product List</h1>
                <a href="add-product.php" class="text-info col me-0 h1 w-100"><!-- go to add --><i class="fa-solid fa-plus"></i></a>
            </div>
            <?php
            if($all_product->num_rows === 0){
                echo "<div class='card bg-dark w-100' style='height: 300px'>";
                echo "<h1 class='text-danger text-center mt-5'>NO RECORDS FOUND<h1>";
                echo "<h1 class='text-danger text-center mt-2' style='font-size: 100px;'><i class='fa-regular fa-circle-xmark'></i></h1>";
                echo "</div>";
                exit;
            }
            ?>

            <table class="table table-hover align-middle">
                <thead >
                    <tr >
                        <th class="bg-dark text-light">ID</th>
                        <th class="bg-dark text-light">Product Name</th>
                        <th class="bg-dark text-light">Price</th>
                        <th class="bg-dark text-light">Quantity</th>
                        <th class="bg-dark text-light"></th>
                        <th class="bg-dark text-light"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($product = $all_product->fetch_assoc()){
                    ?>
                        <tr>
                            <td><?= $product['id']?></td>
                            <td><?= $product['product_name']?></td>
                            <td><?= $product['price']?></td>
                            <td><?= $product['quantity']?></td>
                            <td>
                                    <a href="edit-product.php?id=<?= $product['id']?>" class="btn btn-warning" title="Edit">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="delete-product.php?id=<?= $product['id']?>" class="btn btn-danger" title="Delete">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                            </td>
                            <td><a href="buy-product.php?id=<?= $product['id']?>" class="btn btn-success" title="Buy Product"><i class="fa-solid fa-cash-register"></i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>