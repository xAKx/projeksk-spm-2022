<!-- MODUL ADMIN-PESERTA -->
<?php
require 'keselamatan.php';
include 'header.php';
?>

<html>
<body>
<center><h2><u>SENARAI PEMENANG-10 TERATAS</u></h2>
</center>
<table width="70%" border="0" align="center">
<tr>
<td colspan="5" valign="middle" align="right"><b>
<a href="index2.php">HOME</a>
</b></td></tr>
<tr>
<td><b>BIL</b></td>
<td><b>NAMA PESERTA</b></td>
<td><b>JUMLAH MARKAH</b></td>
<td><b>KEDUDUKAN</b></td>
<td><b>TINDAKAN</b></td>
</tr>
<?php
$no=1;
$data1=mysqli_query($con," SELECT p.nama,p.idpeserta, m.idpeserta,SUM(m.markah) AS Jum, m.markah FROM peserta
AS p INNER JOIN markah AS m ON p.idpeserta=m.idpeserta
GROUP BY m.idpeserta ORDER BY JUM DESC LIMIT 0,10");
while ($info1=mysqli_fetch_array($data1))
{
#SETKAN KEDUDUKAN
if ($no==1)
{
$hadiah = "PERTAMA";
}
else if($no==2)
{
$hadiah = "KEDUA";
}
else if($no==3)
{
$hadiah = "KETIGA";
}
else
{
$hadiah = "SAGUHATI";
}
?>

<form method="post" action="pemenang_sah.php">
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $info1['nama']; ?></td>
<td><?php echo $info1['Jum']; ?></td>
<td><?php echo $hadiah; ?>
<!-- HIDDEN VALUE UTK POST -->
<input type="text" name="id[]"
value="<?php echo $info1['idpeserta']; ?>" hidden>
<input type="text" name="jum[]"
value="<?php echo $info1['Jum']; ?>" hidden>
<input type="text" name="tempat[]"
value="<?php echo $hadiah; ?>" hidden>
<!-- TAMAT DI SINI -->
</td>
<td>
<a href="pemenang_laporan.php?id=
<?php echo $info1['idpeserta'];?>&rank=
<?php echo $hadiah;?>
&jum=<?php echo $info1['Jum'];?>">CETAK</a>
</td>
</tr>
<?php $no++; } ?>
<tr>
<td colspan="5" valign="middle" align="center">
<input type="submit" name="submit_row" value="SAHKAN MARKAH" onclick="return confirm('ANDA PASTI?')">
</td>
</tr>
</form>
</table>
<br>
<center><font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Rekod:<?php echo $no-1; ?>
</font>
</center>
</body>
</html>