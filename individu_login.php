<!-- MODUL PESERTA -->
<?php 
#MULAKAN SESION
session_start();
#SAMBUNG KE HEADER
include 'header.php';

if(isset($_POST['kp'])) {
#PASTIKAN ID LOGIN ADALAH BETUL
$user = mysqli_real_escape_string($con,$_POST['kp']);
#LAKSANAKAN ARAHAN
$query = mysqli_query($con, "SELECT * FROM peserta WHERE idpeserta='$user'");
$row = mysqli_fetch_assoc($query);
if(mysqli_num_rows($query) == 0)
{
//MSG JIKA GAGAL 
echo "<script>alert('NOM.KP tidak ditemui');
window.location='individu_login.php'</script>";
}else{
$_SESSION["idpeserta"]=$row['idpeserta'];
#BUKA MAIN MENU
header("Location: dashboard.php");
}
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body><center>
<div><h2>LOGIN PESERTA</h2></div>
<form method="post">
<div>
<input onblur="checkLenght(this)" type="text"
name="kp" placeholder="Nom.KP tanda tanda -"
maxLenght='12' size="25" required autofocus />
<script>
function checkLength(el) {
if (el.value.length < 12) {
alert("Taip Nom. KP")
}
}
</script>
</div>
<div>
<button name="hantar" type="submit">LOGIN</button>
<button type="reset">RESET</button>
</div>
</form>
</center></body>
</html>