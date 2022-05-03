<!-- MODUL ADMIN-HAKIM -->
<?php
require 'keselamatan.php';
include 'header.php';
?>

<html>
<body><center><h2>
<u>SENARAI HAKIM BELUM ADA TUGASAN</u></h2></center>
<table width="70%" border=0 align="center">
<tr><td colspan="6" valign="middle" align="right"><b>
<body><center>
<a href="hakim_bertugas.php">
TUGASAN HAKIM</a> |
<a href="hakim_tambah.php">
+ HAKIM</a> |
<a href="hakim_import.php">
IMPORT HAKIM</a> |
<a href="index2.php">
HOME</a></b>
</body></center>
</td></tr>

<tr>
<td><b><center>BIL</center></b></td>
<td><b><center>NAMA</center></b></td>
<td><b><center>ID HAKIM</center></b></td>
<td><b><center>PASSWORD</center></b></td>
<td><b><center>TINDAKAN</center></b></td>
</tr>

<?php
#SAMBUNG TABLE ADMIN-ITEM
$no=1;
$data1=mysqli_query($con,"SELECT idadmin, password, nama, aras FROM admin as t2 WHERE NOT EXISTS
(SELECT * FROM hakim as t1 WHERE t1.idadmin = t2.idadmin)
AND t2.aras='HAKIM'");
while ($info1=mysqli_fetch_array($data1))
{
?>
<tr>
<td><center><?php echo $no; ?></center></td>
<td><center><?php echo $info1['nama']; ?></center></td>
<td><center><?php echo $info1['idadmin']; ?></center></td>
<td><center><?php echo $info1['password']; ?></center></td>
<td><center>
<a href="hakim_profail.php?id=
<?php echo $info1['idadmin'];?>">TUGASAN</a> |
<a href="hakim_hapus.php?id=
<?php echo $info1['idadmin'];?>">HAPUS</a>
</td></center></tr>
<?php $no++; } ?>
</table><br>
<center><font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Hakim:<?php echo $no-1; ?>
</font>
</center>
</body>
</html>