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
    <form method="post" action="no3.php">
        Nama : <input type="text" name="nama"><br>
        <tr>
        <td>Aksi </td>
        <td> 
         <input type="radio" name="aksi" value="Melangkah">Melangkah
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
?>