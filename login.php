<?php
// Database connection configuration
$host = 'localhost';      // MySQL host
$db = 'roomieboomie';    // Database name
$user = 'root';  // Database username
$password = '';  // Database password

// Establishing a connection to the MySQL database
$koneksi = mysqli_connect("localhost","root","","roomieboomie");

// Check if the connection was successful
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle the login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the username and password match a record in the database
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    // Check if the query execution was successful
    if ($result && mysqli_num_rows($result) > 0) {
        // Login successful
        echo "Login successful!";
    } else {
        // Login failed
        echo "Invalid username or password.";
    }
}

// Close the database connection
mysqli_close($koneksi);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> RoomieBoomie.com </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link rel="icon" href="asset/Logo.png" type="image/x-icon">
  </head>

<body>
    <form method="POST" action="home.html">
    <div class="box">
        <div class="custom-container">
            <div class="top-header">
                <header class="custom-header-4"> Sign In </header>
            </div>
            <div class="input-field">
                <input type="text" class="input" placeholder="Username IPB" required>
            </div>
            <div class="input-field">
                <input type="password" class="input" placeholder="Password" required>
            </div>
            <div class="input-field">
                <input type="submit" class="submit" value="Sign In">
            </div>
        </div>
        
    </div>
    <footer class="footer-custom">
        <p>&copy; 2023 RoomieBoomie.com</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>

