<!-- MODUL UTAMA SISTEM -->
<?php
#SAMBUNGAN MYSQLI DENGAN NAMA $con
$con = mysqli_connect("localhost","root","","1_simple");
#PAPARAN MSG JIKA SAMBUNGAN GAGAL
if (mysqli_connect_errno()){
	echo "Pangakalan data tidak berhubung!:".mysqli_connec_error();
}
?>