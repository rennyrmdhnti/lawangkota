<?php
use Dompdf\Css\Style;

include 'koneksi.php';
$data = mysqli_query($conn, " SELECT * FROM rekap_pdn ORDER BY kd_rek ASC ");

$r = mysqli_fetch_array($data);
?>

<?php
require 'vendor/dompdf_old/autoload.inc.php';
include 'koneksi.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

$lra = mysqli_query($conn, " SELECT * FROM rekap_pdn ORDER BY kd_rek ASC ");

$nomor = $r['kd'];
$uraian = $r['uraian'];
$anggaran = $r['anggaran'];
$komit = $r['komit_pdn'];
$real = $r['real_pdn'];
$persen = $r['persen_pdn'];
$penyelesaian = $r['penyelesaian'];

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
    <th width=400px></th>
    <th>LAPORAN REKAPITULASI REALISASI ANGGARAN BELANJA</th>
    <th width=400px></th>
    </tr>
    </table>
    <br>
    <br>

<table class=table table-bordered align=center>
<tr>
<th align='center'><b>Nomor</b></th>
<th width=250px align='center'><b>Uraian</b></th>
<th width=150px align='center'><b>Anggaran</b></th>
<th width=150px align='center'><b>Komit PDN</b></th>
<th width=150px align='center'><b>Realisasi PDN</b></th>
<th width=150px align='center'><b>Persentase PDN</b></th>
<th width=150px align='center'><b>Penyelesaian</b></th>
</tr>";

while ($row = mysqli_fetch_array($lra)) {
    // die('<pre>' . var_dump($row));
    // die(print_r($row));
    $html .= "<tr>
    <td> " . $row['kd'] . " </td> 
    <td> " . $row['uraian'] . " </td> 
    <td  width=100px align='right' type='number'> " . number_format($row['anggaran']) . " </td> 
    <td style='height:30px;' align='right' type='number'> " . number_format($row['anggaran']) . " </td> 
    <td style='height:30px;' align='right' type='number'> " . number_format($row['real_pdn']) . " </td> 
    <td style='height:30px;' align='center' type='number'> 100% </td> 
    <td> " . $row['penyelesaian'] . " </td> 

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