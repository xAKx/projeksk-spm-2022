<!-- MODUL PESERTA -->
<?php 
#PAPAR HEADER
include 'header.php';
#DAPATKAN ID PELAJAR - SESSION
session_start();
$PESERTA=$_SESSION["idpeserta"];

#LENCONGAN JIKA BELUM LOGIN
if(!isset($PESERTA)){
#LENCONGAN KE FAIL INI
	header('location: individu_login.php');
	exit(); }

#PANGGIL REKOD PESERTA IKUT ID PESERTA
$papar=mysqli_query($con, "SELECT* FROM peserta
WHERE idpeserta='$PESERTA'");
$info1=mysqli_fetch_array($papar);
?>

<html>
<center>
<div><h2>DASHBOARD PESERTA</h2></div>
<table width="80%" border=0 align="center">
<tr>
<td colspan="5" valign="middle" align="right"><b>
<a href="dashboard.php">HOME</a>
<a href="individu_keputusan.php">SEMAK KEPUTUSAN</a>
<a href="logout.php">KELUAR</a>
</b></td>
</tr>
    <tr>
		<td td colspan="5">
			<hr>
			NAMA: <?php echo $info1['nama'];?><br>
			NOM.KP: <?php echo $info1['idpeserta'];?><br>
			NOM.HP: <?php echo $info1['nomhp'];?><br>
		</td>
	</tr>
<tr>
		<td colspan="5" align="center">
			<hr>
		<td>
</tr>
</center>
</html>