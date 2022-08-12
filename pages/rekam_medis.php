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
            <h1>REKAM MEDIS</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
                    <li class="breadcrumb-item active">REKAM MEDIS</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card shadow mb-4">
                <div class="col-lg-12">
                    <div class="card-body">
                        <h5 class="card-title">Data Pasien</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NO. PENDAFTARAN</th>
                                            <th>NO. PASIEN</th>
                                            <th>NAMA</th>
                                            <th>TANGGAL</th>
                                            <th>INFORMASI</th>
                                            <th>KELUHAN</th>
                                            <th>STATUS</th>
                                            <th>AUTHOR</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require '../api/koneksi.php';
                                        $sql = mysqli_query($koneksi, "SELECT * from tbl_pendaftaran order by id_pendaftaran DESC") or die("error karena" . mysqli_error($koneksi));
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
                                            $status = $read['status'];
                                            $author = $read['author'];

                                        ?>
                                            <tr>
                                                <td style="width:2%" ;><?php echo $no++;  ?></td>
                                                <td style="width:3%; text-align:center;"><?php echo  $id_pendaftaran;  ?></td>
                                                <td style="width:3%; text-align:left;"><?php echo  $id_pasien;  ?></td>
                                                <td style="width:15%; text-align:left;">
                                                    <?php
                                                    require '../api/koneksi.php';
                                                    $pasien = mysqli_query($koneksi, "SELECT * from tbl_pasien where id_pasien='$id_pasien'") or die("error karena " . mysqli_error($koneksi));
                                                    while ($reads = mysqli_fetch_array($pasien)) {
                                                        echo $nama_pasien = $reads['nama_pasien'];
                                                    }
                                                    ?>
                                                </td>
                                                <td style="width:5%; text-align:left;"><?php echo  $tanggal_pendaftaran;  ?></td>
                                                <td style="width:20%; text-align:left;"><?php echo "Tinggi : ";
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
                                                <td style="width: 8%;"><?php echo  $status;  ?></td>
                                                <td style="width: 20%;"><?php echo  $author;  ?></td>
                                                <td style="text-align: center; width: 7%;">
                                                    <a href="../forms/edit_pendaftaran.php?id=<?= $read['id_pendaftaran'] ?>" class="label label-sm label-info">
                                                        <i class="bi bi-pencil-square btn btn-success btn-sm"></i></a>
                                                    <a href="../api/delete_pendaftaran.php?id=<?= $read['id_pendaftaran'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya ?')">
                                                        <i class="bi bi-trash btn btn-danger btn-sm"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php require '../widgets/footer.php'; ?>