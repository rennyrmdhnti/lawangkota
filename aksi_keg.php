<?php
require 'vendor/autoload.php';
$host = "localhost";
$user = "root";
$pass = "";
$db = "lawang";

$konek = mysqli_connect($host, $user, $pass, $db);
if (isset($_POST['submit'])) {
    $err = "";
    $ekstensi = "";
    $success = "";

    $file_name = $_FILES['filexls']['name'];
    $file_data = $_FILES['filexls']['tmp_name'];

    if (empty($file_name)) {
        $err = "<li>Silahkan Masukkan File Yang Kamu Inginkan.</li>";

    } else {
        $ekstensi = pathinfo($file_name)['extension'];
    }

    $ekstensi_allowed = array("xls", "xlsx");
    if (!in_array($ekstensi, $ekstensi_allowed)) {
        $err = "<li>Silahkan Masukkan File Tipe xls Atau xlsx. File Yang Kamu Masukkan Adalah <b>$file_name</b> Punya Tipe <b>$ekstensi</b></li>";

    }

    if (empty($err)) {
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
        $spreadsheet = $reader->load($file_data);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $jumlahData = 0;
        for ($i = 1; $i < count($sheetData); $i++) {
            $no = $sheetData[$i]['0'];
            $kode = $sheetData[$i]['1'];
            $kd_keg = $sheetData[$i]['2'];
            $kd_prog_keg = $sheetData[$i]['3'];
            $nm_keg = $sheetData[$i]['4'];

            // echo "$nama - $umur - $alamat <br/>";

            $sql1 = "INSERT INTO kegiatan(nomor, kode, kd_keg, kd_prog_keg, nm_keg) VALUES ('$no', '$kode', '$kd_keg', '$kd_prog_keg', '$nm_keg')";

            mysqli_query($konek, $sql1);

            $jumlahData++;

        }

        if ($jumlahData > 0) {
            $success = "$jumlahData Berhasil Dimasukkan Ke Database!";
        }

    }

    if ($err) {
        ?>
        <div class="alert alert-danger">
            <ul>
                <?php echo $err ?>
            </ul>
        </div>
        <?php
    }

    if ($success) {
        ?>
        <div class="alert alert-primary">
            <?php echo $success ?>
        </div>
        <?php
    }

}
?>