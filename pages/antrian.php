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

<body>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>DATA ANTRIAN</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Antrian</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card shadow mb-4">
                <div class="col-lg-12">
                    <div class="card-body">
                        <h5 class="card-title">Data Antrian</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th>NO ANTRI</th>
                                            <th>NO MR</th>
                                            <th>NAMA</th>
                                            <th>TANGGAL</th>
                                            <th>INFORMASI</th>
                                            <th>KELUHAN</th>
                                            <th style="text-align:center;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require "../api/koneksi.php";
                                        $sql = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran WHERE status='antri' ORDER BY id_pendaftaran  ASC") or die("error karena" . mysqli_error($koneksi));
                                        $no = 1;
                                        $noantrian = 01;
                                        while ($read = mysqli_fetch_array($sql)) {
                                            $id_pendaftaran = $read['id_pendaftaran'];
                                            $id_pasien = $read['id_pasien'];
                                            $tanggal_pendaftaran = $read['tanggal_pendaftaran'];
                                            $tinggi_badan = $read['tinggi_badan'];
                                            $berat_badan = $read['berat_badan'];
                                            $lingkar_perut = $read['lingkar_perut'];
                                            $tensi_darah = $read['tensi_darah'];
                                            $suhu = $read['suhu'];
                                            $nadi = $read['nadi'];
                                            $pernafasan = $read['pernafasan'];
                                            $keluhan_pasien = $read['keluhan_pasien'];

                                        ?>
                                            <tr>
                                                <td style="width:3%; text-align: center;"><?php echo $no++;  ?></td>
                                                <td style="width:3%; text-align:left;"><?php echo  $id_pasien;  ?></td>
                                                <td style="width:7%; text-align:left;">
                                                    <?php
                                                    require  "../api/koneksi.php";
                                                    $sql4 = mysqli_query($koneksi, "SELECT * FROM tbl_pasien WHERE id_pasien='$id_pasien'") or die("error karena " . mysqli_error($koneksi));
                                                    while ($reads = mysqli_fetch_array($sql4)) {
                                                        echo $nama_pasien = $reads['nama_pasien'];
                                                        //echo $d1;
                                                    }
                                                    ?>
                                                </td>
                                                <td style="width:5%; text-align:left;"><?php echo  $tanggal_pendaftaran;  ?></td>
                                                <td style="width:15%; text-align:left;"><?php echo "Tinggi : ";
                                                                                        echo $tinggi_badan, " Cm";
                                                                                        echo " <br> Berat Badan : ";
                                                                                        echo $berat_badan, " Kg";
                                                                                        echo " <br> Lingkar Perut : ";
                                                                                        echo $lingkar_perut, " Cm";
                                                                                        echo " <br> Tensi Darah : ";
                                                                                        echo $tensi_darah, " mmHg";
                                                                                        echo " <br> Suhu : ";
                                                                                        echo $suhu, " °C";
                                                                                        echo " <br> Nadi : ";
                                                                                        echo $nadi, " kali per menit";
                                                                                        echo " <br> Pernafasan : ";
                                                                                        echo $pernafasan, " kali per menit"; ?></td>
                                                <td style="width:10%; text-align:left;"><?php echo  $keluhan_pasien;  ?></td>

                                                <td style="width:4%; text-align:center;">
                                                    <a href="../api/periksa.php?id=<?= $read['id_pendaftaran'] ?>">
                                                        <button class="btn btn-warning btn-sm">Periksa</button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
        </section>

    </main><!-- End #main -->
</body>
<!-- ======= Footer ======= -->
<?php require '../widgets/footer.php'; ?>