	<?
require "option.php";

$Arr=$_POST['Arr'];
$id=$Arr[0];
mysql_query("DELETE FROM user  WHERE iduser=$id");



?>
 <script language="javascript">
 location.href='user.php';
 </script>
