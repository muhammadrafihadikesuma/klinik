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

<body>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>DATA PENDAFTARAN</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="../forms/add_pendaftaran.php">Input Pendaftaran</a></li>
                    <li class="breadcrumb-item active">Data Pendaftaran</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card shadow mb-4">
                <div class="col-lg-12">
                    <div class="card-body">
                        <h5 class="card-title">Data Pasien</h5>
                        <div class="card-body">
                            <h6><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inputPendaftaran">
                                    Input Pendaftaran
                                </button>
                            </h6>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NO. PENDAFTARAN</th>
                                            <th>NO. PASIEN</th>
                                            <th>NAMA PASIEN</th>
                                            <th>TANGGAL PENDAFTARAN</th>
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
                                                <td style="width:5%; text-align:left;"><?php echo tgl_indo($tanggal_pendaftaran) ;  ?></td>
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
</body>
<!-- ======= Footer ======= -->
<?php require '../widgets/footer.php'; ?>

<!-- Modal Input Pendaftaran -->
<div class="modal fade" id="inputPendaftaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Input Pendaftaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Data Pasien</h5>

                                    <div class="card-body">
                                        <table cellspacing="5" cellpadding="5">
                                            <tr>
                                                <td>
                                                    <h6><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pasienRo">
                                                            Pasien Regional Office
                                                        </button>
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6><button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#pasienPasirSalak">
                                                            Pasien Pasir Salak
                                                        </button>
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pasienPangkor">
                                                            Pasien Pangkor
                                                        </button>
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#pasienGrik">
                                                            Pasien Grik
                                                        </button>
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#pasienPom">
                                                            Pasien Pom
                                                        </button>
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#pasienUmum">
                                                            Pasien Umum
                                                        </button>
                                                    </h6>
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTablePendaftaran" width="100%" cellspacing="1">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>NO MR</th>
                                                        <th>NIK</th>
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
                                                    $sql = mysqli_query($koneksi, "SELECT * from tbl_pasien order by id Desc") or die("error karena" . mysqli_error($connection));
                                                    $no = 1;
                                                    while ($read = mysqli_fetch_array($sql)) {
                                                        $id_pasien = $read['id_pasien'];
                                                        $nik = $read['nik'];
                                                        $nama_pasien = $read['nama_pasien'];
                                                        $jk = $read['jk'];
                                                        $tgl_lahir = $read['tgl_lahir'];
                                                        $status_pasien = $read['status_pasien'];
                                                        $estate = $read['estate'];
                                                        $op = $read['op'];

                                                    ?>

                                                        <td><?php echo  $no++;  ?></td>
                                                        <td><?php echo  $id_pasien;  ?></td>
                                                        <td><?php echo  $nik;  ?></td>
                                                        <td><?php echo  $nama_pasien;  ?></td>
                                                        <td><?php echo  $jk;  ?></td>
                                                        <td><?php echo  tgl_indo($tgl_lahir);  ?></td>
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

                                    <?php
                                    require '../api/koneksi.php';
                                    $query = mysqli_query($koneksi, "SELECT max(id_pendaftaran) as kodeTerbesar FROM tbl_pendaftaran");
                                    $data = mysqli_fetch_array($query);
                                    $idPendaftaran = $data['kodeTerbesar'];
                                    $urutan = (int) substr($idPendaftaran, 6, 5);
                                    $urutan++;
                                    $huruf = "PWSPDF";
                                    $idPendaftaran = $huruf . sprintf("%05s", $urutan);


                                    $id = $_SESSION['id'];
                                    $query = mysqli_query($koneksi, " SELECT * FROM tbl_user WHERE id='$id'");
                                    while ($read = mysqli_fetch_array($query)) {
                                        $id_author = $read['id'];
                                        $author = $read['nama'];
                                    }
                                    ?>

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
                                            <input type="text" class="form-control" id="space" name="id_pasien" placeholder="Masukkan Nama Pasien" required>
                                            <label for="space">Nomor Pasien</label>
                                        </div>

                                        <!-- Tanggal Pendaftaran -->
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="date" class="form-control" id="floatingDate" name="tanggal_pendaftaran" required>
                                                <label for="floatingDate">Tanggal Pendaftaran</label>
                                            </div>
                                        </div>

                                        <!-- Jam Berobat -->
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="time" class="form-control" id="floatingDate" name="jam_b" required>
                                                <label for="floatingDate">Jam Berobat</label>
                                            </div>
                                        </div>

                                        <!-- Tinggi Badan -->
                                        <div class="col-12"></div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingTinggi" name="tinggi_badan" placeholder="Masukkan Tinggi Badan Dalam Format cm" required>
                                            <label for="floatingPasien">Tinggi Badan</label>
                                        </div>

                                        <!-- Berat Badan -->
                                        <div class="col-12"></div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingBerat" name="berat_badan" placeholder="Masukkan Berat Badan" required>
                                            <label for="floatingPasien">Berat Badan</label>
                                        </div>

                                        <!-- Lingkat Perut -->
                                        <div class="col-12"></div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingLingkar" name="lingkar_perut" placeholder="Masukkan Lingkar Perut" required>
                                            <label for="floatingPasien">Lingkar Perut</label>
                                        </div>

                                        <!-- Tensi Darah -->
                                        <div class="col-12"></div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingTensi" name="tensi_darah" placeholder="Masukkan Tensi Darah" required>
                                            <label for="floatingPasien">Tensi Darah</label>
                                        </div>

                                        <!-- Suhu -->
                                        <div class="col-12"></div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingSuhu" name="suhu" placeholder="Masukkan Suhu Tubuh" required>
                                            <label for="floatingPasien">Suhu Tubuh</label>
                                        </div>

                                        <!-- Nadi -->
                                        <div class="col-12"></div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingNadi" name="nadi" placeholder="Masukkan Denyut Nadi" required>
                                            <label for="floatingPasien">Denyut Nadi</label>
                                        </div>

                                        <!-- Pernafasan -->
                                        <div class="col-12"></div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingPernafasan" name="pernafasan" placeholder="Masukkan Pernafasan" required>
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
            </div>

        </div>
    </div>
</div>


<!-- Modal Input Pasien RO -->
<div class="modal fade" id="pasienRo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Input Pasien Regional Office</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- RO -->
                <?php
                require '../api/koneksi.php';
                $query1 = mysqli_query($koneksi, "SELECT max(id_pasien) as kodeTerbesar FROM ro");
                $data1 = mysqli_fetch_array($query1);
                $idPasien1 = $data1['kodeTerbesar'];
                $urutan1 = (int) substr($idPasien1, 6, 5);
                $urutan1++;
                $huruf1 = "PWSROF";
                $idPasien1 = $huruf1 . sprintf("%05s", $urutan1);
                ?>

                <?php
                require '../api/koneksi.php';
                $id = $_SESSION['id'];
                $querys = mysqli_query($koneksi, " SELECT * FROM tbl_user WHERE id='$id'");
                while ($reads = mysqli_fetch_array($querys)) {
                    $id_authors = $reads['id'];
                    $authors = $reads['nama'];
                }
                ?>
                <section class="section">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <form action="../api/add_ro.php" method="POST">

                                    <!-- <input id="id_pasien"  type="hidden" class="form-control" /> -->
                                    <div class="mb-3"></div>
                                    <input id="id" name="id" type="hidden" class="form-control" />
                                    <input id="id_author" name="id_author" value="<?php echo $id_authors ?>" type="hidden" class="form-control" />

                                    <!-- Kode Pasien -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="11" name="id_pasien" value="<?php echo $idPasien1 ?>" placeholder="Masukkan" readonly>
                                            <label for="11">Nomor Pasien</label>
                                        </div>
                                    </div>


                                    <!-- NIK -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="10" name="nik" placeholder="Nomor Induk Kependudukan" required>
                                            <label for="10">Nomor Induk Kependudukan</label>
                                        </div>
                                    </div>

                                    <!-- Nama Pasien -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="1" name="nama_pasien" onkeyup="my1()" placeholder="Nama Pasien" required>
                                            <label for="1">Nama Pasien</label>
                                        </div>
                                    </div>

                                    <!-- Jenis Kelamin -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-control" id="floatingJk" name="jk" required>
                                                <option selected disabled value>Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <label for="floatingJk">Pilih Jenis Kelamin</label>
                                        </div>
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="floatingDate" name="tgl_lahir" required>
                                            <label for="floatingDate">Tanggal Lahir</label>
                                        </div>
                                    </div>

                                    <!-- Umur -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="9" name="umur" onkeyup="my9()" placeholder="Nama Pasien" required>
                                            <label for="9">Umur</label>
                                        </div>
                                    </div>

                                    <!--Status Pasien  -->
                                    <div class="col-12"></div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" id="floatingStatus" name="status_pasien" required>
                                            <option selected disabled value>Pilih Status Pasien</option>
                                            <option value="Pekerja">Pekerja</option>
                                            <option value="Suami/Istri">Istri/Suami Pekerja</option>
                                            <option value="Anak Pekerja">Anak Pekerja</option>
                                            <option value="Umum">Umum</option>
                                        </select>
                                        <label for="floatingStatus">Status Pasien</label>

                                    </div>

                                    <!-- Nama Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="2" name="nama_pekerja" onkeyup="my2()" placeholder="Nama Pekerja" required>
                                            <label for="2">Nama Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Jabatan Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="jabatanPekerja" name="jabatan_pekerja" style="width: 100%;" data-placeholder="Pilih Jabatan">
                                                <option selected disabled value>Pilih Jabatan Pekerja</option>
                                                <option value="Act. Askep">Act. Askep</option>
                                                <option value="Act. Manager">Act. Manager</option>
                                                <option value="Adm. Kebun">Adm. Kebun</option>
                                                <option value="Analis Laboratorium">Analis Laboratorium</option>
                                                <option value="Anggota">Anggota</option>
                                                <option value="Askep">Askep</option>
                                                <option value="Assistant">Assistant</option>
                                                <option value="Bidan">Bidan</option>
                                                <option value="Bilal Masjid">Bilal Masjid</option>
                                                <option value="Danru">Danru</option>
                                                <option value="Danton">Danton Security</option>
                                                <option value="DED">Deputy Executive Director</option>
                                                <option value="DGM">Deputy General Manager</option>
                                                <option value="Dokter">Dokter Poliklinik</option>
                                                <option value="EP">Effluent Pond</option>
                                                <option value="Electrical">Electrical</option>
                                                <option value="ESD">ESD</option>
                                                <option value="ED">Executive Director</option>
                                                <option value="FC">Financial Controller</option>
                                                <option value="GM">General Manager</option>
                                                <option value="Guru">Guru</option>
                                                <option value="Head Sortasi">Head Sortasi</option>
                                                <option value="Imam Masjid">Imam Masjid</option>
                                                <option value="Kepala Gudang">Kepala Gudang</option>
                                                <option value="Kasir">Kasir</option>
                                                <option value="Keamanan">Keamanan</option>
                                                <option value="Kepala Mekanik">Kepala Mekanik</option>
                                                <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                <option value="Kerani">Kerani</option>
                                                <option value="KTU">KTU</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Mandor">Mandor</option>
                                                <option value="Mekanik">Mekanik</option>
                                                <option value="Office Boy/Girl">Office Boy/Girl</option>
                                                <option value="Oil Man">Oil Man</option>
                                                <option value="Operator">Operator</option>
                                                <option value="Pemanen">Pemanen</option>
                                                <option value="Pembantu">Pembantu</option>
                                                <option value="Pemuat">Pemuat</option>
                                                <option value="Pengawas">Pengawas</option>
                                                <option value="Pengirim Produksi">Pengirim Produksi</option>
                                                <option value="Perawat">Perawat Poliklinik</option>
                                                <option value="Petugas">Petugas</option>
                                                <option value="Plt">Pelaksana Tugas</option>
                                                <option value="Sekretatis">Sekretaris ED & DED, Assistant Administrasi Kebun</option>
                                                <option value="SM">Senior Manager</option>
                                                <option value="Sortasi Tbs">Sortasi TBS</option>
                                                <option value="Staff">Staff </option>
                                                <option value="Supir">Supir</option>
                                                <option value="Training">Training</option>
                                                <option value="Tukang Kebun">Tukang Kebun</option>
                                                <option value="Wadanru">Wakil Komandan Regu</option>
                                                <option value="Welder">Welder</option>
                                                <option value="Umum">Umum</option>
                                            </select>
                                            <label for="jabatanPekerja"> Jabatan </label>
                                        </div>
                                    </div>

                                    <!-- Status Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingStatusPekerja" name="status_pekerja" required>
                                                <option selected disabled value>Pilih Status Pekerja</option>
                                                <option value="Executive">Executive</option>
                                                <option value="PB">Pegawai Bulanan</option>
                                                <option value="PGHT">Pegawai Harian Tetap</option>
                                                <option value="BHL">Buruh Harian Lepas</option>
                                                <option value="BRG">Borongan</option>
                                                <option value="Umum">UMUM</option>
                                            </select>
                                            <label for="floatingStatusPekerja">Status Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Estate Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingEstate" name="estate" required>
                                                <option selected value="Regional Office">Regional Office</option>
                                            </select>
                                            <label for="floatingEstate">Estate Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Op Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingOp" name="op" required>
                                                <option selected value="Regional Office">Regional Office</option>
                                            </select>
                                            <label for="floatingEstate">OP Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- No BPJS -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="3" name="no_bpjs" onkeyup="my3()" placeholder="Nomor BPJS" required>
                                            <label for="3">Nomor BPJS</label>
                                            <div class="invalid-tooltip">
                                                No BPJS Tidak Boleh Kosong!
                                            </div>
                                        </div>
                                    </div>

                                    <!-- No Hp -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="4" value="62" name="nohp_pekerja" onkeyup="my4()" placeholder="Nomor Handphone" required>
                                            <label for="4">Nomor Handphone</label>
                                            <div class="invalid-tooltip">
                                                No HP Tidak Boleh Kosong!
                                            </div>
                                        </div>
                                    </div>

                                    <!-- AUTHOR -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="5" name="author" value="<?php echo $authors; ?>" onkeyup="my5()" placeholder="Masukkan" readonly>
                                            <label for="5">Auhtor</label>
                                        </div>
                                    </div>

                                    <!-- Button Submit -->
                                    <div class="row mb-3 text-center">
                                        <div class="col-sm-10" style="align-content: center;">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</div>

<!-- Modal Input Pasien Pasir Salak -->
<div class="modal fade" id="pasienPasirSalak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Input Pasien Pasir Salak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- PASIR SALAK -->
                <?php
                require '../api/koneksi.php';
                $query2 = mysqli_query($koneksi, "SELECT max(id_pasien) as kodeTerbesar FROM pasirsalak");
                $data2 = mysqli_fetch_array($query2);
                $idPasien2 = $data2['kodeTerbesar'];
                $urutan2 = (int) substr($idPasien2, 6, 5);
                $urutan2++;
                $huruf2 = "PWSPSL";
                $idPasien2 = $huruf2 . sprintf("%05s", $urutan2);
                ?>

                <?php
                require '../api/koneksi.php';
                $id = $_SESSION['id'];
                $querys = mysqli_query($koneksi, " SELECT * FROM tbl_user WHERE id='$id'");
                while ($reads = mysqli_fetch_array($querys)) {
                    $id_authors = $reads['id'];
                    $authors = $reads['nama'];
                }
                ?>
                <section class="section">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <form action="../api/add_pasirsalak.php" method="POST">

                                    <!-- <input id="id_pasien"  type="hidden" class="form-control" /> -->
                                    <div class="mb-3"></div>
                                    <input id="id" name="id" type="hidden" class="form-control" />
                                    <input id="id_author" name="id_author" value="<?php echo $id_authors ?>" type="hidden" class="form-control" />

                                    <!-- Kode Pasien -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="11" name="id_pasien" value="<?php echo $idPasien2 ?>" placeholder="Masukkan" readonly>
                                            <label for="11">Nomor Pasien</label>
                                        </div>
                                    </div>


                                    <!-- NIK -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="10" name="nik" placeholder="Nomor Induk Kependudukan" required>
                                            <label for="10">Nomor Induk Kependudukan</label>
                                        </div>
                                    </div>

                                    <!-- Nama Pasien -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="21" name="nama_pasien" onkeyup="my21()" placeholder="Nama Pasien" required>
                                            <label for="21">Nama Pasien</label>
                                        </div>
                                    </div>

                                    <!-- Jenis Kelamin -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-control" id="floatingJk" name="jk" required>
                                                <option selected disabled value>Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <label for="floatingJk">Pilih Jenis Kelamin</label>
                                        </div>
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="floatingDate" name="tgl_lahir" required>
                                            <label for="floatingDate">Tanggal Lahir</label>
                                        </div>
                                    </div>

                                    <!-- Umur -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="9" name="umur" onkeyup="my9()" placeholder="Nama Pasien" required>
                                            <label for="9">Umur</label>
                                        </div>
                                    </div>

                                    <!--Status Pasien  -->
                                    <div class="col-12"></div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" id="floatingStatus" name="status_pasien" required>
                                            <option selected disabled value>Pilih Status Pasien</option>
                                            <option value="Pekerja">Pekerja</option>
                                            <option value="Suami/Istri">Istri/Suami Pekerja</option>
                                            <option value="Anak Pekerja">Anak Pekerja</option>
                                            <option value="Umum">Umum</option>
                                        </select>
                                        <label for="floatingStatus">Status Pasien</label>

                                    </div>

                                    <!-- Nama Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="22" name="nama_pekerja" onkeyup="my22()" placeholder="Nama Pekerja" required>
                                            <label for="22">Nama Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Jabatan Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="jabatanPekerja" name="jabatan_pekerja" style="width: 100%;" data-placeholder="Pilih Jabatan">
                                                <option selected disabled value>Pilih Jabatan Pekerja</option>
                                                <option value="Act. Askep">Act. Askep</option>
                                                <option value="Act. Manager">Act. Manager</option>
                                                <option value="Adm. Kebun">Adm. Kebun</option>
                                                <option value="Analis Laboratorium">Analis Laboratorium</option>
                                                <option value="Anggota">Anggota</option>
                                                <option value="Askep">Askep</option>
                                                <option value="Assistant">Assistant</option>
                                                <option value="Bidan">Bidan</option>
                                                <option value="Bilal Masjid">Bilal Masjid</option>
                                                <option value="Danru">Danru</option>
                                                <option value="Danton">Danton Security</option>
                                                <option value="DED">Deputy Executive Director</option>
                                                <option value="DGM">Deputy General Manager</option>
                                                <option value="Dokter">Dokter Poliklinik</option>
                                                <option value="EP">Effluent Pond</option>
                                                <option value="Electrical">Electrical</option>
                                                <option value="ESD">ESD</option>
                                                <option value="ED">Executive Director</option>
                                                <option value="FC">Financial Controller</option>
                                                <option value="GM">General Manager</option>
                                                <option value="Guru">Guru</option>
                                                <option value="Head Sortasi">Head Sortasi</option>
                                                <option value="Imam Masjid">Imam Masjid</option>
                                                <option value="Kepala Gudang">Kepala Gudang</option>
                                                <option value="Kasir">Kasir</option>
                                                <option value="Keamanan">Keamanan</option>
                                                <option value="Kepala Mekanik">Kepala Mekanik</option>
                                                <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                <option value="Kerani">Kerani</option>
                                                <option value="KTU">KTU</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Mandor">Mandor</option>
                                                <option value="Mekanik">Mekanik</option>
                                                <option value="Office Boy/Girl">Office Boy/Girl</option>
                                                <option value="Oil Man">Oil Man</option>
                                                <option value="Operator">Operator</option>
                                                <option value="Pemanen">Pemanen</option>
                                                <option value="Pembantu">Pembantu</option>
                                                <option value="Pemuat">Pemuat</option>
                                                <option value="Pengawas">Pengawas</option>
                                                <option value="Pengirim Produksi">Pengirim Produksi</option>
                                                <option value="Perawat">Perawat Poliklinik</option>
                                                <option value="Petugas">Petugas</option>
                                                <option value="Plt">Pelaksana Tugas</option>
                                                <option value="Sekretatis">Sekretaris ED & DED, Assistant Administrasi Kebun</option>
                                                <option value="SM">Senior Manager</option>
                                                <option value="Sortasi Tbs">Sortasi TBS</option>
                                                <option value="Staff">Staff </option>
                                                <option value="Supir">Supir</option>
                                                <option value="Training">Training</option>
                                                <option value="Tukang Kebun">Tukang Kebun</option>
                                                <option value="Wadanru">Wakil Komandan Regu</option>
                                                <option value="Welder">Welder</option>
                                                <option value="Umum">Umum</option>
                                            </select>
                                            <label for="jabatanPekerja"> Jabatan </label>
                                        </div>
                                    </div>

                                    <!-- Status Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingStatusPekerja" name="status_pekerja" required>
                                                <option selected disabled value>Pilih Status Pekerja</option>
                                                <option value="Executive">Executive</option>
                                                <option value="PB">Pegawai Bulanan</option>
                                                <option value="PGHT">Pegawai Harian Tetap</option>
                                                <option value="BHL">Buruh Harian Lepas</option>
                                                <option value="BRG">Borongan</option>
                                                <option value="Umum">UMUM</option>
                                            </select>
                                            <label for="floatingStatusPekerja">Status Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Estate Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingEstate" name="estate" required>
                                                <option selected value="Pasir Salak">Pasir Salak</option>
                                            </select>
                                            <label for="floatingEstate">Estate Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Op Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingOp" name="op" required>
                                                <option selected disabled value>Pilih OP Pekerja</option>
                                                <option value="OP 96">OP 96</option>
                                                <option value="OP 97 A">OP 97 A</option>
                                                <option value="OP 97 B">OP 97 B</option>
                                                <option value="OP 97 C">OP 97 C</option>
                                                <option value="OP 97 D">OP 97 D</option>
                                                <option value="OP 98 A">OP 98 A</option>
                                            </select>
                                            <label for="floatingEstate">OP Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- No BPJS -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="3" name="no_bpjs" onkeyup="my3()" placeholder="Nomor BPJS" required>
                                            <label for="3">Nomor BPJS</label>
                                            <div class="invalid-tooltip">
                                                No BPJS Tidak Boleh Kosong!
                                            </div>
                                        </div>
                                    </div>

                                    <!-- No Hp -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="4" value="62" name="nohp_pekerja" onkeyup="my4()" placeholder="Nomor Handphone" required>
                                            <label for="4">Nomor Handphone</label>
                                            <div class="invalid-tooltip">
                                                No HP Tidak Boleh Kosong!
                                            </div>
                                        </div>
                                    </div>

                                    <!-- AUTHOR -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="5" name="author" value="<?php echo $authors; ?>" onkeyup="my5()" placeholder="Masukkan" readonly>
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
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</div>

<!-- PASIEN PANGKOR  -->
<div class="modal fade" id="pasienPangkor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Input Pasien Pangkor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php
                require '../api/koneksi.php';
                $query3 = mysqli_query($koneksi, "SELECT max(id_pasien) as kodeTerbesar FROM pangkor");
                $data3 = mysqli_fetch_array($query3);
                $idPasien3 = $data3['kodeTerbesar'];
                $urutan3 = (int) substr($idPasien3, 6, 5);
                $urutan3++;
                $huruf3 = "PWSPKR";
                $idPasien3 = $huruf3 . sprintf("%05s", $urutan3);
                ?>

                <?php
                require '../api/koneksi.php';
                $id = $_SESSION['id'];
                $querys = mysqli_query($koneksi, " SELECT * FROM tbl_user WHERE id='$id'");
                while ($reads = mysqli_fetch_array($querys)) {
                    $id_authors = $reads['id'];
                    $authors = $reads['nama'];
                }
                ?>
                <section class="section">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <form action="../api/add_pangkor.php" method="POST">

                                    <!-- <input id="id_pasien"  type="hidden" class="form-control" /> -->
                                    <div class="mb-3"></div>
                                    <input id="id" name="id" type="hidden" class="form-control" />
                                    <input id="id_author" name="id_author" value="<?php echo $id_authors ?>" type="hidden" class="form-control" />

                                    <!-- Kode Pasien -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="11" name="id_pasien" value="<?php echo $idPasien3 ?>" placeholder="Masukkan" readonly>
                                            <label for="11">Nomor Pasien</label>
                                        </div>
                                    </div>


                                    <!-- NIK -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="10" name="nik" placeholder="Nomor Induk Kependudukan" required>
                                            <label for="10">Nomor Induk Kependudukan</label>
                                        </div>
                                    </div>

                                    <!-- Nama Pasien -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="23" name="nama_pasien" onkeyup="my23()" placeholder="Nama Pasien" required>
                                            <label for="23">Nama Pasien</label>
                                        </div>
                                    </div>

                                    <!-- Jenis Kelamin -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-control" id="floatingJk" name="jk" required>
                                                <option selected disabled value>Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <label for="floatingJk">Pilih Jenis Kelamin</label>
                                        </div>
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="floatingDate" name="tgl_lahir" required>
                                            <label for="floatingDate">Tanggal Lahir</label>
                                        </div>
                                    </div>

                                    <!-- Umur -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="9" name="umur" onkeyup="my9()" placeholder="Nama Pasien" required>
                                            <label for="9">Umur</label>
                                        </div>
                                    </div>

                                    <!--Status Pasien  -->
                                    <div class="col-12"></div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" id="floatingStatus" name="status_pasien" required>
                                            <option selected disabled value>Pilih Status Pasien</option>
                                            <option value="Pekerja">Pekerja</option>
                                            <option value="Suami/Istri">Istri/Suami Pekerja</option>
                                            <option value="Anak Pekerja">Anak Pekerja</option>
                                            <option value="Umum">Umum</option>
                                        </select>
                                        <label for="floatingStatus">Status Pasien</label>

                                    </div>

                                    <!-- Nama Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="24" name="nama_pekerja" onkeyup="my24()" placeholder="Nama Pekerja" required>
                                            <label for="24">Nama Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Jabatan Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="jabatanPekerja" name="jabatan_pekerja" style="width: 100%;" data-placeholder="Pilih Jabatan">
                                                <option selected disabled value>Pilih Jabatan Pekerja</option>
                                                <option value="Act. Askep">Act. Askep</option>
                                                <option value="Act. Manager">Act. Manager</option>
                                                <option value="Adm. Kebun">Adm. Kebun</option>
                                                <option value="Analis Laboratorium">Analis Laboratorium</option>
                                                <option value="Anggota">Anggota</option>
                                                <option value="Askep">Askep</option>
                                                <option value="Assistant">Assistant</option>
                                                <option value="Bidan">Bidan</option>
                                                <option value="Bilal Masjid">Bilal Masjid</option>
                                                <option value="Danru">Danru</option>
                                                <option value="Danton">Danton Security</option>
                                                <option value="DED">Deputy Executive Director</option>
                                                <option value="DGM">Deputy General Manager</option>
                                                <option value="Dokter">Dokter Poliklinik</option>
                                                <option value="EP">Effluent Pond</option>
                                                <option value="Electrical">Electrical</option>
                                                <option value="ESD">ESD</option>
                                                <option value="ED">Executive Director</option>
                                                <option value="FC">Financial Controller</option>
                                                <option value="GM">General Manager</option>
                                                <option value="Guru">Guru</option>
                                                <option value="Head Sortasi">Head Sortasi</option>
                                                <option value="Imam Masjid">Imam Masjid</option>
                                                <option value="Kepala Gudang">Kepala Gudang</option>
                                                <option value="Kasir">Kasir</option>
                                                <option value="Keamanan">Keamanan</option>
                                                <option value="Kepala Mekanik">Kepala Mekanik</option>
                                                <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                <option value="Kerani">Kerani</option>
                                                <option value="KTU">KTU</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Mandor">Mandor</option>
                                                <option value="Mekanik">Mekanik</option>
                                                <option value="Office Boy/Girl">Office Boy/Girl</option>
                                                <option value="Oil Man">Oil Man</option>
                                                <option value="Operator">Operator</option>
                                                <option value="Pemanen">Pemanen</option>
                                                <option value="Pembantu">Pembantu</option>
                                                <option value="Pemuat">Pemuat</option>
                                                <option value="Pengawas">Pengawas</option>
                                                <option value="Pengirim Produksi">Pengirim Produksi</option>
                                                <option value="Perawat">Perawat Poliklinik</option>
                                                <option value="Petugas">Petugas</option>
                                                <option value="Plt">Pelaksana Tugas</option>
                                                <option value="Sekretatis">Sekretaris ED & DED, Assistant Administrasi Kebun</option>
                                                <option value="SM">Senior Manager</option>
                                                <option value="Sortasi Tbs">Sortasi TBS</option>
                                                <option value="Staff">Staff </option>
                                                <option value="Supir">Supir</option>
                                                <option value="Training">Training</option>
                                                <option value="Tukang Kebun">Tukang Kebun</option>
                                                <option value="Wadanru">Wakil Komandan Regu</option>
                                                <option value="Welder">Welder</option>
                                                <option value="Umum">Umum</option>
                                            </select>
                                            <label for="jabatanPekerja"> Jabatan </label>
                                        </div>
                                    </div>

                                    <!-- Status Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingStatusPekerja" name="status_pekerja" required>
                                                <option selected disabled value>Pilih Status Pekerja</option>
                                                <option value="Executive">Executive</option>
                                                <option value="PB">Pegawai Bulanan</option>
                                                <option value="PGHT">Pegawai Harian Tetap</option>
                                                <option value="BHL">Buruh Harian Lepas</option>
                                                <option value="BRG">Borongan</option>
                                                <option value="Umum">UMUM</option>
                                            </select>
                                            <label for="floatingStatusPekerja">Status Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Estate Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingEstate" name="estate" required>
                                                <option selected value="Pangkor">Pangkor</option>
                                            </select>
                                            <label for="floatingEstate">Estate Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Op Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingOp" name="op" required>
                                                <option selected disabled value>Pilih OP Pekerja</option>
                                                <option value="OP 98 B">OP 98 B</option>
                                                <option value="OP 98 C">OP 98 C</option>
                                                <option value="OP 98 D">OP 98 D</option>
                                                <option value="OP 99">OP 99</option>
                                                <option value="OP 2007 B">OP 2007 B</option>
                                                <option value="OP 2008">OP 2008</option>
                                            </select>
                                            <label for="floatingEstate">OP Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- No BPJS -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="3" name="no_bpjs" onkeyup="my3()" placeholder="Nomor BPJS" required>
                                            <label for="3">Nomor BPJS</label>
                                            <div class="invalid-tooltip">
                                                No BPJS Tidak Boleh Kosong!
                                            </div>
                                        </div>
                                    </div>

                                    <!-- No Hp -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="4" value="62" name="nohp_pekerja" onkeyup="my4()" placeholder="Nomor Handphone" required>
                                            <label for="4">Nomor Handphone</label>
                                            <div class="invalid-tooltip">
                                                No HP Tidak Boleh Kosong!
                                            </div>
                                        </div>
                                    </div>

                                    <!-- AUTHOR -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="5" name="author" value="<?php echo $authors; ?>" onkeyup="my5()" placeholder="Masukkan" readonly>
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
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</div>

<!-- PASIEN GRIK -->
<div class="modal fade" id="pasienGrik" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Input Pasien Grik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php
                require '../api/koneksi.php';
                $query4 = mysqli_query($koneksi, "SELECT max(id_pasien) as kodeTerbesar FROM grik");
                $data4 = mysqli_fetch_array($query4);
                $idPasien4 = $data4['kodeTerbesar'];
                $urutan4 = (int) substr($idPasien4, 6, 5);
                $urutan4++;
                $huruf4 = "PWSGRK";
                $idPasien4 = $huruf4 . sprintf("%05s", $urutan4);
                ?>

                <?php
                require '../api/koneksi.php';
                $id = $_SESSION['id'];
                $querys = mysqli_query($koneksi, " SELECT * FROM tbl_user WHERE id='$id'");
                while ($reads = mysqli_fetch_array($querys)) {
                    $id_authors = $reads['id'];
                    $authors = $reads['nama'];
                }
                ?>
                <section class="section">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <form action="../api/add_grik.php" method="POST">

                                    <!-- <input id="id_pasien"  type="hidden" class="form-control" /> -->
                                    <div class="mb-3"></div>
                                    <input id="id" name="id" type="hidden" class="form-control" />
                                    <input id="id_author" name="id_author" value="<?php echo $id_authors ?>" type="hidden" class="form-control" />

                                    <!-- Kode Pasien -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="11" name="id_pasien" value="<?php echo $idPasien4 ?>" placeholder="Masukkan" readonly>
                                            <label for="11">Nomor Pasien</label>
                                        </div>
                                    </div>


                                    <!-- NIK -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="10" name="nik" placeholder="Nomor Induk Kependudukan" required>
                                            <label for="10">Nomor Induk Kependudukan</label>
                                        </div>
                                    </div>

                                    <!-- Nama Pasien -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="25" name="nama_pasien" onkeyup="my25()" placeholder="Nama Pasien" required>
                                            <label for="25">Nama Pasien</label>
                                        </div>
                                    </div>

                                    <!-- Jenis Kelamin -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-control" id="floatingJk" name="jk" required>
                                                <option selected disabled value>Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <label for="floatingJk">Pilih Jenis Kelamin</label>
                                        </div>
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="floatingDate" name="tgl_lahir" required>
                                            <label for="floatingDate">Tanggal Lahir</label>
                                        </div>
                                    </div>

                                    <!-- Umur -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="9" name="umur" onkeyup="my9()" placeholder="Nama Pasien" required>
                                            <label for="9">Umur</label>
                                        </div>
                                    </div>

                                    <!--Status Pasien  -->
                                    <div class="col-12"></div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" id="floatingStatus" name="status_pasien" required>
                                            <option selected disabled value>Pilih Status Pasien</option>
                                            <option value="Pekerja">Pekerja</option>
                                            <option value="Suami/Istri">Istri/Suami Pekerja</option>
                                            <option value="Anak Pekerja">Anak Pekerja</option>
                                            <option value="Umum">Umum</option>
                                        </select>
                                        <label for="floatingStatus">Status Pasien</label>

                                    </div>

                                    <!-- Nama Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="26" name="nama_pekerja" onkeyup="my26()" placeholder="Nama Pekerja" required>
                                            <label for="26">Nama Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Jabatan Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="jabatanPekerja" name="jabatan_pekerja" style="width: 100%;" data-placeholder="Pilih Jabatan">
                                                <option selected disabled value>Pilih Jabatan Pekerja</option>
                                                <option value="Act. Askep">Act. Askep</option>
                                                <option value="Act. Manager">Act. Manager</option>
                                                <option value="Adm. Kebun">Adm. Kebun</option>
                                                <option value="Analis Laboratorium">Analis Laboratorium</option>
                                                <option value="Anggota">Anggota</option>
                                                <option value="Askep">Askep</option>
                                                <option value="Assistant">Assistant</option>
                                                <option value="Bidan">Bidan</option>
                                                <option value="Bilal Masjid">Bilal Masjid</option>
                                                <option value="Danru">Danru</option>
                                                <option value="Danton">Danton Security</option>
                                                <option value="DED">Deputy Executive Director</option>
                                                <option value="DGM">Deputy General Manager</option>
                                                <option value="Dokter">Dokter Poliklinik</option>
                                                <option value="EP">Effluent Pond</option>
                                                <option value="Electrical">Electrical</option>
                                                <option value="ESD">ESD</option>
                                                <option value="ED">Executive Director</option>
                                                <option value="FC">Financial Controller</option>
                                                <option value="GM">General Manager</option>
                                                <option value="Guru">Guru</option>
                                                <option value="Head Sortasi">Head Sortasi</option>
                                                <option value="Imam Masjid">Imam Masjid</option>
                                                <option value="Kepala Gudang">Kepala Gudang</option>
                                                <option value="Kasir">Kasir</option>
                                                <option value="Keamanan">Keamanan</option>
                                                <option value="Kepala Mekanik">Kepala Mekanik</option>
                                                <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                <option value="Kerani">Kerani</option>
                                                <option value="KTU">KTU</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Mandor">Mandor</option>
                                                <option value="Mekanik">Mekanik</option>
                                                <option value="Office Boy/Girl">Office Boy/Girl</option>
                                                <option value="Oil Man">Oil Man</option>
                                                <option value="Operator">Operator</option>
                                                <option value="Pemanen">Pemanen</option>
                                                <option value="Pembantu">Pembantu</option>
                                                <option value="Pemuat">Pemuat</option>
                                                <option value="Pengawas">Pengawas</option>
                                                <option value="Pengirim Produksi">Pengirim Produksi</option>
                                                <option value="Perawat">Perawat Poliklinik</option>
                                                <option value="Petugas">Petugas</option>
                                                <option value="Plt">Pelaksana Tugas</option>
                                                <option value="Sekretatis">Sekretaris ED & DED, Assistant Administrasi Kebun</option>
                                                <option value="SM">Senior Manager</option>
                                                <option value="Sortasi Tbs">Sortasi TBS</option>
                                                <option value="Staff">Staff </option>
                                                <option value="Supir">Supir</option>
                                                <option value="Training">Training</option>
                                                <option value="Tukang Kebun">Tukang Kebun</option>
                                                <option value="Wadanru">Wakil Komandan Regu</option>
                                                <option value="Welder">Welder</option>
                                                <option value="Umum">Umum</option>
                                            </select>
                                            <label for="jabatanPekerja"> Jabatan </label>
                                        </div>
                                    </div>

                                    <!-- Status Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingStatusPekerja" name="status_pekerja" required>
                                                <option selected disabled value>Pilih Status Pekerja</option>
                                                <option value="Executive">Executive</option>
                                                <option value="PB">Pegawai Bulanan</option>
                                                <option value="PGHT">Pegawai Harian Tetap</option>
                                                <option value="BHL">Buruh Harian Lepas</option>
                                                <option value="BRG">Borongan</option>
                                                <option value="Umum">UMUM</option>
                                            </select>
                                            <label for="floatingStatusPekerja">Status Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Estate Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingEstate" name="estate" required>
                                                <option selected value="Grik">Grik</option>
                                            </select>
                                            <label for="floatingEstate">Estate Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Op Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingOp" name="op" required>
                                                <option selected disabled value>Pilih OP Pekerja</option>
                                                <option value="OP 2003/2004">OP 2003/2004</option>
                                                <option value="OP 2005 A">OP 2005 A</option>
                                                <option value="OP 2005 B">OP 2005 B</option>
                                                <option value="OP 2006 A">OP 2006 A</option>
                                                <option value="OP 2006 B">OP 2006 B</option>
                                                <option value="OP 2007 A">OP 2007 A</option>
                                            </select>
                                            <label for="floatingEstate">OP Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- No BPJS -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="3" name="no_bpjs" onkeyup="my3()" placeholder="Nomor BPJS" required>
                                            <label for="3">Nomor BPJS</label>
                                            <div class="invalid-tooltip">
                                                No BPJS Tidak Boleh Kosong!
                                            </div>
                                        </div>
                                    </div>

                                    <!-- No Hp -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="4" value="62" name="nohp_pekerja" onkeyup="my4()" placeholder="Nomor Handphone" required>
                                            <label for="4">Nomor Handphone</label>
                                            <div class="invalid-tooltip">
                                                No HP Tidak Boleh Kosong!
                                            </div>
                                        </div>
                                    </div>

                                    <!-- AUTHOR -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="5" name="author" value="<?php echo $authors; ?>" onkeyup="my5()" placeholder="Masukkan" readonly>
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
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</div>

<!-- PASIEN POM -->
<div class="modal fade" id="pasienPom" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Input Pasien PKS POM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php
                require '../api/koneksi.php';
                $query5 = mysqli_query($koneksi, "SELECT max(id_pasien) as kodeTerbesar FROM pom");
                $data5 = mysqli_fetch_array($query5);
                $idPasien5 = $data5['kodeTerbesar'];
                $urutan5 = (int) substr($idPasien5, 6, 5);
                $urutan5++;
                $huruf5 = "PWSPOM";
                $idPasien5 = $huruf5 . sprintf("%05s", $urutan5);
                ?>

                <?php
                require '../api/koneksi.php';
                $id = $_SESSION['id'];
                $querys = mysqli_query($koneksi, " SELECT * FROM tbl_user WHERE id='$id'");
                while ($reads = mysqli_fetch_array($querys)) {
                    $id_authors = $reads['id'];
                    $authors = $reads['nama'];
                }
                ?>
                <section class="section">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <form action="../api/add_pom.php" method="POST">

                                    <!-- <input id="id_pasien"  type="hidden" class="form-control" /> -->
                                    <div class="mb-3"></div>
                                    <input id="id" name="id" type="hidden" class="form-control" />
                                    <input id="id_author" name="id_author" value="<?php echo $id_authors ?>" type="hidden" class="form-control" />

                                    <!-- Kode Pasien -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="11" name="id_pasien" value="<?php echo $idPasien5 ?>" placeholder="Masukkan" readonly>
                                            <label for="11">Nomor Pasien</label>
                                        </div>
                                    </div>


                                    <!-- NIK -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="10" name="nik" placeholder="Nomor Induk Kependudukan" required>
                                            <label for="10">Nomor Induk Kependudukan</label>
                                        </div>
                                    </div>

                                    <!-- Nama Pasien -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="27" name="nama_pasien" onkeyup="my27()" placeholder="Nama Pasien" required>
                                            <label for="27">Nama Pasien</label>
                                        </div>
                                    </div>

                                    <!-- Jenis Kelamin -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-control" id="floatingJk" name="jk" required>
                                                <option selected disabled value>Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <label for="floatingJk">Pilih Jenis Kelamin</label>
                                        </div>
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="floatingDate" name="tgl_lahir" required>
                                            <label for="floatingDate">Tanggal Lahir</label>
                                        </div>
                                    </div>

                                    <!-- Umur -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="9" name="umur" onkeyup="my9()" placeholder="Nama Pasien" required>
                                            <label for="9">Umur</label>
                                        </div>
                                    </div>

                                    <!--Status Pasien  -->
                                    <div class="col-12"></div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" id="floatingStatus" name="status_pasien" required>
                                            <option selected disabled value>Pilih Status Pasien</option>
                                            <option value="Pekerja">Pekerja</option>
                                            <option value="Suami/Istri">Istri/Suami Pekerja</option>
                                            <option value="Anak Pekerja">Anak Pekerja</option>
                                            <option value="Umum">Umum</option>
                                        </select>
                                        <label for="floatingStatus">Status Pasien</label>

                                    </div>

                                    <!-- Nama Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="28" name="nama_pekerja" onkeyup="my28()" placeholder="Nama Pekerja" required>
                                            <label for="28">Nama Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Jabatan Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="jabatanPekerja" name="jabatan_pekerja" style="width: 100%;" data-placeholder="Pilih Jabatan">
                                                <option selected disabled value>Pilih Jabatan Pekerja</option>
                                                <option value="Act. Askep">Act. Askep</option>
                                                <option value="Act. Manager">Act. Manager</option>
                                                <option value="Adm. Kebun">Adm. Kebun</option>
                                                <option value="Analis Laboratorium">Analis Laboratorium</option>
                                                <option value="Anggota">Anggota</option>
                                                <option value="Askep">Askep</option>
                                                <option value="Assistant">Assistant</option>
                                                <option value="Bidan">Bidan</option>
                                                <option value="Bilal Masjid">Bilal Masjid</option>
                                                <option value="Danru">Danru</option>
                                                <option value="Danton">Danton Security</option>
                                                <option value="DED">Deputy Executive Director</option>
                                                <option value="DGM">Deputy General Manager</option>
                                                <option value="Dokter">Dokter Poliklinik</option>
                                                <option value="EP">Effluent Pond</option>
                                                <option value="Electrical">Electrical</option>
                                                <option value="ESD">ESD</option>
                                                <option value="ED">Executive Director</option>
                                                <option value="FC">Financial Controller</option>
                                                <option value="GM">General Manager</option>
                                                <option value="Guru">Guru</option>
                                                <option value="Head Sortasi">Head Sortasi</option>
                                                <option value="Imam Masjid">Imam Masjid</option>
                                                <option value="Kepala Gudang">Kepala Gudang</option>
                                                <option value="Kasir">Kasir</option>
                                                <option value="Keamanan">Keamanan</option>
                                                <option value="Kepala Mekanik">Kepala Mekanik</option>
                                                <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                <option value="Kerani">Kerani</option>
                                                <option value="KTU">KTU</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Mandor">Mandor</option>
                                                <option value="Mekanik">Mekanik</option>
                                                <option value="Office Boy/Girl">Office Boy/Girl</option>
                                                <option value="Oil Man">Oil Man</option>
                                                <option value="Operator">Operator</option>
                                                <option value="Pemanen">Pemanen</option>
                                                <option value="Pembantu">Pembantu</option>
                                                <option value="Pemuat">Pemuat</option>
                                                <option value="Pengawas">Pengawas</option>
                                                <option value="Pengirim Produksi">Pengirim Produksi</option>
                                                <option value="Perawat">Perawat Poliklinik</option>
                                                <option value="Petugas">Petugas</option>
                                                <option value="Plt">Pelaksana Tugas</option>
                                                <option value="Sekretatis">Sekretaris ED & DED, Assistant Administrasi Kebun</option>
                                                <option value="SM">Senior Manager</option>
                                                <option value="Sortasi Tbs">Sortasi TBS</option>
                                                <option value="Staff">Staff </option>
                                                <option value="Supir">Supir</option>
                                                <option value="Training">Training</option>
                                                <option value="Tukang Kebun">Tukang Kebun</option>
                                                <option value="Wadanru">Wakil Komandan Regu</option>
                                                <option value="Welder">Welder</option>
                                                <option value="Umum">Umum</option>
                                            </select>
                                            <label for="jabatanPekerja"> Jabatan </label>
                                        </div>
                                    </div>

                                    <!-- Status Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingStatusPekerja" name="status_pekerja" required>
                                                <option selected disabled value>Pilih Status Pekerja</option>
                                                <option value="Executive">Executive</option>
                                                <option value="PB">Pegawai Bulanan</option>
                                                <option value="PGHT">Pegawai Harian Tetap</option>
                                                <option value="BHL">Buruh Harian Lepas</option>
                                                <option value="BRG">Borongan</option>
                                                <option value="Umum">UMUM</option>
                                            </select>
                                            <label for="floatingStatusPekerja">Status Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Estate Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingEstate" name="estate" required>
                                                <option selected disabled value>Pilih Estate Pekerja</option>
                                                <option value="RO">Regional Office</option>
                                                <option value="Pasir Salak">Pasir Salak</option>
                                                <option value="Pangkor">Pangkor</option>
                                                <option value="Grik">Grik</option>
                                                <option value="Pks">PKS</option>
                                                <option value="Umum">Umum</option>
                                            </select>
                                            <label for="floatingEstate">Estate Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Op Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingOp" name="op" required>
                                                <option selected disabled value>Pilih OP Pekerja</option>
                                                <option value="RO">Regional Office</option>
                                                <option value="PKS">PKS</option>
                                                <option value="OP 96">OP 96</option>
                                                <option value="OP 97A">OP 97A</option>
                                                <option value="OP 97B">OP 97B</option>
                                                <option value="OP 97C">OP 97C</option>
                                                <option value="OP 97D">OP 97D</option>
                                                <option value="OP 98A">OP 98A</option>
                                                <option value="OP 98B">OP 98B</option>
                                                <option value="OP 98C">OP 98C</option>
                                                <option value="OP 98D">OP 98D</option>
                                                <option value="OP 99">OP 99</option>
                                                <option value="OP 2003/2004">OP 2003/2004</option>
                                                <option value="OP 2005A">OP 2005A</option>
                                                <option value="OP 2005B">OP 2005B</option>
                                                <option value="OP 2006A">OP 2006A</option>
                                                <option value="OP 2006B">OP 2006B</option>
                                                <option value="OP 2007A">OP 2007A</option>
                                                <option value="OP 2007B">OP 2007B</option>
                                                <option value="OP 2008">OP 2008</option>
                                                <option value="Nursery">Nursery</option>
                                                <option value="Umum">Umum</option>
                                            </select>
                                            <label for="floatingEstate">OP Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- No BPJS -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="3" name="no_bpjs" onkeyup="my3()" placeholder="Nomor BPJS" required>
                                            <label for="3">Nomor BPJS</label>
                                            <div class="invalid-tooltip">
                                                No BPJS Tidak Boleh Kosong!
                                            </div>
                                        </div>
                                    </div>

                                    <!-- No Hp -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="4" value="62" name="nohp_pekerja" onkeyup="my4()" placeholder="Nomor Handphone" required>
                                            <label for="4">Nomor Handphone</label>
                                            <div class="invalid-tooltip">
                                                No HP Tidak Boleh Kosong!
                                            </div>
                                        </div>
                                    </div>

                                    <!-- AUTHOR -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="5" name="author" value="<?php echo $authors; ?>" onkeyup="my5()" placeholder="Masukkan" readonly>
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
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</div>

<!-- PASIEN UMUM -->
<div class="modal fade" id="pasienUmum" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Input Pasien Umum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php
                require '../api/koneksi.php';
                $query6 = mysqli_query($koneksi, "SELECT max(id_pasien) as kodeTerbesar FROM umum");
                $data6 = mysqli_fetch_array($query6);
                $idPasien6 = $data6['kodeTerbesar'];
                $urutan6 = (int) substr($idPasien6, 6, 5);
                $urutan6++;
                $huruf6 = "PWSUMM";
                $idPasien6 = $huruf6 . sprintf("%05s", $urutan6);
                ?>

                <?php
                require '../api/koneksi.php';
                $id = $_SESSION['id'];
                $querys = mysqli_query($koneksi, " SELECT * FROM tbl_user WHERE id='$id'");
                while ($reads = mysqli_fetch_array($querys)) {
                    $id_authors = $reads['id'];
                    $authors = $reads['nama'];
                }
                ?>
                <section class="section">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <form action="../api/add_umum.php" method="POST">

                                    <!-- <input id="id_pasien"  type="hidden" class="form-control" /> -->
                                    <div class="mb-3"></div>
                                    <input id="id" name="id" type="hidden" class="form-control" />
                                    <input id="id_author" name="id_author" value="<?php echo $id_authors ?>" type="hidden" class="form-control" />

                                    <!-- Kode Pasien -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="11" name="id_pasien" value="<?php echo $idPasien6 ?>" placeholder="Masukkan" readonly>
                                            <label for="11">Nomor Pasien</label>
                                        </div>
                                    </div>


                                    <!-- NIK -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="10" name="nik" placeholder="Nomor Induk Kependudukan" required>
                                            <label for="10">Nomor Induk Kependudukan</label>
                                        </div>
                                    </div>

                                    <!-- Nama Pasien -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="29" name="nama_pasien" onkeyup="my29()" placeholder="Nama Pasien" required>
                                            <label for="29">Nama Pasien</label>
                                        </div>
                                    </div>

                                    <!-- Jenis Kelamin -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-control" id="floatingJk" name="jk" required>
                                                <option selected disabled value>Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <label for="floatingJk">Pilih Jenis Kelamin</label>
                                        </div>
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="floatingDate" name="tgl_lahir" required>
                                            <label for="floatingDate">Tanggal Lahir</label>
                                        </div>
                                    </div>

                                    <!-- Umur -->
                                    <div class="col-12 position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="9" name="umur" onkeyup="my9()" placeholder="Nama Pasien" required>
                                            <label for="9">Umur</label>
                                        </div>
                                    </div>

                                    <!--Status Pasien  -->
                                    <div class="col-12"></div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" id="floatingStatus" name="status_pasien" required>
                                            <option se value="Umum">Umum</option>
                                        </select>
                                        <label for="floatingStatus">Status Pasien</label>

                                    </div>

                                    <!-- Nama Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="30" name="nama_pekerja" onkeyup="my30()" placeholder="Nama Pekerja" required>
                                            <label for="30">Nama Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Jabatan Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="jabatanPekerja" name="jabatan_pekerja" style="width: 100%;" data-placeholder="Pilih Jabatan">
                                                <option selected value="Umum">Umum</option>
                                            </select>
                                            <label for="jabatanPekerja"> Jabatan </label>
                                        </div>
                                    </div>

                                    <!-- Status Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingStatusPekerja" name="status_pekerja" required>
                                                <option selected value="Umum">Umum</option>
                                            </select>
                                            <label for="floatingStatusPekerja">Status Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Estate Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingEstate" name="estate" required>
                                                <option selected value="Umum">Umum</option>
                                            </select>
                                            <label for="floatingEstate">Estate Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- Op Pekerja -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" id="floatingOp" name="op" required>
                                                <option selected value="Umum">Umum</option>
                                            </select>
                                            <label for="floatingEstate">OP Pekerja</label>
                                        </div>
                                    </div>

                                    <!-- No BPJS -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="3" name="no_bpjs" onkeyup="my3()" placeholder="Nomor BPJS" required>
                                            <label for="3">Nomor BPJS</label>
                                            <div class="invalid-tooltip">
                                                No BPJS Tidak Boleh Kosong!
                                            </div>
                                        </div>
                                    </div>

                                    <!-- No Hp -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="4" value="62" name="nohp_pekerja" onkeyup="my4()" placeholder="Nomor Handphone" required>
                                            <label for="4">Nomor Handphone</label>
                                            <div class="invalid-tooltip">
                                                No HP Tidak Boleh Kosong!
                                            </div>
                                        </div>
                                    </div>

                                    <!-- AUTHOR -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="5" name="author" value="<?php echo $authors; ?>" onkeyup="my5()" placeholder="Masukkan" readonly>
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
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</div>
