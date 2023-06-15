<?php include('../includes/session.php') ?>
<?php include('templates/headerbooking.php') ?>
<header class="py-5">
    <div class="container px-5 pb-5">
        <div class="row gx-5 align-items-center">
            <div class="col-md-12">
                <h1 class="text-center header-custom">Booking Information </h1>
                <p class="text-center header-custom-1">Please fill up the blank fields below</p>
            </div>
            <div class="col-md-4 text-center">
            </div>
            <div class="col-md-4 text-center">
                <div class="rectangle-3">
                    <img src="../asset/success.png" alt="success" class="icon-custom">
                    <h3 class="header-custom-3">Booking Successful</h3>
                    <p class="custom-text-4">Congratulations your reservation has been made.</p>
                    <div class="text-center py-4">
                        <a class="btn btn-primary btn-lg px-5 py-3 fs-6 fw-light" href="index.php">back to homepage</a>
                    </div>
                </div>
            </div>
</header>

<?php include('templates/footer.php') ?>