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
			<h1>LAPORAN</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
					<li class="breadcrumb-item active">Laporan</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->

		<section class="section">
			<div class="row">
				<div class="col-lg-12">

					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Laporan</h5>

							<form class="row g-3">

								<div class="col-12">
									<div class="form-floating mb-3">
										<select class="form-select" aria-label="Default select example" id="floatingEstate" name="estate">
											<option selected>Pilih Estate</option>
											<option value="1">Regional Office</option>
											<option value="2">Pasir Salak</option>
											<option value="3">Pangkor</option>
											<option value="4">Grik</option>
											<option value="5">PKS</option>
											<option value="6">Umum</option>
										</select>
										<label for="floatingEstate">Estate</label>
									</div>
								</div>

								<div class="col-12">
									<div class="form-floating mb-3">
										<select class="form-select" aria-label="Default select example" id="floatingOp" name="op">
											<option selected>Pilih OP</option>
											<option value="1">RO</option>
											<option value="2">PKS</option>
											<option value="21">Umum</option>
											<option value="3">OP 96</option>
											<option value="4">OP 97A</option>
											<option value="5">OP 97B</option>
											<option value="22">Nursery</option>
											<option value="6">OP 97C</option>
											<option value="7">OP 97D</option>
											<option value="8">OP 98A</option>
											<option value="9">OP 98B</option>
											<option value="10">OP 98C</option>
											<option value="11">OP 98D</option>
											<option value="12">OP 99</option>
											<option value="13">OP 2007B</option>
											<option value="14">OP 2008</option>
											<option value="15">OP 2003/2004</option>
											<option value="16">OP 2005A</option>
											<option value="17">OP 2007A</option>
											<option value="18">OP 2006A</option>
											<option value="19">OP 2006B</option>
											<option value="20">OP 2005B</option>
										</select>
										<label for="floatingEstate">OP</label>
									</div>
								</div>

								<div class="col-12">
									<div class="form-floating mb-3">
										<input type="date" class="form-control" id="floatingAwal" name="tgl_lahir">
										<label for="floatingAwal">Tanggal Awal</label>
									</div>
								</div>

								<div class="col-12">
									<div class="form-floating mb-3">
										<input type="date" class="form-control" id="floatingAkhir" name="tgl_lahir">
										<label for="floatingAkhir">Tanggal Akhir</label>
									</div>
								</div>

								<div class="text-center">
									<button type="submit" class="btn btn-primary">Simpan</button>
									<button type="reset" class="btn btn-secondary">Reset</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<?php require '../widgets/footer.php'; ?>