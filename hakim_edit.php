<!-- MODUL HAKIM -->
<?php
require 'keselamatan.php';
include 'header.php';
#DAPATKAN ID HAKIM
$IDHAKIM=$_GET['id'];

#SAMBUNG KE TABLE ADMIN
$dataHakim=mysqli_query($con,"SELECT * FROM admin AS t1
INNER JOIN hakim AS t2 ON t1.idadmin=t2.idadmin
INNER JOIN item AS t4 ON t2.iditem=t4.iditem
WHERE t1.idadmin='$IDHAKIM'");
$INFOHakim=mysqli_fetch_array($dataHakim);

#TERIMA VALUE YANG DI POST
if (isset($_POST['hantar'])) {
$idHAKIM=$_POST['id'];
$password = $_POST['password'];
$nama= $_POST['nama'];
$item = $_POST['item'];

#PROSES UPDATE REKOD HAKIM
$result1 = mysqli_query($con,"UPDATE admin
SET password='$password', nama='$nama' ,aras=aras
WHERE idadmin='$idHAKIM'");
#PROSES UPDATE REKOD HAKIM
$result2 = mysqli_query($con,"UPDATE hakim
SET iditem='$item'
WHERE idadmin='$idHAKIM'");

#PAPAR MESEJ POP UP
echo "<script>alert('KEMASKINI MAKLUMAT BERJAYA');
window.location='hakim_bertugas.php'</script>";
}
?>

<html>
<body><center><h2>KEMASKINI MAKLUMAT HAKIM</h2></center>
<table width="70%" border="0" align="center">
<tr><td>

<!-- PAPAR BORANG -->
<form method="POST">
KOD HAKIM<br><input type="text" name="id"
value="<?php echo $INFOHakim['idadmin']; ?>" readonly>
<br>KATALALUAN<br>
<input type="text" name="password" size="45"
value="<?php echo $INFOHakim['password']; ?>" autofocus>
<br>NAMA HAKIM<br>
<input type="text" name="nama" size="60"
value="<?php echo $INFOHakim['nama']; ?>"
style="text-transform: uppercase">
<br>ITEM PEMARKAHAN:<br>
<select name="item" required>
<option value="<?php echo $INFOHakim['iditem'];?>">
<?php echo $INFOHakim['item'];?>
</option>
<?php

#PILIH ITEM YG BELUM DIAMBIL
$pilihan=mysqli_query($con,"
SELECT * FROM item as t2 WHERE NOT EXISTS
(SELECT * FROM hakim as t1 WHERE t1.iditem = t2.iditem)");

while($row = mysqli_fetch_assoc($pilihan) ){
$id = $row['iditem'];
$kat = $row['item'];

#PILIHAN
echo "<option value='".$id."' >".$kat."</option>";
}
?>
</select><br/>
<br>
<!-- BUTANG -->
<button name="hantar" type="submit">SIMPAN</button>
<button type="reset">RESET</button>
<br>
<font color='blue'>*Pastikan maklumat anda betul sebelum membuat simpan.</font>
</form>
<div>
<a href="index2.php"><button>HOME</button></a>
</div>
</td></tr>
</table>
</body>
</html>