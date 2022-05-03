<!-- MODUL PESERTA -->
<?php
#SAMBUNG KE P/DATA
require 'tetapan.php';

#TERIMA NILAI YG DI POST
if (isset($_POST['id'])) {
$idpeserta = $_POST['id'];
$nama = $_POST['nama'];
$nomhp = $_POST['nomhp'];

#MASUK REKOD KE DALAM TABLE
$daftar1 ="INSERT INTO peserta (idpeserta,nama,nomhp)
VALUES ('$idpeserta','$nama','$nomhp')";

#LAKSANA ARAHAN SQL
$hasil1 = mysqli_query($con, $daftar1);

#MESEJ JIKA BERJAYA	
if ($hasil1) {
session_start();
$_SESSION["idpeserta"]=$idpeserta;
echo "<script>alert('Pendaftaran berjaya');
window.location='dashboard.php'</script>";
}else{
echo "<script>alert('Pendaftaran gagal, Anda Mungkin sudah mendaftar');
window.location='index.php'</script>";
}
}
?>