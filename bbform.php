<?php
use Composer\Bin\data\Database;

require_once realpath("vendor/autoload.php");

$emailErr = "";

$FIRSTNAME = "";
$MI = "";
$LASTNAME = "";
$SEX = "";
$BIRTHDATE = "";
$EMAIL = "";
$PASSWORD = "";
$CONTACT_NUMBER = "";
$ADDRESS = "";
$CITY = "";
$ZIP = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FIRSTNAME = $_POST['firstname'];
    $MI = $_POST['mi'];
    $LASTNAME = $_POST['lastname'];
    $SEX = $_POST['sex'];
    $BIRTHDATE = $_POST['birthdate'];
    $EMAIL = $_POST['email'];
    $PASSWORD = $_POST['password'];
    $CONTACT_NUMBER = $_POST['contact'];
    $ADDRESS = $_POST['address'];
    $CITY = $_POST['city'];
    $ZIP = $_POST['zip'];

    if (! filter_var($EMAIL, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email input";
    }
}

$data = new Database();
$data->connect();
$data->set($FIRSTNAME, $MI, $LASTNAME, $SEX, $BIRTHDATE, $EMAIL, $PASSWORD, $CONTACT_NUMBER, $ADDRESS, $CITY, $ZIP);
$data->insert();

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
	<script src="js/bootstrap/bootstrap.bundle.min.js"></script>

	<!-- Custom styles & js-->
	<link rel="stylesheet" href="css/bbform.css" />
	<script src="js/main.js"></script>

	<title>Angel Care Registration Form</title>
</head>

<body>

	<section class="my-4 mx-5">
		<div class="container">
			<div class="row g-0 register-card">
				<div class="col-lg-5">
					<img src="images/babyC.png" class="img-fluid" alt="">
				</div>
				<div class="col-lg-7" id="Cform">
					<h1 class="fw-bold text-primary">REGISTER</h1>
					<h5 class="fw-semibold" style="color: var(--bs-color-code);">Get the latest update on our new products!</h5>
					
					<!-- Register form -->
					<form action="bbform.php" method="POST" class="row g-3">
						<div class="col-lg-8">
							<label for="firstname" class="fs-5">First name</label>
							<input type="text" class="form-control" id="firstname" name="firstname" placeholder="John Clif" required />
						</div>
						<div class="col-lg">
							<label for="mi" class="fs-5">M.I.</label>
							<input type="text" class="form-control" id="mi" name="mi" placeholder="G" required />
						</div>
						<div class="col-lg-8">
							<label for="lastname" class="fs-5">Last Name</label>
							<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Cline" required>
						</div>
						<div class="col-lg-8">
							<label for="birthdate" class="fs-5">Birthdate</label>
							<input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="mm/dd/yy" required>
						</div>
						<div class="col-lg-8">
							<p class="col fs-5">Sex</p>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="sex" id="male">
								<label class="form-check-label" for="male">
									Male
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="sex" id="female" checked>
								<label class="form-check-label" for="female">
									Female
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="sex" id="others" checked>
								<label class="form-check-label" for="others">
									Others
								</label>
							</div>
						</div>
						<div class="col-lg-8">
							<label class="fs-5">Email</label>
							<input type="Email" class="form-control" name="email" placeholder="E-mail" required>
						</div>
						<div class="col-lg-8">
							<label class="fs-5">Password</label>
							<input type="Password" class="form-control" name="password" placeholder="******" required>
						</div>
						<div class="col-lg-8">
							<label class="fs-5">Contact Number</label>
							<input type="text" class="form-control" name="contact" placeholder="09478952364" required>
						</div>
						<div class="col-lg-8">
							<label class="fs-5">Location</label>
							<label for="inputAddress" class="form-label">Address</label>
							<input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" required>
						</div>
						<div class="col-md-6">
							<label for="inputCity" class="form-label">City</label>
							<input type="text" class="form-control" id="inputCity" name="city" placeholder="Bacolod" required>
						</div>
						<div class="col-md-2">
							<label for="inputZip" class="form-label">Zip</label>
							<input type="text" class="form-control" id="inputZip" name="zip" placeholder="6100" required>
						</div>
						<div class="col-lg-7 py-4">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
								<label class="form-check-label" for="invalidCheck">
									Agree to terms and conditions
								</label>
								<div class="invalid-feedback">
									You must agree before submitting.
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<button class="btn1 btn" type="submit">Register</button>
						</div>
						<div class="col-12 pt-4">
	                        <p class="fw-bold">Have an account? <a href="index.php" class="fw-bold link-primary text-decoration-none">Login here!</a></p>
	                    </div>
					</form>
					<?php
						$data->print();
					?>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
