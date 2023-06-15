<?php include('../includes/session.php') ?>
<?php include('templates/headerbooking.php') ?>
<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "roomieboomie";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// Cek apakah query berhasil dieksekusi
?>
<!-- Header-->
<header class="py-5">
    <div class="container px-2 pb-5">
        <div class="row gx-3 align-items-center">
            <div class="col-md-12">
                <h1 class="text-center header-custom">Room Information </h1>
                <p class="text-center header-custom-1">Please Choose</p>
            </div>
            <ul class="room-list">
                <?php
                //Memeriksa koneksi
                if (!$conn) {
                    die("Koneksi gagal: " . mysqli_connect_error());
                }

                // Query untuk mendapatkan data ruangan
                $query = mysqli_query($conn, "SELECT * FROM tb_ruangan");

                // Cek apakah ada data ruang
                if (mysqli_num_rows($query) > 0) {
                    // Looping untuk menampilkan setiap data ruangan
                    while ($row = mysqli_fetch_assoc($query)) {
                        $ruangan_Id = $row['ruangan_id'];
                        $namaRuangan = $row['nama_ruangan'];
                        $tersedia = $row['tersedia'];
                        $keterangan = $row['keterangan'];
                        $gambar = $row['gambar'];
                ?>

                        <li class="room-item">
                            <img src="<?php echo $gambar; ?>" width="300px" alt="<?php echo $namaRuangan; ?>" class="rounded">
                            <h3 class="header-custom-5"><?php echo $namaRuangan; ?></h3>
                            <p><span class="availability">Availability: <?php echo $tersedia; ?></span></p>
                            <p><span class="setelah-room"><?php echo substr($keterangan, 0, 50) . '...'; ?></span></p>
                            <a class="btn btn-primary px-5 py-2 fw-light btn-detail" href="detail.php?id=<?php echo $ruangan_Id; ?>">Detail</a>
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> -->

                        </li>
                <?php
                    }
                } else {
                    echo "Tidak ada data ruangan yang tersedia.";
                }
                ?>
            </ul>
        </div>
    </div>
    </div>
</header>
<!-- Modal Tambah -->
<!-- Button untuk membuka modal -->
<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Formulir Ruangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="simpan_ruangan.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                        <input type="text" name="nama_ruangan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="tersedia" class="form-label">Tersedia</label>
                        <input type="text" name="tersedia" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<!-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Ruangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ruangan_id" value="<?php echo $ruangan_Id; ?>">
                    <div class="mb-3">
                        <label for="namaRuangan" class="form-label">Nama Ruangan</label>
                        <input type="text" class="form-control" id="namaRuangan" name="nama_ruangan" value="<?php echo $namaRuangan; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tersedia" class="form-label">Tersedia</label>
                        <input type="text" class="form-control" id="tersedia" name="tersedia" value="<?php echo $tersedia; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required><?php echo $keterangan; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div> -->
<!-- Footer -->
<?php include('templates/footer.php') ?>