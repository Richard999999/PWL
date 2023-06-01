<?php 
function url_dasar(){
    // $_SERVER['SERVER_NAME'] : akan memberikan alamat website, misalkan websitemmu.com
    // $_SERVER['SCRIPT_NAME'] : directory website, websitemmu.com/blog/
    $url_dasar = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']);
    return $url_dasar;
}

function link_halaman($id){
    global $koneksi;
    $sql1 = "select * from halaman where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $judul = $r1['judul'];
    
    return url_dasar()."/halaman.php/$id/$judul";
}
?>