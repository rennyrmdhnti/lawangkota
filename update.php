<?php
include "koneksi.php";
$update = mysqli_query($conn, " UPDATE `rekap_lra_publik` SET 
`anggaran`= (SELECT anggaran FROM `realisasi_rekening` 
WHERE kd_rek = '4.2.01.01.02'),
`realisasi`= (SELECT realisasi FROM `realisasi_rekening` 
WHERE kd_rek = '4.2.01.01.02'),
`persen`= (SELECT persen FROM `realisasi_rekening` 
WHERE kd_rek = '4.2.01.01.02') 
WHERE kd_urut = '1.1.1'");


$update2 = mysqli_query($conn, " UPDATE `rekap_lra_publik` SET 
`anggaran`= (SELECT anggaran FROM `realisasi_rekening` 
WHERE kd_rek = '4.2.01.01.01'),
`realisasi`= (SELECT realisasi FROM `realisasi_rekening` 
WHERE kd_rek = '4.2.01.01.01'),
`persen`= (SELECT persen FROM `realisasi_rekening` 
WHERE kd_rek = '4.2.01.01.01') 
WHERE kd_urut = '1.1.2'");

$update3 = mysqli_query($conn, "UPDATE `rekap_lra_publik` SET 
`anggaran`= (SELECT SUM(anggaran) FROM rekap_lra_publik WHERE kd_urut IN ('1.1.1', '1.1.2')),
`realisasi`= (SELECT SUM(realisasi) FROM rekap_lra_publik WHERE kd_urut IN ('1.1.1', '1.1.2'))
WHERE kd_urut = '1.1.3'");

$update4 = mysqli_query($conn, "UPDATE `rekap_lra_publik` SET 
`anggaran`= (SELECT anggaran FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.01'),
`realisasi`= (SELECT realisasi FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.01'),
`persen`= (SELECT persen FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.01') 
WHERE kd_urut = '4.1.1'");

$update5 = mysqli_query($conn, "UPDATE `rekap_lra_publik` SET 
`anggaran`= (SELECT anggaran FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.02'),
`realisasi`= (SELECT realisasi FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.02'),
`persen`= (SELECT persen FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.02') 
WHERE kd_urut = '4.1.2'");

$update6 = mysqli_query($conn, "UPDATE `rekap_lra_publik` SET 
`anggaran`= (SELECT anggaran FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.03'),
`realisasi`= (SELECT realisasi FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.03'),
`persen`= (SELECT persen FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.03') 
WHERE kd_urut = '4.1.3'");

$update7 = mysqli_query($conn, "UPDATE `rekap_lra_publik` SET 
`anggaran`= (SELECT anggaran FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.04'),
`realisasi`= (SELECT realisasi FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.04'),
`persen`= (SELECT persen FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.04') 
WHERE kd_urut = '4.1.4'");

$update8 = mysqli_query($conn, "UPDATE `rekap_lra_publik` SET 
`anggaran`= (SELECT anggaran FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.05'),
`realisasi`= (SELECT realisasi FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.05'),
`persen`= (SELECT persen FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.05') 
WHERE kd_urut = '4.1.5'");

$update9 = mysqli_query($conn, "UPDATE `rekap_lra_publik` SET 
`anggaran`= (SELECT anggaran FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.06'),
`realisasi`= (SELECT realisasi FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.06'),
`persen`= (SELECT persen FROM `realisasi_rekening` 
WHERE kd_rek = '5.2.06') 
WHERE kd_urut = '4.1.6'");

$update10 = mysqli_query($conn, "UPDATE `rekap_lra_publik` SET 
`anggaran`= (SELECT anggaran FROM `realisasi_rekening` 
WHERE kd_rek = '5.1.05'),
`realisasi`= (SELECT realisasi FROM `realisasi_rekening` 
WHERE kd_rek = '5.1.05'),
`persen`= (SELECT persen FROM `realisasi_rekening` 
WHERE kd_rek = '5.1.05') 
WHERE kd_urut = '5'");

$update11 = mysqli_query($conn, "UPDATE `rekap_lra_publik` SET 
`anggaran`= (SELECT anggaran FROM `realisasi_rekening` 
WHERE kd_rek = '5.1.06'),
`realisasi`= (SELECT realisasi FROM `realisasi_rekening` 
WHERE kd_rek = '5.1.06'),
`persen`= (SELECT persen FROM `realisasi_rekening` 
WHERE kd_rek = '5.1.06') 
WHERE kd_urut = '5.1.1'");

$update12 = mysqli_query($conn, "UPDATE `rekap_lra_publik` SET 
`anggaran`= (SELECT anggaran FROM `realisasi_rekening` 
WHERE kd_rek = '5.1.06'),
`realisasi`= (SELECT realisasi FROM `realisasi_rekening` 
WHERE kd_rek = '5.1.06'),
`persen`= (SELECT persen FROM `realisasi_rekening` 
WHERE kd_rek = '5.1.06') 
WHERE kd_urut = '5.1.2'");

$update13 = mysqli_query($conn, "UPDATE `rekap_lra_publik` SET 
`anggaran`= (SELECT SUM(anggaran) FROM rekap_lra_publik WHERE kd_urut IN ('4.1.1', '4.1.2', '4.1.3', '4.1.4' ,'4.1.5' ,'4.1.6')),
`realisasi`= (SELECT SUM(realisasi) FROM rekap_lra_publik WHERE kd_urut IN ('4.1.1', '4.1.2', '4.1.3', '4.1.4' ,'4.1.5' ,'4.1.6'))
WHERE kd_urut = '4'");

$update14 = mysqli_query($conn, "UPDATE `rekap_lra_publik` SET 
`anggaran`= (SELECT SUM(anggaran) FROM rekap_lra_publik WHERE kd_urut IN ('4', '5.1.1', '5.1.2')),
`realisasi`= (SELECT SUM(realisasi) FROM rekap_lra_publik WHERE kd_urut IN ('4', '5.1.1', '5.1.2'))
WHERE kd_urut = '6'");


?>