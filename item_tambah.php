<!-- MODUL ADMIN-ITEM PEMARKAHAN -->
<?php
require 'keselamatan.php';
include 'header.php';
?>

<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
function add_row(){
$rowno=$("#item_markah tr").length;
$rowno=$rowno+1;
//TAIP DALAM SATU BARIS
$("#item_markah tr:last").after("tr id='row"+$rowno+"'><td><input type='text' name='item[]' placeholder='Taip item di sini' size='95%' required>
</td><td><input type='text' name='markah[]' placeholder='X' size='5%' required></td><td><input type='button' class='button' value='X' onclick=delete_row ('row"+rowno+"')></td></tr>");
//TAIP DALAM SATU BARIS TAMAT
}
function delete_row(rowno){
$('#'+rowno).remove();
}
</script>
</head>
<body>
<h2><strong><center>SENARAI ITEM PEMARKAHAN
<?php echo $kata1;?></center></strong></h2>
<form method="post" action="item_simpan.php">
<table id="item_markah" align="center" border=0>
<tr size ='70%'>
<td>Item yang dinilai</td>
<td>Markah Penuh</td>
</tr>
<tr id="row1" size='70%'>
<td><input type="text" name="item[]" placeholder="Taip item di sini" size='95' autofocus required></td>
<td><input type="text" name="markah[]" placeholde="X" size="5%" required></td></tr>
</table>
<br>
<table align="center" border=0>
<tr><td>
<input type="button" onclick="add_row();" value="+ ITEM">
<input type="submit" name="submit_row" value="SIMPAN">
</td></tr>
</table>
</form>
</body>
</html>