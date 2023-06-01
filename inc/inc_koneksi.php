<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_datae";

$koneksi = mysqli_connect($host, $user,$pass,$db);
if(!$koneksi){
    die("Gagal Terkoneksi");
}
// else{
//     echo "Koneksi Berhasil Ke DataBase";
// }
?>