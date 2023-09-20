<?php

require 'koneksi.php'; //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>





<label for="surat"></label>
<select id="skpd" name="id_skpd" class="form-control">
    <option value="">Pilih Dinas</option>
    <!--  -->


    <?php

    $skpd = mysqli_query($conn, "select * from skpd where lvl = '3' order by urusan") or die(mysqli_error($conn));
    while ($tampils = mysqli_fetch_array($skpd)) {
    ?>
        <option value="<?php echo $tampils['nomor']; ?>"><?php echo $tampils['nm_skpd']; ?> </option>
    <?php
    }
    ?>


</select>