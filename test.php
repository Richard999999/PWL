<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Nomor 3 -->
    Nomor 3
    <br>
    <br>
    <form method="post" action="test.php">
        Nama : <input type="text" name="nama"><br>
        <tr>
        <td>Aksi</td>
        <td> <input type="radio" name="aksi" value="Melangkah">Melangkah
        <input type="radio" name="aksi" value="Melompat">Melompat
        </td>
        </tr><br>
        Jumlah : <input type="text" name="jumlah"><br>
        <input type="submit" name="simpan" value="Go">
    </form>
    <br> 

    <?php
    if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $aksi = $_POST['aksi'];
    $jumlah = $_POST['jumlah'];
    $stop = "$nama Berhenti $aksi";

        for ($banyak = 1; $banyak <= $jumlah; $banyak++){
            if($banyak != -1){
                echo "$nama $aksi $banyak Kali<br>";
            }
        }
        echo $stop; 
        echo "<br>"; 
        echo "<br>"; 
    }

//    // Nomor 2
//     echo "Nomor 2";
//     echo "<br>";
//     echo "<br>";
//     function cetakSlipGaji ($nama, $gaji, $terlambat){
//         echo "Besaran Honor yang di dapat oleh $nama : "; 
//         echo "<br> Gaji = $gaji ";
//         echo "<br> Potongan Keterlambatan = 150000 ";
//         $diterima = $gaji - 15000 * $terlambat;
//         echo "<br> Total Diterima = $diterima";
//         echo "<br>";
//         echo "<br>";
//         }
        
//         cetakSlipGaji("Gus Samsudin", 4500000, 10);

//     // Nomor 4 
//         echo "Nomor 4";
//         echo "<br>";
//         echo "<br>";
//         $a = 3;
//         $b = 8;

//         $c = $a > $b;
//         echo "$a > $b : $c";
//         echo "<hr>";

//         $c = $a < $b;
//         echo "$a < $b : $c";
//         echo "<hr>";

//         $c = $a != $b;
//         echo "$a != $b : $c";

?>
</body>
</html>

