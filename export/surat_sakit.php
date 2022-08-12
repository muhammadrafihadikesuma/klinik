<!DOCTYPE html>
<html>

<head>
	<title>POLIKLINIK PWS</title>

	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}

		table tr .text2 {
			text-align: right;
			font-size: 16px;
		}

		table tr .text {
			text-align: center;
			font-size: 16px;
		}

		table tr td {
			font-size: 13px;
		}
	</style>
	<link href="../assets/img/apple-touch-icon-new.png" rel="apple-touch-icon">
	<link href="../assets/img/favicon-new.png" rel="icon">

</head>

<body>
	<?php
	require '../api/koneksi.php';
	$id = $_GET['id'];
	$no = 1;
	$query = mysqli_query($koneksi, "SELECT * FROM tbl_diagnosa WHERE id_diagnosa = '$id' ");
	while ($read = mysqli_fetch_array($query)) {
		# code...
		$id_diagnosa = $read['id_diagnosa'];
		$id_pasien = $read['id_pasien'];
		$diagnosa = $read['diagnosa'];
	}

	$query_suratsakit = mysqli_query($koneksi, "SELECT * FROM tbl_ssakit WHERE id_pasien = '$id_pasien' ");
	while ($readss = mysqli_fetch_array($query_suratsakit)) {
		# code...
		$id_suratsakit = $readss['id_suratsakit'];
		$nama_pasien = $readss['nama_pasien'];
		$jabatan_pekerja = $readss['jabatan_pekerja'];
		$jk = $readss['jk'];
		$status_pekerja = $readss['status_pekerja'];
		$jam_b = $readss['jam_b'];
		$waktu_i = $readss['waktu_i'];
		$dari_t = $readss['dari_t'];
		$sampai_d = $readss['sampai_d'];
		$catatan = $readss['catatan'];
		$tanggal_pendaftaran = $readss['tanggal_pendaftaran'];
		$umur = $readss['umur'];
	}

	// Format Tanggal Angka Ke Huruf Indonesia
	function penyebut($nilai)
	{
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " " . $huruf[$nilai];
		} else if ($nilai < 20) {
			$temp = penyebut($nilai - 10) . " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
		}
		return $temp;
	}

	function terbilang($nilai)
	{
		if ($nilai < 0) {
			$hasil = "minus " . trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}
		return $hasil;
	}

		// Format Bulan Indonesia
		$array_bln	= array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
		$bln		= $array_bln[date('n')];


	// Format Tanggal Indonesia
	function tgl_indo($tanggal)
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
	<center style="padding-top: 10px;">
		<table>
			<tr>
				<td><img src="../assets/img/logo_poliklinik.png" width="90" height="90"></td>
				<td>
					<center>
						<font size="6"><b>POLIKLINIK</b></font><br>
						<font size="6"><b>PT. PINANG WITMAS SEJATI</b></font><br>
						<font size="3">Desa Mangsang, Kecamatan Bayung Lencir, Kabupaten Musi Banyuasin</font><br>
						<font style="font-size: 15px">Provinsi Sumatera Selatan. WA : 0811-7837-948 , E-mail : poliklinikpws@gmail.com</font>
					</center>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<hr style="width:610px; height: 3px; background-color: black;">
				</td>
			</tr>
			<table>
				<center>
					<tr>
						<td style="font-size: 20px;"><u><b> SURAT KETERANGAN SAKIT</b> </u></td>
					</tr>
					<tr>

						<td style="font-size: 16px;">
							<center>
								No. <?php echo $id_suratsakit; ?>/POL - PWS/SKS/<?php echo $bln?>/<?php echo date("Y") ?>
							</center>
						</td>
					</tr>


				</center>

			</table>
		</table>

		<br>
		<br>
		<table width="625">
			<tr>
				<td>
					<font style="font-size: 16px;">Yang Bertanda Tangan Dibawah Ini Menerangkan Bahwa :</font>
				</td>
			</tr>
		</table>
		</table>
		<table style="padding-left: 20px; width: 660px; ">

			<tr>
				<td style="font-size: 16px; width: 120px;">Nama </td>
				<td style="width: 5px;">:</td>
				<td style="font-size: 14px;"> <b><?php echo $nama_pasien; ?></b></td>
			</tr>
			<tr>
				<td style="font-size: 16px; width: 120px;">Pekerjaan</td>
				<td>:</td>
				<td style="font-size: 14px;"><?php echo $jabatan_pekerja; ?></td>
			</tr>
			<tr>
				<td style="font-size: 16px; width: 120px;">Diagnosa</td>
				<td>:</td>
				<td style="font-size: 14px; text-align: justify;"> <?php echo $diagnosa; ?></td>
			</tr>
			<tr>
				<td style="font-size: 16px; width: 120px;">Jam Berobat</td>
				<td>:</td>
				<td style="font-size: 14px;"> <?php echo $jam_b; ?> WIB </php>
				</td>
			</tr>
			<tr>
				<td style="font-size: 16px; width: 120px;">Jenis Kelamin</td>
				<td>:</td>
				<td style="font-size: 14px;"> <?php echo $jk; ?></td>
			</tr>
			<tr>
				<td style="font-size: 16px; width: 120px;">Umur</td>
				<td>:</td>
				<td style="font-size: 14px;"> <?php echo $umur; ?> Tahun</td>
			</tr>
			<tr>
				<td style="font-size: 16px; width: 120px;">Golongan</td>
				<td>:</td>
				<td style="font-size: 14px;"> <?php echo $status_pekerja; ?></td>
			</tr>
		</table>
		<table width="620">
			<tr>
				<td style="text-align:justify;">
					<font style="font-size: 16px; text-align: justify;"> Dari Pemeriksaan Kami Dalam Keadaan Sakit dan Perlu Diberikan Istirahat Selama <b><?php echo $waktu_i ?></b> ( <b><?php echo terbilang($waktu_i) ?> </b>) Hari Terhitung Dari
						Tanggal <b> <?php echo tgl_indo($dari_t)  ?></b> Sampai Dengan <b><?php echo tgl_indo($sampai_d); ?></b>.
						<br>
						<br>
						Demikian Surat Keterangan Ini Dibuat Dengan Sebenarnya dan Untuk Dipergunakan Semestinya.
					</font>
				</td>
			</tr>
		</table>
		<br>
		<table width="620">
			<tr>
				<td style="font-size: 16px; width: 10000px;">
					<b style="font-size: 20px;">Catatan :</b>

				</td>
				<td></td>
				<td style="width: 5000px; text-align: center; font-size: 16px;">
					PT. PWS, <?php echo tgl_indo(date("Y-m-d"));  ?>
				</td>
			</tr>
			<tr>
				<td style="font-size: 16px; width: 100px; font-weight: bold; text-align: left;" >
					1 : Setelah Menerima Surat Ini Wajib Langsung Menyerahkan Ke Kantor Divisi.
					<br>
					<br>
					2 : <?php echo $catatan ?>
				</td>
				<td style="font-size: 16px;"></td>
				<td style="text-align: center;">
					<img src="../assets/img/ttd_new2.png" style="width: 160px; height: 140px;">
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td style="text-align: center; font-size: 16px;">
					<u><b>dr. Fahmi Fachruddinsyah</b></u>
					<br>
					<font style="font-size: 14px;">SIP No. 0169/SIPDP/DPMPTSP-IV/2021</font>
				</td>
			</tr>
		</table>
	</center>
</body>

</html>