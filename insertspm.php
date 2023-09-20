<?php
include "koneksi.php";

$delete = mysqli_query($conn, " DELETE FROM spm ");

$insert = mysqli_query($conn, " INSERT INTO `spm`(`urusan`, `nm_keg`, `anggaran`, `realisasi`)
SELECT urusan, ur_prog_keg nm_keg, op_ang anggaran, op_real realisasi 
FROM `data_lra` WHERE urusan IN ('1.01', '1.02', '1.03', '1.04', '1.06') 
AND kd_prog_keg IN (SELECT kd_prog_keg FROM `kegiatan` WHERE urusan IN ('1.01', '1.02', '1.03', '1.04', '1.06'))");

/////////////////

$jumlah1 = mysqli_query($conn, " INSERT INTO spm (`urusan`, `nm_keg`, `anggaran`, `realisasi`)
VALUES ('1.01', 'Total', 0, 0),
('1.01', 'Jumlah Anggaran dan Realisasi SPM Bidang Pendidikan', 0, 0)");

$updatetotal = mysqli_query($conn, " UPDATE `spm` SET 
`anggaran`= (SELECT SUM(anggaran) FROM `spm` WHERE urusan IN ('1.01')),
`realisasi`= (SELECT SUM(realisasi) FROM `spm` WHERE urusan IN ('1.01'))
WHERE urusan IN ('1.01') AND nm_keg = 'total'");

$updatejumlah1 = mysqli_query($conn, " UPDATE `spm` SET 
`anggaran`= (SELECT SUM(anggaran) FROM `spm` WHERE urusan IN ('1.01') AND nm_keg <> 'total'),
`realisasi`= (SELECT SUM(realisasi) FROM `spm` WHERE urusan IN ('1.01') AND nm_keg <> 'total')
WHERE urusan IN ('1.01')  AND nm_keg = 'Jumlah Anggaran dan Realisasi SPM Bidang Pendidikan'");

/////////////////

$jumlah2 = mysqli_query($conn, " INSERT INTO spm (`urusan`, `nm_keg`, `anggaran`, `realisasi`)
VALUES ('1.02', 'Total', 0, 0),
('1.02', 'Jumlah Anggaran dan Realisasi SPM Bidang Kesehatan', 0, 0)");

$updatetotal2 = mysqli_query($conn, " UPDATE `spm` SET 
`anggaran`= (SELECT SUM(anggaran) FROM `spm` WHERE urusan IN ('1.02')),
`realisasi`= (SELECT SUM(realisasi) FROM `spm` WHERE urusan IN ('1.02'))
WHERE urusan IN ('1.02') AND nm_keg = 'total'");

$updatejumlah2 = mysqli_query($conn, " UPDATE `spm` SET 
`anggaran`= (SELECT SUM(anggaran) FROM `spm` WHERE urusan IN ('1.02')),
`realisasi`= (SELECT SUM(realisasi) FROM `spm` WHERE urusan IN ('1.02'))
WHERE urusan IN ('1.02') AND nm_keg = 'Jumlah Anggaran dan Realisasi SPM Bidang Kesehatan'");

/////////////////

$jumlah3 = mysqli_query($conn, " INSERT INTO spm (`urusan`, `nm_keg`, `anggaran`, `realisasi`)
VALUES ('1.03', 'Total', 0, 0),
('1.03', 'Jumlah Anggaran dan Realisasi SPM Bidang Pekerjaan Umum Dan Penataan Ruang', 0, 0)");

$updatetotal3 = mysqli_query($conn, " UPDATE `spm` SET 
`anggaran`= (SELECT SUM(anggaran) FROM `spm` WHERE urusan IN ('1.03')),
`realisasi`= (SELECT SUM(realisasi) FROM `spm` WHERE urusan IN ('1.03'))
WHERE urusan IN ('1.03') AND nm_keg = 'total'");

$updatejumlah3 = mysqli_query($conn, " UPDATE `spm` SET 
`anggaran`= (SELECT SUM(anggaran) FROM `spm` WHERE urusan IN ('1.03')),
`realisasi`= (SELECT SUM(realisasi) FROM `spm` WHERE urusan IN ('1.03'))
WHERE urusan IN ('1.03') AND nm_keg = 'Jumlah Anggaran dan Realisasi SPM Bidang Pekerjaan Umum Dan Penataan Ruang'");

/////////////////

$jumlah4 = mysqli_query($conn, " INSERT INTO spm (`urusan`, `nm_keg`, `anggaran`, `realisasi`)
VALUES ('1.04', 'Total', 0, 0),
('1.04', 'Jumlah Anggaran dan Realisasi SPM Bidang Perumahan Rakyat dan Kawasan Pemukiman', 0, 0)");

$updatetotal4 = mysqli_query($conn, " UPDATE `spm` SET 
`anggaran`= (SELECT SUM(anggaran) FROM `spm` WHERE urusan IN ('1.04')),
`realisasi`= (SELECT SUM(realisasi) FROM `spm` WHERE urusan IN ('1.04'))
WHERE urusan IN ('1.04') AND nm_keg = 'total'");

$updatejumlah4 = mysqli_query($conn, " UPDATE `spm` SET 
`anggaran`= (SELECT SUM(anggaran) FROM `spm` WHERE urusan IN ('1.04')),
`realisasi`= (SELECT SUM(realisasi) FROM `spm` WHERE urusan IN ('1.04'))
WHERE urusan IN ('1.04') AND nm_keg = 'Jumlah Anggaran dan Realisasi SPM Bidang Perumahan Rakyat dan Kawasan Pemukiman'");

/////////////////

$jumlah5 = mysqli_query($conn, " INSERT INTO spm (`urusan`, `nm_keg`, `anggaran`, `realisasi`)
VALUES ('1.06', 'Total', 0, 0),
('1.06', 'Jumlah Anggaran dan Realisasi SPM Bidang Sosial', 0, 0)");

$updatetotal5 = mysqli_query($conn, " UPDATE `spm` SET 
`anggaran`= (SELECT SUM(anggaran) FROM `spm` WHERE urusan IN ('1.06')),
`realisasi`= (SELECT SUM(realisasi) FROM `spm` WHERE urusan IN ('1.06'))
WHERE urusan IN ('1.06') AND nm_keg = 'total'");

$updatejumlah5 = mysqli_query($conn, " UPDATE `spm` SET 
`anggaran`= (SELECT SUM(anggaran) FROM `spm` WHERE urusan IN ('1.06')),
`realisasi`= (SELECT SUM(realisasi) FROM `spm` WHERE urusan IN ('1.06'))
WHERE urusan IN ('1.06') AND nm_keg = 'Jumlah Anggaran dan Realisasi SPM Bidang Sosial'");

?>