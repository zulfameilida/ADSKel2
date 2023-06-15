<?php

class DatabaseConnection
{
    private $conn;

    function __construct($servername, $username, $password, $dbname)
    {
        // Membuat koneksi ke database
        $this->conn = mysqli_connect($servername, $username, $password, $dbname);

        // Memeriksa koneksi
        if (!$this->conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
    }

    function insertBooking($nama, $nim, $tingkatOrganisasi, $namaOrganisasi, $jumlah, $tglPinjam, $waktuPinjam, $ruang, $kategori, $keterangan)
    {
        // Query untuk menyimpan data ke tabel tb_booking
        $sql = "INSERT INTO tb_booking (nama, nim, tingkat_organisasi, nama_organisasi, jumlah, tgl_pinjam, waktu_pinjam, ruang, kategori, keterangan)
                VALUES ('$nama', '$nim', '$tingkatOrganisasi', '$namaOrganisasi', '$jumlah', '$tglPinjam', '$waktuPinjam', '$ruang', '$kategori', '$keterangan')";

        if (mysqli_query($this->conn, $sql)) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
            return false;
        }
    }

    function close()
    {
        // Menutup koneksi database
        mysqli_close($this->conn);
    }
}

// Membuat instance dari kelas DatabaseConnection
$database = new DatabaseConnection("localhost", "root", "", "roomieboomie");

// Memeriksa apakah form telah disubmit
if (isset($_POST['simpan'])) {
    // Mengambil nilai inputan dari form
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $tingkatOrganisasi = $_POST['tingkat_organisasi'];
    $namaOrganisasi = $_POST['nama_organisasi'];
    $jumlah = $_POST['jumlah'];
    $tglPinjam = $_POST['tgl_pinjam'];
    $waktuPinjam = $_POST['waktu_pinjam'];
    $ruang = $_POST['ruang'];
    $kategori = $_POST['kategori'];
    $keterangan = $_POST['keterangan'];

    // Menyimpan data booking menggunakan metode insertBooking dari kelas DatabaseConnection
    if ($database->insertBooking($nama, $nim, $tingkatOrganisasi, $namaOrganisasi, $jumlah, $tglPinjam, $waktuPinjam, $ruang, $kategori, $keterangan)) {
        echo '<script>window.location = "booking_success.php";</script>';
        exit;
    }
}

// Menutup koneksi database
$database->close();

?>
