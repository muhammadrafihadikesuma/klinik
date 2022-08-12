<?php

require '../api/koneksi.php';

$id_diagnosa = $_POST['id_diagnosa'];
$id_pasien = $_POST['id_pasien'];
$id_pendaftaran = $_POST['id_pendaftaran'];
$pemeriksaan = $_POST['pemeriksaan'];
$diagnosa = implode(", ", $_POST['diagnosa']);
$terapi = $_POST['terapi'];
$resep = $_POST['resep'];
$status = $_POST['status'];
$tgl_diagnosa = $_POST['tgl_diagnosa'];
// surat sakit
$id_suratsakit = $_POST['id_suratsakit'];
$nama_pasien = $_POST['nama_pasien'];
$jabatan_pekerja =$_POST['jabatan_pekerja'];
$jk =$_POST['jk'];
$status_pekerja = $_POST['status_pekerja'];
$jam_b =$_POST['jam_b'];
$waktu_i = $_POST['waktu_i'];
$dari_t = $_POST['dari_t'];
$sampai_d = $_POST['sampai_d'];
$catatan = $_POST['catatan'];
$umur = $_POST['umur'];


$edit = mysqli_query($koneksi, "UPDATE tbl_pendaftaran SET 
                                                           status='resep'
                                                           WHERE id_pendaftaran='$id_pendaftaran'");

$send = mysqli_query($koneksi, "INSERT INTO tbl_diagnosa VALUES( '$id_diagnosa',
                                                                    '$id_pasien',
                                                                    '$id_pendaftaran',
                                                                    '$pemeriksaan',
                                                                    '$diagnosa.',
                                                                    '$terapi',
                                                                    '$resep',
                                                                    '$status',
                                                                    '$tgl_diagnosa')");

$send_suratsakit = mysqli_query($koneksi, "INSERT INTO tbl_ssakit VALUES( 
                                                                    '$id_suratsakit',
                                                                    '$id_pasien',
                                                                    '$id_diagnosa',
                                                                    '$nama_pasien',
                                                                    '$tgl_diagnosa',
                                                                    '$umur',
                                                                    '$diagnosa.',
                                                                    '$jabatan_pekerja',
                                                                    '$jk',
                                                                    '$status_pekerja',
                                                                    '$jam_b',
                                                                    '$waktu_i',
                                                                    '$dari_t',
                                                                    '$sampai_d',
                                                                    '$catatan '
                                                                    )");

header("location: ../pages/antrian.php");
