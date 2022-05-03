<!-- MODUL ADMIN SISTEM -->
<?php
#PAPARAN HEADER
include 'header.php';

#TABLE TETAPAN SISTEM
$dataSys=mysqli_query($con,"SELECT * FROM tetapan");
$INFOSys=mysqli_fetch_array($dataSys);
#POST VALUE
if (isset($_POST['update'])) {
#TERIMA VALUE YANG DI POST
$nama = $_POST['sys'];
$kata1 = $_POST['nama'];
$detail1 = $_POST['kat'];
$kata2 = $_POST['sempena'];
$detail2 = $_POST['tempat'];
$end1 = $_POST['tutup'];
$end2 = $_POST['umum'];

#UPDATE REKOD
$result = mysqli_query($con,"UPDATE tetapan
SET namasys='$nama', kata1='$kata1', detail1='$detail1', kata2='$kata2', detail2='$detail2', tamat_daftar='$end1', tamat_hakim ='$end2'");
#PAPAR MSEJ JIKA BERJAYA
echo "<script>alert('KEMASKINI MAKLUMAT BERJAYA');
window.location='index2.php'</script>";
}
?>

<html>
<body>
<center><h2>KEMASKINI MAKLUMAT SISTEM</h2></center>
<table width="70%" border=0 align="center">
<tr><td>
<form method="POST">
Nama Sistem<br>
<input type="text" name="sys" size="60"
value="<?php echo $namasys; ?>"autofocus>
<hr>
Info Pertandingan<br>
<input type="text" name="nama" size="60"
value="<?php echo $kata1; ?>"
style="text-emphasis: uppercase"><br>
Keterangan<br>
<input type="text" name="kat" size="60"
value="<?php echo $kata1; ?>"
style="text-transform: uppercase"><br>
Anjuran<br>
<input type="text" name="sempena" size="60"
value="<?php echo $kata2; ?>"
style="text-transform: uppercase"><br>
Tempat<br>
<input type="text" name="tempat" size="60"
value="<?php echo $lanjut2; ?>"
style="text-transform: uppercase">
<hr>
Tarikh Tutup Pendaftaran<br>
<input type="date" name="tutup"
value="<?php echo $tamat_daftar; ?>"><br>
Tarikh Tamat Juri<br>
<input type="date" name="umum"
value="<?php echo $tamat_hakim; ?>"><br>
<button name="update" type="submit">SIMPAN</button>
<button type="reset">RESET</button>
</form>
<div><a href="index2.php"><button>HOME</button></a></div>
</td></tr>
</table>
</body>
</html>