<?php
include('../includes/session.php');
include('templates/headerbooking.php');

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

    function getRuanganList()
    {
        $query = "SELECT * FROM tb_ruangan";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    function insertRuangan($namaRuangan, $tersedia, $keterangan, $lokasi, $gambar)
    {
        $query = "INSERT INTO tb_ruangan (nama_ruangan, tersedia, keterangan, lokasi, gambar) VALUES (?, ?, ?, ?, ?)";
        $statement = $this->conn->prepare($query);
        $statement->bind_param("sssss", $namaRuangan, $tersedia, $keterangan, $lokasi, $gambar);
        $result = $statement->execute();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function deleteRuangan($ruanganId)
    {
        $query = "DELETE FROM tb_ruangan WHERE ruangan_id = ?";
        $statement = $this->conn->prepare($query);
        $statement->bind_param("i", $ruanganId);
        $result = $statement->execute();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "roomieboomie";

$database = new DatabaseConnection($servername, $username, $password, $dbname);
$database->connect();

// Header
?>
<header class="py-5">
    <div class="container px-2 pb-5">
        <div class="row gx-3 align-items-center">
            <div class="col-md-12">
                <h1 class="text-center header-custom">Room Information </h1>
                <p class="text-center header-custom-1">Please Choose</p>
            </div>
            <ul class="room-list">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</button>
                <?php
                $ruanganList = $database->getRuanganList();

                if (!empty($ruanganList)) {
                    foreach ($ruanganList as $ruangan) {
                        $ruanganId = $ruangan['ruangan_id'];
                        $namaRuangan = $ruangan['nama_ruangan'];
                        $tersedia = $ruangan['tersedia'];
                        $keterangan = $ruangan['keterangan'];
                        $lokasi = $ruangan['lokasi'];
                        $gambar = $ruangan['gambar'];
                ?>

                        <li class="room-item">
                            <img src="<?php echo $gambar; ?>" width="300px" alt="<?php echo $namaRuangan; ?>" class="rounded">
                            <h3 class="header-custom-5"><?php echo $namaRuangan; ?></h3>
                            <p><span class="availability">Availability: <?php echo $tersedia; ?></span></p>
                            <p><span class="setelah-room"><?php echo substr($keterangan, 0, 50) . '...'; ?></span></p>
                            <a class="btn btn-primary px-5 py-2 fw-light btn-detail" href="detail.php?id=<?php echo $ruanganId; ?>">Detail</a>
                            <a class="btn btn-secondary px-5 py-2 fw-light btn-edit" href="edit_room.php?id=<?php echo $ruanganId; ?>">Edit</a>
                            <a class="btn btn-danger px-5 py-2 fw-light btn-delete" href="hapus_room.php?ruangan_id=<?php echo $ruanganId; ?>">Hapus</a>
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
</header>
<!-- Modal Tambah -->
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
                        <label for="lokasi" class="form-label">lokasi</label>
                        <input type="text" name="lokasi" class="form-control" required>
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

<?php
// Footer
include('templates/footer.php');
$database->close();
?>
