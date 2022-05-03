<!-- MODUL HAKIM BERI MARKAH -->
<?php
require 'keselamatan.php';
include 'header.php';

#PAPARKAN ITEM PEMARKAHAN YG TELAH DITETAPKAN
$KEPAKARAN=mysqli_query($con,"SELECT* FROM hakim AS t1
INNER JOIN item AS t2 ON t1.iditem=t2.iditem
WHERE t1.idadmin='$LOGIN'");
$info1=mysqli_fetch_array($KEPAKARAN);
?>
<html>
<body>
<center><h2><U>SENARAI PESERTA BELUM DINILAI</U></h2>
<h4>Item:<?php echo $info1['item'];?></h4></center>
<table width="80%" border=0 align="center">
<tr>
<td colspan="3" valign="middle" align="right"><b>
<a href="index2.php">HOME</a></b></td>
</tr>
<tr>
<td><b>BIL</b></td>
<td><b>NAMA PESERTA</b></td>
<td><b>TINDAKAN</b></td>
</tr>
<?php
#PAPAR REKOD YG BELUM DIBERIKAN MARKAH
$no=1;
$data1=mysqli_query($con,"SELECT* FROM peserta as t2
WHERE NOT EXISTS (SELECT * FROM markah as t1
WHERE t1.idadmin='$LOGIN'
AND t1.idpeserta = t2.idpeserta)
ORDER BY t2.nama ASC");

while ($info1=mysqli_fetch_array($data1))
{
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $info1['nama']; ?></td>
<td><a href="pemarkahan_beri.php?id=
<?php echo $info1['idpeserta'];?>"><button>NILAIKAN</button></a>
</td>
</tr>
<?php $no++; } ?>
</table>
<br>
<center><font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Peserta:<?php echo $no-1; ?>
</font>
</center>
</body>
</html>