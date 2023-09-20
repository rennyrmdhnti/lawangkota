<?php
use Dompdf\Css\Style;

include 'koneksi.php';
$data = mysqli_query($conn, " SELECT * FROM ppke ORDER BY urusan ");

$r = mysqli_fetch_array($data);
?>

<?php
require 'vendor/dompdf_old/autoload.inc.php';
include 'koneksi.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

$no = 1;

$lra = mysqli_query($conn, " SELECT * FROM ppke ORDER BY urusan ");

$nomor = $r['nomor'];
$kode = $r['urusan'];
$uraian = $r['nm_keg'];
$op_ang = $r['anggaran'];
$op_real = $r['realisasi'];

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
    <th width=120px></th>

    <th width=990px align='center'>
    PROVINSI/KABUPATEN KOTA BANJARMASIN <br> REKAPITULASI REALISASI ANGGARAN BELANJA PERCEPATAN PENGHAPUSAN KEMISKINAN EKSTREM (SPM) TA 2022</th>
  
    <th width=120px></th>
    </tr>
    </table>

    <br>
    <br>


<table border=0.5 align='center'>
<tr>
<th style='height:30px;' align='center'><b>No</b></th>
<th align='center'><b>Kegiatan</b></th>
<th align='center'><b>Anggaran</b></th>
<th align='center'><b>Realisasi</b></th>
</tr>";



while ($row = mysqli_fetch_array($lra)) {
    $html .= "<tr>
    <td align='center'> " . $no++ . " </td> 
    <td style='width:940px;'> " . $row['nm_keg'] . " </td> 
    <td style='height:30px;width:110px;padding:3px' align='right' type='number'> " . number_format($row['anggaran']) . " </td> 
    <td style='height:30px;padding:3px' align='right' type='number'> " . number_format($row['realisasi']) . " </td> 

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