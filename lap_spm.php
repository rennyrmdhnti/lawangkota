<?php
use Dompdf\Css\Style;

include 'koneksi.php';
$data = mysqli_query($conn, " SELECT * FROM spm ORDER BY urusan, nomor ");

$r = mysqli_fetch_array($data);
?>

<?php
require 'vendor/dompdf_old/autoload.inc.php';
include 'koneksi.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

$no = 1;
$no2 = 1;
$no3 = 1;
$no4 = 1;
$no5 = 1;

$lra = mysqli_query($conn, " SELECT * FROM spm WHERE RIGHT (urusan, 1) IN ('1') AND realisasi <> 0 ");

$nomor = $r['nomor'];
$kode = $r['urusan'];
$uraian = $r['nm_keg'];
$op_ang = $r['anggaran'];
$op_real = $r['realisasi'];

//////////////////////////////////////// 1

$lra2 = mysqli_query($conn, " SELECT * FROM spm WHERE RIGHT (urusan, 1) IN ('2') AND anggaran <> 0 AND realisasi <> 0 ");

$nomor2 = $r['nomor'];
$kode2 = $r['urusan'];
$uraian2 = $r['nm_keg'];
$op_ang2 = $r['anggaran'];
$op_real2 = $r['realisasi'];

//////////////////////////////////////// 2

$lra3 = mysqli_query($conn, " SELECT * FROM spm WHERE RIGHT (urusan, 1) IN ('3') ");

$nomor3 = $r['nomor'];
$kode3 = $r['urusan'];
$uraian3 = $r['nm_keg'];
$op_ang3 = $r['anggaran'];
$op_real3 = $r['realisasi'];

//////////////////////////////////////// 3

$lra4 = mysqli_query($conn, " SELECT * FROM spm WHERE RIGHT (urusan, 1) IN ('4') ");

$nomor4 = $r['nomor'];
$kode4 = $r['urusan'];
$uraian4 = $r['nm_keg'];
$op_ang4 = $r['anggaran'];
$op_real4 = $r['realisasi'];

//////////////////////////////////////// 4

$lra5 = mysqli_query($conn, " SELECT * FROM spm WHERE RIGHT (urusan, 1) IN ('6') ");

$nomor5 = $r['nomor'];
$kode5 = $r['urusan'];
$uraian5 = $r['nm_keg'];
$op_ang5 = $r['anggaran'];
$op_real5 = $r['realisasi'];

//////////////////////////////////////// 6

$path = realpath('E:/xampp/htdocs/ProjectLawang/img/header.jpg');

$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$header = 'data:image/' . $type . ';base64,' . base64_encode($data);

$html =
    "<html><body>

    <table align='center' border=0  style='width:100%;' >
    <tr>
    <th><img src='$header' style='width:90%;height:auto;'></th>
    </tr>
    </table>
    

    <br>
    <br>
    <table border= 0>
    <tr>
    <th width=190px></th>

    <th width=850px align='center'>
    PROVINSI/KABUPATEN KOTA BANJARMASIN <br> REKAPITULASI REALISASI BELANJA UNTUK PEMENUHAN STANDAR PELAYANAN MINIMAL (SPM) TA 2022</th>
  
    <th width=190px></th>
    </tr>
    </table>
    <br>
    <br>


<p align='center'>SPM BIDANG PENDIDIKAN</p>
<table border=0.5>
<tr>
<th style='height:30px;' align='center'><b>Nomor</b></th>
<th align='center'><b>Kode Urut</b></th>
<th align='center'><b>Uraian</b></th>
<th align='center'><b>Anggaran</b></th>
<th align='center'><b>Realisasi</b></th>
</tr>";



while ($row = mysqli_fetch_array($lra)) {
    $html .= "<tr>
    <td align='center'> " . $no++ . " </td> 
    <td style='padding:5px'> " . $row['urusan'] . " </td> 
    <td style='width:880px;'> " . $row['nm_keg'] . " </td> 
    <td style='height:30px;width:110px;padding:3px' align='right' type='number'> " . number_format($row['anggaran']) . " </td> 
    <td style='height:30px;padding:3px' align='right' type='number'> " . number_format($row['realisasi']) . " </td> 

    </tr>";

}

//////////////////////////////////////// 1

