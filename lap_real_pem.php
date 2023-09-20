<?php
use Dompdf\Css\Style;

include 'koneksi.php';
$data = mysqli_query($conn, " SELECT * FROM realisasi_rekening WHERE nomor <> 0 AND uraian 
<> '' ORDER BY nomor ");

$r = mysqli_fetch_array($data);
?>

<?php
require 'vendor/dompdf_old/autoload.inc.php';
include 'koneksi.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

$lra = mysqli_query($conn, "SELECT * FROM realisasi_rekening WHERE nomor <> 0 AND uraian 
<> '' ORDER BY nomor");

$nomor = $r['nomor'];
$kode = $r['kd_rek'];
$uraian = $r['uraian'];
$op_ang = $r['anggaran'];
$op_real = $r['realisasi'];
$m_ang = $r['persen'];

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
    <th width=500px align= 'left'>Nama Pemda &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Pemerintah Kota Banjarmasin <br> 
    Data Per Tanggal &nbsp; : 20 Juli 2023</th>
  
    <th width=100px></th>
    </tr>
    </table>
    <br>
    <br>

<table border=0.5>
<tr>
<th style='height:30px;' align='center'><b>Nomor</b></th>
<th width=100px align='center'><b>Rekening</b></th>
<th style='height:30px;' align='center'><b>Uraian</b></th>
<th width=150px align='center'><b>Anggaran</b></th>
<th width=150px align='center'><b>Realisasi 2023</b></th>
<th style='height:30px;' align='center'><b>Persen</b></th>
</tr>";

while ($row = mysqli_fetch_array($lra)) {
    // die('<pre>' . var_dump($row));
    // die(print_r($row));
    $html .= "<tr>
    <td> " . $row['nomor'] . " </td> 
    <td> " . $row['kd_rek'] . " </td> 
    <td> " . $row['uraian'] . " </td> 
    <td style='height:30px;' align='right' type='number'> " . number_format($row['anggaran']) . " </td> 
    <td style='height:30px;' align='right' type='number'> " . number_format($row['realisasi']) . " </td> 
    <td style='height:30px;' align='right' type='number'> " . number_format($row['persen']) . " </td> 

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