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
$id = $_SESSION['id'];
$query = mysqli_query($koneksi, " SELECT * FROM tbl_user WHERE id='$id'");
while ($read = mysqli_fetch_array($query)) {
    $id_author = $read['id'];
    $author = $read['nama'];
}
?>

<?php
require '../api/koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_pasien WHERE id_pasien='$id'");
while ($edit = mysqli_fetch_array($query)) {
    # code...
    $id_pasien = $edit['id_pasien'];
    $nama_pasien = $edit['nama_pasien'];
    $jk = $edit['jk'];
    $no_bpjs = $edit['no_bpjs'];
    $tgl_lahir = $edit['tgl_lahir'];
    $status_pasien = $edit['status_pasien'];
    $nama_pekerja = $edit['nama_pekerja'];
    $jabatan_pekerja = $edit['jabatan_pekerja'];
    $status_pekerja = $edit['status_pekerja'];
    $nohp_pekerja = $edit['nohp_pekerja'];
    $estate = $edit['estate'];
    $op = $edit['op'];
    $author = $edit['author'];
}
?>

<body>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>FORM EDIT PASIEN</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="../pages/pasien.php">Data Pasien</a></li>
                    <li class="breadcrumb-item active">Edit Pasien</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Pasien | NAMA : <?php echo $nama_pasien ?></h5>

                            <!-- General Form Elements -->
                            <form action="../api/edit_pasiens.php" method="POST">

                                <input id="id_pasien" name="id_pasien" value="<?php echo $id_pasien ?>" type="hidden" class="form-control" />
                                <input id="id_author" name="id_author" value="<?php echo $id_author ?>" type="hidden" class="form-control" />

                                <!-- Nama Pasien -->
                                <div class="col-12 position-relative">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="1" name="nama_pasien" onkeyup="my1()" value="<?php echo $nama_pasien; ?>" placeholder="Masukkan Nama Pasien" required>
                                        <label for="1">Nama Pasien</label>
                                        <div class="invalid-tooltip">
                                            Nama Pasien Tidak Boleh Kosong!
                                        </div>
                                    </div>
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <select class="form-control" id="floatingJk" name="jk" required>
                                            <option selected>Pilih Jenis Kelamin</option>

                                            <option <?php if ($jk == 'Laki-laki') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Laki-laki">Laki - Laki</option>

                                            <option <?php if ($jk == 'Perempuan') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Perempuan">Perempuan</option>
                                        </select>
                                        <label for="floatingJk">Pilih Jenis Kelamin</label>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                    </div>
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="floatingDate" name="tgl_lahir" value="<?php echo $tgl_lahir ?>" required>
                                        <label for="floatingDate">Tanggal Lahir</label>
                                        <div class="invalid-tooltip">
                                            Tanggal Lahir Tidak Boleh Kosong
                                        </div>
                                    </div>
                                </div>

                                <!--Status Pasien  -->
                                <div class="col-12"></div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" aria-label="Default select example" id="floatingStatus" name="status_pasien" required>
                                        <option selected disabled value>Pilih Status Pasien</option>
                                        <option <?php if ($status_pasien == 'Pekerja') {
                                                    # code...
                                                    echo 'selected';
                                                } ?> value="Pekerja">Pekerja</option>

                                        <option <?php if ($status_pasien == 'Suami/Istri') {
                                                    # code...
                                                    echo 'selected';
                                                } ?> value="Suami/Istri">Istri/Suami Pekerja</option>

                                        <option <?php if ($status_pasien == 'Anak Pekerja') {
                                                    # code...
                                                    echo 'selected';
                                                } ?> value="Anak Pekerja">Anak Pekerja</option>

                                        <option <?php if ($status_pasien == 'Umum') {
                                                    # code...
                                                    echo 'selected';
                                                } ?> value="Umum">Umum</option>
                                    </select>
                                    <label for="floatingStatus">Status Pasien</label>

                                </div>

                                <!-- Nama Pekerja -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="2" name="nama_pekerja" value="<?php echo $nama_pekerja ?>" onkeyup="my2()" placeholder="Masukkan Nama Pekerja" required>
                                        <label for="2">Nama Pekerja</label>
                                        <div class="invalid-tooltip">
                                            Nama Pekerja Tidak Boleh Kosong!
                                        </div>
                                    </div>
                                </div>

                                <!-- Jabatan Pekerja -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingJabatan" name="jabatan_pekerja" style="width: 100%;" data-placeholder="Pilih Jabatan">
                                            <option selected>Jabatan Pekerja</option>

                                            <option <?php if ($jabatan_pekerja == 'act. askep') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="act. askep">Act. Askep</option>

                                            <option <?php if ($jabatan_pekerja == 'Act. Manager') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Act. Manager">Act. Manager</option>

                                            <option <?php if ($jabatan_pekerja == 'Adm. Kebun') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Adm. Kebun">Adm. Kebun</option>

                                            <option <?php if ($jabatan_pekerja == 'Analis Laboratorium') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Analis Laboratorium">Analis Laboratorium</option>

                                            <option <?php if ($jabatan_pekerja == 'Anggota') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Anggota">Anggota</option>

                                            <option <?php if ($jabatan_pekerja == 'Askep') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Askep">Askep</option>

                                            <option <?php if ($jabatan_pekerja == 'Assistant') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Assistant">Assistant</option>

                                            <option <?php if ($jabatan_pekerja == 'Bidan') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Bidan">Bidan</option>

                                            <option <?php if ($jabatan_pekerja == 'Bilal Masjid') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Bilal Masjid">Bilal Masjid</option>

                                            <option <?php if ($jabatan_pekerja == 'Danru') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Danru">Danru</option>

                                            <option <?php if ($jabatan_pekerja == 'Danton') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Danton">Danton Security</option>

                                            <option <?php if ($jabatan_pekerja == 'DED') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="DED">Deputy Executive Director</option>

                                            <option <?php if ($jabatan_pekerja == 'DGM') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="DGM">Deputy General Manager</option>

                                            <option <?php if ($jabatan_pekerja == 'Dokter') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Dokter">Dokter Poliklinik</option>

                                            <option <?php if ($jabatan_pekerja == 'EP') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="EP">Effluent Pond</option>

                                            <option <?php if ($jabatan_pekerja == 'Electrical') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Electrical">Electrical</option>

                                            <option <?php if ($jabatan_pekerja == 'ESD') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="ESD">ESD</option>

                                            <option <?php if ($jabatan_pekerja == 'ED"') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="ED">Executive Director</option>

                                            <option <?php if ($jabatan_pekerja == 'FC') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="FC">Financial Controller</option>

                                            <option <?php if ($jabatan_pekerja == 'GM') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="GM">General Manager</option>

                                            <option <?php if ($jabatan_pekerja == 'Guru') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Guru">Guru</option>

                                            <option <?php if ($jabatan_pekerja == 'Head Sortasi') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Head Sortasi">Head Sortasi</option>

                                            <option <?php if ($jabatan_pekerja == 'Imam Masjid') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Imam Masjid">Imam Masjid</option>

                                            <option <?php if ($jabatan_pekerja == 'Kepala Gudang') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Kepala Gudang">Kepala Gudang</option>

                                            <option <?php if ($jabatan_pekerja == 'Kasir') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Kasir">Kasir</option>

                                            <option <?php if ($jabatan_pekerja == 'Keamanan') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Keamanan">Keamanan</option>

                                            <option <?php if ($jabatan_pekerja == 'Kepala Mekanik') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Kepala Mekanik">Kepala Mekanik</option>

                                            <option <?php if ($jabatan_pekerja == 'Kepala Sekolah') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Kepala Sekolah">Kepala Sekolah</option>

                                            <option <?php if ($jabatan_pekerja == 'Kerani') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Kerani">Kerani</option>

                                            <option <?php if ($jabatan_pekerja == 'KTU') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="KTU">KTU</option>

                                            <option <?php if ($jabatan_pekerja == 'Manager') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Manager">Manager</option>

                                            <option <?php if ($jabatan_pekerja == 'Mandor') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Mandor">Mandor</option>

                                            <option <?php if ($jabatan_pekerja == 'Mekanik') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Mekanik">Mekanik</option>

                                            <option <?php if ($jabatan_pekerja == 'Office Boy/Girl') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Office Boy/Girl">Office Boy/Girl</option>

                                            <option <?php if ($jabatan_pekerja == 'Oil Man') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Oil Man">Oil Man</option>

                                            <option <?php if ($jabatan_pekerja == 'Operator') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Operator">Operator</option>

                                            <option <?php if ($jabatan_pekerja == 'Pemanen') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Pemanen">Pemanen</option>

                                            <option <?php if ($jabatan_pekerja == 'Pembantu') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Pembantu">Pembantu</option>

                                            <option <?php if ($jabatan_pekerja == 'Pemuat') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Pemuat">Pemuat</option>

                                            <option <?php if ($jabatan_pekerja == 'Pengawas') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Pengawas">Pengawas</option>

                                            <option <?php if ($jabatan_pekerja == 'Pengirim Produksi') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Pengirim Produksi">Pengirim Produksi</option>

                                            <option <?php if ($jabatan_pekerja == 'Perawat') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Perawat">Perawat Poliklinik</option>

                                            <option <?php if ($jabatan_pekerja == 'Petugas') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Petugas">Petugas</option>

                                            <option <?php if ($jabatan_pekerja == 'Plt') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Plt">Pelaksana Tugas</option>

                                            <option <?php if ($jabatan_pekerja == 'Sekretatis') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Sekretatis">Sekretaris ED & DED, Assistant Administrasi Kebun</option>

                                            <option <?php if ($jabatan_pekerja == 'SM') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="SM">Senior Manager</option>

                                            <option <?php if ($jabatan_pekerja == 'Sortasi Tbs') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Sortasi Tbs">Sortasi TBS</option>

                                            <option <?php if ($jabatan_pekerja == 'Staff') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Staff">Staff </option>

                                            <option <?php if ($jabatan_pekerja == 'Supir') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Supir">Supir</option>

                                            <option <?php if ($jabatan_pekerja == 'Training') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Training">Training</option>

                                            <option <?php if ($jabatan_pekerja == 'Tukang Kebun') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Tukang Kebun">Tukang Kebun</option>

                                            <option <?php if ($jabatan_pekerja == 'Wadanru') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Wadanru">Wakil Komandan Regu</option>

                                            <option <?php if ($jabatan_pekerja == 'Welder') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Welder">Welder</option>

                                            <option <?php if ($jabatan_pekerja == 'Umum') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Umum">Umum</option>

                                        </select>
                                        <!-- <label for="floatingJabatan"> Jabatan </label> -->
                                    </div>
                                </div>

                                <!-- Status Pekerja -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" id="floatingStatusPekerja" name="status_pekerja" required>
                                            <option selected disabled value>Pilih Status Pekerja</option>
                                            <option <?php if ($status_pekerja == 'Executive') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Executive">Executive</option>

                                            <option <?php if ($status_pekerja == 'PB') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="PB">Pegawai Bulanan</option>

                                            <option <?php if ($status_pekerja == 'PGHT') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="PGHT">Pegawai Harian Tetap</option>

                                            <option <?php if ($status_pekerja == 'BHL') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="BHL">Buruh Harian Lepas</option>

                                            <option <?php if ($status_pekerja == 'BRG') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="BRG">Borongan</option>

                                            <option <?php if ($status_pekerja == 'Umum') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Umum">UMUM</option>
                                        </select>
                                        <label for="floatingStatusPekerja">Status Pekerja</label>
                                    </div>
                                </div>

                                <!-- Estate Pekerja -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" id="floatingEstate" name="estate" required>
                                            <option selected disabled value>Pilih Estate Pekerja</option>

                                            <option <?php if ($estate == 'RO') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="RO">Regional Office</option>

                                            <option <?php if ($estate == 'Pasir Salak') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Pasir Salak">Pasir Salak</option>

                                            <option <?php if ($estate == 'Pangkor') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Pangkor">Pangkor</option>

                                            <option <?php if ($estate == 'Grik') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Grik">Grik</option>

                                            <option <?php if ($estate == 'Pks') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Pks">PKS</option>

                                            <option <?php if ($estate == 'Umum') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Umum">Umum</option>
                                        </select>
                                        <label for="floatingEstate">Estate Pekerja</label>
                                    </div>
                                </div>

                                <!-- Op Pekerja -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" id="floatingOp" name="op" required>
                                            <option selected disabled value>Pilih OP Pekerja</option>

                                            <option <?php if ($op == 'RO') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="RO">Regional Office</option>

                                            <option <?php if ($op == 'PKS') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="PKS">PKS</option>

                                            <option <?php if ($op == 'OP 96') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 96">OP 96</option>

                                            <option <?php if ($op == 'OP 97A') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 97A">OP 97A</option>

                                            <option <?php if ($op == 'OP 97B') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 97B">OP 97B</option>

                                            <option <?php if ($op == 'OP 97C') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 97C">OP 97C</option>

                                            <option <?php if ($op == 'OP 97D') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 97D">OP 97D</option>

                                            <option <?php if ($op == 'OP 98A') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 98A">OP 98A</option>

                                            <option <?php if ($op == 'OP 98B') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 98B">OP 98B</option>

                                            <option <?php if ($op == 'OP 98C') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 98C">OP 98C</option>

                                            <option <?php if ($op == 'OP9 8D') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 98D">OP 98D</option>

                                            <option <?php if ($op == 'OP 99') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 99">OP 99</option>

                                            <option <?php if ($op == 'OP 2003/2004') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 2003/2004">OP 2003/2004</option>

                                            <option <?php if ($op == 'OP 2005A') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 2005A">OP 2005A</option>

                                            <option <?php if ($op == 'OP 2005B') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 2005B">OP 2005B</option>

                                            <option <?php if ($op == 'OP 2006A') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 2006A">OP 2006A</option>

                                            <option <?php if ($op == 'OP 2006B') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 2006B">OP 2006B</option>

                                            <option <?php if ($op == 'OP 2007A') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 2007A">OP 2007A</option>

                                            <option <?php if ($op == 'OP 2007B') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 2007B">OP 2007B</option>

                                            <option <?php if ($op == 'OP 2008') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="OP 2008">OP 2008</option>

                                            <option <?php if ($op == 'Nursery') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Nursery">Nursery</option>

                                            <option <?php if ($op == 'Umum') {
                                                        # code...
                                                        echo 'selected';
                                                    } ?> value="Umum">Umum</option>
                                        </select>
                                        <label for="floatingEstate">OP Pekerja</label>
                                    </div>
                                </div>

                                <!-- No BPJS -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="3" name="no_bpjs" value="<?php echo $no_bpjs ?>" onkeyup="my3()" placeholder="Masukkan" required>
                                        <label for="3">Nomor BPJS</label>
                                        <div class="invalid-tooltip">
                                            No BPJS Tidak Boleh Kosong!
                                        </div>
                                    </div>
                                </div>

                                <!-- No Hp -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="4" name="nohp_pekerja" value="<?php echo $nohp_pekerja ?>" onkeyup="my4()" placeholder="Masukkan" required>
                                        <label for="4">Nomor Handphone</label>
                                        <div class="invalid-tooltip">
                                            No HP Tidak Boleh Kosong!
                                        </div>
                                    </div>
                                </div>

                                <!-- AUTHOR -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="5" name="author" value="<?php echo $author; ?>" onkeyup="my5()" placeholder="Masukkan" readonly>
                                        <label for="5">Auhtor</label>
                                    </div>
                                </div>

                                <!-- Button Submit -->
                                <div class="row mb-3 text-center">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>

                                </div>

                            </form>
                            <!-- End General Form Elements -->

                        </div>
                    </div>
                </div>

            </div>
            </div>

            </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php require '../widgets/footer.php'; ?>