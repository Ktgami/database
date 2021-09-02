	<?
require "option.php";

$Arr=$_POST['Arr'];
$id=$Arr[0];
mysql_query("DELETE FROM spec  WHERE idspec=$id");



?>
 <script language="javascript">
 location.href='spec.php';
 </script>
