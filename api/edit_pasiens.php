<?php
require '../api/koneksi.php';

$id_pasien=$_POST['id_pasien'];
$id_author=$_POST['id_author'];
$nama_pasien=$_POST['nama_pasien'];
$jk=$_POST['jk'];
$no_bpjs=$_POST['no_bpjs'];
$tgl_lahir=$_POST['tgl_lahir'];
$status_pasien=$_POST['status_pasien'];
$nama_pekerja=$_POST['nama_pekerja'];
$jabatan_pekerja=$_POST['jabatan_pekerja'];
$status_pekerja=$_POST['status_pekerja'];
$nohp_pekerja=$_POST['nohp_pekerja'];
$estate=$_POST['estate'];
$op=$_POST['op'];
$author=$_POST['author'];



$send=mysqli_query($koneksi, "UPDATE tbl_pasien SET id_author='$id_author',
                                                    nama_pasien='$nama_pasien',
                                                    jk='$jk',
                                                    no_bpjs='$no_bpjs',
                                                    tgl_lahir='$tgl_lahir',
                                                    status_pasien='$status_pasien',
                                                    nama_pekerja='$nama_pekerja',
                                                    jabatan_pekerja='$jabatan_pekerja',
                                                    status_pekerja='$status_pekerja',
                                                    nohp_pekerja='$nohp_pekerja',
                                                    estate='$estate',
                                                    op='$op',
                                                    author='$author'
                                                    WHERE id_pasien = '$id_pasien' ")or die(mysqli_error($connection));
	

header("location:../pages/pasien.php");
