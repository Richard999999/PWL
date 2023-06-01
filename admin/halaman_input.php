<?php include("inc_header.php") ?>

<?php
$judul = "";
$kutipan = "";
$isi = "";
$error = "";
$sukses = "";

// Dengan menggunakan id untuk posisi dalam melakukan edit
if(isset($_GET['id'])){ 
    $id = $_GET['id'];
}else{
    $id = "";
}

if($id !=""){
    $sql1 = "select * from halaman where id = '$id'"; // mengambil berdasarkan id
    $q1 = mysqli_query($koneksi,$sql1);  
    $r1 = mysqli_fetch_array($q1); // untuk mengambil data yang ada di dalam $q1 yang berisikan judul,kutipan,isi
    $judul = $r1['judul']; 
    $kutipan = $r1['kutipan'];
    $isi = $r1['isi'];

    if($isi == ''){
        $error = "Data Tidak Di Temukan";
    }
}

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $kutipan = $_POST['kutipan'];
    $isi = $_POST['isi'];

    if ($judul == '' or $isi == '') {
        $error = "Silakan masukan data judul dan isi";
    }
    if (empty($error)) {
        if($id != ""){
            // untuk update/edit data yang ada
            $sql1 = "update halaman set judul = '$judul',kutipan = '$kutipan', isi = '$isi', tgl_isi = now() where id = '$id'";
        }else{
            // untuk proses menambahkan data baru
            $sql1 = "insert into halaman(judul,kutipan,isi) values('$judul', '$kutipan', '$isi')";
        }

        $q1 = mysqli_query($koneksi, $sql1); // untuk melihat perubahan atau pembaruan data yang ada
     if($q1) {
        $sukses = "Suksess Masukan Data..";
    }else{
        $error = "Gagal Eh.. Datanya Mana?";
    }
    }
}
?>

<h1>Halaman A Admin</h1>
<div class="mb-3 row">
    <a href="halaman.php">
        << Kembali Ke Halaman Admin</a>
</div>

<?php
if ($error) {
    ?>
    <div class="alert alert-danger" role="alert">
     <?php echo $error ?>
    </div>
    <?php
}
?>

<?php
if ($sukses) {
    ?>
    <div class="alert alert-primary" role="alert">
     <?php echo $sukses ?>
    </div>
    <?php
}
?>

<form action="" method="post">
    <!-- Bootstrap -->
    <div class="mb-3 row">
        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="judul" value="<?php echo $judul ?>" name="judul">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="kutipan" class="col-sm-2 col-form-label">Kutipan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="kutipan" value="<?php echo $kutipan ?>" name="kutipan">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="isi" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
            <textarea name="isi" class="form-control"><?php echo $isi ?></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
        </div>
    </div>
    <!-- Bootstrap -->
</form>
<?php include("inc_footer.php") ?>