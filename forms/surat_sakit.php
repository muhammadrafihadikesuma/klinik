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
$id = $_GET['id'];
$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM tbl_diagnosa WHERE id_diagnosa = '$id' ");
while ($read = mysqli_fetch_array($query)) {
    # code...
    $id_diagnosa = $read['id_diagnosa'];
    $id_pasien = $read['id_pasien'];
    $diagnosa = $read['diagnosa'];
}

$query_pasien = mysqli_query($koneksi, "SELECT * FROM tbl_pasien WHERE id_pasien = '$id_pasien' ");
while ($reads = mysqli_fetch_array($query_pasien)) {
    # code...
    $nama_pasien = $reads['nama_pasien'];
    $jabatan_pekerja = $reads['jabatan_pekerja'];
    $jk = $reads['jk'];
    $status_pekerja = $reads['status_pekerja'];
}

$query_pendaftaran = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran WHERE id_pasien = '$id_pasien' ");
while ($readss = mysqli_fetch_array($query_pendaftaran)) {
    # code...
    $tanggal_pendaftaran = $readss['tanggal_pendaftaran'];
    $jam_b = $readss['jam_b'];
}

?>
<?php
require '../api/koneksi.php';
$id_user = $_SESSION['id'];
$query = mysqli_query($koneksi, " SELECT * FROM tbl_user WHERE id='$id_user'");
while ($read = mysqli_fetch_array($query)) {
    $id_author = $read['id'];
    $author = $read['nama'];
}
?>

<body>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>FORM EDIT PENDAFTARAN</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="../pages/pendaftaran.php">Data Pendaftaran</a></li>
                    <li class="breadcrumb-item active">Pendaftaran</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Pendaftaran</h5>

                            <!-- General Form Elements -->
                            <form action="../api/edit_pendaftarans.php" method="POST">

                            <input id="id_suratsakit" name="id_suratsakit" type="hidden" class="form-control" />

                                <input id="id_pasien" name="id_pasien" value="<?php echo $id_pasien ?>" type="text" class="form-control" />


                                <!-- Nomor Mr -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="1" value="<?php echo $id_diagnosa ?>" onkeyup="my1()" placeholder="Masukkan Nama Pasien" readonly>
                                    <label for="1">Nomor Diagnosa</label>
                                </div>

                                <!-- Tanggal Pendaftaran -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="floatingDate" value="<?php echo $tanggal_pendaftaran ?>" readonly>
                                        <label for="floatingDate">Tanggal Pendaftaran</label>
                                    </div>
                                </div>

                                <!-- Pekerjaan -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingPekerjaan" value="<?php echo $jabatan_pekerja ?>" placeholder="Pekerjaan" readonly>
                                    <label for="floatingPekerjaan">Pekerjaan</label>
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingLingkar" value="<?php echo $jk ?>" placeholder="Masukkan Lingkar Perut" readonly>
                                    <label for="floatingPasien">Jenis Kelamin</label>
                                </div>

                                <!-- Golongan -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingSuhu" name="suhu" value="<?php echo $status_pekerja ?>" placeholder="Golongan" readonly>
                                    <label for="floatingPasien">Golongan</label>
                                </div>

                                <!-- Umur -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingTensi" name="umur"  placeholder="Umur" required>
                                    <label for="floatingPasien">Umur</label>
                                </div>

                                <!-- Jam -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="time" class="form-control" id="floatingBerat" name="jam_b" value="<?php echo $jam_b ?>" placeholder="Masukkan Berat Badan" required>
                                    <label for="floatingPasien">Jam Berobat</label>
                                </div>

                                <!-- Waktu Istirahat -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingNadi" name="waktu_i"  placeholder="Waktu Istirahat" required>
                                    <label for="floatingPasien">Waktu Istirahat</label>
                                </div>

                                <!-- Dari Tanggal -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingPernafasan" name="dari_t"  placeholder="Masukkan Pernafasan" required>
                                    <label for="floatingPasien">Dari Tanggal</label>
                                </div>

                                <!-- Sampai Dengan -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingPernafasan" name="sampai_d" placeholder="Masukkan Pernafasan" required>
                                    <label for="floatingPasien">Sampai Dengan</label>
                                </div>

                                <!-- Catatan -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="4" name="catatan" onkeyup="my4()" data-enable-grammarly="false" placeholder="Catatan" style="height: 150px;" required></textarea>
                                    <label for="4">Catatan</label>
                                </div>

                                <!-- AUTHOR -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="5" name="author" value="<?php echo $author; ?>" onkeyup="my5()" placeholder="Masukkan" readonly>
                                        <label for="5">Auhtor</label>
                                    </div>
                                </div>

                                <div class="row mb-3 text-center">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>

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