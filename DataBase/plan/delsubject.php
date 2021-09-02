	<?
require "option.php";

$Arr=$_POST['Arr'];
$id=$Arr[0];
mysql_query("DELETE FROM subject  WHERE idsubject=$id");



?>
 <script language="javascript">
 location.href='subject.php';
 </script>
