<!-- MODUL ADMIN/HAKIM -->
<?php
session_start();
require 'tetapan.php';

#GET THE POST VALUES
if (isset($_POST['id'])) {
#PASS POST VALUE TO VARIABLE
$user = mysqli_real_escape_string($con,$_POST['id']);
$pass = mysqli_real_escape_string($con,$_POST['pass']);
#EXE.THE SQL STATEMENT
$query = mysqli_query($con, "SELECT * FROM admin WHERE idadmin='$user' AND password='$pass'");
$row = mysqli_fetch_assoc($query);
if(mysqli_num_rows($query) == 0||$row['password']!=$pass)
{
#MSG IF FAIL TO LOGIN
echo "<script>alert('ID ADMIN atau Kata laluan yang salah');
window.location='index.php'</script>";
}else{
$_SESSION["idadmin"]=$row['idadmin'];
$_SESSION["aras"] = $row['aras'];

#OPEN THE MAIN MENU
header("Location: index2.php");
}
}
?>