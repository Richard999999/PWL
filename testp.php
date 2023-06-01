<?php
$dinding_panjang = 3; 
$dinding_lebar = 4; 
$pintu_panjang = 1; 
$pintu_lebar = 2;
$jendela_panjang = 1; 
$jendela_lebar = 1; 
$harga_per_meter = 25000; 

// Hitung luas dinding
$luas_dinding = ($dinding_panjang * $dinding_lebar) - ($pintu_panjang * $pintu_lebar) - ($jendela_panjang * $jendela_lebar);

// Hitung biaya keseluruhan
$biaya_keseluruhan = $luas_dinding * $harga_per_meter;

// Tampilkan hasil
echo "Luas dinding yang diberi cat: " . $luas_dinding . " meter persegi";
echo "<br>";
echo "Biaya keseluruhan untuk pengecatan dinding: Rp " . number_format($biaya_keseluruhan, 0, ',', '.');
?>