<?php
require '../api/koneksi.php';
// require 'api_checksessions.php';
?>

<!-- ======= Header ======= -->
<?php require '../widgets/header.php'; ?>
<!-- End Header -->

<!-- ======= Sidebar ======= -->
<?php require '../widgets/sidebar.php'; ?>
<!-- End Sidebar-->

<?php
require '../api/koneksi.php';
$query = mysqli_query($koneksi, "SELECT max(id_penyakit) as kodeTerbesar FROM tbl_penyakit");
$data = mysqli_fetch_array($query);
$idPenyakit = $data['kodeTerbesar'];
$urutan = (int) substr($idPenyakit, 10, 5);
$urutan++;
$huruf = "PWSPOLIPKT";
$idPenyakit = $huruf . sprintf("%05s", $urutan);
?>

<body>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>FORM INPUT PENYAKIT</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="../pages/penyakit.php">Data Penyakit</a></li>
                    <li class="breadcrumb-item active">Input Penyakit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Input Penyakit</h5>

                            <!-- General Form Elements -->
                            <form action="../api/add_penyakits.php" method="POST">

                                <!-- Nomor Penyakit -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="2" name="id_penyakit" value="<?php echo $idPenyakit; ?>" placeholder="Masukkan" readonly>
                                    <label for="2">Nomor Penyakit</label>
                                </div>

                                <!-- Nama Penyakit -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="1" onkeyup="my1()" name="nama_penyakit" placeholder="Masukkan Nama Penyakit" required>
                                    <label for="1">Nama Penyakit</label>
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="6" name="deskripsi" data-enable-grammarly="false" placeholder="Masukkan Keluhan Pasien" style="height: 400px;" onkeyup="my6()" required></textarea>
                                    <label for="6">Deskripsi</label>
                                </div>

                                <div class="col-sm-10 text-center">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>

                            </form><!-- End General Form Elements -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php require '../widgets/footer.php'; ?>