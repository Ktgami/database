	<?
require "option.php";

$Arr=$_POST['Arrusersubject'];
$id=$Arr[0];
mysql_query("DELETE FROM usersubject  WHERE idusersubject=$id");



?>
 <script language="javascript">
 location.href='usersubject.php';
 </script>
