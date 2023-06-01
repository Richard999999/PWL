<!DOCTYPE html>
<html>

<head>
    <title>UTS</title>
</head>

<body>
    <form method="POST">
        <table>

            <tr>
                <td>Nama</td>
                <td width="3%">:</td>
                <td> <input type="text" name="tNama" required /></td>
            </tr>
            <tr>
                <td>Aksi</td>
                <td width="3%">:</td>
                <td> <input type="radio" name="tAksi" value="Melangkah" /> <small>Melangkah</small>
                    <input type="radio" name="tAksi" value="Melompat" /> <small>Melompat</small>
                </td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td width="3%">:</td>
                <td> <input type="number" name="tJumlah" required /></td>
            </tr>

        </table>
        <input type="submit" name="bok" value="Go">
    </form>
    <br>

    <?php
    if (isset($_POST['bok'])) {
        $nama = $_POST['tNama'];
        $aksi = $_POST['tAksi'];
        $jumlah = $_POST['tJumlah'];
        $stop = "$nama Berhenti $aksi";

        for ($banyak = 1; $banyak <= $jumlah; $banyak++) {
            if ($banyak != -1) {
                echo "$nama $aksi $banyak Kali<br>";
            }
        }
        echo $stop;
    }
    ?>
</body>
</html>
