<?php

require '../api/koneksi.php';

$id_penyakit = $_POST['id_penyakit'];
$nama_penyakit= $_POST['nama_penyakit'];
$deskripsi = $_POST['deskripsi'];

$edit = mysqli_query($koneksi, "UPDATE tbl_penyakit SET nama_penyakit = '$nama_penyakit',
                                                        deskripsi = '$deskripsi'
                                                        WHERE id_penyakit='$id_penyakit'");

header("location:../pages/penyakit.php");