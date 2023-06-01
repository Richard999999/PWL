<?php include("inc_header.php") ?> <!-- Proses Pemanggilan Header  -->

<?php
$sukses = "";
$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : ""; //akan memasukan kata kunci bila ada isinya ke dalam variable $katakunci, dan jika tidak ada isinya maka akan di berikan nilai kosong

if(isset($_GET['op'])){
  $op = $_GET['op'];
}else{
  $op = "";
}
if($op == 'delete'){
  $id = $_GET['id'];
  $sql1 = "delete from halaman where id = '$id'";
  $q1 = mysqli_query($koneksi,$sql1);
  if($q1){
    $sukses = "Berhasil Menghapus Data";
  }
}
?>

<h1>A Halaman</h1>
<p>
  <!-- Untuk Button Buat Halaman Baru-->
  <a href="halaman_input.php">
    <input type="button" class="btn btn-primary" value="Buat Halaman Baru" />
  </a>
</p>

  <?php
    if($sukses){
  ?>
    <div class="alert alert-primary" role="alert">
    <?php echo $sukses?>
    </div>
  <?php
  }
  ?>

<form class="row g-3" method="get">
  <!-- Untuk Form/Text Field -->
  <div class="col-auto">
    <input type="text" class="form-control" placeholder="Masukan Kata Kunci" name="katakunci"
      value="<?php echo $katakunci //meletakan variable $katakunci nya di sini?>" />
  </div>

  <!-- Untuk Button Cari Tulisan -->
  <div class="col-auto">
    <input type="submit" name="cari" value="Cari Tulisan" class="btn btn-secondary" />
  </div>
</form>

<!-- Untuk Table -->
<table class="table table-striped">
  <thead>
    <tr>
      <th class="col-1">#</th>
      <th>Judul</th>
      <th>Kutipan</th>
      <th class="col-2">Aksi</th> <!-- col-2 untuk mengatur lebar dari sebuah colom Aksi -->
    </tr>
    <thead>
  
    <tbody>
      <?php

        $sqltambahan = "";
        $per_halaman = 3; // untuk banyaknya data yang keluar di tiap page

        if($katakunci != ''){ //statement jika $katakunci tidak kosong makan akan menjalankan prosesnya
          $array_katakunci = explode(" ",$katakunci); // untuk fungsi explode parameter pertamanya berisikan sepasi yang memecah sebuah kata pada saat sedang melakukan pencarian, dan parameter ke dua berisikan kata kunci tersebut.
        for($x = 0; $x < count($array_katakunci); $x++){
          // $sqlcari[] akan mengambil data dari 3 kolom yaitu judul kutipan dan isi, yang dimana dia mencari dengan operator like agar bisa mempersingkat kata yang panjang agar bisa menjadi beberapa kata saja saat pencarian
          $sqlcari[] = "(judul like '%".$array_katakunci[$x].
                       "%' or kutipan like '%".$array_katakunci[$x].
                       "%' or isi like '%".$array_katakunci[$x]."%')";
        }
          $sqltambahan = "where".implode(" or ", $sqlcari); // parameter pertama untuk memecah data yang ada di parameter ke dua yaitu $sqlcari[]
        }

          // Proses Pagination
          $sql1 = "select * from halaman $sqltambahan"; //
          $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // proses pengambilan isi page dari url page, jika datanya ada maka akan merubah data isiannya dari integer, tetapi jika tidak ada isinya maka akan di berikan nilai default 1.
          $mulai = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0; // jika $page berisikan lebih dari 1 maka akan di isikan, tetapi jika $page nya kosong, maka akan memberikan nilai default.  
          $q1 = mysqli_query($koneksi, $sql1); // di parameter ke 1 untuk mengkoneksikan ke server Mysql, dan di parameter ke 2 untuk printah Sql yang ingin dijalankan di database.
          $total = mysqli_num_rows($q1); //  fungsi ini mengambil 1 buah argumen yaitu $q1, untuk mengetahui berapa banyak jumlah baris hasil dari pemanggilan fungsi mysqli_query().
          $pages= ceil($total / $per_halaman); // akan menampilkan jumblah dari halamannya dengan melakukan pembulatan, 
          $nomor = $mulai + 1; // default yang di tambah 1
          $sql1 = $sql1." order by id desc limit $mulai,$per_halaman";

          $q1 = mysqli_query($koneksi, $sql1); // untuk menggabungkan atau nyatukan query yang ada di $sql1 dengan koneksi
          // $nomor = 1; // memberikan default dari urutan data yang di input
          while ($r1 = mysqli_fetch_array($q1)) { // proses untuk pengambilan data yang ada di dalam array yang argumennya adalah $q1
        ?>

        <tr>
          <!-- Untuk melihat hasil yang telah di inputkan -->
          <td><?php echo $nomor++?></td> <!-- dari default akan bertambah sesuai urutan -->
          <td><?php echo $r1['judul']?></td> <!-- dari $r1 akan akan mengambil bagian judul -->
          <td><?php echo $r1['kutipan']?></td> <!-- dari $r1 akan akan mengambil bagian kutipan -->
          <!-- Untuk melihat hasil yang telah di inputkan -->

          <!-- Untuk Button -->
          <td>
            <a href="halaman_input.php?id=<?php echo $r1['id']?>">
            <span class="badge bg-warning text-dark">Edit</span>
            </a>

            <a href="halaman.php?op=delete&id=<?php echo $r1['id']?>" onclick="return confirm('Yakin akan menghapus?')">
            <span class="badge bg-danger">Delete</span>
          </a>
          </td>
          <!-- Untuk Button -->
        </tr>
        <?php
      }
      ?>

    </tbody>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php
    $cari = (isset($_GET['cari']))?$_GET['cari'] : "";
    for($i=1; $i <= $pages; $i++){
      ?>
      <li class="page-item">
        <a class="page-link" href="halaman.php?katakunci=<?php echo $katakunci?>&cari=<?php echo $cari?>&page=<?php echo $i?>"><?php echo $i?></a>
    </li>
      <?php
    }
    ?>
  </ul>

</nav>
<?php include("inc_footer.php") ?> <!-- Perosess Pemanggilan Footer -->