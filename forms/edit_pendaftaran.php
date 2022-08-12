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
$query = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran WHERE id_pendaftaran = '$id' ");
while ($edit = mysqli_fetch_array($query)) {
	# code...
	$id_pendaftaran = $edit['id_pendaftaran'];
	$id_pasien = $edit['id_pasien'];
	$tanggal_pendaftaran = $edit['tanggal_pendaftaran'];
	$tinggi_badan = $edit['tinggi_badan'];
	$berat_badan = $edit['berat_badan'];
	$lingkar_perut = $edit['lingkar_perut'];
	$tensi_darah = $edit['tensi_darah'];
	$suhu = $edit['suhu'];
	$nadi = $edit['nadi'];
	$pernafasan = $edit['pernafasan'];
	$keluhan_pasien = $edit['keluhan_pasien'];
	$status = $edit['status'];
}

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
								<input id="id_pendaftaran" name="id_pendaftaran" value="<?php echo $id_pendaftaran ?>" type="hidden" class="form-control" />
								<input id="id_author" name="id_author" value="<?php echo $id_author ?>" type="hidden" class="form-control" />

								<!-- Nomor Mr -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="1" name="id_pasien" value="<?php echo $id_pasien ?>" onkeyup="my1()" placeholder="Masukkan Nama Pasien" readonly>
									<label for="1">Nomor MR</label>
								</div>

								<!-- Tanggal Pendaftaran -->
								<div class="col-12">
									<div class="form-floating mb-3">
										<input type="date" class="form-control" id="floatingDate" name="tanggal_pendaftaran" value="<?php echo $tanggal_pendaftaran ?>" required>
										<label for="floatingDate">Tanggal Pendaftaran</label>
									</div>
								</div>

								<!-- Tinggi Badan -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="floatingTinggi" name="tinggi_badan" value="<?php echo $tinggi_badan ?>" placeholder="Masukkan Tinggi Badan Dalam Format cm" required>
									<label for="floatingPasien">Tinggi Badan</label>
								</div>

								<!-- Berat Badan -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="floatingBerat" name="berat_badan" value="<?php echo $berat_badan ?>" placeholder="Masukkan Berat Badan" required>
									<label for="floatingPasien">Berat Badan</label>
								</div>

								<!-- Lingkat Perut -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="floatingLingkar" name="lingkar_perut" value="<?php echo $lingkar_perut ?>" placeholder="Masukkan Lingkar Perut" required>
									<label for="floatingPasien">Lingkar Perut</label>
								</div>

								<!-- Tensi Darah -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="floatingTensi" name="tensi_darah" value="<?php echo $tensi_darah ?>" placeholder="Masukkan Tensi Darah" required>
									<label for="floatingPasien">Tensi Darah</label>
								</div>

								<!-- Suhu -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="floatingSuhu" name="suhu" value="<?php echo $suhu ?>" placeholder="Masukkan Suhu Tubuh" required>
									<label for="floatingPasien">Suhu Tubuh</label>
								</div>

								<!-- Nadi -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="floatingNadi" name="nadi" value="<?php echo $nadi ?>" placeholder="Masukkan Denyut Nadi" required>
									<label for="floatingPasien">Denyut Nadi</label>
								</div>

								<!-- Pernafasan -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="floatingPernafasan" name="pernafasan" value="<?php echo $pernafasan ?>" placeholder="Masukkan Pernafasan" required>
									<label for="floatingPasien">Pernafasan</label>
								</div>

								<!-- Keluhan Pasien -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<textarea class="form-control" id="4" name="keluhan_pasien" onkeyup="my4()" data-enable-grammarly="false" placeholder="Masukkan Keluhan Pasien" style="height: 150px;" required><?php echo $keluhan_pasien ?></textarea>
									<label for="4">Keluhan Pasien</label>
								</div>

								<!-- Status -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="floatingPernafasan" name="status" value="<?php echo $status ?>" placeholder="Masukkan Pernafasan" required>
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