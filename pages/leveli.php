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
function tgl_indonesia($tanggal)
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
            <h1>LEVEL I</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
                    <!-- <li class="breadcrumb-item"><a href="../forms/add_pasien.php">Input Pasien</a></li> -->
                    <li class="breadcrumb-item active">Level I</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- TABLE -->
        <section class="section">
            <div class="card shadow mb-4">
                <div class="col-lg-12">
                    <div class="card-body">
                        <h5 class="card-title">Level I</h5>
                        <div class="card-body">
                            <!-- <h6><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inputPasien">
                                    Input Pasien
                                </button>
                            </h6> -->
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Berobat</th>
                                            <th>NO PASIEN</th>
                                            <th>NAMA PASIEN</th>
                                            <th>KELUHAN</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require '../api/koneksi.php';
                                        $sql = mysqli_query($koneksi, "SELECT * from tbl_pendaftaran 
                                        WHERE tanggal_pendaftaran BETWEEN (current_date()- interval 5 day) AND (current_date() - interval 3 day) ORDER BY tanggal_pendaftaran DESC") 
                                        or die("error karena" . mysqli_error($koneksi));
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
                                                <td><?php echo tgl_indonesia($tanggal_pendaftaran) ?></td>
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
                                                <td><?php echo  $keluhan_pasien;  ?></td>
                                                <td style="text-align: center; width: 7%;">
                                                    <a href="../api/whatsapp.php?id=<?= $read['id_pasien'] ?>">
                                                        <i class="bx bxl-whatsapp btn btn-success btn-sm"></i></a>
                                               
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