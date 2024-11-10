<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";         // replace with your DB username
    $password = "";             // replace with your DB password
    $dbname = "socialclub";
    $port = 3307;               // specify your custom port here

    // Create connection with specified port
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve and sanitize form inputs
    $user = $conn->real_escape_string($_POST["username"]);
    $pass = $conn->real_escape_string($_POST["password"]);

    // Insert the data into the database
    $sql = "INSERT INTO signin (username, password) VALUES ('$user', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='text-success text-center'>Registration successful!</p>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'newhome.php';
                }, 3000);
              </script>";
    } else {
        echo "<p class='text-danger text-center'>Error: " . $conn->error . "</p>";
    }

    // Close the connection
    $conn->close();
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="img" style="background-image: url(images/bg-1.jpg);"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign up</h3>
                            </div>
                        </div>
                        <form action="" method="post" class="signin-form">
                            <div class="form-group mt-3">
                                <input type="text" name="username" class="form-control" required>
                                <label class="form-control-placeholder" for="username">Username</label>
                            </div>
                            <div class="form-group">
                                <input id="password-field" name="password" type="password" class="form-control" required>
                                <label class="form-control-placeholder" for="password">Password</label>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
                            </div>
                        </form>
                        <p class="text-center">Already a member? <a href="login.php">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
