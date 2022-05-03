<?php
#TENTUKAN ARAS LOGIN-ADMIN
if ($_SESSION['aras']=="ADMIN"){
?>
<!-- PAPARAN MENU ADMIN -->
<center>
<h2>DASHBOARD ADMIN</h2>
<a href="index2.php">HOME</a></br>
<a href="setup_papar.php">TETAPAN PERTANDINGAN</a></br>
<a href="item.php">ITEM PEMARKAHAN</a></br>
<a href="hakim.php">HAKIM</a></br>
<a href="peserta.php">PESERTA</a></br>
<a href="pemenang.php">PEMENANG</a></br>
<a href="logout.php">KELUAR</a></br>
</center>
<?php

#TENTUKAN ARAS LOGIN HAKIM
}else{
?>
<!-- HAKIM -->
<center>
<h2>DASHBOARD HAKIM</h2>
<a href="index2.php">HOME</a></br>
<a href="pemarkahan.php">PEMARKAHAN</a></br>
<a href="logout.php">KELUAR</a></br>
</center>
<?php
}
?>