<?php
$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';

    $username  = $_POST["username"];
    $password  = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $age       = $_POST["age"];

    if ($password === $cpassword) {
        $sql = "INSERT INTO `users` (`username`, `password`, `age`, `dt`)
                VALUES ('$username', '$password', '$age', current_timestamp());";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $showAlert = true;
        } else {
            $showError = "Database error: " . mysqli_error($conn);
        }
    } else {
        $showError = "Passwords do not match.";
    }
}
?>


<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SingUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <<?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your Account is now createdand you can login
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div> ';
  }

  if($showError){
  echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error</strong> '.$showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div> ';
}
  ?>

    <div class="container my-4">
      <h1 class="text-center">Signup to our website</h1>
          <form action="/Login_page/Signup.php" method="post">
      <div class="from-group col-md-6">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

      </div>
      <div class="from-group col-md-6">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="from-group col-md-6">
        <label for="age" class="form-label">Age</label>
        <input type="number" class="form-control" id="age" name="age">

      </div>

      <div class="from-group col-md-6">
        <label for="cpassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword">
        <div id="emailHelp" class="form-text">Make Sure to tupe the same password.</div>
      </div>

      <button type="submit" class="btn btn-primary from-group col-md-6">SignUp</button>
    </form>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>

  </body>
</html>








<!-- me singup kar rha hu values daal rh hu database is under values aarhi hai per insert query ke ander kuch bhi value aarhi hai  -->
