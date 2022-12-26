<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="stylesheet" type="text/css" href="css/bbform.css"/>

    <title>Angel Care Form </title>

  </head>
  <body>
    
    <section class="Form my-4 mx-5">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <img src="images/babyC.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7" id="Cform">
            <h1>REGISTER</h1>
            <h5>Get the latest update on our new products!</h5>
            <form>
              <div class="form-row">
                <div class="col-lg-7">
                  <h3>First Name</h3>
                  <input type="name" class="form-control" placeholder="Madelyn" required="">
                </div>
                <div class="col-md-2">
                  <h3>MI</h3>
                  <input type="MI" class="form-control" placeholder="B" required="">
                </div>
                <div class="col-lg-7">
                  <h3>Last Name</h3>
                  <input type="Last" class="form-control" placeholder="Cline" required="">
                </div>
                <div class="col-lg-7">
                  <h3>Birthdate</h3>
                  <input type="Bday" class="form-control" placeholder="mm/dd/yy" required="">
                </div>
                <div class="col-lg-7">
                  <h3>Sex</h3>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Male
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                      Female
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                      Others
                    </label>
                  </div>
                </div>
                <div class="col-lg-7">
                  <h3>Email</h3>
                  <input type="Email" class="form-control" placeholder="E-mail" required="">
                </div>
                <div class="col-lg-7">
                  <h3>Password</h3>
                  <input type="Password" class="form-control" placeholder="******" required="">
                </div>
                 <div class="col-lg-7">
                  <h3>Contact Number</h3>
                  <input type="ContactNumber" class="form-control" placeholder="09478952364" required="">
                </div>
                <div class="col-lg-7">
                  <h3>Location</h3>
                  <label for="inputAddress" class="form-label">Address</label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" required="">
                </div>
                <div class="col-md-6">
                  <label for="inputCity" class="form-label">City</label>
                  <input type="text" class="form-control" id="inputCity" placeholder="Bacolod" required="">
                </div>
                <div class="col-md-2">
                  <label for="inputZip" class="form-label">Zip</label>
                  <input type="text" class="form-control" id="inputZip" placeholder="6100" required="">
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
                    <button class="btn1" type="submit">Register</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>