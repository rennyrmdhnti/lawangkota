<?php
use Dompdf\Css\Style;

include 'koneksi.php';
$data = mysqli_query($conn, " SELECT a.nomor,a.lvl,a.urusan,a.nm_urusan,b.urusan
,SUM(c.op_ang) op_ang,SUM(c.op_real) op_real,SUM(c.m_ang) m_ang,SUM(c.m_real) m_real,SUM(c.tt_ang) tt_ang
,SUM(c.tt_real) tt_real,SUM(c.tf_ang) tf_ang,SUM(c.tf_real) tf_real
FROM urusan_mapping a
LEFT JOIN skpd b ON a.urusan = b.urusan
LEFT JOIN data_lra c ON b.urusan = c.urusan AND b.kd_skpd = c.kd_skpd
GROUP BY a.nomor,a.urusan,a.nm_urusan,b.urusan,a.lvl
ORDER BY a.lvl ");

$r = mysqli_fetch_array($data);
?>

<?php
require 'vendor/dompdf_old/autoload.inc.php';
include 'koneksi.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

$lra = mysqli_query($conn, "SELECT a.nomor,a.lvl,a.urusan,a.nm_urusan,b.urusan
,SUM(c.op_ang) op_ang,SUM(c.op_real) op_real,SUM(c.m_ang) m_ang,SUM(c.m_real) m_real,SUM(c.tt_ang) tt_ang
,SUM(c.tt_real) tt_real,SUM(c.tf_ang) tf_ang,SUM(c.tf_real) tf_real
FROM urusan_mapping a
LEFT JOIN skpd b ON a.urusan = b.urusan
LEFT JOIN data_lra c ON b.urusan = c.urusan AND b.kd_skpd = c.kd_skpd
GROUP BY a.nomor,a.urusan,a.nm_urusan,b.urusan,a.lvl
ORDER BY a.lvl");

$nomor = $r['nomor'];
$kode = $r['urusan'];
$uraian = $r['nm_urusan'];
$op_ang = $r['op_ang'];
$op_real = $r['op_real'];
$m_ang = $r['m_ang'];
$m_real = $r['m_real'];
$tt_ang = $r['tt_ang'];
$tt_real = $r['tt_real'];
$tf_ang = $r['tf_ang'];
$tf_real = $r['tf_real'];

$no = 1;


$path = realpath('E:/xampp/htdocs/belajar2/img/header.jpg');

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
    <th width=200px></th>
    <th><p1>REKAPITULASI REALISASI BELANJA DAERAH UNTUK KESELARASAN DAN KETERPADUAN URUSAN 
    <br> PEMERINTAHAN DAERAH DAN FUNGSI DALAM KERANGKA PENGELOLAAN KEUANGAN NEGARA TA 2022</p1></th>
    <th width=200px></th>
    </tr>
    </table>
    <br>
    <br>
<table border=0.1>
<tr>
<th rowspan='3' align='center'><b>Kode</b></th>
<th rowspan='3' align='center'><b>Uraian</b></th>
<th colspan='8' align='center'><b>Kelompok Belanja</b></th>
</tr>

<tr>
    <td colspan='2' align='center'><b>Operasi</b></td>
    <td colspan='2' align='center'><b>Modal</b></td>
    <td colspan='2' align='center'><b>Tidak Terduga</b></td>
    <td colspan='2' align='center'><b>Transfer</b></td>
</tr>

<tr>
    <td style='width:70px; align='center'><b>Anggaran</b></td>
    <td style='width:70px; align='center'><b>Realisasi</b></td>
    <td style='width:70px; align='center'><b>Anggaran</b></td>
    <td style='width:70px; align='center'><b>Realisasi</b></td>
    <td style='width:70px; align='center'><b>Anggaran</b></td>
    <td style='width:70px; align='center'><b>Realisasi</b></td>
    <td style='width:70px; align='center'><b>Anggaran</b></td>
    <td style='width:70px; align='center'><b>Realisasi</b></td>
</tr> ";

while ($row = mysqli_fetch_array($lra)) {
    // die('<pre>' . var_dump($row));
    // die(print_r($row));
    $html .= "<tr>
    <td> " . $row['urusan'] . " </td> 
    <td> " . $row['nm_urusan'] . " </td> 
    <td align='right' type='number' style='height:30px;'> " . number_format($row['op_ang']) . " </td> 
    <td style='height:30px;' align='right' type='number'> " . number_format($row['op_real']) . " </td> 
    <td align='right' type='number'> " . number_format($row['m_ang']) . " </td> 
    <td align='right' type='number'> " . number_format($row['m_real']) . " </td> 
    <td align='right' type='number'> " . number_format($row['tt_ang']) . " </td> 
    <td align='right' type='number'> " . number_format($row['tt_real']) . " </td> 
    <td align='right' type='number'> " . number_format($row['tf_ang']) . " </td> 
    <td align='right' type='number'> " . number_format($row['tf_real']) . " </td> 

    </tr>";

}

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