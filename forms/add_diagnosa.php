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
$query = mysqli_query($koneksi, "SELECT max(id_diagnosa) as kodeTerbesar FROM tbl_diagnosa");
$data = mysqli_fetch_array($query);
$id_diagnosa = $data['kodeTerbesar'];
$urutan = (int) substr($id_diagnosa, 6, 5);
$urutan++;
$huruf = "PWSDNA";
$id_diagnosa = $huruf . sprintf("%05s", $urutan);

?>
<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran WHERE id_pendaftaran = '$id'");
while ($read = mysqli_fetch_array($query)) {
    # code...
    $id_pendaftaran = $read['id_pendaftaran'];
    $id_pasien = $read['id_pasien'];
    $tanggal_pendaftaran = $read['tanggal_pendaftaran'];
    $jam_b = $read['jam_b'];
}

$query_pasien = mysqli_query($koneksi, "SELECT * FROM tbl_pasien WHERE id_pasien = '$id_pasien' ");
while ($reads = mysqli_fetch_array($query_pasien)) {
    # code...
    $nama_pasien = $reads['nama_pasien'];
    $jabatan_pekerja = $reads['jabatan_pekerja'];
    $jk = $reads['jk'];
    $status_pekerja = $reads['status_pekerja'];
    $umur = $reads['umur'];
}

// Mengambil data dari database tabel penyakit ke select option
$penyakit = mysqli_query($koneksi, " SELECT * FROM tbl_penyakit ORDER BY nama_penyakit ASC");
?>


<body>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>FORM INPUT DIAGNOSA</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="../pages/diagnosa.php">Data Diagnosa</a></li>
                    <li class="breadcrumb-item active">Input Diagnosa</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Input Diagnosa</h5>

                            <!-- General Form Elements -->
                            <form action="../api/add_diagnosas.php" method="POST">

                                <input id="id_suratsakit" name="id_suratsakit" type="hidden" class="form-control" />

                                <!-- ID DIAGNOSA -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="id_diagnosa" value="<?php echo $id_diagnosa; ?>" placeholder="Masukkan " readonly>
                                    <label for="1">Nomor Diagnosa</label>
                                </div>

                                <!-- ID PENDAFTARAN -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="hidden" class="form-control" name="id_pendaftaran" value="<?php echo $id_pendaftaran ?>" placeholder="Masukkan " readonly>
                                    <label for="1">Nomor Pendaftaran</label>
                                </div>

                                <!-- ID PASIEN -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="hidden" class="form-control" name="id_pasien" value="<?php echo $id_pasien ?>" placeholder="Masukkan " readonly>
                                    <label for="1">Nomor Pasien</label>
                                </div>

                                <!-- Nama Pasien -->
                                <div class="col-12 position-relative">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="1" name="nama_pasien" value="<?php echo $nama_pasien ?>" onkeyup="my1()" placeholder="Masukkan Nama Pasien" readonly>
                                        <label for="1">Nama Pasien</label>
                                    </div>
                                </div>

                                <!-- Tanggal Pendaftaran -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="hidden" class="form-control" id="floatingDate" name="tgl_diagnosa" value="<?php echo $tanggal_pendaftaran; ?>" readonly>
                                        <label for="floatingDate">Tanggal Diagnosa</label>
                                    </div>
                                </div>

                                <!-- Jabatan Pekerjaan -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="hidden" class="form-control" id="floatingPekerjaan" name="jabatan_pekerja" value="<?php echo $jabatan_pekerja ?>" placeholder="Pekerjaan" readonly>
                                    <label for="floatingPekerjaan">Jabatan Pekerja</label>
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="hidden" class="form-control" id="floatingLingkar" name="jk" value="<?php echo $jk ?>" placeholder="Masukkan Lingkar Perut" readonly>
                                    <label for="floatingPasien">Jenis Kelamin</label>
                                </div>

                                <!-- Umur -->
                                <div class="col-12 position-relative">
                                    <div class="form-floating mb-3">
                                        <input type="hidden" class="form-control" id="9" name="umur" value="<?php echo $umur ?>" onkeyup="my9()" placeholder="Nama Pasien" readonly>
                                        <label for="9">Umur</label>
                                    </div>
                                </div>


                                <!-- Golongan -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="hidden" class="form-control" id="floatingSuhu" name="status_pekerja" value="<?php echo $status_pekerja ?>" placeholder="Golongan" readonly>
                                    <label for="floatingPasien">Golongan</label>
                                </div>

                                <!-- Umur -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="hidden" class="form-control" id="floatingTensi" name="umur" placeholder="Umur" value="<?php echo $umur ?>" readonly>
                                    <label for="floatingPasien">Umur</label>
                                </div>

                                <!-- Jam -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="hidden" class="form-control" id="floatingBerat" name="jam_b" value="<?php echo $jam_b ?>" placeholder="Masukkan Berat Badan" readonly>
                                    <label for="floatingPasien">Jam Berobat</label>
                                </div>

                                <!-- Pemeriksaan -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="3" onkeyup="my3()" name="pemeriksaan" placeholder="Masukkan " required>
                                    <label for="3">Pemeriksaan</label>
                                </div>

                                <!-- Jenis Penyakit -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="diagnosa" name="diagnosa[]" style="width: 100%;" multiple="multiple" required>
                                            <!-- <option selected>Pilih Jenis Penyakit</option> -->
                                            <?php while ($read = mysqli_fetch_array($penyakit)) { ?>

                                                <option value="<?= $read['nama_penyakit'] ?>"><?= $read['nama_penyakit'] ?></option>;
                                            <?php } ?>
                                        </select>
                                        <!-- <label for="diagnosa">Pilih Jenis Penyakit</label> -->
                                    </div>
                                </div>

                                <!-- Terapi -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="5" onkeyup="my5()" name="terapi" placeholder="Masukkan " required>
                                    <label for="5">Terapi</label>
                                </div>

                                <!-- RESEP -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="4" name="resep" onkeyup="my4()" data-enable-grammarly="false" placeholder="Catatan" style="height: 150px;" required></textarea>
                                    <label for="4">Resep</label>
                                </div>

                                <!-- Waktu Istirahat -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingNadi" name="waktu_i" placeholder="Waktu Istirahat">
                                    <label for="floatingPasien">Waktu Istirahat</label>
                                </div>

                                <!-- Dari Tanggal -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingPernafasan" name="dari_t" placeholder="Masukkan Pernafasan">
                                    <label for="floatingPasien">Dari Tanggal</label>
                                </div>

                                <!-- Sampai Dengan -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingPernafasan" name="sampai_d" placeholder="Masukkan Pernafasan">
                                    <label for="floatingPasien">Sampai Dengan</label>
                                </div>

                                <!-- Catatan -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="4" name="catatan" onkeyup="my4()" data-enable-grammarly="false" placeholder="Catatan" style="height: 150px;" required></textarea>
                                    <label for="4">Catatan</label>
                                </div>

                                <!-- Status -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="6" onkeyup="my6()" name="status" value="resep" placeholder="Masukkan " readonly>
                                    <label for="6">Status</label>
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
</body>
<!-- ======= Footer ======= -->
<?php require '../widgets/footer.php'; ?>