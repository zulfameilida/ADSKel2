<?php

class DatabaseConnection
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    function connect()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    function close()
    {
        $this->conn->close();
    }

    function deleteRuangan($ruanganId)
    {
        $query = "DELETE FROM tb_ruangan WHERE ruangan_id = ?";
        $statement = $this->conn->prepare($query);
        $statement->bind_param("i", $ruanganId);
        $result = $statement->execute();

        if ($result) {
            echo '<script>Data ruangan berhasil dihapus.</script>';
            echo '<script>window.location = "room.php";</script>';
        } else {
            echo "Gagal menghapus data ruangan: " . $this->conn->error;
        }
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "roomieboomie";

$database = new DatabaseConnection($servername, $username, $password, $dbname);
$database->connect();

if (isset($_GET['ruangan_id'])) {
    $ruanganId = $_GET['ruangan_id'];
    $database->deleteRuangan($ruanganId);
} else {
    echo "Ruangan_id tidak ditemukan.";
}

$database->close();

?>
