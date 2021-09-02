	<?
require "option.php";

$Arr=$_POST['Arr'];
$id=$Arr[0];
mysql_query("DELETE FROM chair  WHERE idchair=$id");



?>
 <script language="javascript">
 location.href='chair.php';
 </script>
