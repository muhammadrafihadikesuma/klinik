<?php
require '../api/koneksi.php';
$id=$_POST['id_penyakit'];
$nama_penyakit=$_POST['nama_penyakit'];
$deskripsi =$_POST['deskripsi'];
$send=mysqli_query($koneksi, "INSERT into tbl_penyakit values('$id',
                                                              '$nama_penyakit',
                                                              '$deskripsi' )")or die(mysqli_error($koneksi));

header("location:../pages/penyakit.php");
