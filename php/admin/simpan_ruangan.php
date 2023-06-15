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

    function insertRuangan($namaRuangan, $tersedia, $keterangan, $lokasi, $gambar)
    {
        // Memeriksa apakah file gambar berhasil diupload
        if ($gambar['error'] === UPLOAD_ERR_OK) {
            $gambarName = $gambar['name'];
            $gambarTmp = $gambar['tmp_name'];
            $gambarPath = '../asset/upload/' . $gambarName; // Ganti dengan path direktori tujuan penyimpanan gambar

            // Memindahkan file gambar dari temporary location ke path direktori tujuan
            if (move_uploaded_file($gambarTmp, $gambarPath)) {
                // Menyimpan data ke dalam tabel tb_ruangan
                $query = "INSERT INTO tb_ruangan (nama_ruangan, tersedia, keterangan, lokasi, gambar) VALUES ('$namaRuangan', '$tersedia', '$keterangan', '$lokasi', '$gambarPath')";

                if (mysqli_query($this->conn, $query)) {
                    return true;
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($this->conn);
                }
            } else {
                echo "Gagal mengupload gambar.";
            }
        } else {
            echo "Error dalam mengupload gambar: " . $gambar['error'];
        }

        return false;
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
if (isset($_POST['submit'])) {
    $namaRuangan = $_POST['nama_ruangan'];
    $tersedia = $_POST['tersedia'];
    $keterangan = $_POST['keterangan'];
    $lokasi = $_POST['lokasi'];
    $gambar = $_FILES['gambar'];

    // Menyimpan data ruangan menggunakan metode insertRuangan dari kelas DatabaseConnection
    if ($database->insertRuangan($namaRuangan, $tersedia, $keterangan, $lokasi, $gambar)) {
        // Data berhasil disimpan, tambahkan kode JavaScript untuk memberikan notifikasi
        echo '<script>alert("Data berhasil disimpan");</script>';
        echo '<script>window.location = "index.php";</script>';
        exit;
    }
}

// Menutup koneksi database
$database->close();

?>
