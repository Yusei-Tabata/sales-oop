<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>
<body>
<div style="height: 100vh;">
        <div class="h-100 d-flex justify-content-center align-items-center">
            <div class="card w-50 my-auto mx-auto">
                <div class="card-header bg-white border-0 my-3 ">
                    <h1 class="text-center text-primary bg-light" style="font-size: 85px;">Login<i class="fa-solid fa-right-to-bracket"></i></h1>
                </div>
                <div class="card-body">
                    <form action="../actions/login.php" method="POST">
                        
                        <div class="mb-3">
                            <label for="username" class="form-label fw-bold">Username</label>
                            <input type="text" name="username" id="username" class="form-control fw-bold" maxlength="15" placeholder="Username" required>
                        </div>
                        <div class="mb-5">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control" minlength="8" placeholder="Password" required>
                        </div>

                            <button type="submit" class="btn btn-primary text-light w-100">Login</button>
                            <button type="submit" class="btn btn-danger text-light w-75 my-3 mx-auto"><a href="register.php" class="text-decoration-none text-light">Create an Account</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>