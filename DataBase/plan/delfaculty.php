	<?
require "option.php";

$Arr=$_POST['Arr'];
$id=$Arr[0];
mysql_query("DELETE FROM faculty  WHERE idfaculty=$id");



?>
 <script language="javascript">
 location.href='faculty.php';
 </script>
