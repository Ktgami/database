<?php
$mode=$_COOKIE["mode"];  

$iduser=$_COOKIE["iduser"];  

$fio=$_COOKIE["fio"];  


$dblocation = "localhost";
$dbname = "plan";
$dbuser = "root";
$dbpasswd = "";
$dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);

if (!$dbcnx) 
{
  exit();
}
if (!@mysql_select_db($dbname, $dbcnx)) 
{
  exit();
}

	mysql_set_charset("cp1251", $dbcnx);

?>
