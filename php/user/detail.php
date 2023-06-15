<?php include('../includes/session.php') ?>
<?php include('templates/headerbooking.php') ?>
<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "roomieboomie";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Cek apakah ada parameter id yang diterima dari URL
if (isset($_GET['id'])) {
    $ruangan_id = $_GET['id'];

    // Cek apakah data ruangan dengan ruangan_id tersebut ada di database
    $query = "SELECT * FROM tb_ruangan WHERE ruangan_id = $ruangan_id";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nama_ruangan = $row["nama_ruangan"];
        // $tersedia = $row["tersedia"];
        $keterangan = $row["keterangan"];
        $gambar = $row["gambar"];
        $lokasi = $row["lokasi"];
?>
        <!-- Header-->
        <header class="py-5">
            <div class="container px-5 pb-5 ">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-md-6">
                        <img src="<?php echo $gambar; ?>" alt="Logo" width="808" height="452">
                    </div>
                </div>
        </header>

        <!-- New Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#section1">Overview</a>
                        <a class="nav-link" aria-current="page" href="#section1" hidden><?php echo $ruangan_id; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Booked Info</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <h1 class="common-class-room" id="section1"><?php echo $nama_ruangan; ?></h1>
            <div>
                <img src="../asset/location.png" alt="Logo" class="custom-logo">
                <span class="new-text"><?php echo $lokasi; ?></span>
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
                                        <img src="../asset/wifi.png" alt="Logo" style="width:22px; height:22px;">
                                        <span style="font-size: 14px; font-weight: 400;">Free wifi</span>
                                        <img src="../asset/proyektor.png" alt="Logo" style="width:22px; height:22px; margin-left: 150px;">
                                        <span style="font-size: 14px; font-weight: 400;">Proyektor</span>
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

$conn->close();
// Cek apakah query berhasil dieksekusi
?>


<?php include('templates/footer.php') ?>