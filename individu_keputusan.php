<!-- MODUL PESERTA -->
<?php
#PAPAR HEADER
include 'header.php';

#JIKA SEBELUM TARIKH
if($date1 < $date3){
echo "<script>alert('SILA SEMAK SELEPAS TARIKH
$tunjukdate');
window.location='dashboard.php'</script>";
}
session_start();
$PESERTA=$_SESSION["idpeserta"];

#PANGGIL REKOD PESERTA IKUT ID PESERTA
$papar=mysqli_query($con,"SELECT* FROM peserta
WHERE idpeserta='$PESERTA'");
$info1=mysqli_fetch_array($papar);
#PANGGIL REKOD PEMENANG IKUT ID PESERTA
$WINNER=mysqli_query($con,"SELECT *
FROM pemenang WHERE idpeserta='$PESERTA'");
$win=mysqli_fetch_array($WINNER);

if($win==NULL){
echo "<script>alert('Dukacita dimaklumkan anda tidak
memenangi pertandingan ini');
window.location='dashboard.php'</script>";
}
?>

<html>
<center>
<div><h2>DASHBOARD PESERTA</h2></div>
<table width="80%" border=0 align="center">
<tr>
<td colspan="5" valign="middle" align="right"><b>
<a href="dashboard.php">HOME</a> |
<a href="logout.php">KELUAR</a></b></td>
</tr>
<tr><td td colspan="5">
<hr>
NAMA: <?php echo $info1['nama'];?><br>
NOM.KP: <?php echo $info1['idpeserta'];?><br>
NOM.HP: <?php echo $info1['nomhp'];?><br>
</td></tr>
<tr><td colspan="5"><hr><td></tr>
<tr><td colspan="5">
KEPUTUSAN RASMI <?php echo $kata1;?><br>
TEMPAT: <?php echo $win['tempat'];?><br>
<hr>
</center>
</html>