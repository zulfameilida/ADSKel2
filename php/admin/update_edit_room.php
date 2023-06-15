<?php

class DatabaseConnection
{
    private $conn;

    function __construct($host, $username, $password, $database)
    {
        // Membuat koneksi ke database
        $this->conn = new mysqli($host, $username, $password, $database);

        // Memeriksa koneksi
        if ($this->conn->connect_error) {
            die("Koneksi ke database gagal: " . $this->conn->connect_error);
        }
    }

    function updateRuangan($ruanganId, $namaRuangan, $tersedia, $keterangan, $lokasi)
    {
        // Update data ruangan dalam database
        $query = "UPDATE tb_ruangan SET nama_ruangan = '$namaRuangan', tersedia = '$tersedia', keterangan = '$keterangan', lokasi = '$lokasi' WHERE ruangan_id = $ruanganId";
        if ($this->conn->query($query) === TRUE) {
            return true;
        } else {
            echo "Terjadi kesalahan saat memperbarui data ruangan: " . $this->conn->error;
        }

        return false;
    }

    function close()
    {
        // Menutup koneksi database
        $this->conn->close();
    }
}

// Membuat instance dari kelas DatabaseConnection
$database = new DatabaseConnection("localhost", "root", "", "roomieboomie");

// Cek apakah ada data yang dikirimkan melalui formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data yang dikirimkan melalui formulir
    $ruanganId = $_POST["ruangan_id"];
    $namaRuangan = $_POST["nama_ruangan"];
    $tersedia = $_POST["tersedia"];
    $keterangan = $_POST["keterangan"];
    $lokasi = $_POST["lokasi"];

    // Update data ruangan menggunakan metode updateRuangan dari kelas DatabaseConnection
    if ($database->updateRuangan($ruanganId, $namaRuangan, $tersedia, $keterangan, $lokasi)) {
        echo "<script>alert('Data berhasil diperbarui.');</script>";
        echo "<script>window.location.href = 'room.php';</script>";
        exit;
    }
} else {
    echo "Tidak ada data yang dikirimkan.";
}

// Menutup koneksi database
$database->close();

?>
