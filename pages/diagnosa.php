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
            <h1>DATA DIAGNOSA</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Diagnosa</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card shadow mb-4">
                <div class="col-lg-12">
                    <div class="card-body">
                        <h5 class="card-title">Data Diagnosa</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
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
                                        //require "conf/koneksi_sekred.php";
                                        require "../api/koneksi.php";
                                        $sql = mysqli_query($koneksi, "SELECT * from tbl_pendaftaran where status='diagnosa' order by id_pendaftaran  ASC") or die("error karena" . mysqli_error($connection));
                                        $no = 1;
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

                                            $sql5 = mysqli_query($koneksi, "select * from tbl_diagnosa where id_pendaftaran='$id'") or die("error karena " . mysqli_error($connection));
                                            while ($a5 = mysqli_fetch_array($sql5)) {
                                                $d2 = $a5['id_diagnosa'];
                                            }


                                        ?>
                                            <tr>
                                                <td><?php echo $no++;  ?></td>
                                                <td><?php echo  $id_pendaftaran;  ?></td>
                                                <td>
                                                    <?php
                                                    require  "../api/koneksi.php";
                                                    $sql4 = mysqli_query($koneksi, "SELECT * from tbl_pasien where id_pasien='$id_pasien'") or die("error karena " . mysqli_error($connection));
                                                    while ($a4 = mysqli_fetch_array($sql4)) {
                                                        echo $e4 = $a4['nama_pasien'];
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo  $tanggal_pendaftaran;  ?></td>
                                                <td><?php echo "Tinggi : ";
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
                                                <td><?php echo  $keluhan_pasien;  ?></td>
                                                <td>
                                                    <a href="../forms/add_diagnosa.php?id=<?= $read['id_pendaftaran'] ?>" class="label label-sm label-info">
                                                        <button class="btn btn-primary btn-sm">Diagnosa</button></a>
                                                    <a href="../api/batal_diagnosa.php?id=<?= $read['id_pendaftaran'] ?>" class="label label-sm label-info">
                                                        <button class="btn btn-danger btn-sm">Batal</button></a>

                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </main><!-- End #main -->
</body>
<!-- ======= Footer ======= -->
<?php require '../widgets/footer.php'; ?>