<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> RoomieBoomie.com </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="../style/style.css" rel="stylesheet">
    <link rel="icon" href="../asset/Logo.png" type="image/x-icon">
</head>

<body style="height: 2000px">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="../asset/Logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                <span style="font-weight: bold;">RoomieBoomie</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="booking.php">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_booking.php">Data Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="room.php">Room</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>

            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link border border-2 rounded" href="../index.php">Sign Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Header-->
    <!-- Header-->
    <header class="py-5">
        <div class="container px-5 pb-5">
            <div class="row gx-5 align-items-center">
                <div class="col-md-6">
                    <div class="fs-4 fw-bold text-black mt-3">Welcome to</div>
                    <img src="../asset/home.png" alt="Logo" width="523" style="margin-left: -25px;">
                    <p>Don't let venue hunting stress you out.
                        RoomieBoomie.com has got your back, and we're not lion about it!</p>
                </div>
                <div class="col-md-6">
                    <img src="../asset/banner.png" alt="Image" class="float-end">
                </div>
            </div>
            <form method="POST" action="header.php">
                <div class="text-center py-4">
                    <a class="btn btn-primary btn-lg px-5 py-3 fs-6 fw-light" href="booking.php">Booking now!</a>
                </div>
            </form>
        </div>
        </div>
    </header>