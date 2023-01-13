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
    <title>Angelcare Categories</title>

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
                <a class="navbar-brand" href="main.php">
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
                                <li><a class="dropdown-item" href="#">Nursery and Decoration</a></li>
                                <li><a class="dropdown-item" href="#">Clothes and Diapers</a></li>
                                <li><a class="dropdown-item" href="#">Bath and Potty</a></li>
                            </ul>
                        </li>
                        <li class="nav-item my-auto mx-lg-2">
                            <a class="nav-link" href="about_us.php">About</a>
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

        <!-- Carousel -->
        <div class="carousel slide w-75 mb-5" id="carouselProduct" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselProduct" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselProduct" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselProduct" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <!-- Bath -->
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="images/bath.png" class="d-block" alt="bath category" style="width:100%; height: 600px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="color: var(--theme-primary);">Bath and Potty</h1>
                        <p class="fs-4 text-dark">Reliable care for your precious little ones!</p>
                    </div>
                </div>
                <!-- Clothes -->
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="images/clothes.jpg" class="d-block" alt="clothes category" style="width:100%; height: 600px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="color: var(--theme-primary);">Clothes and Diapers</h1>
                        <p  class="fs-4 text-dark">Leave your cares to us! Get 20% off minimum spend of 2,000</p>
                    </div>
                </div>
                <!-- Nursery -->
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="images/nursery.png" class="d-block" alt="nursery category" style="width:100%; height: 600px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="color: var(--theme-primary);">Nursery and Decoration</h1>
                        <p  class="fs-4 text-dark">Happy childhood memories start here!</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <hr class="w-75" style="background-color: var(--theme-primary-variant);">

        <!-- Content -->
        <div class="container">
            <ul class="nav nav-pills nav-fill mb-5">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#nursery" id="nursery">Nursery and Decoration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#clothes" id="clothes">Clothes and Diapers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#bath" id="bath">Bath and Potty</a>
                </li>
            </ul>
            <div class="d-flex align-items-center flex-wrap flex-column flex-lg-row my-5" id="currentCategory">
                <!-- show all products based on selected category -->
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
                            <li><a href="home.php" class="text-decoration-none">Home</a></li>
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
                            Email: angelcare@gmail.com
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
        getActiveNav();
        showCategoryProducts();
    </script>
</body>
</html>
