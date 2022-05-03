<! -- MODUL ADMIN-HAKIM -->
<?php 
require 'keselamatan.php';
include 'header.php';

#POST VALUE
if(isset($_post['id'])) {
#pembolehuah untuk memegang data yang dihantar
$idhakim = $_POST['id'];
$nama = $_POST['nama'];
#BOLEH TUKAR PASSWORD '1234' KE YG SESUAI
$daftar= "INSERT INTO admin (idadmin,password,nama,aras)
VALUES ('$idhakim','1234','$nama','HAKIM')";
#LAKSANA ARAHAN SQL
$hasil = mysqli_query($con, $daftar);
#MESEJ POP UP
if ($hasil) {
echo "<script>window.location='hakim.php'</script>";
}else{
echo "<script>alert('Pendaftaran Gagal, Sila Guna Kod
hakim lain');
window.location='hakim_tambah.php'</script>";
}
}
?>
<html>
<body>
<center><h2>PENDAFTARAN HAKIM BARU</h2></center>
<table width="70%" border="0" align="center">
<tr><td>
<form method="POST">
KOD HAKIM<br>
<input type="text" name="id" placeholder="KOD HAKIM"
size="60" style="text-transform: uppercase" required
autofocus>
<br>
NAMA<br>
<input type="text" name="nama" placeholder="NAMA HAKIM"
size="60" style="text-transform: uppercase" required >
<br><br>
<button name="hantar" type="submit">DAFTAR</button>
<button type="reset">RESET</button><br>
<font color='blue'>*Pastikan maklumat anda betul sebelum membuat pendaftaran.</font>
</form>
<div><a href="index2.php"><button>HOME</button></a></div> </td>
</tr>
</table>
</body>
</html>