<!-- MODUL HAKIM BERI MARKAH -->
<?php
require 'keselamatan.php';
include 'header.php';
#DATA DARI URL
$IDPESERTA= $_GET['id'];

#PAPAR REKOD DARI TABLE PESERTA BERDASARKAN ID
$dataA=mysqli_query($con,"SELECT * FROM peserta
WHERE idpeserta='$IDPESERTA'");
$infoA=mysqli_fetch_array($dataA);
?>

<html>
<body>
<center><h2><U>PEMARKAHAN PESERTA</U></h2></center>
<table width="80%" border=0 align="center">
<tr><td colspan="5" valign="middle" align="right">
<a href="index2.php">HOME</a></td></tr>
<tr><td colspan="5" valign="middle" align="left">
NAMA:<?php echo $infoA['nama'];?><br>
NOM.KP:<?php echo $infoA['idpeserta'];?><br>
NOM.HP:<?php echo $infoA['nomhp'];?><br>
<hr>
</td></tr>
<tr>
<td><b>ITEM</b></td>
<td><b>MARKAH PENUH</b></td>
<td><b>MARKAH LAYAK</b></td>
</tr>
<?php
#PAPAR REKOD JOIN TABLE ITEM-ADMIN
$data1=mysqli_query($con,"SELECT * FROM item AS i
INNER JOIN hakim AS a ON a.iditem=i.iditem
WHERE a.idadmin='$LOGIN'");
$info1=mysqli_fetch_array($data1)
?>
<form method="post" action="pemarkahan_simpan.php">
<tr>
<td><?php echo $info1['item']; ?></td>
<td><?php echo $info1['markah'];?></td>
<td><input type="text" maxLength='2'
name="markah" placeholder="X" size='5%'
required autofocus/>

<!-- HIDDEN VALUE UTK POST -->
<input type="text" name="penuh"
value="<?php echo $info1['markah'];?>" hidden>
<input type="text" name="iditem"
value="<?php echo $info1['iditem'];?>" hidden>
<input type="text" name="idpeserta"
value="<?php echo $infoA['idpeserta'];?>" hidden>
<input type="text" name="idadmin"
value="<?php echo $LOGIN;?>" hidden>
<!-- HIDDEN VALUE TAMAT -->
</td></tr>
<tr><td colspan="5" align="center">
<hr>
<input type="submit" name="submit_row" value="SIMPAN">
<input type="reset" name="reset" value="RESET">
</td></tr>
</table>
</form>
</body>
</html>