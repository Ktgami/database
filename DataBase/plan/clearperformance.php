	<?
require "option.php";

$Arr=$_POST['Arrperformance'];
$id=$Arr[0];
mysql_query("DELETE FROM plan");
mysql_query("insert into plan (idcategory, idsubject) select idcategory, idsubject from category, subject");



?>
 <script language="javascript">
 location.href='performanceadmin.php';
 </script>
