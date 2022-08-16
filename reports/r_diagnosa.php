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
<link rel="stylesheet" type="text/css" href="../assets/css/datatables.min.css" />

<?php
function tanggal_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

<body>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>DATA PASIEN PT. PINANG WITMAS SEJATI</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Pasien PT. Pinang Witmas Sejati</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- TABLE -->
        <section class="section">
            <div class="card shadow mb-4">
                <div class="col-lg-12">
                    <div class="card-body">
                        <h5 class="card-title">Data Pasien PT. Pinang Witmas Sejati</h5>
                        <div class="card-body">
                            <table border="0" cellspacing="5" cellpadding="5">
                                <tbody>
                                    <tr>
                                        <td>Start Date:</td>
                                        <td><input type="text" class="form-control ml-2" id="min" name="min"></td>
                                    </tr>
                                    <tr>
                                        <td>End Date:</td>
                                        <td><input type="text" class="form-control ml-2 mt-2" id="max" name="max"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <br>
                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID DIAGNOSA</th>
                                            <th>NO PASIEN</th>
                                            <th>NO PENDAFTARAN</th>
                                            <th>PEMERIKSAAN</th>
                                            <th>DIAGNOSA</th>
                                            <th>TERAPI</th>
                                            <th>RESEP</th>
                                            <th>STATUS</th>
                                            <th>TANGGAL DIAGNOSA</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require "../api/koneksi.php";
                                        $sql = mysqli_query($koneksi, "SELECT * from tbl_diagnosa order by id_diagnosa Desc") or die("error karena" . mysqli_error($connection));
                                        $no = 1;
                                        while ($read = mysqli_fetch_array($sql)) {
                                            $id_diagnosa = $read['id_diagnosa'];
                                            $id_pasien = $read['id_pasien'];
                                            $id_pendaftaran = $read['id_pendaftaran'];
                                            $pemeriksaan = $read['pemeriksaan'];
                                            $diagnosa = $read['diagnosa'];
                                            $terapi = $read['terapi'];
                                            $resep = $read['resep'];
                                            $status = $read['status'];
                                            $tgl_diagnosa = $read['tgl_diagnosa'];
                                        ?>
                                            <tr>
                                                <td><?php echo $no++;  ?></td>
                                                <td><?php echo  $id_diagnosa;  ?></td>
                                                <td><?php echo  $id_pasien;  ?></td>
                                                <td><?php echo  $id_pendaftaran;  ?></td>
                                                <td><?php echo  $pemeriksaan;  ?></td>
                                                <td><?php echo  $diagnosa;  ?></td>
                                                <td><?php echo  $terapi;  ?></td>
                                                <td><?php echo  $resep;  ?></td>
                                                <td><?php echo  $status;  ?></td>
                                                <td><?php echo  tanggal_indo($tgl_diagnosa);  ?></td>

                                                <td style="text-align: center; width: 30%;">
                                                    <a href="../forms/edit_pasien.php?id=<?= $read['id_diagnosa'] ?>" class="label label-sm label-info">
                                                        <i class="bi bi-pencil-square btn btn-success btn-sm"></i></a>
                                                    <a href="../api/delete_pasiens.php?id=<?= $read['id_diagnosa'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya ?')">
                                                        <i class="bi bi-trash btn btn-danger btn-sm"></i></a>
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
    </main>
    <!-- End #main -->

    <!-- Button trigger modal -->

</body>
<!-- ======= Footer ======= -->
<?php require '../widgets/footer.php'; ?>