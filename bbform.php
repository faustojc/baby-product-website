<?php
use Composer\Bin\data\Database;

require_once realpath("vendor/autoload.php");

$data = new Database();
$data->connect();

if (isset($_POST['submit'])) {
	// Assign the form data into the variables
    $USERNAME = $_POST['username'];
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

    $data->prepareInsert();
	// Set the variables into the Database values
    $data->set($USERNAME, $FIRSTNAME, $MI, $LASTNAME, $SEX, $BIRTHDATE, $EMAIL, $PASSWORD, $CONTACT_NUMBER, $ADDRESS, $CITY, $ZIP);
	$data->sql->execute();

    $user = $data->sql->fetch();

    if (!empty($user)) {
        // Close connection
        $data->sql->close();
        $data->conn->close();

        header("Location: index.php");
        exit;
    }
}
else {
	echo mysqli_error($data->conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />

	<!-- Custom styles-->
	<link rel="stylesheet" href="css/bbform.css" />

	<title>Angel Care Registration Form</title>
</head>

<body data-bs-theme="dark">
	<section class="d-flex align-items-center flex-column vh-100">
		<div class="container">
			<div class="row g-0 w-75 mt-lg-5 mx-auto register-card">
				<div class="col-lg-5">
					<img src="images/babyC.png" class="img-fluid h-100" alt="">
				</div>
				<div class="bg-body col-lg-7 p-4">
					<h1 class="fw-bold text-primary">REGISTER</h1>
					<h5 class="fw-semibold" style="color: var(--bs-code-color);">Get the latest update on our new products!</h5>
					
					<!-- Register form -->
					<form action="bbform.php" method="POST" class="row g-3">
						<div class="col-lg-8">
							<label for="firstname" class="fs-5">First name</label>
							<input type="text" class="form-control" id="firstname" name="firstname" style="text-transform: capitalize;" placeholder="John Clif" required />
						</div>
						<div class="col-lg">
							<label for="mi" class="fs-5">M.I.</label>
							<input type="text" class="form-control" id="mi" name="mi" placeholder="G" maxlength="1" style="text-transform: uppercase;" required />
						</div>
						<div class="col-lg-8">
							<label for="lastname" class="fs-5">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" style="text-transform: capitalize;" placeholder="Cline" required />
						</div>
						<div class="col-lg-8">
							<label for="birthdate" class="fs-5">Birthdate</label>
							<input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="mm/dd/yy" required>
						</div>
						<div class="col-lg-8">
							<p class="col fs-5">Sex</p>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="sex" id="male" value="Male">
								<label class="form-check-label" for="male">
									Male
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="sex" id="female" value="Female" checked>
								<label class="form-check-label" for="female">
									Female
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="sex" id="others" value="Others" checked>
								<label class="form-check-label" for="others">
									Others
								</label>
							</div>
						</div>
                        <div class="col-lg-8">
                            <label class="fs-5">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
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
							<input type="text" class="form-control" name="contact" placeholder="09478952364" id="contact" pattern="/d*" required>
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
							<button class="btn1 btn" id="btnSubmit" name="submit_btn" type="submit">Register</button>
						</div>
						<div class="col-12 pt-4">
	                        <p class="fw-bold">Have an account? <a href="index.php" class="fw-bold link-primary text-decoration-none">Login here!</a></p>
	                    </div>
					</form>
				</div>
			</div>
		</div>
	</section>

    <script>
        let inputField = document.getElementById("contact");

        inputField.addEventListener('keypress', function (event) {
            let key = event.key;

            if (key !== "Backspace") {
                let value = parseInt(key);

                if (isNaN(value)) {
                    event.preventDefault();
                }
            }
        });
    </script>
    <script defer src="js/main.js"></script>
    <script defer src="js/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>
