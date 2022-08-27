<!-- ======= Header ======= -->
<?php require '../widgets/header.php'; ?>
<!-- End Header -->

<!-- ======= Sidebar ======= -->
<?php require '../widgets/sidebar.php'; ?>
<!-- End Sidebar-->
<?php
require '../api/koneksi.php';
$id = $_SESSION['id'];
$query = mysqli_query($koneksi, " SELECT * FROM tbl_user WHERE id='$id'");
while ($read = mysqli_fetch_array($query)) {
    $id_author = $read['id'];
    $author = $read['nama'];
}
?>

<?php
require '../api/koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_pasien WHERE id_pasien='$id'");
while ($edit = mysqli_fetch_array($query)) {
    # code...
    $id_pasien = $edit['id_pasien'];
    $nama_pasien = $edit['nama_pasien'];
    $jk = $edit['jk'];
    $no_bpjs = $edit['no_bpjs'];
    $tgl_lahir = $edit['tgl_lahir'];
    $status_pasien = $edit['status_pasien'];
    $nama_pekerja = $edit['nama_pekerja'];
    $jabatan_pekerja = $edit['jabatan_pekerja'];
    $status_pekerja = $edit['status_pekerja'];
    $nohp_pekerja = $edit['nohp_pekerja'];
    $estate = $edit['estate'];
    $op = $edit['op'];
    $author = $edit['author'];
}
?>

<body>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>WHATSAPP</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
                    <li class="breadcrumb-item active">Whatsapp</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Whatsapp</h5>

                            <!-- General Form Elements -->
                            <form action="../api/whatsapp.php" method="POST">
                                <!-- Nomor Penyakit -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="2" name="nama_pasien" value="<?php echo $nama_pasien ?>" placeholder="Masukkan" readonly>
                                    <label for="2">Nama Pasien </label>
                                </div>

                                <div class="col-12"></div>
                                <!-- <label class="form-label">Nama Pasien</label> -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="1" value="<?php echo $nohp_pekerja ?>" onkeyup="my1()" name="nohp_pekerja" placeholder="Masukkan Nama Penyakit" readonly>
                                    <label for="1">No Hp</label>
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="6" name="pesan" data-enable-grammarly="false" placeholder="Masukkan Keluhan Pasien" style="height: 400px;" onkeyup="my6()" required></textarea>
                                    <label for="6">Deskripsi</label>
                                </div>

                                <div class="col-sm-10 text-center">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
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