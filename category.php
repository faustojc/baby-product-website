<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categories</title>

    <title>Angelcare Sign up</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C400italic%2C600%2C700%2C700italic%7COswald%3A400%2C300%7CVollkorn%3A400%2C400italic'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/category.css">
</head>

<body data-bs-theme="dark">
    <div class="d-flex align-items-center flex-column vh-100">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg w-100" style="background-color: var(--theme-primary)">
            <div class="container-fluid">
                <a class="navbar-brand" href="main.php">
                    <img class="w-75" src="images/angelcare-logo.png" alt="">
                </a>
                <div class="d-inline-flex align-items-center bi bi-moon-fill me-3" id="themeIcon">
                    <i class="badge text-wrap text-bg-primary w-auto mx-2" id="changeTheme" role="button"></i>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
                    <ul class="navbar-nav my-auto">
                        <li class="nav-item my-auto mx-lg-2">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item dropdown my-auto mx-lg-2">
                                <span class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Categories
                                </span>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Baby Toys</a></li>
                                <li><a class="dropdown-item" href="#">Boy Clothes</a></li>
                                <li><a class="dropdown-item" href="#">Girl Clothes</a></li>
                                <li><a class="dropdown-item" href="#">Others</a></li>
                            </ul>
                        </li>
                        <li class="nav-item my-auto mx-lg-2">
                            <a class="nav-link" href="#">About</a>
                        </li>
                    </ul>
                    <ul class="navbar my-auto list-unstyled">
                        <li class="nav-item dropdown my-auto mx-lg-2">
                                <span class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person"></i>
                                </span>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Login</a></li>
                                <li><a class="dropdown-item" href="#">Register</a></li>
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
                <div class="container-fluid" id="cart-list"></div>
            </div>
        </div>

        <!-- slider -->
        <main class="main-content">
            <section class="slideshow">
                <div class="slideshow-inner">
                    <div class="slides">
                        <div class="slide is-active ">
                            <div class="slide-content">
                                <div class="caption">
                                    <div class="title">Nursery & Decors</div>
                                    <div class="text">
                                        <p> Happy childhood memories start here!</p>
                                    </div>
                                    <a href="#" class="btn">
                                        <span class="btn-inner">Shop Now</span>
                                    </a>
                                </div>
                            </div>
                            <div class="image-container">
                                <img src="images/Nursery.png" alt="" class="image" />
                            </div>
                        </div>
                        <div class="slide">
                            <div class="slide-content">
                                <div class="caption">
                                    <div class="title">Clothes & Diapers</div>
                                    <div class="text">
                                        <p>Leave your cares to us! Get 20% off minimum spend of 2,000</p>
                                    </div>
                                    <a href="#" class="btn">
                                        <span class="btn-inner">Shop Now</span>
                                    </a>
                                </div>
                            </div>
                            <div class="image-container">
                                <img src="images/Clothes.jpg" alt="" class="image" />
                            </div>
                        </div>
                        <div class="slide">
                            <div class="slide-content">
                                <div class="caption">
                                    <div class="title">Bath & Potty</div>
                                    <div class="text">
                                        <p>Reliable care for your precious little ones!</p>
                                    </div>
                                    <a href="#" class="btn">
                                        <span class="btn-inner">Shop Now</span>
                                    </a>
                                </div>
                            </div>
                            <div class="image-container">
                                <img src="images/Bath.png" alt="" class="image" />
                            </div>
                        </div>

                    </div>
                    <div class="pagination">
                        <div class="item is-active">
                            <span class="icon">1</span>
                        </div>
                        <div class="item">
                            <span class="icon">2</span>
                        </div>
                        <div class="item">
                            <span class="icon">3</span>
                        </div>
                    </div>
                    <div class="arrows">
                        <div class="arrow prev">
                  <span class="svg svg-arrow-left">
                    <svg version="1.1" id="svg4-Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px" height="26px" viewBox="0 0 14 26" enable-background="new 0 0 14 26" xml:space="preserve"> <path d="M13,26c-0.256,0-0.512-0.098-0.707-0.293l-12-12c-0.391-0.391-0.391-1.023,0-1.414l12-12c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414L2.414,13l11.293,11.293c0.391,0.391,0.391,1.023,0,1.414C13.512,25.902,13.256,26,13,26z"/> </svg>
                    <span class="alt sr-only"></span>
                  </span>
                        </div>
                        <div class="arrow next">
                  <span class="svg svg-arrow-right">
                    <svg version="1.1" id="svg5-Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px" height="26px" viewBox="0 0 14 26" enable-background="new 0 0 14 26" xml:space="preserve"> <path d="M1,0c0.256,0,0.512,0.098,0.707,0.293l12,12c0.391,0.391,0.391,1.023,0,1.414l-12,12c-0.391,0.391-1.023,0.391-1.414,0s-0.391-1.023,0-1.414L11.586,13L0.293,1.707c-0.391-0.391-0.391-1.023,0-1.414C0.488,0.098,0.744,0,1,0z"/> </svg>
                    <span class="alt sr-only"></span>
                  </span>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--end slider-->

        <!-- Footer -->
        <footer class="bg-body-tertiary py-4 mt-5 w-100">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-3">
                        <h3>Angelcare</h3>
                        <p>Providing your baby needs.</p>
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
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js'></script>
    <script src="js/main.js"></script>
    <script src="js/changeTheme.js"></script>
</body>

</html>
