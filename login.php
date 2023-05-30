<?php
class DatabaseConnection
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $connection;

    function __construct($host, $db, $user, $password)
    {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->password = $password;
    }

    function connect()
    {
        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);

        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    function close()
    {
        mysqli_close($this->connection);
    }

    function getConnection()
    {
        return $this->connection;
    }
}

class UserAuthentication
{
    private $database;

    function __construct(DatabaseConnection $database)
    {
        $this->database = $database;
    }

    function login($username, $password)
    {
        $connection = $this->database->getConnection();
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Login successful
            echo "Login successful!";
        } else {
            // Login failed
            echo "Invalid username or password.";
        }
    }
}

// Database configuration
$host = 'localhost';
$db = 'roomieboomie';
$user = 'root';
$password = '';

// Create a database connection
$database = new DatabaseConnection($host, $db, $user, $password);
$database->connect();

// Handle the login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $auth = new UserAuthentication($database);
    $auth->login($username, $password);
}

// Close the database connection
$database->close();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Head section omitted for brevity -->
</head>
<body>
    <form method="POST" action="home.html">
        <!-- Form HTML code omitted for brevity -->
    </form>
    <footer class="footer-custom">
        <p>&copy; 2023 RoomieBoomie.com</p>
    </footer>
    <!-- Scripts omitted for brevity -->
</body>
</html>
