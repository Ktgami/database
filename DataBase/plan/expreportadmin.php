<?
require "option.php";//файл с параметрами подключения к БД
date_default_timezone_set("Europe/Moscow");
$date=date("Y")."-".date("m")."-".date("d");   

	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=Карточка нагрузки от '.$date. '.xls');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0'); 
    header('Cache-Control: must-revalidate');
    header('Pragma: public');   


 	?>				   
		
<html >
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
<title>Карточка нагрузки</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>


<br>
 
   <?
		$filter=$_GET["filter"];//считывание параметра фильтра
		$sort=$_GET["sort"];//считывание параметра фильтра		



$s="SELECT  user, SUM(plan) as plan   FROM plan, user where plan.iduser=user.iduser";


if ($filter==1)/*есть ли фильтрация данных*/
{

 
		 
$fieldfind = $_POST['findname'];//первое поле
$value1 = $_POST['FilterValue1'];//значение первого поля

$s=$s." and $fieldfind" ;
if ($value1!="Все")
$s=$s." LIKE '%$value1"."%'  ";
else
$s=$s."=$fieldfind ";


}

$s=$s." GROUP BY  user";

if ($sort==1)/*есть ли сортировка данных*/
{
$fieldsort = $_POST['sortname'];//первое поле
$s=$s." order by $fieldsort";
}
else
$s=$s." order by user";


		 $r=mysql_query($s);
	 ?>
     
<font  size="+1" >   Карточка нагрузки от  <? echo $date;?>  </font> 

 
                 
  <table WIDTH=100% border=1 cellspacing=0 cellpadding=3>
									<tr>
                          
                         
		<td>Преподаватель</td>       	     								        
		<td>Объём</td>                	 
                                       			        
			</tr>
        
        
      <?
		 
		

			for ($i=0;$i<mysql_num_rows($r);$i++)//вывод данных в цикле по количеству записей
			  {
				$f=mysql_fetch_array($r);//считывание текующей записи				
				echo "
				<td> $f[user]</td>										
				<td> $f[plan]</td>	
																												


							
				";								
				echo "</tr>";
			  }		 
		?>
      
  </table> 

       

</body>
</html>
