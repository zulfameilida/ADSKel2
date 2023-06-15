<?php
// Memeriksa apakah ada permintaan POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah semua input telah diisi
    if (isset($_POST["ruangan_id"]) && isset($_POST["nama_ruangan"]) && isset($_POST["tersedia"]) && isset($_POST["keterangan"])) {
        // Menangkap nilai-nilai yang dikirim melalui form
        $ruanganId = $_POST["ruangan_id"];
        $namaRuangan = $_POST["nama_ruangan"];
        $tersedia = $_POST["tersedia"];
        $keterangan = $_POST["keterangan"];

        // Memeriksa apakah ada file gambar yang diunggah
        if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == UPLOAD_ERR_OK) {
            // Mendapatkan informasi file gambar yang diunggah
            $gambarName = $_FILES["gambar"]["name"];
            $gambarTmpName = $_FILES["gambar"]["tmp_name"];
            $gambarSize = $_FILES["gambar"]["size"];
            $gambarType = $_FILES["gambar"]["type"];

            // Memeriksa jenis file gambar yang diunggah
            $allowedTypes = array("image/jpeg", "image/jpg", "image/png");
            if (in_array($gambarType, $allowedTypes)) {
                // Menentukan direktori tujuan untuk menyimpan gambar
                $uploadDir = "../asset/upload/";

                // Menghasilkan nama file yang unik
                $gambarPath = $uploadDir . uniqid() . "_" . $gambarName;

                // Memindahkan file gambar ke direktori tujuan
                if (move_uploaded_file($gambarTmpName, $gambarPath)) {
                    // Update informasi ruangan dalam database, termasuk gambar yang baru
                    // Sesuaikan dengan pengaturan server dan query database yang digunakan
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "roomieboomie";

                    // Buat koneksi ke database
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Periksa koneksi
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Lakukan query untuk memperbarui data ruangan
                    $sql = "UPDATE tb_ruangan SET nama_ruangan = '$namaRuangan', tersedia = '$tersedia', keterangan = '$keterangan', gambar = '$gambarPath' WHERE ruangan_id = $ruanganId";

                    if ($conn->query($sql) === TRUE) {
                        // Data berhasil diperbarui
                        echo "<script>alert('Data berhasil diperbarui.');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                        exit;
                    } else {
                        // Gagal memperbarui data
                        echo "<script>alert('Terjadi kesalahan saat memperbarui data: " . $conn->error . "');</script>";
                        echo "<script>window.location.href = 'room.php?ruangan_id=$ruanganId';</script>";
                        exit;
                    }

                    // Tutup koneksi ke database
                    // $conn->close();
                } else {
                    // Gagal mengunggah gambar
                    echo "<script>alert('Gagal mengunggah gambar.');</script>";
                    echo "<script>window.location.href = 'room.php?ruangan_id=$ruanganId';</script>";
                    exit;
                }
            } else {
                // Jenis file gambar tidak diizinkan
                echo "<script>alert('Jenis file gambar tidak diizinkan.');</script>";
                echo "<script>window.location.href = 'room.php?ruangan_id=$ruanganId';</script>";
                exit;
            }
        } else {
            // Tidak ada file gambar yang diunggah, hanya memperbarui informasi ruangan
            // Sesuaikan dengan pengaturan server dan query database yang digunakan
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "roomieboomie";

            // Buat koneksi ke database
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Lakukan query untuk memperbarui data ruangan
            $sql = "UPDATE tb_ruangan SET nama_ruangan = '$namaRuangan', tersedia = '$tersedia', keterangan = '$keterangan' WHERE ruangan_id = $ruanganId";

            if ($conn->query($sql) === TRUE) {
                // Data berhasil diperbarui
                echo "<script>alert('Data berhasil diperbarui.');</script>";
                echo "<script>window.location.href = 'index.php';</script>";
                exit;
            } else {
                // Gagal memperbarui data
                echo "<script>alert('Terjadi kesalahan saat memperbarui data: " . $conn->error . "');</script>";
                echo "<script>window.location.href = 'room.php?ruangan_id=$ruanganId';</script>";
                exit;
            }

            // Tutup koneksi ke database
            $conn->close();
        }
    } else {
        // Input tidak lengkap
        echo "<script>alert('Harap lengkapi semua input.');</script>";
        echo "<script>window.location.href = 'room.php?ruangan_id=$ruanganId';</script>";
        exit;
    }
}
