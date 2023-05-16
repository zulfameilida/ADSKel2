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

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login Form</h2>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>