<?php
use Composer\Bin\data\Database;

require_once realpath("vendor/autoload.php");

session_start();

$database = new Database();
$database->connect();

$email = '';
$password = '';

$error_info = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

	if (empty($email) || empty($password)) {
		$error_info = 'Email or password are required';
    } else {
		$stmt = $database->conn->prepare("SELECT * FROM ".Database::DB_TABLE_NAME." WHERE EMAIL = ? and PASSWORD = ?");
		$stmt->bind_param("ss", $email, $password);
		$stmt->execute();

		$user = $stmt->fetch();

		if (!empty($user)) {
			header("Location: main.php");
			exit;
        } else {
            $error_info = 'Incorrect email or password';
        }
    }
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

	<!-- Custom styles & js-->
	<link rel="stylesheet" href="css/style.css" />
    <script src="js/main.js"></script>
	<script src="js/form.js"></script>
</head>

<body data-bs-theme="dark">
	<div class="d-flex align-items-center flex-column vh-100">
		<!-- Content -->
		<div class="container">
			<div class="row justify-content-center w-75 mt-lg-5 mx-auto rounded bg-body-tertiary shadow-lg">
				<div class="d-flex justify-content-center mb-4 rounded-top" style="background-color: var(--bs-code-color);">
					<img src="images/angelcare-logo.png" class="img-fluid" alt="">
				</div>
				<div class="px-4">
					<h3 class="fs-1 fw-bolder ">Sign in</h3>
					<p class="fw-light">A one-click one-go online shop for wide selections baby products.</p>
				</div>
				<!-- Notification for login validation -->
                <?php
				if (!empty($error_info)) {
                    echo
                        '<div class="badge bg-danger text-wrap w-50">
				
                    <p class="fw-bold fs-6 mb-1">' . $error_info . '</p>
                </div>';
                }
                ?>

				<!-- Login Form -->
				<form method="POST" action="" class="row g-3 px-3 m-0" >
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
						<button type="submit" name="submit_btn" class="btn btn-primary w-100">Log in</button>
					</div>

					<div class="col-12 pt-4">
						<p class="fw-bold">Don't have an account? <a href="bbform.php" class="fw-bold link-primary text-decoration-none">Register here!</a></p>
					</div>
				</form>
			</div>
        </div>
        <!-- Footer -->
        <footer class="bg-body py-4 mt-5 w-100">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-3">
                        <h3>Bar Pink</h3>
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
                        <p>Copyright &copy; 2022 Bar Pink</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
