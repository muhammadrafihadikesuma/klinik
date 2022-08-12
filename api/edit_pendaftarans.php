<?php

require '../api/koneksi.php';

$id_pendaftaran = $_POST['id_pendaftaran'];
$id_pasien = $_POST['id_pasien'];
$id_author=$_POST['id_author'];
$tanggal_pendaftaran = $_POST['tanggal_pendaftaran'];
$tinggi_badan = $_POST['tinggi_badan'];
$berat_badan = $_POST['berat_badan'];
$lingkar_perut = $_POST['lingkar_perut'];
$tensi_darah = $_POST['tensi_darah'];
$suhu = $_POST['suhu'];
$nadi = $_POST['nadi'];
$pernafasan = $_POST['pernafasan'];
$keluhan_pasien = $_POST['keluhan_pasien'];
$status = $_POST['status'];
$author=$_POST['author'];

$edit = mysqli_query($koneksi, "UPDATE tbl_pendaftaran SET id_pasien='$id_pasien',
                                                           id_author='$id_author',
                                                           tanggal_pendaftaran='$tanggal_pendaftaran',
                                                           tinggi_badan='$tinggi_badan',
                                                           berat_badan='$berat_badan',
                                                           lingkar_perut='$lingkar_perut',
                                                           tensi_darah='$tensi_darah',
                                                           suhu='$suhu',
                                                           nadi='$nadi',
                                                           pernafasan='$pernafasan',
                                                           keluhan_pasien='$keluhan_pasien',
                                                           status='$status',
                                                           author='$author'
                                                           WHERE id_pendaftaran='$id_pendaftaran'");

header("location:../pages/pendaftaran.php");