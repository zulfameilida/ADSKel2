<?php include('../includes/session.php') ?>
<?php include('templates/headerbooking.php') ?>
<header class="py-5">
    <div class="container px-5 pb-5">
        <div class="row gx-5 align-items-center">
            <div class="col-md-12">
                <h1 class="text-center header-custom">Book Information </h1>
                <p class="text-center header-custom-1">Pleas check information below</p>
            </div>

            <form>
                <div class="container">
                    <!-- <h2>Data Booking Roomieboomie</h2> -->
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Book ID</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Tingkat Organisasi</th>
                                <th>Nama Organisasi</th>
                                <th>Jumlah</th>
                                <th>Tanggal Pinjam</th>
                                <th>Waktu Pinjam</th>
                                <th>Ruang</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Kode PHP untuk mengambil data dari database dan menampilkan dalam tabel
                            $koneksi = mysqli_connect("localhost", "root", "", "roomieboomie");

                            // Periksa koneksi
                            if (mysqli_connect_errno()) {
                                echo "Koneksi database gagal: " . mysqli_connect_error();
                                exit;
                            }

                            $query = "SELECT * FROM tb_booking";
                            $result = mysqli_query($koneksi, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['book_id'] . "</td>";
                                echo "<td>" . $row['nama'] . "</td>";
                                echo "<td>" . $row['nim'] . "</td>";
                                echo "<td>" . $row['tingkat_organisasi'] . "</td>";
                                echo "<td>" . $row['nama_organisasi'] . "</td>";
                                echo "<td>" . $row['jumlah'] . "</td>";
                                echo "<td>" . $row['tgl_pinjam'] . "</td>";
                                echo "<td>" . $row['waktu_pinjam'] . "</td>";
                                echo "<td>" . $row['ruang'] . "</td>";
                                echo "<td>" . $row['kategori'] . "</td>";
                                echo "<td>" . $row['keterangan'] . "</td>";
                                echo "</tr>";
                            }

                            // Tutup koneksi
                            mysqli_close($koneksi);
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Footer -->
                <?php include('templates/footer.php') ?>