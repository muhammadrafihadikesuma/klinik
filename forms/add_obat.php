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
$query = mysqli_query($koneksi, "SELECT max(id_stok) as kodeTerbesar FROM tbl_stok");
$data = mysqli_fetch_array($query);
$idObat = $data['kodeTerbesar'];
$urutan = (int) substr($idObat, 10, 5);
$urutan++;
$huruf = "PWSPOLIOBT";
$idObat = $huruf . sprintf("%05s", $urutan);


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
			<h1>FORM INPUT STOK OBAT</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
					<li class="breadcrumb-item"><a href="../pages/stok_obat">Data Stok Obat</a></li>
					<li class="breadcrumb-item active">Input Stock Obat</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->

		<section class="section">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Input Stock Obat</h5>



							<!-- General Form Elements -->
							<form action="../api/add_stoks.php" method="POST">
								<!-- <input id="id_pendaftaran"  type="hidden" class="form-control" /> -->
								<input id="id_author" name="id_author" value="<?php echo $id_author ?>" type="hidden" class="form-control" />
								
								<!-- Nomor Obat -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="11" name="id_obat" value="<?php echo $idObat ?>" placeholder="Masukkan" readonly>
									<label for="11">Nomor Obat</label>
								</div>

								<!-- Nama Obat -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="1" name="nama_obat"  placeholder="Masukkan"  onkeyup="my1()" required>
									<label for="1">Nama Obat</label>
								</div>

                                <!-- Tanggal -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="floatingDate" name="date" required>
                                        <label for="floatingDate">Tanggal</label>
                                    </div>
                                </div>

								<!-- Stok Obat -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan" required>
									<label for="stok">Stok Obat</label>
								</div>

								<!-- Barang Masuk -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="barangMasuk" name="barang_masuk" placeholder="Masukkan" required>
									<label for="barangMasuk">Barang Masuk</label>
								</div>

								<!-- Barang Keluar -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="barangKeluar" name="barang_keluar" placeholder="Masukkan" required>
									<label for="barangKeluar">Barang Keluar</label>
								</div>

								<!-- Satuan -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan" required>
									<label for="satuan">Satuan</label>
								</div>

								<!-- Harga -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan" required>
									<label for="harga">Harga</label>
								</div>

								<!-- kategori -->
								<div class="col-12">
									<div class="form-floating mb-3">
										<select class="form-control" id="floatingJk" name="kategori" required>
											<option selected disabled value>Pilih Kategori Obat</option>
											<option value="Obat Keras">Obat Keras</option>
											<option value="Obat Bebas">Obat Bebas</option>
											<option value="Obat Bebas Terbatas">Obat Bebas Terbatas</option>
										</select>
										<label for="floatingJk">Kategori Obat</label>
									</div>
								</div>

								<!-- Deskripsi -->
								<div class="col-12"></div>
								<div class="form-floating mb-3">
									<textarea class="form-control" id="4" name="deskripsi" onkeyup="my4()" data-enable-grammarly="false" placeholder="Masukkan Keluhan Pasien" style="height: 150px;" required></textarea>
									<label for="4">Deksripsi</label>
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