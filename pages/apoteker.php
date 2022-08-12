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
			<h1>DATA APOTEKER</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
					<li class="breadcrumb-item active">Data Apoteker</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->

		<section class="section">
			<div class="card shadow mb-4">
				<div class="col-lg-12">
					<div class="card-body">
						<h5 class="card-title">Data Apoteker</h5>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
									<thead>
										<tr>
											<th>#</th>
											<th>NO. DIAGNOSA</th>
											<th>NO. PASIEN</th>
											<th>NO. PENDAFTARAN</th>
											<th>NAMA</th>
											<th>KELUHAN</th>
											<th>PEMERIKSAAN</th>
											<th>DIAGNOSA</th>
											<th>TERAPI</th>
											<th>RESEP</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										require  "../api/koneksi.php";
										$sql = mysqli_query($koneksi, "SELECT * FROM tbl_diagnosa WHERE status='Resep' ORDER BY id_pendaftaran  Desc") or die("error karena" . mysqli_error($koneksi));
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
										?>
											<tr>
												<td><?php echo $no++;  ?></td>

												<td><?php echo  $id_diagnosa;  ?></td>

												<td><?php echo  $id_pasien;  ?></td>

												<td><?php echo  $id_pendaftaran;  ?></td>

												<td>
													<?php
													require  "../api/koneksi.php";
													$sql4 = mysqli_query($koneksi, "SELECT * FROM tbl_pasien WHERE id_pasien='$id_pasien'") or die("error karena " . mysqli_error($koneksi));
													while ($tampil = mysqli_fetch_array($sql4)) {
														echo $nama_pasien = $tampil['nama_pasien'];
													}
													?>
												</td>

												<?php
												require  "../api/koneksi.php";
												$sql5 = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran WHERE id_pendaftaran='$id_pendaftaran' ") or die("error karena " . mysqli_error($koneksi));
												while ($a5 = mysqli_fetch_array($sql5)) {
													$keluhan = $a5['keluhan_pasien'];
													//echo $d1;
												}
												?>

												<td><?php echo  $keluhan;  ?></td>

												<td><?php echo  $pemeriksaan;  ?></td>

												<td><?php echo  $diagnosa;  ?></td>

												<td><?php echo  $terapi;  ?></td>

												<td><?php echo  $resep;  ?></td>
												<td>
													<a href="../api/add_apotekers.php?id=<?= $read['id_diagnosa'] ?>"  class="label label-sm label-info">
														<button class="btn btn-primary btn-sm">Selesai</button></a>

													<a href="../export/surat_sakit.php?id=<?= $read['id_diagnosa'] ?>" class="label label-sm label-info">
														<button class="btn btn-success btn-sm">Surat Sakit</button></a>

														<a href="../api/batal_apotekers.php?id=<?= $read['id_diagnosa'] ?>" class="label label-sm label-info">
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