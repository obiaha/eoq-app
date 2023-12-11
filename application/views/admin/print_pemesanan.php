<?php
$periode1 = $this->input->get('periode1');
$periode2 = $this->input->get('periode2');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan Pemesanan</title>
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
    <h4><u>LAPORAN PEMESANAN</u></h4>
    <h6 style="margin-top: -3px">Periode <?= date('d-m-Y', strtotime($periode1)) . " s.d " . date('d-m-Y', strtotime($periode2)) ?></h6>
    <br>
    <table>
        <tr>
            <th>No</th>
            <th>Surat Jalan</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Tanggal</th>
            <th>Qty</th>
        </tr>
        <?php
        $total = 0;
        $no = 1;
        $pemesanan = $this->M_admin->getPemesanan($periode1, $periode2);
        foreach ($pemesanan->result() as $dt) {
            $total += $dt->qty;
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $dt->surat_jalan ?></td>
                <td><?= $dt->id_barang ?></td>
                <td><?= $dt->nm_barang ?></td>
                <td><?= date('d-m-Y', strtotime($dt->tgl_record)) ?></td>
                <td><?= $dt->qty . " " . $dt->satuan ?></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="5"><b>Total</b></td>
            <td><?= $total ?> Batang</td>
        </tr>
    </table>
</body>

</html>