<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Angelcare Sign up</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Custom styles & js-->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body data-bs-theme="dark">
    <div class="d-flex align-items-center flex-column vh-100">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-body-secondary w-100">
            <div class="container-fluid">
                <a class="navbar-brand" href="main.php">
                    <img class="w-50" src="images/angelcare-logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
                    <ul class="navbar-nav my-auto">
                        <li class="nav-item my-auto mx-lg-2">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item my-auto mx-lg-2">
                            <a class="nav-link" href="#">Categories</a>
                        </li>
                        <li class="nav-item my-auto mx-lg-2">
                            <a class="nav-link" href="#">About</a>
                        </li>
                    </ul>
                    <ul class="navbar my-auto list-unstyled">
                        <li class="nav-item my-auto mx-lg-2 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Login</a></li>
                                <li><a class="dropdown-item" href="#">Register</a></li>
                            </ul>
                        </li>
                        <li class="nav-item d-flex my-auto mx-lg-2 align-items-center">
                            <ul class="bi bi-cart-fill p-0" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-cart" aria-controls="offcanvas-cart">
                                Cart
                                <span class="badge bg-body" id="cart-count">0</span>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Offcanvas -->
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvas-cart">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasTitle">Your cart list</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="container-fluid">
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="container">
            This is the template for the pages
        </div>
        <!-- Footer -->
        <footer class="bg-body py-4 mt-5 w-100 border-top border-secondary" style="border-width: 20px!important;">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-3">
                        <h3>Angelcare</h3>
                        <p class="mb-2">Providing your baby needs.</p>
                        <p class="mb-2">
                            Change theme:
                            <span id="changeTheme" class="badge text-wrap text-bg-primary w-auto" role="button"></span>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h3>Links</h3>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-decoration-none">Home</a></li>
                            <li><a href="#" class="text-decoration-none">About</a></li>
                            <li><a href="#" class="text-decoration-none">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>Contact Us</h3>
                        <p>
                            123 Main Street<br>
                            Anytown, USA 12345
                        </p>
                        <p>
                            Phone: 555-555-5555<br>
                            Email: info@example.com
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h3>Social</h3>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-decoration-none">Facebook</a></li>
                            <li><a href="#" class="text-decoration-none">Twitter</a></li>
                            <li><a href="#" class="text-decoration-none">Instagram</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col text-center">
                        <p>Copyright &copy; 2022 Angelcare</p>
                    </div>
                </div>
            </div>
        </footer>

        <script defer src="js/main.js"></script>
        <script defer src="js/changeTheme.js"></script>
        <script defer src="js/bootstrap/bootstrap.bundle.min.js"></script>
    </div>
</body>

</html>