$html .= "

</table>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<p align='center'>SPM BIDANG KESEHATAN</p>
<table border=0.5>
<tr>
<th style='height:30px;' align='center'><b>Nomor</b></th>
<th align='center'><b>Kode Urut</b></th>
<th align='center'><b>Uraian</b></th>
<th align='center'><b>Anggaran</b></th>
<th align='center'><b>Realisasi</b></th>
</tr>";



while ($row = mysqli_fetch_array($lra2)) {
    $html .= "<tr>
    <td align='center'> " . $no++ . " </td> 
    <td style='padding:5px'> " . $row['urusan'] . " </td> 
    <td style='width:880px;'> " . $row['nm_keg'] . " </td> 
    <td style='height:30px;width:110px;padding:3px' align='right' type='number'> " . number_format($row['anggaran']) . " </td> 
    <td style='height:30px;padding:3px' align='right' type='number'> " . number_format($row['realisasi']) . " </td> 

    </tr>";

}

//////////////////////////////////////// 2

$html .= "

</table>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<p align='center'>SPM BIDANG PEKERJAAN UMUM DAN PENATAAN RUANG</p>
<table border=0.5>
<tr>
<th style='height:30px;' align='center'><b>Nomor</b></th>
<th align='center'><b>Kode Urut</b></th>
<th align='center'><b>Uraian</b></th>
<th align='center'><b>Anggaran</b></th>
<th align='center'><b>Realisasi</b></th>
</tr>";



while ($row = mysqli_fetch_array($lra3)) {
    $html .= "<tr>
    <td align='center'> " . $no++ . " </td> 
    <td style='padding:5px'> " . $row['urusan'] . " </td> 
    <td style='width:880px;'> " . $row['nm_keg'] . " </td> 
    <td style='height:30px;width:110px;padding:3px' align='right' type='number'> " . number_format($row['anggaran']) . " </td> 
    <td style='height:30px;padding:3px' align='right' type='number'> " . number_format($row['realisasi']) . " </td> 

    </tr>";

}

$html .= "

</table>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<p align='center'>SPM BIDANG PERUMAHAN RAKYAT DAN KAWASAN PEMUKIMAN</p>
<table border=0.5>
<tr>
<th style='height:30px;' align='center'><b>Nomor</b></th>
<th align='center'><b>Kode Urut</b></th>
<th align='center'><b>Uraian</b></th>
<th align='center'><b>Anggaran</b></th>
<th align='center'><b>Realisasi</b></th>
</tr>";



while ($row = mysqli_fetch_array($lra4)) {
    $html .= "<tr>
    <td align='center'> " . $no++ . " </td> 
    <td style='padding:5px'> " . $row['urusan'] . " </td> 
    <td style='width:880px;'> " . $row['nm_keg'] . " </td> 
    <td style='height:30px;width:110px;padding:3px' align='right' type='number'> " . number_format($row['anggaran']) . " </td> 
    <td style='height:30px;padding:3px' align='right' type='number'> " . number_format($row['realisasi']) . " </td> 

    </tr>";

}

//////////////////////////////////////// 4

$html .= "

</table>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<p align='center'>SPM BIDANG SOSIAL</p>
<table border=0.5>
<tr>
<th style='height:30px;' align='center'><b>Nomor</b></th>
<th align='center'><b>Kode Urut</b></th>
<th align='center'><b>Uraian</b></th>
<th align='center'><b>Anggaran</b></th>
<th align='center'><b>Realisasi</b></th>
</tr>";



while ($row = mysqli_fetch_array($lra5)) {
    $html .= "<tr>
    <td align='center'> " . $no++ . " </td> 
    <td style='padding:5px'> " . $row['urusan'] . " </td> 
    <td style='width:880px;'> " . $row['nm_keg'] . " </td> 
    <td style='height:30px;width:110px;padding:3px' align='right' type='number'> " . number_format($row['anggaran']) . " </td> 
    <td style='height:30px;padding:3px' align='right' type='number'> " . number_format($row['realisasi']) . " </td> 

    </tr>";

}

//////////////////////////////////////// 5

$html .= "

</table>

</body></html>";

use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);


// $dompdf = new Dompdf();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('Legal', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('SPPD.pdf', array("Attachment" => false));
exit(0);

?>