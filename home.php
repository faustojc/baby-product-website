<?php
use Server\data\Database;

require_once realpath("vendor/autoload.php");

session_start();

$database = new Database();
$database->connect();

$result = $database->getData($_SESSION['email']);
$name = '';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row['FIRSTNAME'];
    }
}

if (isset($_POST['logout'])) {
    if (!empty($_COOKIE['email'])) {
        setcookie('email', "", time() - 8640, '/');
    }

    session_destroy();
    session_abort();
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Angelcare Home</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>

    <!-- Bootstrap -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS-->
    <link rel="stylesheet" href="css/style.css" />
 
</head>

<body data-bs-theme="light">
    <div class="d-flex align-items-center flex-column vh-100">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg w-100" style="background-color: var(--theme-primary)">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php">
                    <img class="w-75" src="images/angelcare-logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
                    <ul class="navbar-nav my-auto">
                        <li class="nav-item my-auto mx-lg-2">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item dropdown my-auto mx-lg-2">
                            <span class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </span>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="category.php">Nursery and Decoration</a></li>
                                <li><a class="dropdown-item" href="category.php">Clothes and Diapers</a></li>
                                <li><a class="dropdown-item" href="category.php">Bath and Potty</a></li>
                            </ul>
                        </li>
                        <li class="nav-item my-auto mx-lg-2">
                            <a class="nav-link" href="#">About</a>
                        </li>
                    </ul>
                    <ul class="navbar my-auto list-unstyled">
                        <!-- user -->
                        <li class="nav-item dropdown my-auto mx-lg-2">
                            <span class="nav-link d-inline-flex align-items-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <p class="bi bi-person m-0" id="username"> <?php echo $name?></p>
                            </span>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item-text">
                                    <form method="POST" class="m-0">
                                        <button type="submit" name="logout" class="btn btn-link text-decoration-none">Log out</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item d-flex my-auto mx-lg-2 align-items-center">
                            <span class="bi bi-cart-fill p-0" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-cart" aria-controls="offcanvas-cart">
                                Cart
                                <i class="badge" id="cart-count" style="background-color: var(--theme-primary-variant)">0</i>
                            </span>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
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
                <div class="container-fluid" id="cart-list"></div>
            </div>
        </div>

        <!-- Content -->

        <div class="container position-relative text-center">
            <header class="position-relative text-center text-white mb-5">
                <img src="images/banner1.png" class="w-100" alt="Banner" id="sale" />
            </header>
            <div id="Most_Popular">
                <h2 class="display-6 py-5">
                    Most Popular
                </h2>
            </div>


            <div class="d-flex justify-content-between flex-wrap flex-column flex-lg-row my-5" id="mostPopular">

            </div>

            <a href="category.php" class="btn btn-outline-secondary my-5"> View All Products</a>

            <div id="Most_Popular">
                 <h2 class="display-6 py-5">
                    Recent Products
                </h2>
            </div>

            <div class="d-flex justify-content-between flex-wrap flex-column flex-lg-row my-5" id="recentProducts">

            </div>

            <div class="row text-start align-items-center gy-5 my-5">
                <div class="col-12 col-md-6">
                    <img src="images/product3.png" class="w-100 h-100" id="sale" alt="product">
                </div>
                <div class="col-12 col-md-6">
                    <div id="Promo">
                        <h2 class="display-4">
                            Year End Sale!
                        </h2>
                        <h4>Get up to 50% discount on all your favorite products until December 31, 2022</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-body py-4 mt-5 w-100 border-top border-secondary" style="border-width: 20px!important;">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-3">
                        <h3>Angelcare</h3>
                        <p class="mb-2">Providing your baby needs.</p>
                        <p class="mb-2 d-inline-flex align-items-center">
                            Change theme:
                            <span class="bi bi-moon-fill mx-1" id="themeIcon">
                                <i class="badge text-wrap text-bg-primary w-auto" id="changeTheme" style="cursor: pointer;"></i>
                            </span>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h3>Links</h3>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-decoration-none">Home</a></li>
                            <li><a href="about_us.php" class="text-decoration-none">About</a></li>
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
    </div>

    <script type="application/json" src="json/products.json"></script>
    <script src="js/main.js"></script>
    <script src="js/products.js"></script>
    <script src="js/changeTheme.js"></script>
    <script>
        showProducts();
    </script>
</body>

</html>
