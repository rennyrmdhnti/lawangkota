<?php
include "koneksi.php";
$update = mysqli_query($conn, " UPDATE `rekap_pen_stun` SET 
`anggaran`= (SELECT SUM(op_ang) FROM `data_lra` WHERE kd_prog_keg IN ('1.02.02.2.02.15'))
WHERE kd_urut = '9'");

$update2 = mysqli_query($conn, " UPDATE `rekap_pen_stun` SET 
`anggaran`= (SELECT SUM(op_ang) FROM `data_lra` WHERE kd_prog_keg IN ('1.02.02.2.02.15'))
WHERE kd_urut = '9.1'");

$update3 = mysqli_query($conn, " UPDATE `rekap_pen_stun` SET 
`anggaran`= (SELECT SUM(op_ang) FROM `data_lra` WHERE kd_prog_keg IN ('1.02.02.2.02.04'))
WHERE kd_urut = '6'");

$update4 = mysqli_query($conn, " UPDATE `rekap_pen_stun` SET 
`anggaran`= (SELECT SUM(op_ang) FROM `data_lra` WHERE kd_prog_keg IN ('1.02.02.2.02.04'))
WHERE kd_urut = '6.1'");

$update5 = mysqli_query($conn, " UPDATE `rekap_pen_stun` SET 
`anggaran`= (SELECT SUM(op_ang) FROM `data_lra` WHERE kd_prog_keg IN ('1.02.02.2.02.05'))
WHERE kd_urut = '11'");

$update6 = mysqli_query($conn, " UPDATE `rekap_pen_stun` SET 
`anggaran`= (SELECT SUM(op_ang) FROM `data_lra` WHERE kd_prog_keg IN ('1.02.02.2.02.05'))
WHERE kd_urut = '11.1'");
?>