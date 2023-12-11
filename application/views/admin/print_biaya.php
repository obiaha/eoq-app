<?php
$periode1 = $this->input->get('periode1');
$periode2 = $this->input->get('periode2');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan Biaya Persediaan</title>
    <style>
        body {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            font-size: 12px;
        }

        h3 {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            font-size: 25px;
            margin-bottom: 4px;
            text-align: center;
        }

        h4 {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            font-size: 20px;
            margin-bottom: 4px;
            text-align: center;
        }

        h5 {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            font-size: 15px;
            margin-bottom: 3px;
            text-align: center;
        }

        h6 {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            font-size: 12px;
            margin-bottom: 3px;
            text-align: center;
        }

        table {
            line-height: 1.6;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: center;
            padding: 5px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h4><u>LAPORAN BIAYA PERSEDIAAN</u></h4>
    <h6 style="margin-top: -3px">Periode <?= date('d-m-Y', strtotime($periode1)) . " s.d " . date('d-m-Y', strtotime($periode2)) ?></h6>
    <br>
    <table>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Biaya Persediaan</th>
            <th>Frekuensi</th>
            <th>Durasi</th>
        </tr>
        <?php
        $getPemakaian = $this->M_admin->getPemakaian($periode1, $periode2)->result();
        $no = 1;
        foreach ($getPemakaian as $dt) {
            $getBarang = $this->M_admin->getWhere('tbl_barang', array('id_barang' => $dt->id_barang))->row();
            $d = $dt->total;
            $s = 10000;
            $h = 2000;
            $q = 2 * $d * $s / $h;
            $tc = ($h * $q / 2) + ($s * $d / $q);
            $freq = $d / $q;
            $durasi = 30 / $freq;
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $dt->id_barang ?></td>
                <td><?= $getBarang->nm_barang ?></td>
                <td><?= $tc ?></td>
                <td><?= $freq ?></td>
                <td><?= $durasi ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>