<?php include("inc_header.php")?>
<style>
    table {
        width: 600px;
    }
    @media screen and (max-width: 700px){
        table {
            width: 90%;
        }
    }
    table td {
        padding: 5px;
    }
    td.label {
        width: 40%;
    }
    .input{
        border : 1px solid #CCCCCC;
        background-color: #dfdfdf;
        border-radius: 5px;
        padding: 10px;
        width: 100%;
    }
    input.tbl-yellow{
        border: none;
        background-color: #FFED00;
        border-radius: 20px;
        margin-top: 20px;
        padding: 15px 20px 15px 20px;
        color : #ffffff;
        cursor: pointer;
        font-weight: bold;
    }
    input.tbl-yellow:hover{
        background-color: #FF8B13;
        text-decoration: none;
    }
    .error {
        padding: 20px;
        background-color: #f44336;
        color: #ffffff;
        margin-bottom: 15px;
    }
    .sukses {
        padding: 20px;
        background-color: #2195f3;
        color: #ffffff;
        margin-bottom: 15px;
    }

    .error ul{
        margin-left: 10px;
    }
    
</style>

<h3>Pendaftaran </h3>
<?php
$email = "";
$nama_lengkap = "";
$err = "";
$sukses = "";

if(isset($_POST['simpan'])){
    $email = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    if($email =='' or $nama_lengkap =='' or $password == '' or $konfirmasi_password ==''){
        $err .= "<li> Silakan Isi Semua Data. </li>";
    }

    if($email != ''){
        $sql1 = "select email from members where email ='$email'";
        $q1   = mysqli_query($koneksi,$sql1);
        $n1   = mysqli_num_rows($q1);
        if($n1 > 0){
            $err .= "<li> Email Sudah Terdaftar. </li>";
        }

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $err .= "<li> Email Yang Kamu Masukan Tidak Valid. </li>";
        }

    }

    if($password != $konfirmasi_password){
        $err .= "<li> Password Dan Konfirmasi Password Tidak Sesuai. </li>";
    }

    if(strlen($password) < 6 ){
        $err .= "<li> Panjang Karakter Minimal 6 Karakter. </li>";
    }

    if(empty($err)){
        $sukses = "Proess Berhasil.";
    }
}

?>
<?php if($err) {echo "<div class= 'error'><ul>$err</ul></div>";}?>
<?php if($sukses) {echo "<div class= 'sukses'>$sukses</div>";}?>
<form action="" method="POST">
    <table>
        <tr>
            <td class="label">Email </td>
            <td >
                <input type="text" name="email" class="input" value="<?php echo $email?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">Nama Lengkap </td>
            <td >
                <input type="text" name="nama_lengkap" class="input" value="<?php echo $nama_lengkap?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">Password </td>
            <td >
                <input type="password" name="password" class="input"/>
            </td>
        </tr>
        <tr>
            <td class="label">Konfirm Password </td>
            <td >
                <input type="password" name="konfirmasi_password" class="input"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="simpan" value="simpan" class="tbl-yellow"/>
            </td>
        </tr>
    </table>
</form>
<?php include("inc_footer.php")?>
