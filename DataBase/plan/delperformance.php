	<?
require "option.php";

$Arr=$_POST['Arrplan'];
$id=$Arr[0];
mysql_query("DELETE FROM plan  WHERE idplan=$id");



?>
 <script language="javascript">
 location.href='performanceadmin.php';
 </script>
