<?php 
//   echo "Nomor 2";
      echo "<br>";
      echo "<br>";
      function cetakSlipGaji ($nama, $gaji, $terlambat){
          echo "Besaran Honor yang di dapat oleh $nama : "; 
          echo "<br> Gaji = $gaji ";
          echo "<br> Potongan Keterlambatan = 150000 ";
          $diterima = $gaji - 15000 * $terlambat;
          echo "<br> Total Diterima = $diterima";
          echo "<br>";
          echo "<br>";
          }
          
          cetakSlipGaji("Gus Samsudin", 4500000, 10);
?>