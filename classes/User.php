<?php

require_once "Database.php";

class User extends Database
{
    public function store($request)
    {
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = $request['password'];

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (`first_name`, `last_name`, `username`, `password`)
                VALUES ('$first_name', '$last_name', '$username', '$password')";

        if($this->conn->query($sql))
        {
            header('location: ../views');  // go to index.php
            exit;                           // same as die
        }
        else{
            die('Error creating the user: ' . $this->conn->error);
        }
    }

    public function login($request)
    {
        $username = $request['username'];
        $password = $request['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = $this->conn->query($sql);

        if($result-> num_rows == 1)
        {
            # check is the password correct
            $user = $result->fetch_assoc();
            // user ['id -> 1 .....]
            if(password_verify($password, $user['password']))
            {
                # create session variables
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['full_name'] = $user['first_name'] . $user['last_name'];

                header('location: ../views/dashboard.php');
                exit;
            }
            else{
                die('Password is incorrect');
            }
        }else{
            die('Username is not found');
        }
        
    }

    
}