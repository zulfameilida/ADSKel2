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
          <!-- <input type="text" name="tingkat_organisasi" class="form-control" required> -->
          <select name="tingkat_organisasi" class="form-select" aria-label="Default select example" required>
            <option selected>Open this select menu</option>
            <option value="Departemen">Departemen</option>
            <option value="Fakultas">Fakultas</option>
            <option value="IPB">IPB</option>
            <option value="Nasional">Nasional</option>
            <option value="Internasional">Internasional</option>
          </select>
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
          <select class="form-select" name="ruang" class="form-control">
            <option selected>Open this select menu</option>
            <option value="CCR 2.14">CCR 2.14</option>
            <option value="Lab Komputer 1 ILKOM">Lab Komputer 1 ILKOM</option>
            <option value="Auditorium FMIPA">Auditorium FMIPA</option>
            <option value="Auditorium FEM">Auditorium FEM</option>
            <option value="Gymnasium">Gymnasium</option>
            <!-- <select class="form-select" aria-label="Default select example">
            
          </select> -->
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Kategori:</label>
          <!-- <input type="text" name="kategori" class="form-control"> -->
          <select class="form-select" name="kategori" aria-label="Default select example" required>
            <option selected>Open this select menu</option>
            <option value="Seminar">Seminar</option>
            <option value="Lomba Akademik">Lomba Akademik</option>
            <option value="Rapat">Rapat</option>
            <option value="Lomba Olahraga">Lomba Olahraga</option>
            <option value="Dll">Dll</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Keterangan:</label>
          <input type="text" name="keterangan" class="form-control" required>
        </div>
        <div class="modal-footer justify-content-center">
          <input type="submit" class="btn btn-primary" name="simpan" value="Booking">
        </div>

        <!-- Footer -->
        <?php include('templates/footer.php') ?>