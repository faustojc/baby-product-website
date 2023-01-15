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
    <title>Angelcare</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Custom CSS-->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body data-bs-theme="dark">
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


        <!-- Content ABOUT US -->      
        <div class="section">
            <div class="container">
                <div class="content-section">
                    <div class="title">
                        <h1>About Us</h1>
                    </div>
                    <div class="content">
                        <h3>Angel Care, Providing your baby needs. </h3>
                        <p> Angel Care where all your baby needs are answered.
                        A one-click one-go online shop for wide selections baby products.
                        It feature a wide variety of brands from feeding products, Diapers & Wipes, Nursery & decors, Cloth diapers, Bath & Potty, Gear & Travel that are suitable for babies, infants and toddlers.</p>
                        <div class="button">
                            <a href="">Read More</a>
                        </div>
                    </div>
                    <div class="social">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="image-section">
                    <img src="images/babyC-small.png" alt="logo">
                </div>

            </div>
        </div>
        <!-- END of Content ABOUT US -->
        
        <!--MEET THE MEMBERS--->

        <section id="team" class="team section-bg">
         <div class="container" style="padding-top: 0;">
             <h2>Meet our Team</h2>
             <p>Meet the people behind the website Angel Care</p>
         </div>
         <div class="row">
         <div class="row-team">
             
  <div class="column">
      <div class="container"style="padding-top: 0;">
  <div class="row">
    <div class="col">    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
             <div class="member" data-aos="fade-up" data-aos-delay="100">
                <div class="member-img">
                    <img src="images/boko.png" alt="Snow" style="width:100%">
                    
                    <!--Social icon-->
                    <div class="social-team">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                 <!--1st member info--->
                 <div class="member-info">
                     <h4>Fausto John Claire Boko</h4>
                     <span>CEO/Director of eCommerce</span>
                 </div>
             </div>
             </div> </div>
        <div class="col">    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
             <div class="member" data-aos="fade-up" data-aos-delay="100"> 
                <div class="member-img">
                    <img src="images/chereden.png" alt="Snow" style="width:100%">
                    
                    <!--Social icon-->
                    <div class="social-team">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                 <!--2nd member info--->
                 <div class="member-info">
                     <h4>Chereden Gavieta</h4>
                     <span>Chief Operating Officer/UI-UX Designer</span>
                 </div>
             </div>
             </div> </div>
    <div class="col">    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
             <div class="member" data-aos="fade-up" data-aos-delay="100"> 
                <div class="member-img">
                    <img src="images/Cherry.png" alt="Snow" style="width:100%">
                    
                    <!--Social icon-->
                    <div class="social-team">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                 <!--3rd member info--->
                 <div class="member-info">
                     <h4>Cherry Angela Rodriguez</h4>
                     <span>Customer Service Manager</span>
                 </div>
             </div>
             </div> </div>
    <div class="w-100"></div>
    <div class="col">    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
             <div class="member" data-aos="fade-up" data-aos-delay="100"> 
                <div class="member-img">
                    <img src="images/paul.png" alt="Snow" style="width:100%">
                    
                    <!--Social icon-->
                    <div class="social-team">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                 <!--4th member info--->
                 <div class="member-info">
                     <h4>Paul Cuenca</h4>
                     <span>Chief Financial Officer</span>
                 </div>
             </div>
             </div> </div>
    <div class="col">    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
             <div class="member" data-aos="fade-up" data-aos-delay="100"> 
                <div class="member-img">
                    <img src="images/mitch.png" alt="Snow" style="width:100%">
                    
                    <!--Social icon-->
                    <div class="social-team">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                 <!--5th member info--->
                 <div class="member-info">
                     <h4>Mitchel Mariano</h4>
                     <span>VP of Digital Operations</span>
                 </div>
             </div>
             </div> </div>
    <div class="col">    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
             <div class="member" data-aos="fade-up" data-aos-delay="100"> 
                <div class="member-img">
                    <img src="images/brix.png" alt="Snow" style="width:100%">
                    
                    <!--Social icon-->
                    <div class="social-team">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                 <!--6th member info--->
                 <div class="member-info">
                     <h4>Brix Jocson</h4>
                     <span>Project Manager</span>
                 </div>
             </div>
             </div> </div>
            </div>
        </div>
    </div>
         </div>
        </section>

<!--END OF MEET THE MEMBERS--->

        <!---Updates--->

        <div class="container my-5">

          <footer class="bg-dark text-center text-white">
          <!-- Grid container -->
          <div class="container p-4 pb-0">
            <!-- Section: Form -->
            <section class="">
              <form action="">
                <!--Grid row-->
                <div class="row d-flex justify-content-center">
                  <!--Grid column-->
                  <div class="col-auto">
                    <p class="pt-2">
                      <strong>Sign up for our latest updates</strong>
                    </p>
                  </div>
                  <div class="col-md-5 col-12">
                    <!-- Email input -->
                    <div class="form-outline form-white mb-4">
                      <input type="email" id="form5Example2" class="form-control" />
                      <label class="form-label" for="form5Example2">Email address</label>
                    </div>
                  </div>
                  <div class="col-auto">
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-outline-light mb-4">
                      Subscribe
                    </button>
                  </div>
                  <!--Grid column-->
                </div>
                <!--Grid row-->
              </form>
            </section>
            <!-- Section: Form -->
          </div>
          <!-- Grid container -->
        </footer>

        </div>
        <!-- End of updates -->

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

    <script src="js/main.js"></script>
    <script src="js/changeTheme.js"></script>
</body>

</html>
