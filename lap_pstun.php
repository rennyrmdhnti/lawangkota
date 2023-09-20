<?php
use Dompdf\Css\Style;

include 'koneksi.php';
$data = mysqli_query($conn, " SELECT * FROM rekap_pen_stun ");

$r = mysqli_fetch_array($data);
?>

<?php
require 'vendor/dompdf_old/autoload.inc.php';
include 'koneksi.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

$lra = mysqli_query($conn, " SELECT * FROM rekap_pen_stun ");

$nomor = $r['nomor'];
$kegiatan = $r['kegiatan'];
$op_ang = $r['anggaran'];
$op_real = $r['realisasi'];
$persen = $r['persen'];

$no = 1;

$path = realpath('E:/xampp/htdocs/belajar2/img/header.jpg');

$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$header = 'data:image/' . $type . ';base64,' . base64_encode($data);

$html =
    "<html><body>

    <table align='center' border=0  style='width:100%;'>
    <tr>
    <th><img src='$header' style='width:90%;height:auto;'></th>
    </tr>
    </table>

    <br>
    <br>
    <table border= 0>
    <tr>
    <th width=250px></th>
    <th width=800px align= 'center'>PEMERINTAH DAERAH PROVINSI/KABUPATEN/KOTA BANJARMASIN
    REKAPITULASI REALISASI ANGGARAN BELANJA PENURUNAN STUNTING TA 2022</th>
    <th width=250px></th>
    </tr>
    </table>
    <br>

<table align='center' border=0.5>
<tr>
<th align='center'><b>No</b></th>
<th width='50px' align='center'><b>Kode</b></th>
<th width='622px' align='center'><b>Kegiatan</b></th>
<th width='222px' align='center'><b>Anggaran</b></th>
<th width='222px' align='center'><b>Realisasi</b></th>
<th width='80px' align='center'><b>Persen</b></th>
</tr>";

while ($row = mysqli_fetch_array($lra)) {
    // die('<pre>' . var_dump($row));
    // die(print_r($row));
    $html .= "<tr>
    <td style='height:30px;' align='center'> " . $no++ . " </td> 
    <td> " . $row['kd_urut'] . " </td>  
    <td> " . $row['kegiatan'] . " </td> 
    <td align='right' type='number'> " . number_format($row['anggaran']) . " </td> 
    <td align='right' type='number'> " . number_format($row['realisasi']) . " </td> 
    <td align='center'> " . $row['persen'] . " </td> 
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