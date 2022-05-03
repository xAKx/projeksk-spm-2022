<!-- MODUL ADMIN-PESERTA -->
<?php
require 'keselamatan.php';
include 'header.php';
?>

<html>
<body>
<center>
<h2><U>SENARAI PESERTA BERDAFTAR MENGIKUT KATEGORI</U>
</h2></center>
<form name="searchForm" method="post"
action="peserta_cari.php">
<table width="70%" border=0 align="center">
<tr><td colspan="5" valign="middle" align="right"><b>
CARIAN NO.K/P:
<input type="text" name="carikp" maxLength='12' autofocus>
<input type="submit" name="SUBMIT" id="SUBMIT"
value="CARI">
</form>
<a href="index2.php">HOME</a>
<hr>
</b></td></tr>
<tr>
<td><b>BIL</b></td>
<td><b>NOM.KP</b></td>
<td><b>NAMA</b></td>
<td><b>TINDAKAN</b></td>
</tr>
<?php
$no=1;
$data1=mysqli_query($con,"SELECT*
FROM peserta ORDER BY nama ASC");
while ($info1=mysqli_fetch_array($data1))
{
?>
<tr>
<td><?php echo $no;?></td>
<td><?php echo $info1['idpeserta'];?></td>
<td><?php echo $info1['nama'];?></td>
<td><a href="peserta_hapus.php?id=
<?php echo $info1['idpeserta'];?>"
onclick="return confirm('ANDA PASTI?')">HAPUS</a></td>
</tr>
<?php $no++; }?>
</table>
</main>
<br><center><font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Peserta:<?php echo $no-1; ?>
</font>
</center>
</body>
</html>