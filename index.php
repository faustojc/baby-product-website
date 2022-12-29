<?php
use Composer\Bin\data\Database;

require_once realpath("vendor/autoload.php");

$emailErr;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = ($_POST["email"]);

    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email input";
    }
}

$database = new Database();
$database->connect();

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Angelcare Sign up</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- Bootstrap -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Custom styles & js-->
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/main.js"></script>
</head>

<body>
    <div class="d-flex align-items-center vh-100">
        <!-- Content -->
        <div class="container">
            <div class="row justify-content-center w-75 mx-auto rounded bg-body-tertiary shadow-lg" style="max-height: 75%; ">
                <div class="d-flex justify-content-center mb-4 rounded-top" style="background-color: var(--bs-code-color);">
                    <img src="images/angelcare-logo.png" class="img-fluid" alt="">
                </div>
                <div class="px-4 mb-4">
                    <h3 class="fs-1 fw-bolder ">Sign in</h3>
                    <p class="fw-light">A one-click one-go online shop for wide selections baby products.</p>
                </div>

                <!-- Login Form -->
                <form method="POST" action="" class="row g-3 p-3 m-0" >
                    <!-- Email -->
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required />
                        <label for="email">Email address</label>
                    </div>
                    <!-- Password -->
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="password" required />
                        <label for="password">Password</label>
                    </div>
                    <!-- Forgot password -->
                    <div class="col-12">
                        <span class="ml-auto"><a href="#" class="text-decoration-none link-info">Forgot password?</a></span>
                    </div>

                    <!-- Sign up btn -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100">Log in</button>
                    </div>

                    <div class="col-12 pt-4">
                        <p class="fw-bold">Don't have an account? <a href="bbform.php" class="fw-bold link-primary text-decoration-none">Register here!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
