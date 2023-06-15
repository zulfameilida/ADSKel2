<?php include('../includes/session.php') ?>
<?php include('templates/headerbooking.php') ?>
<?php
if (isset($_POST['add_booking'])) {
  $nama = $_POST['nama'];
  $nim = $_POST['nim'];
  $tingkat_organisasi = $_POST['tingkat_organisasi'];
  $nama_organisasi = $_POST['nama_organisasi'];
  $jumlah = $_POST['jumlah'];
  // $tgl_pinjam = $_POST['tgl_pinjam'];
  $ruang = $_POST['ruang'];
  // $waktu_pinjam = $_POST['waktu_pinjam'];
  $kategori = $_POST['kategori'];
  $keterangan = $_POST['keterangan'];

  $query = mysqli_query($conn, "select * from tb_booking where nama = $nama") or die(mysqli_error());
  $count = mysqli_num_rows($query);

  if ($count > 0) { ?>
    <script>
      alert('Data Already Exist');
    </script>
  <?php
  } else {
    mysqli_query($conn, "INSERT INTO tb_booking(Nama, nim, tingkat_organisasi, nama_organisasi, jumlah, tgl_pinjam, ruang, waktu_pinjam, kategori, keterangan) VALUES('$nama', '$nim', '$tingkat_organisasi','$nama_organisasi', '$jumlah', '$ruang', '$kategori','$keterangan')         
		") or die(mysqli_error()); ?>
    <script>
      alert('Booking Records Successfully Added');
    </script>;
    <script>
      window.location = "index.php";
    </script>
<?php
  }
}
?>
<header class="py-5">
  <div class="container px-5 pb-5">
    <div class="row gx-5 align-items-center">
      <div class="col-md-12">
        <h1 class="text-center header-custom">Booking Information </h1>
        <p class="text-center header-custom-1">Please fill up the blank fields below</p>
      </div>
      <form method="POST" action="simpan_booking.php">
        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">NIM:</label>
          <input type="text" name="nim" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Tingkat Organisasi:</label>
          <input type="text" name="tingkat_organisasi" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Nama Organisasi :</label>
          <input type="text" name="nama_organisasi" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Jumlah :</label>
          <input type="number" name="jumlah" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Tanggal Pinjam :</label>
          <input type="date" name="tgl_pinjam" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Waktu Pinjam :</label>
          <input type="time" name="waktu_pinjam" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Ruang :</label>
          <input type="text" name="ruang" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Kategori:</label>
          <input type="text" name="kategori" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Keterangan:</label>
          <input type="text" name="keterangan" class="form-control" required>
        </div>
        <div class="modal-footer justify-content-center">
          <input type="submit" class="btn btn-primary" name="simpan" value="Booking">
        </div>
        <!-- <form action="" method="POST">
        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="nim" class="form-label">NIM</label>
          <input type="text" class="form-control" name="nim">
        </div>
        <div class="mb-3">
          <label for="tingkat_organisasi" class="form-label">Tingkat Organisasi</label>
          <select name="tingkat_organisasi" class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">Departemen</option>
            <option value="2">Fakultas</option>
            <option value="3">IPB</option>
            <option value="3">Nasional</option>
            <option value="3">Internasional</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Nama Organisasi</label>
          <input type="text" name="nama_organisasi" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="form4Example5" class="form-label">Jumlah Peserta</label>
          <input type="number" name="jumlah" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="tgl_pinjam" class="form-label">Tanggal Peminjaman</label>
          <input type="date" name="tgl_pinjam" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="waktu_pinjam" class="form-label">Waktu Peminjaman</label>
          <input type="time" name="waktu_pinjam" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="ruang" class="form-label">Ruangan yang Akan Dibooking</label>
          <select class="form-select" name="ruang" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">Audit FMIPA</option>
            <option value="2">Audit FEM</option>
            <option value="3">Lab Multimedia: ILKOM</option>
            <option value="3">Gymnasium</option>
            <option value="3">Dll</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="form4Example9" class="form-label">Kategori Peminjaman</label>
          <select class="form-select" name="kategori" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">Seminar</option>
            <option value="2">Lomba Akademik</option>
            <option value="3">Rapat</option>
            <option value="3">Lomba Olahraga</option>
            <option value="3">Dll</option>
          </select>
        </div>
        <div>
          <label for="keterangan" class="form-label">Keterangan Keperluan Peminjaman</label>
          <textarea type="text" name="keterangan" class="form-control"> </textarea>
        </div>
        <div class="modal-footer justify-content-center">
          <button class="btn btn-primary" name="add_booking" id="add_booking" data-toggle="modal">Add&nbsp;Booking</button>
        </div>
      </form> -->

        <!-- Footer -->
        <?php include('templates/footer.php') ?>