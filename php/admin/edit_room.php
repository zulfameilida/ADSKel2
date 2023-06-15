<?php
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

    function getRuanganById($ruanganId)
    {
        $query = "SELECT * FROM tb_ruangan WHERE ruangan_id = ?";
        $statement = $this->conn->prepare($query);
        $statement->bind_param("i", $ruanganId);
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function updateRuangan($ruanganId, $namaRuangan, $tersedia, $keterangan, $lokasi)
    {
        $query = "UPDATE tb_ruangan SET nama_ruangan = ?, tersedia = ?, keterangan = ?, lokasi = ? WHERE ruangan_id = ?";
        $statement = $this->conn->prepare($query);
        $statement->bind_param("ssssi", $namaRuangan, $tersedia, $keterangan, $lokasi, $ruanganId);
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

if (isset($_GET['id'])) {
    $ruanganId = $_GET['id'];
    $ruangan = $database->getRuanganById($ruanganId);

    if ($ruangan) {
        // Form edit ruangan
        ?>
        <header class="py-5">
            <div class="container px-5 pb-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-md-12">
                        <h1 class="text-center header-custom">Edit Ruangan </h1>
                        <!-- <p class="text-center header-custom-1">Please fill up the blank fields below</p> -->
                    </div>
                    <form method="POST" action="update_edit_room.php">
                        <div class="mb-3">
                            <!-- <label class="form-label">Nama Ruangan</label> -->
                            <input type="hidden" name="ruangan_id" value="<?php echo $ruangan['ruangan_id']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Ruangan</label>
                            <input type="text" name="nama_ruangan" value="<?php echo $ruangan['nama_ruangan']; ?>" class="form-control">
                        </div>
                        <div>

                            <label class="form-label">Tersedia</label>
                            <input type="text" name="tersedia" value="<?php echo $ruangan['tersedia']; ?>" class="form-control">
                        </div>
                        <div>

                            <label class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" value="<?php echo $ruangan['keterangan']; ?>" class="form-control">
                        </div>
                        <div>

                            <label class="form-label">lokasi</label>
                            <input type="text" name="lokasi" value="<?php echo $ruangan['lokasi']; ?>" class="form-control">
                        </div>
                        <!-- <div>
                            <label for="gambar">Gambar:</label>
                            <input type="file" name="gambar" accept="image/*">
                        </div> -->
                </div>
                <!-- <input type="submit" value="Simpan"> -->
                <input class="btn btn-primary px-5 py-2 fw-light btn-success" type="submit" value="Simpan"></input>
                </form>
        <?php
    } else {
        echo "Data ruangan tidak ditemukan.";
    }
} else {
    echo "ruangan_id tidak ditemukan.";
}

$database->close();

// Footer
include('templates/footer.php');
?>
