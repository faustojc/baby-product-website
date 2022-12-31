<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Angelcare Home</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Custom styles & js-->
    <link rel="stylesheet" href="css/home.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="js/main.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
</head>

<body>
    <!-- NavBar/Header -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed top-0 start-0 w-100">

    <div class="container">
        <a class="navbar-brand d-lg-none" href="#">
            <img class = "logo" src="images/angelcare-logo.png">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navban-toggler-icon"> 
        </span>
        </button>
        <div class="collapse navbar-collapse p-2 flex-column" id="navbarContent">
            <div class="d-flex justify-content-center justify-content-lg-between flex-column flex-lg-row w-100">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search"/>
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <a class="navbar-brand d-none d-lg-block" href="#"> <img class = "logo" src="images/angelcare-logo.png"></a>
                <ul class="navbar-nav">
                     <li class="nav-item d-flex align-items-center">
                        <a class="nav-link mx-2" href="#">
                        Home
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link mx-2" href="#">
                        About
                        </a>
                    </li>
                    <li class="nav-item dropdown d-flex align-items-center">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Baby Toys</a></li>
                        <li><a class="dropdown-item" href="#">Clothes for Him</a></li>
                        <li><a class="dropdown-item" href="#">Clothes for Her</a></li>
                        <li><a class="dropdown-item" href="#">Others</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown d-flex align-items-center">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Log in</a></li>
                        <li><a class="dropdown-item" href="#">Register</a></li>
                      </ul>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link mx-2" href="#">
                            <i class="fas fa-shopping-bag"></i>
                        </a>
                        <span class="badge rounded-pill bg-secondary"> 0 </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </nav>

    <!-- Content -->

    <div class="container position-relative text-center">
    	<header class="position-relative text-center text-white mb-5">
    		<img src="images/banner1.png" class="w-100" alt="Banner"/>
    	</header>
    	<div id="Most_Popular">
    		<h2 class="display-6 py-5">
    			Most Popular
    		</h2>
    	</div>
    	

    	<div class="d-flex justify-content-between align-items-center flex-column flex-lg-row my-5" id="new">
    		<div class="card m-2">
    			<a href="./product.html">
    			<img src="images/product.png" class="card-img-top" height="300" alt="Product"/>
				</a>
				<div class="card-body"> 
					<p class="card-text fw-bold">
						Product Name
					</p>
					<small class="text-secondary">
						₱1000.00
					</small>
				</div>
    		</div>	

    		<div class="card m-2">
    			<a href="./product.html">
    			<img src="images/product.png" class="card-img-top" height="300" alt="Product"/>
				</a>
				<div class="card-body"> 
					<p class="card-text fw-bold">
						Product Name
					</p>
					<small class="text-secondary">
						₱1000.00
					</small>
				</div>
    		</div>

    		<div class="card m-2">
    			<a href="./product.html">
    			<img src="images/product.png" class="card-img-top" height="300" alt="Product"/>
				</a>
				<div class="card-body"> 
					<p class="card-text fw-bold">
						Product Name
					</p>
					<small class="text-secondary">
						₱1000.00
					</small>
				</div>
    		</div>

    		<div class="card m-2">
    			<a href="./product.html">
    			<img src="images/product.png" class="card-img-top" height="300" alt="Product"/>
				</a>
				<div class="card-body"> 
					<p class="card-text fw-bold">
						Product Name
					</p>
					<small class="text-secondary">
						₱1000.00
					</small>
				</div>
    		</div>
    	</div>

    	<a href="#" class="btn btn-outline-dark my-5"> View All Products</a>

    	<div class="d-flex justify-content-between align-items-center flex-column flex-lg-row my-5">
    		<div class="position-relative m-2">
	    		<img src="images/product2.png" height="300" alt="Product"/>
	    		<a href="#" class="btn btn-light position-absolute start-1 bottom-0 ms-2 mb-2 d-block">Prodcut</a>
    		</div>
    		<div class="position-relative m-2">
	    		<img src="images/product2.png" height="300" alt="Product"/>
	    		<a href="#" class="btn btn-light position-absolute start-1 bottom-0 ms-2 mb-2 d-block">Prodcut</a>
    		</div>
    		<div class="position-relative m-2">
	    		<img src="images/product2.png" height="300" alt="Product"/>
	    		<a href="#" class="btn btn-light position-absolute start-1 bottom-0 ms-2 mb-2 d-block">Prodcut</a>
    		</div>
    	</div>

    	<div class="row text-start align-items-center gy-5 my-5">
    		<div class="col-12 col-md-6">
    			<img src="images/product3.png" class="w-100 h-100">
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

   <footer class="bg-body py-4 mt-5 w-100" id="footer">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-3">
                    <img class = "logo" src="images/angelcare-logo.png">
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
                        Email: angel_care@gmail.com
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
                    <p>Copyright &copy; 2022 Angel Care</p>
                </div>
            </div>
        </div>
    </footer>



</body>


</html>