<! -- MODUL ADMIN-HAKIM -->
<?php 
require 'keselamatan.php';
include 'header.php';
#DAPATKAN ID HAKIM 
$IDHAKIM= $_GET['id'];

#SAMBUNG KE TABLE ADMIN
$dataHakim=mysqli_query($con,"SELECT t1.idadmin,t1.nama,t1.password FROM admin AS t1
LEFT JOIN hakim AS t2 ON t1.idadmin=t2.idadmin
WHERE t1.idadmin='$IDHAKIM'");
$INFOHakim=mysqli_fetch_array($dataHakim);
#TERIMA VALUE YANG DI POST
if (isset($_POST['hantar'])) {
#UMPUKKAN NILAI PD P/UBAH
$idhakim = $_POST['id'];
$item = $_POST['item'];

#MASUK REKOD KE DALAM TABLE
$tugasan= mysqli_query($con,"INSERT INTO hakim (iditem,idadmin)
VALUES ('$item','$idhakim')");

#PAPAR MESEJ POP UP
echo "<script>alert('KEMASKINI MAKLUMAT BERJAYA');
window.location='hakim.php'</script>";
}
?>

<html>
<body>
<center><h2>AGIHAN TUGASAN HAKIM</h2></center>
<table width="70%" border="0" align="center">
<tr><td>
<!-- PAPAR BORANG -->
<form method="POST">
Kod Hakim:
<?php echo $INFOHakim['idadmin']; ?>
<!-- HIDDEN VALUE -->
<input type="text" name="id"
value="<?php echo $INFOHakim['idadmin']; ?>" hidden>
<!-- HIDDEN VALUE ENDING -->
<br>Katalaluan :
<?php echo $INFOHakim['password']; ?>
<br>Nama Hakim :
<?php echo $INFOHakim['nama']; ?>
<br>Item Pemarkahan:<br>
<select name="item" required>
<option value="">-PILIH-</option>

<?php
#PILIH ITEM YG BELUM DIAMBIL
$pilihan=mysqli_query($con,"
SELECT iditem,item
FROM item as t2 WHERE NOT EXISTS
(SELECT * FROM hakim as t1 WHERE t1.iditem = t2.iditem)");
while($row = mysqli_fetch_assoc($pilihan) ){
$id = $row['iditem'];
$kat = $row['item'];

#PILIHAN
echo "<option value='".$id."' >".$kat."</option>";
}
?>
</select><br/>
<br><br>
<!-- BUTANG -->
<button name="hantar" type="submit">SIMPAN</button>
<button type="reset">RESET</button>
</form>
<div><a href="index2.php"><button>HOME</button></a></div> </td></tr>
</table>
</body>
</html>