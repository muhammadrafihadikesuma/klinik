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
$query = mysqli_query($koneksi, "SELECT max(id_pendaftaran) as kodeTerbesar FROM tbl_pendaftaran");
$data = mysqli_fetch_array($query);
$idPendaftaran = $data['kodeTerbesar'];
$urutan = (int) substr($idPendaftaran, 10, 5);
$urutan++;
$huruf = "PWSPOLIPDF";
$idPendaftaran = $huruf . sprintf("%05s", $urutan);


$id = $_SESSION['id'];
$query = mysqli_query($koneksi, " SELECT * FROM tbl_user WHERE id='$id'");
while ($read = mysqli_fetch_array($query)) {
	$id_author = $read['id'];
	$author = $read['nama'];
}
?>

<body>

	<main id="main" class="main">

		<div class="pagetitle">
			<h1>FORM INPUT PENDAFTARAN</h1>
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
							<h5 class="card-title">Data Pasien</h5>

							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="dataTablePendaftaran" width="100%" cellspacing="1">
										<thead>
											<tr>
												<th>#</th>
												<th>NO MR</th>
												<th>NAMA PASIEN</th>
												<th>JENIS KELAMIN</th>
												<th>TANGGAL LAHIR</th>
												<th>STATUS PASIEN</th>
												<th>ESTATE</th>
												<th>OP</th>
											</tr>
										</thead>
										<tbody>
											<?php
											require "../api/koneksi.php";
											$sql = mysqli_query($koneksi, "SELECT * from tbl_pasien order by id_pasien Desc LIMIT 3000") or die("error karena" . mysqli_error($connection));
											$no = 1;
											while ($read = mysqli_fetch_array($sql)) {
												$id_pasien = $read['id_pasien'];
												$nama_pasien = $read['nama_pasien'];
												$jk = $read['jk'];
												$tgl_lahir = $read['tgl_lahir'];
												$status_pasien = $read['status_pasien'];
												$estate = $read['estate'];
												$op = $read['op'];

											?>

												<td><?php echo  $no++;  ?></td>
												<td><?php echo  $id_pasien;  ?></td>
												<td><?php echo  $nama_pasien;  ?></td>
												<td><?php echo  $jk;  ?></td>
												<td><?php echo  $tgl_lahir;  ?></td>
												<td><?php echo  $status_pasien;  ?></td>
												<td><?php echo  $estate;  ?></td>
												<td><?php echo  $op;  ?></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
									<!-- End Table with stripped rows -->
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Input Pendaftaran</h5>



							<!-- General Form Elements -->
							<form action="../api/add_pendaftarans.php" method="POST">
								<!-- <input id="id_pendaftaran"  type="hidden" class="form-control" /> -->
								<input id="id_author" name="id_author" value="<?php echo $id_author ?>" type="hidden" class="form-control" />
								
								<!-- Nomor Pendaftaran -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="11" name="id_pendaftaran" value="<?php echo $idPendaftaran ?>" placeholder="Masukkan" readonly>
									<label for="11">Nomor Pendaftaran</label>
								</div>

								<!-- Nomor Pasien -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="space" name="id_pasien"  placeholder="Masukkan Nama Pasien" required>
									<label for="space">Nomor Pasien</label>
								</div>

								<!-- Tanggal Pendaftaran -->
								<div class="col-12">
									<div class="form-floating mb-3">
										<input type="date" class="form-control" id="floatingDate" name="tanggal_pendaftaran" required>
										<label for="floatingDate">Tanggal Pendaftaran</label>
									</div>
								</div>

								<!-- Tinggi Badan -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="floatingTinggi" name="tinggi_badan" placeholder="Masukkan Tinggi Badan Dalam Format cm" required>
									<label for="floatingPasien">Tinggi Badan</label>
								</div>

								<!-- Berat Badan -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="floatingBerat" name="berat_badan" placeholder="Masukkan Berat Badan" required>
									<label for="floatingPasien">Berat Badan</label>
								</div>

								<!-- Lingkat Perut -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="floatingLingkar" name="lingkar_perut" placeholder="Masukkan Lingkar Perut" required>
									<label for="floatingPasien">Lingkar Perut</label>
								</div>

								<!-- Tensi Darah -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="floatingTensi" name="tensi_darah" placeholder="Masukkan Tensi Darah" required>
									<label for="floatingPasien">Tensi Darah</label>
								</div>

								<!-- Suhu -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="floatingSuhu" name="suhu" placeholder="Masukkan Suhu Tubuh" required>
									<label for="floatingPasien">Suhu Tubuh</label>
								</div>

								<!-- Nadi -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="floatingNadi" name="nadi" placeholder="Masukkan Denyut Nadi" required>
									<label for="floatingPasien">Denyut Nadi</label>
								</div>

								<!-- Pernafasan -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="floatingPernafasan" name="pernafasan" placeholder="Masukkan Pernafasan" required>
									<label for="floatingPasien">Pernafasan</label>
								</div>

								<!-- Keluhan Pasien -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<textarea class="form-control" id="4" name="keluhan_pasien" onkeyup="my4()" data-enable-grammarly="false" placeholder="Masukkan Keluhan Pasien" style="height: 150px;" required></textarea>
									<label for="4">Keluhan Pasien</label>
								</div>

								<!-- Status -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="floatingPernafasan" value="antri" name="status" placeholder="Masukkan Pernafasan" readonly>
									<label for="floatingPasien">Status</label>
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