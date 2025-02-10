<?php

require_once "Database.php";

class Product extends Database
{
    public function getAllproduct()
    {
        $sql = "SELECT id, product_name, price, quantity FROM products";
        
        if ($result = $this->conn->query($sql)){
            return $result;
        }else{
            die('Error retrieving all products: ' . $this->conn->error);
        }
    }

    public function store($request)
    {
        $product_name = $request['product_name'];
        $price = $request['price'];
        $quantity = $request['quantity'];

        $sql = "INSERT INTO products (`product_name`, `price`, `quantity`)
                VALUES ('$product_name', '$price', '$quantity')";
            
            session_start();
            $_SESSION['id'] = $product['id'];

        if($this->conn->query($sql))
        {
            header('location: ../views/dashboard.php');  // go to index.php
            exit;                           // same as die
        }
        else{
            die('Error adding product: ' . $this->conn->error);
        }
    }

    public function add($request)
    {
        session_start();
        $id         =   $_SESSION['id'];
        $product_name         = $request['product_name'];
        $price         = $request['price'];
        $quantity         = $request['quantity'];

        $sql = "UPDATE products
                SET product_name = '$product_name',
                    price = '$price',
                    quantity = '$quantity'
                WHERE id = $id";

        if($this->conn->query($sql))
        {
            $_SESSION['username'] = $username;
            $_SESSION['full_name'] = "$first_name $last_name";

            header('location: ../views/dashboard.php');
            exit;
        }
        else
        {
            die('Error updation your account: '. $this->conn->error);
        }
    }

    public function delete($request)
    {
        $id = $request['id'];

       $sql = "DELETE FROM products WHERE id = $id";

       if ($this->conn->query($sql))
        {
            header('location: ../views/dashboard.php');
        }
        else
        {
            die('Error delete your account: '. $this->conn->error);
        }
    }

    public function getProduct($request)
    {
        $id = $_GET['id'];

        $sql = "SELECT * FROM products WHERE id = $id";

        if ($result = $this->conn->query($sql))
        {
            return $result->fetch_assoc();
        }
        else
        {
            die('Error retrieving the product: '. $this->conn->error);
        }
    }

    public function update($request)
    {
        $id         = $request['product_id'];
        $product_name         = $request['product_name'];
        $price         = $request['price'];
        $quantity         = $request['quantity'];

        $sql = "UPDATE products
                SET product_name = '$product_name',
                    price = '$price',
                    quantity = '$quantity'
                WHERE id = $id";

        if($this->conn->query($sql))
        {
            header('location: ../views/dashboard.php');
            exit;
        }
        else
        {
            die('Error uploading product: ' . $this->conn->error);
        }
    }

    public function buy($request)
    {
        $id         = $request['product_id'];
        $product_name         = $request['product_name'];
        $price         =  $request['price'];
        $quantity = $request['quantity'];
        $buy_quantity = $request['buy_quantity'];

        if($buy_quantity < $quantity)
        {
            echo " ($quantity - $buy_quantity) * $price";
            header('location: ../views/payment.php?id=' . $request["product_id"]);
            exit;
        }
        else
        {
            die('Error: less product');
        }
    }

    public function getTotal()
    {

    }
}