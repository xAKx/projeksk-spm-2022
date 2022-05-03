<!-- MODUL PESERTA -->
<?php include 'header.php'; ?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<center><h2>PENDAFTARAN PESERTA BARU</h2></center>

<table width="70%" border="0" align="center">
<tr><td>

<!-- Papar Borang Pendaftaran -->
<center><body>
<form method="POST" action="individu_simpan.php">
NOM.KAD PENGENALAN<br>
<input type="text" name="id"
placeholder="TANPA TANDA -"maxlength='12'
size="45" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus>

<br>NAMA<br>
<input type="text" name="nama" placeholder="NAMA ANDA"
size="60" style="text-transform: uppercase" required>
<br>NOM HP<br>

<input type="text" name="nomhp"
placeholder="TANPA TANDA -" maxlength='13'
size="45" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>

<br><br>
<div>
<button name="hantar" type="submit">DAFTAR</button>
<button type="reset">RESET</button>
</div><br>

<font color="blue">*Pastikan maklumat anda betul sebelum pendaftaran.</font>

</form>
<div>
<a href="index2.php"><button>HOME</button></a>
</div>
</body></center>

</td></tr>
</table>
</body>
</html>