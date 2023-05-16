<?php

include 'connect.php';
    if(isset($_POST['submit']))
    {
        $name = mysqli_real_escape_string($koneksi, $_POST['form4Example1']);
        $nim = mysqli_real_escape_string($koneksi, $_POST['form4Example2']);
        $tingkat = mysqli_real_escape_string($koneksi, $_POST['form4Example3']);
        $org_name = mysqli_real_escape_string($koneksi, $_POST['form4Example4']);
        $org_person = mysqli_real_escape_string($koneksi, $_POST['form4Example5']);
        $borrow_date = mysqli_real_escape_string($koneksi, $_POST['form4Example6']);
        $borrow_time = mysqli_real_escape_string($koneksi, $_POST['form4Example7']);
        $room = mysqli_real_escape_string($koneksi, $_POST['form4Example8']);
        $borrow_cat = mysqli_real_escape_string($koneksi, $_POST['form4Example9']);
        $keterangan = mysqli_real_escape_string($koneksi, $_POST['form4Example10']);

    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> RoomieBoomie.com </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link rel="icon" href="/asset/Logo.png" type="image/x-icon">
  </head>

  <body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="/asset/Logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
          <span style="font-weight: bold;">RoomieBoomie</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="home.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="booking.html">Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="room.html">Room</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
          </ul>
          
        </div>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link border border-2 rounded" href="#">Sign Out</a>
          </li>
        </ul>
      </div>
    </nav>
    <header class="py-5">
        <div class="container px-5 pb-5">
          <div class="row gx-5 align-items-center">
            <div class="col-md-12">
                <h1 class="text-center header-custom">Booking Information </h1>
                <p class="text-center header-custom-1">Please fill up the blank fields below</p>
            </div>
    <form action="booking-success.html" method="POST">
        <div class="mb-3">
            <label for="form4Example1" class="form-label">Nama Lengkap</label>
            <input type="text" id="form4Example1" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="form4Example2" class="form-label">NIM</label>
          <input type="text" class="form-control" id="form4Example2">
        </div>
        <div class="mb-3">
          <label for="form4Example3" class="form-label">Tingkat Organisasi</label>
          <select class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">Departemen</option>
            <option value="2">Fakultas</option>
            <option value="3">IPB</option>
            <option value="3">Nasional</option>
            <option value="3">Internasional</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="form4Example4" class="form-label">Nama Organisasi</label>
          <input type="text" id="form4Example4" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="form4Example5" class="form-label">Jumlah Peserta</label>
          <input type="number" id="form4Example5" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="form4Example6" class="form-label">Tanggal Peminjaman</label>
          <input type="date" id="form4Example6" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="form4Example7" class="form-label">Waktu Peminjaman</label>
          <input type="time" id="form4Example7" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="form4Example8" class="form-label">Ruangan yang Akan Dibooking</label>
          <select class="form-select" aria-label="Default select example">
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
          <select class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">Seminar</option>
            <option value="2">Lomba Akademik</option>
            <option value="3">Rapat</option>
            <option value="3">Lomba Olahraga</option>
            <option value="3">Dll</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="form4Example10" class="form-label">Keterangan Keperluan Peminjaman</label>
          <textarea type="text" id="form4Example10" class="form-control"> </textarea>
        </div>
        <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg px-5 py-3 fs-6 fw-light button-custom">Submit</button>
      </div>
      </form>
   
    <!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted border-top">
  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="custom-text-3">Booking<span style="color : #284B63;">room!</span>
          </h6>
          <p class="custom-text-4">
            We RoomieBoomie your awesome booking
            service instantly and easly.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="custom-text-5">
            Develop
          </h6>
          <p class="custom-text-6">Daffa Fakhi</p>
          <p class="custom-text-6">Maya Amelia</p>
          <p class="custom-text-6">Salma Athoetani</p>
          <p class="custom-text-6">Zulfa Meilida</p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="custom-text-5">
            Reach Us
          </h6>
          <p>
            <a href="#!" class="custom-text-6">instagram.com/rombom</a>
          </p>
          <p>
            <a href="#!" class="custom-text-6">twitter.com/rombom.com</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="custom-text-5">Contact Us</h6>
          <p class="custom-text-6"> roomieboomie@gmail.com </p>
          <p class="custom-text-6"> 021-2208-1996</p>
          <p class="custom-text-6"> Dramaga, Bogor</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4 custom-text-4">
    Copyright 2023 • All rights reserved • RoomieBoomie
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>