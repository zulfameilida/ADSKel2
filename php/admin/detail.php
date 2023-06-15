<?php

class DatabaseConnection {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Koneksi ke database gagal: " . $this->connection->connect_error);
        }
    }

    function close() {
        $this->connection->close();
    }

    function getConnection() {
        return $this->connection;
    }
}

class Ruangan {
    private $database;

    function __construct(DatabaseConnection $database) {
        $this->database = $database;
    }

    function getRuanganById($ruanganId) {
        $connection = $this->database->getConnection();
        $ruanganId = $connection->real_escape_string($ruanganId);

        $query = "SELECT * FROM tb_ruangan WHERE ruangan_id = $ruanganId";
        $result = $connection->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return null;
        }
    }
}

// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "roomieboomie";

// Create a database connection
$databaseConnection = new DatabaseConnection($host, $username, $password, $database);
$databaseConnection->connect();

// Create a Ruangan object
$ruangan = new Ruangan($databaseConnection);

// Check if there is an "id" parameter in the URL
if (isset($_GET['id'])) {
    $ruanganId = $_GET['id'];

    // Get the ruangan data from the database
    $ruanganData = $ruangan->getRuanganById($ruanganId);

    if ($ruanganData) {
        $namaRuangan = $ruanganData["nama_ruangan"];
        $keterangan = $ruanganData["keterangan"];
        $gambar = $ruanganData["gambar"];
        $lokasi = $ruanganData["lokasi"];

        // Rest of the code...
        ?>
        <!-- Header -->
        <header class="py-5">
            <!-- Rest of the HTML code -->
        </header>

        <!-- New Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Rest of the HTML code -->
        </nav>
        <div class="container">
            <h1 class="common-class-room" id="section1"><?php echo $namaRuangan; ?></h1>
            <div>
                <!-- Rest of the HTML code -->
            </div>
        </div>

        <section class="container">
            <div class="col-md-6">
                <ul class="overview-list">
                    <li>
                        <p><span style="font-weight: 600; font-size: 20px; color: #181818;">Overview</span></p>
                        <p><span style="font-weight: 400; font-size: 16px; color: #4F4F4F;"><?php echo $keterangan; ?>
                            </span></p>
                        <p style="margin-top:  124px;"><span class="over" style="font-weight: 550;">Top Facilites</span></p>
                        <div class="row">
                            <div class="px-3">
                                <div class="col-md-12">
                                    <div>
                                        <!-- Rest of the HTML code -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <?php
    } else {
        echo "Data ruangan tidak ditemukan.";
    }
} else {
    echo "Parameter id tidak ditemukan.";
}

$databaseConnection->close();
// Cek apakah query berhasil dieksekusi
?>

<?php include('templates/footer.php') ?>
