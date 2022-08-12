<?php

require '../api/koneksi.php';

$id_pendaftaran = $_POST['id_pendaftaran'];
$id_pasien = $_POST['id_pasien'];
$id_author = $_POST['id_author'];
$tanggal_pendaftaran = $_POST['tanggal_pendaftaran'];
$jam_b = $_POST['jam_b'];
$tinggi_badan = $_POST['tinggi_badan'];
$berat_badan = $_POST['berat_badan'];
$lingkar_perut = $_POST['lingkar_perut'];
$tensi_darah = $_POST['tensi_darah'];
$suhu = $_POST['suhu'];
$nadi = $_POST['nadi'];
$pernafasan = $_POST['pernafasan'];
$keluhan_pasien = $_POST['keluhan_pasien'];
$status = $_POST['status'];
$author = $_POST['author'];

$send = mysqli_query($koneksi, "INSERT INTO tbl_pendaftaran Values( '$id_pendaftaran',
                                                                    '$id_pasien',
                                                                    '$id_author',
                                                                    '$tanggal_pendaftaran',
                                                                    '$jam_b',
                                                                    '$tinggi_badan',
                                                                    '$berat_badan',
                                                                    '$lingkar_perut',
                                                                    '$tensi_darah',
                                                                    '$suhu',
                                                                    '$nadi',
                                                                    '$pernafasan',
                                                                    '$keluhan_pasien',
                                                                    '$status',
                                                                    '$author')");
header('location:../pages/pendaftaran.php');