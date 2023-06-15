<?php
// Membuat koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "roomieboomie";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memeriksa apakah form telah disubmit
if (isset($_POST['simpan'])) {
    // Mengambil nilai inputan dari form
    // $email = $_POST['email'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $tingkat_organisasi = $_POST['tingkat_organisasi'];
    $nama_organisasi = $_POST['nama_organisasi'];
    $jumlah = $_POST['jumlah'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $waktu_pinjam = $_POST['waktu_pinjam'];
    $ruang = $_POST['ruang'];
    $kategori = $_POST['kategori'];
    $keterangan = $_POST['keterangan'];

    // Query untuk menyimpan data ke tabel tb_booking
    $sql = "INSERT INTO tb_booking (nama, nim, tingkat_organisasi, nama_organisasi, jumlah, tgl_pinjam, waktu_pinjam, ruang, kategori, keterangan)
            VALUES ( '$nama', '$nim', '$tingkat_organisasi', '$nama_organisasi', '$jumlah', '$tgl_pinjam', '$waktu_pinjam', '$ruang', '$kategori', '$keterangan')";

    if (mysqli_query($conn, $sql)) {
        // echo '<script>alert("Data berhasil disimpan.");</script>';
        echo '<script>window.location = "booking_success.php";</script>';
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Menutup koneksi database
mysqli_close($conn);
